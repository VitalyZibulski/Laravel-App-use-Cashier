<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
		$user = $request->user();

		if ( !$user) {
			$this->validate($request, [
				'name'     => 'required|max:255',
				'email'    => 'required|email|max:255|unique:users',
				'password' => 'required|min:6'
			]);

			try {
				$user = User::create([
					'name'     => $request->input('name'),
					'email'    => $request->input('email'),
					'password' => bcrypt($request->input('password')),
				]);
				Auth::login($user);
			} catch (\Exception $e) {
				return back()->withErrors(['message' => 'Error creating user.']);
			}
		}

		$ccToken = $request->input('cc_token');
		$plan = $request->input('plan');

		try {
			$user->newSubscription('main', $plan)->create($ccToken, [
				'email' => $user->email
			]);
		} catch (\Exception $e) {
			return back()->withErrors(['message' => 'Error creating subscription.']);
		}
	}
}
