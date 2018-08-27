<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
	public function showAccount()
	{
		return view('pages.account');
    }

	public function updateSubscription(Request $request)
	{

    }

	public function updateCard(Request $request)
	{

    }

	public function deleteSubscription(Request $request)
	{
		
    }
}
