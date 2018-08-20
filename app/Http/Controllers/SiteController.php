<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
    public function showHome(){
    	$posts = Post::with('author')->get();

		return view('pages.home', compact('posts'));
	}

	public function showPost($slug){
		return view('pages.post');
	}
}
