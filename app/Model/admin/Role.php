<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
    	return $this->belongsToMany('App\Model\admin\Permission');
    }

    public function admins(){
    	return $this->belongsToMany('App\Model\admin\Admin');
    }
}
