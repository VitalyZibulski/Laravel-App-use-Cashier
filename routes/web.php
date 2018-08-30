<?php

//site routes
Route::get('/','SiteController@showHome');
Route::get('/post/{slug}','SiteController@showPost');

//auth routes
Route::auth();
Route::get('/logout','Auth\LoginController@logout');

//subs routes
Route::get('/subscribe','SubscribeController@showSubscribe');
Route::post('/subscribe','SubscribeController@processSubscribe');

Route::group(['middleware' => 'auth'], function() {
	Route::get('welcome', 'SubscribeController@showWelcome')->middleware('subscribed');
	//account routes
	Route::get('account', 'AccountController@showAccount');
	Route::post('account/subscription','AccountController@updateSubscription');
	Route::post('account/card','AccountController@updateCsrd');
	Route::get('account/invoices/{invoice}','AccountController@downloadInvoice');
	Route::delete('account/subscription', 'AccountController@deleteSubscription');
});


