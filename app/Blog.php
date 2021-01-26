<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getBlogCategory()
    {
        return $this->belongsTo('App\BlogCategory',"blog_category_id");
    }
    public function getBlogPhoto()
    {
        return $this->hasMany('App\BlogPhoto',"blog_id");
    }
}
