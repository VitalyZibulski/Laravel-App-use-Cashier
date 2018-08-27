<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
	public function showAccount(Request $request)
	{
		$user = $request->user();

		return view('pages.account', compact('user'));
    }

	public function updateSubscription(Request $request)
	{
		$user = $request->user();
		$plan = $request->input('plan');
		$user->subscription('main')->swap($plan);

		return redirect('account')->with(['success' => 'Subscription updated.']);
    }

	public function updateCard(Request $request)
	{

    }

	public function deleteSubscription(Request $request)
	{
		
    }
}
