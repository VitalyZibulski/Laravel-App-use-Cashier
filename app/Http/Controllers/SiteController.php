<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{
	/**
	 * get all posts
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showHome(){
    	$posts = Post::with('author')->get();

		return view('pages.home', compact('posts'));
	}

	/**
	 * get one post
	 *
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showPost($slug){
    	$post = Post::whereSlug($slug)->with('author')->first();

		return view('pages.post', compact('post'));
	}
}
