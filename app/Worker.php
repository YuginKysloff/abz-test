<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get the post that owns the worker.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function bossPost()
    {
        return $this->belongsTo('App\Post', 'parent_post_id');
    }
}
