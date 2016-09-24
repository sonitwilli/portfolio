<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = "contacts";

    /**
     * @param $id
     * Delete only one row
     */
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null) {
            Contents::DeleteData(['type' => 'banner', 'banner_id' => $id]);
            Media::DeleteMultiple(['type' => 'banner', 'banner_id' => $id]);
            deleteImage($check->images);
            self::find($check->id)->delete();
        }
    }

    /**
     * @param string $rarr
     * @return string
     *
     */
    public static function RecursiveIndexAdmin($rarr = "")
    {
        $html = "";
        $query = self::orderBy('publish', 'asc')->get();
        if($query != null){
            foreach ($query as $item){
                $public = ($item->publish == 1)?"gi-eye_close":"gi-eye_open";
                $html .= "<tr>";
                $html .= "<td class=\"text-center\">";
                $html .= "<input type=\"checkbox\" id=\"checkbox-".$item->id ."\" name=\"id[]\" value=\"".$item->id."\">";
                $html .= "</td>";
                $html .= "<td><a href=\"".url('admin/contact/edit/'.$item->id)."\">".$rarr." ".$item->name."</a></td>";
                $html .= "<td>".$item->email."</td>";
                $html .= "<td>".$item->address."</td>";
                $html .= "<td>".$item->phone."</td>";
                $html .= "<td class='text-center'>";
                $html .= "<div class=\"btn-group btn-group-xs\">";
                $html .= "<a href=\"".url('admin/contact/edit/'.$item->id)."\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-default\"><i class=\"gi ".$public."\"></i></a>";
                $html .= HtmlDeleteRecord(url('admin/contact/delete/'.$item->id));
                $html .= "</div>";
                $html .= "</td>";
                $html .= "</tr>";
            }

        }
        return $html;
    }
}
