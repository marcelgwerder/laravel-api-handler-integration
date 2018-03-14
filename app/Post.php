<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Marcelgwerder\ApiHandler\Contracts\ApiHandlerConfig;

class Post extends Model implements ApiHandlerConfig
{
    /**
     * One to Many
     */
    public function votes() : Relation
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Polymorphic
     */
    public function comments() : Relation
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

    public function mergeApiHandlerConfig(): array 
    {
        return [
            'selectable' => ['id'],
        ];
    }
}
