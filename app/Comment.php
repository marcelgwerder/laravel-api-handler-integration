<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get all of the posts for the country.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}