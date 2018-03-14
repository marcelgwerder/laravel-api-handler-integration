<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Comment extends Model
{
    public function commentable(): Relation
    {
        return $this->morphTo();
    }
}
