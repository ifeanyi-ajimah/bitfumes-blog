<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
    	return $this->belongsToMany('App\Model\admin\Role');
    }
}
