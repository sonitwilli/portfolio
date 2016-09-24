<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MasterModel extends Model
{
    //
    public static function CreateContent($table, $data, $where = null) {
        if($where != null) {
            return DB::table($table)->where($where)->update($data);
        }
        $last_id = DB::table($table)->insertGetId($data);
        return $last_id;
    }
}
