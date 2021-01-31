<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function getProject()
    {
        return $this->belongsTo('App\Project',"project_id");
    }
    public function getProjectPhoto()
    {
        return $this->hasMany('App\ProjectPhoto',"building_id");
    }
    public function getRoom()
    {
        return $this->hasMany('App\Room',"building_id");
    }
}
