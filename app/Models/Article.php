<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = "articles";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metaData()
    {
        return $this->hasMany('Models\Contents','article_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mediaData()
    {
        return $this->hasMany('Models\Media','article_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapTags()
    {
        return $this->hasMany('Models\MapTags', 'article_id');
    }

    //Demon Dragon//
    public function categories(){
        return $this->belongsTo('Models\Menus', 'category_id');
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function getById($id)
    {
        return self::with('metaData','mediaData','mapTags')->find($id);
    }
    /**
     * @param $id
     * Delete only one row
     */
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null) {
            Contents::DeleteData(['type' => 'article', 'article_id' => $id]);
            Media::DeleteMultiple(['type' => 'article', 'article_id' => $id]);
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
                Contents::DeleteData(['type' => 'article', 'article_id' => $item->id]);
                Media::DeleteMultiple(['type' => 'article', 'article_id' => $item->id]);
                if ($item->images != null)
                {
                    deleteImage($item->images);
                    self::find($item->id)->delete();
                }
            }
        }
    }

    public static function RecursiveMenu($id = 0, $parent = 0, $check = 0)
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
                $html .= self::RecursiveMenu($id, $item->id, $check);
                $html .=  "</li>";

            }
            $html .=  "</ul>";
        }
        return $html;
    }

    public static function RecursiveIndexAdmin($rarr = "")
    {
        $html = "";
        $query = self::get();
        if($query != null){
            foreach ($query as $item){
                $parent_name = ($item->category_id == 0)?"No Parent":Menus::getMenuById($item->category_id)->name;
                $status = ($item->publish == 1)?"publish":"hidden";
                $featured = ($item->featured == 1)?"featured":"normal";
                $class = ($item->publish == 1)?"label-success":"label-danger";
                $class_featured = ($item->featured == 1)?"label-success":"label-danger";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/article/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$parent_name."</td>";
                $html .= "<td>
                                <span class=\"label ".$class." check_status\" data-type='publish' data-url=\"".url('admin/article/check-status/publish/'.$item->id)."\">".$status."</span>
                                <span class=\"label ".$class_featured." check_status\" data-type='featured' data-url=\"".url('admin/article/check-status/featured/'.$item->id)."\">".$featured."</span>
                            </td>";
                $html .= "<td><input class='form-control update_order' data-url=\"".url('admin/article/update-order/'.$item->id)."\" value='".$item->order_by."'></td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/article/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/article/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }

    //*******************Demon Dragon******************//
    public static function getArticleFeature($category_id){
        return self::whereIn('category_id',$category_id)->where('publish',1)->where('featured', 1)->orderBy('order_by')->with('mediaData')->with('categories')->get();
    }

    public static function getArticleRelated($category_id, $id){
        return self::whereIn('category_id',$category_id)->where('id','<>',$id)->where('publish',1)->orderBy('order_by')->get();
    }
}
