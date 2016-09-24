<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    //
    protected $table = "contents";

    /**
     * @param $parent
     * @param $where
     * @param $type
     * @return mixed
     */
    public static function DeleteMetaNotIn($parent, $where) {
        return self::whereNotIn($parent, $where)->delete();
    }

    public static function DeleteData($where)
    {
        return self::where($where)->delete();
    }
}
