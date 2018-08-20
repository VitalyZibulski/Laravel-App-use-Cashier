<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showHome(){
		return view('pages.home');
	}

	public function showPost(){
		return view('pages.post');
	}
}
