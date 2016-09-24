<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = "menus";

    public function metaData()
    {
        return $this->hasMany('Models\Contents','menu_id','id');
    }

    public static function getMenuById($id)
    {
        return self::with('metaData')->find($id);
    }
    
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null)
        {
            Contents::where(['type' => 'menu', 'menu_id' => $id])->delete();
        }
        return self::where('id',$id)->delete();
    }

    public static function RecursiveMenu($id = 0, $parent = 0, $check = 0)
    {
        $html = "";
        $query = self::where('parent_id',$parent)->where('id','<>',$id)->get();
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

    public static function RecursiveMenuIndexAdmin($parent = 0, $rarr = "")
    {
        $html = "";
        $query = self::where('parent_id', $parent)->get();
        if($query != null){
            foreach ($query as $item){
                $parent_name = ($item->parent_id == 0)?"No Parent":self::getMenuById($item->parent_id)->name;
                $status = ($item->publish == 1)?"publish":"hidden";
                $class = ($item->publish == 1)?"label-success":"label-danger";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/menu/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$parent_name."</td>";
                $html .= "<td><input class='form-control update_order' data-url=\"".url('admin/menu/update-order/'.$item->id)."\" value='".$item->order_by."'></td>";
                $html .= "<td><span class=\"label ".$class." check_status\" data-url=\"".url('admin/menu/check-status/'.$item->id)."\">".$status."</span></td>";
                $html .= "<td class=\"text-center\">";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/menu/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"fa fa-pencil\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/menu/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
                $html .= self::RecursiveMenuIndexAdmin($item->id, $rarr."&rarr;");
            }

        }
        return $html;
    }
}
