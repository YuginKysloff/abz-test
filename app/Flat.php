<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'address', 'price', 'image'
    ];
}
