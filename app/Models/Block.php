<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    //
    protected  $table = "blocks";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metaData()
    {
        return $this->hasMany('Models\Contents','block_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaData()
    {
        return $this->hasMany('Models\Media','block_id','id');
    }

    public static function getById($id)
    {
        return self::with('metaData')->with('mediaData')->find($id);
    }
    /**
     * @param $id
     * Delete only one row
     */
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null) {
            Contents::DeleteData(['type' => 'block', 'block_id' => $id]);
            Media::DeleteMultiple(['type' => 'block', 'block_id' => $id]);
            deleteImage($check->images);
            self::find($check->id)->delete();
        }
    }

    /**
     * @param $where
     * Delete multiple rows
     */
    public static function DeleteMultiple($where)
    {
        $check = self::where($where)->get();
        if(count($check) > 0)
        {
            foreach ($check as $item)
            {
                Contents::DeleteData(['type' => 'block', 'block_id' => $item->id]);
                Media::DeleteMultiple(['type' => 'block', 'block_id' => $item->id]);
                if ($item->images != null)
                {
                    deleteImage($item->images);
                    self::find($item->id)->delete();
                }
            }
        }
    }

    /**
     * @param int $id
     * @param int $parent
     * @param int $check
     * @return string
     */
    public static function RecursiveMenu($id = 0, $parent = 0, $check = 0, $check_category)
    {
        $html = "";
        $query = Menus::where('parent_id',$parent)->get();
        if(!empty($query)){
            $html .=  "<ul class=\"list-unstyled\">";
            foreach ($query as $item){

                $checked = "";
                if($check == $item->id){
                    $checked = "checked";
                }
                $html .=  "<li>";
                $html .=  "<label><input type=\"radio\" name=\"parent_id\" value=\"".$item->id."\" ".$checked.">".$item->name."</label>";
                $html .= self::RecursiveMenu($id, $item->id, $check, $check_category);
                $category = Category::where('type', 'block')->where('menu_id', $item->id)->get();
                if(count($category) > 0)
                {
                    $html .=  "<ul class=\"list-unstyled\">";
                    foreach ($category as $cat)
                    {
                        $checked = "";
                        if($check_category != null && in_array($cat->id, $check_category)){
                            $checked = "checked";
                        }
                        $html .=  "<li>";
                        $html .=  "<label><input type=\"checkbox\" name=\"category_id[]\" value=\"".$cat->id."\" ".$checked.">".$cat->name."</label>";
                        $html .=  "</li>";
                    }
                    $html .=  "</ul>";
                }
                $html .=  "</li>";

            }
            $html .=  "</ul>";
        }
        return $html;
    }

    /**
     * @param string $rarr
     * @return string
     *
     */
    public static function RecursiveIndexAdmin($rarr = "")
    {
        $html = "";
        $query = self::get();
        if($query != null){
            foreach ($query as $item){
                $parent_name = ($item->menu_id == 0)?"No Parent":Menus::getMenuById($item->menu_id)->name;
                if($parent_name == 'No Parent')
                    $parent_name = ($item->category_id == 0)?"No Parent":Category::where('id',$item->category_id)->value('name');
                $status = ($item->publish == 1)?"publish":"hidden";
                $featured = ($item->featured == 1)?"featured":"normal";
                $class = ($item->publish == 1)?"label-success":"label-danger";
                $class_featured = ($item->featured == 1)?"label-success":"label-danger";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/block/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$parent_name."</td>";
                $html .= "<td>
                                <span class=\"label ".$class." check_status\" data-type='publish' data-url=\"".url('admin/block/check-status/publish/'.$item->id)."\">".$status."</span>
                                <span class=\"label ".$class_featured." check_status\" data-type='featured' data-url=\"".url('admin/block/check-status/featured/'.$item->id)."\">".$featured."</span>
                            </td>";
                $html .= "<td><input class='form-control update_order' data-url=\"".url('admin/block/update-order/'.$item->id)."\" value='".$item->order_by."'></td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/block/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/block/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }
}
