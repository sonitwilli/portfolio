<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class MapTags extends Model
{
    //

    protected $table = "map_tags";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->belongsTo('Models\Tags', 'tags_id');
    }

    /**
     * @param $article_id
     * @param $tags_id
     * @return MapTags
     */
    public static function CreateMapTag($article_id, $tags_id)
    {
        $check = self::where(['article_id' => $article_id, 'tags_id' => $tags_id])->first();
        if($check == null) {
            $map_tags = new self;
            $map_tags->article_id = $article_id;
            $map_tags->tags_id = $tags_id;
            $map_tags->save();
            return $map_tags;
        }
    }

    /**
     * @param $article_id
     * @return mixed
     */
    public static function DeleteMapTags($article_id)
    {
        return self::where('article_id', $article_id)->delete();
    }

    public static function DeleteMapTagsNotInTagsId($article_id, $tags_id)
    {
        return self::where('article_id', $article_id)->whereNotIn('tags_id', $tags_id)->delete();
    }
}
