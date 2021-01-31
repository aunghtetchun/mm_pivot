<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getProjectPhoto()
    {
        return $this->hasMany('App\ProjectPhoto',"project_id");
    }
}
