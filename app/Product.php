<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $primaryKey = 'id';

    //images
    public function images()
    {
        return $this->hasMany('App\ImageUpLoad');
    }

    // comment
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
