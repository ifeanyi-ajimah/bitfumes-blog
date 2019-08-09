<?php

namespace App\Http\Controllers;
use App\Model\user\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPostController extends Controller
{
    public function post(Post $post){
    	//return $slug;
    	return view('user.post',compact('post'));
    }

    public function saveLike(Request $request)
    {
        
    }

}
