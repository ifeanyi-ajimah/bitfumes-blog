<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\Post','category_posts','category_id','post_id')->orderBy('created_at','DESC')->paginate(5);
    	//N/B: Since we can not run pagination for relationships in the controller, we write it in the model.
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
