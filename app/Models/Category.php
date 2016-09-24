<?php

namespace Models;

use App\Jobs\DeleteCategory;
use Illuminate\Database\Eloquent\Model;

use Queue;


class Category extends Model
{
    //
    protected $table = "categories";

    public function metaData()
    {
        return $this->hasMany('Models\Contents','category_id','id');
    }

    public function mediaData()
    {
        return $this->hasMany('Models\Media','category_id','id');
    }

    public function block(){
        return $this->hasMany('Models\Block','category_id','id')->where('publish',1)->orderBy('order_by','asc');
    }

    public function parent(){
        return $this->belongsTo('Models\Menus','menu_id','id');
    }

    public static function getById($id)
    {
        return self::with('metaData')->with('mediaData')->with('block')->with('parent')->find($id);
    }

    public static function getCategoryByParent($port_menu_id){
        return self::where('publish',1)->whereIn('menu_id',$port_menu_id)->with('mediaData')->with('block')->orderBy('order_by')->get();
    }

    public static function DeleteById($id)
    {
        Queue::push(new DeleteCategory($id));
    }

    public static function DeleteCategory($id)
    {
        $check = self::find($id);
        if($check != null)
        {
            Contents::DeleteData(['type' => 'category', 'category_id' => $id]);
            Media::DeleteMultiple(['type' => 'category', 'category_id' => $id]);
            Block::DeleteMultiple(['category_id' => $id]);
            Banner::DeleteMultiple(['category_id' => $id]);
            Article::DeleteMultiple(['category_id' => $id]);
            if ($check->images != null)
                deleteImage($check->images);
        }
        return self::find($id)->delete();
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

    public static function RecursiveIndexAdmin($type, $rarr = "")
    {
        $html = "";
        $query = self::where('type', $type)->get();
        if($query != null){
            foreach ($query as $item){
                $parent_name = ($item->menu_id == 0)?"No Parent":Menus::getMenuById($item->menu_id)->name;
                $status = ($item->publish == 1)?"publish":"hidden";
                $class = ($item->publish == 1)?"label-success":"label-danger";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/'.$type.'/category/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$parent_name."</td>";
                $html .= "<td><input class='form-control update_order' data-url=\"".url('admin/'.$type.'/category/update-order/'.$item->id)."\" value='".$item->order_by."'></td>";
                $html .= "<td><span class=\"label ".$class." check_status\" data-url=\"".url('admin/'.$type.'/category/check-status/'.$item->id)."\">".$status."</span></td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/'.$type.'/category/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/'.$type.'/category/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }
}
