<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	//protected $table = 'tag';
    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\Post','post_tags','post_id','tag_id')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
