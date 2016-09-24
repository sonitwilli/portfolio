<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $table = "media";

    /**
     * @param $id
     * delete one row
     */
    public static function DeleteById($id)
    {
        $check = self::find($id);
        if($check != null){
            if ($check->images != null)
            {
                deleteImage($check->images);
                self::find($check->id)->delete();
            }
        }
    }

    /**
     * @param $where
     * delete multiple rows
     */
    public static function DeleteMultiple($where)
    {
        $check = self::where($where)->get();
        if(count($check) > 0)
        {
            foreach ($check as $item)
            {
                if ($item->images != null)
                {
                    deleteImage($item->images);
                    self::find($item->id)->delete();
                }
            }
        }
    }
}
