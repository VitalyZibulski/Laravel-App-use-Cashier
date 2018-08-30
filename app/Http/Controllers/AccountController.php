<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
	public function showAccount(Request $request)
	{
		$user = $request->user();
		$invoices = $user->subscribed('main') ? $user->invoices() : null;


		return view('pages.account', compact(['user','invoices']));
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
		$user = $request->user();
		$ccToken = $request->input('cc_token');

		$user->updateCard($ccToken);

		return redirect('account')->with(['success' => 'Credit card updated']);
    }

	public function deleteSubscription(Request $request)
	{
		
    }
}
