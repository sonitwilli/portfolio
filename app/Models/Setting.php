<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = "setting";

    public function metaData() {
        return $this->hasMany('Models\Contents', 'setting_id', 'id');
    }
    
    public static function getSetting(){
        return self::with('metaData')->first();
    }
}
