<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metaData()
    {
        return $this->hasMany('Models\Contents','product_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaData()
    {
        return $this->hasMany('Models\Media','product_id','id');
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
            Contents::DeleteData(['type' => 'product', 'product_id' => $id]);
            Media::DeleteMultiple(['type' => 'product', 'product_id' => $id]);
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
                Contents::DeleteData(['type' => 'product', 'product_id' => $item->id]);
                Media::DeleteMultiple(['type' => 'product', 'product_id' => $item->id]);
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
    public static function RecursiveMenu($id = 0, $parent = 0, $check = 0, $arr = "")
    {
        $html = "";
        $query = CategoryProducts::where('parent_id',$parent)->get();
        if(!empty($query)){
            foreach ($query as $item){
                $checked = "";
                if($check == $item->id){
                    $checked = "selected";
                }
                $html .=  "<option value=\"".$item->id."\" ".$checked.">".$arr. "&nbsp;" .$item->name."</option>";
                $html .= self::RecursiveMenu($id, $item->id, $check, $arr."&rarr;");
            }
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
                $parent_name = ($item->category_id == 0)?"No Parent":CategoryProducts::getMenuById($item->category_id)->name;
                $status = ($item->publish == 1)?"publish":"hidden";
                $featured = ($item->featured == 1)?"featured":"normal";
                $class = ($item->publish == 1)?"label-success":"label-danger";
                $class_featured = ($item->featured == 1)?"label-success":"label-danger";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/products/edit/'.$item->id)."\"><img src='".getImage($item->images)."' class='img-thumbnail' style='max-height:80px;'></a></td>";
                $html .= "<td><a href=\"".url('admin/products/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$parent_name."</td>";
                $html .= "<td>".number_format($item->price, 0, '.', ',')."</td>";
                $html .= "<td>
                                <span class=\"label ".$class." check_status\" data-type='publish' data-url=\"".url('admin/products/check-status/publish/'.$item->id)."\">".$status."</span>
                                <span class=\"label ".$class_featured." check_status\" data-type='featured' data-url=\"".url('admin/products/check-status/featured/'.$item->id)."\">".$featured."</span>
                            </td>";
                $html .= "<td>".convertDateTime($item->created_at)."</td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/products/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/products/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }
}
