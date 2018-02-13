<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostExtended extends Model
{
    protected $table = 'post_extended';

    protected $primaryKey = 'post_id';

    public $timestamps = false;

    public $incrementing = false;

    /**
     * One to One (inverse)
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
