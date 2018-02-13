<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Polymorphic
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Many to Many
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'video_tag');
    }

    /**
     * Many to Many Polymorphic
     */
    public function tagsPoly()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
