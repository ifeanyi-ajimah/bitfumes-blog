<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title','subtitle','slug','body', 'status','image', 'like','dislike'];
    
    public function tags(){
    	return $this->belongsToMany('App\Model\user\Tag','post_tags','post_id','tag_id')->withTimestamps();//when it is created, it will be created with timestamp
    }

    public function categories(){
    	return $this->belongsToMany('App\Model\user\Category','category_posts','category_id','post_id')->withTimestamps();//when it is created, it will be created with timestamp
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

}
