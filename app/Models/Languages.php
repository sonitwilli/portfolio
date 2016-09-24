<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Models\MetaData;
use Models\Contents;

class Languages extends Model
{
    //
    protected $table = "languages";

    public static function DeleteLanguage($id) {
        $language = self::find($id);
        if(count($language) > 0) {
            //MetaData::where('language_id', $id)->delete();
            //Contents::where('language_id', $id)->delete();

        }
        return self::where('id',$id)->delete();
    }
}
