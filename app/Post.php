<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * One to Many
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

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
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Many to Many Polymorphic
     */
    public function tagsPoly()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * One to One
     */
    public function extended()
    {
        return $this->hasOne(PostExtended::class);
    }
}
