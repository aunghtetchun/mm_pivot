<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function getGalleryPhoto()
    {
        return $this->hasMany('App\GalleryPhoto',"gallery_id");
    }
}
