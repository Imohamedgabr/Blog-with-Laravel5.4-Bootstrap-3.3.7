<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // you need to tell laravel to deal with categories table when working with this model
    protected $table = 'categories';

    // now we need to define the relation
    // one category has many posts
    public function posts()
    {

    	return $this->hasMany('App\Post');
    }
}
