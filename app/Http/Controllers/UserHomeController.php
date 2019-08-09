<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Tag;
use App\Model\user\Category;

class UserHomeController extends Controller
{
    public function index (){
    	$posts = Post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(10);
    	return view('user.blogs', compact('posts'));
    }

    public function tag(Tag $tag)
    {
    	$posts = $tag->posts();
    	return view('user.blogs', compact('posts'));
    }

    public function category(Category $category)
    {
    	 $posts =  $category->posts();
    	 return view('user.blogs',compact('posts'));
    }

    public function getPosts(){
        $posts = Post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(28);
        return $posts->toJson();
    	//return view('user.blogs', compact('posts'));
    }

    

}
