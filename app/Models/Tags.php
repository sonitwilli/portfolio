<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //

    protected $table = "tags";

    /**
     * @param $id
     * @return mixed
     */
    public static function GetByInId($id)
    {
        return self::whereIn('id',$id)->get();
    }

    /**
     * @param $input
     * @param $article_id
     * @return Tags
     */
    public static function CreateTags($input, $article_id)
    {
        $check = self::where(['slug' => $input['slug']])->first();
        if($check == null)
        {
            $tags = new self;
            $tags->name = $input['name'];
            $tags->slug = $input['slug'];
            $tags->save();
            MapTags::CreateMapTag($article_id, $tags->id);
            return $tags;
        } else {
            MapTags::CreateMapTag($article_id, $check->id);
            return $check;
        }
    }
}
