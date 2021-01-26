<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getProductCategory()
    {
        return $this->belongsTo('App\ProductCategory',"product_category_id");
    }
    public function getProductPhoto()
    {
        return $this->hasMany('App\ProductPhoto',"product_id");
    }
}
