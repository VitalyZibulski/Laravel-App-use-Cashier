<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
	/**
	 * Show form
	 */
	public function showSubscribe(){
		return view('pages.subscribe');
	}

	/**
	 * Process form
	 *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function processSubscribe(Request $request){
		return view('pages.subscribe');
	}
}
