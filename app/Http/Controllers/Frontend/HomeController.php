<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function index(){
        $search = request()->get('search');
        $categories = Category::get();
        $tags = Tag::get();
    	$posts = Post::search($search)
                    ->orderBy('id','DESC')
                    ->paginate(4);
        $posts->appends([
            'search' => $search
        ]);
    	return view('frontend.posts',compact('posts','categories','tags'));
    }

    public function post($slug){
    	$post = Post::where("slug",$slug)->firstOrFail();
    	return view('frontend.post', compact('post'));
    }

    public function tag($tag){
        $categories = Category::get();
        $tags = Tag::get();
	    $posts = Post::whereHas('tags', function ($query) use ($tag) {
			  		$query->where('slug', $tag);
				})->orderBy('id','DESC')->paginate(4);
    	return view('frontend.posts',compact('posts','categories','tags'));
    }
    public function category($category){
        $categories = Category::get();
        $tags = Tag::get();
	    $posts = Post::whereHas('categories', function ($query) use ($category) {
			  		$query->where('slug', $category);
				})->orderBy('id','DESC')->paginate(4);
    	return view('frontend.posts',compact('posts','categories','tags'));
    }

}
