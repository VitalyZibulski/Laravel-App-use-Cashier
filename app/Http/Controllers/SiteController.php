<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showHome(){
		return view('home');
	}

	public function showPost(){
		return view('post');
	}
}
