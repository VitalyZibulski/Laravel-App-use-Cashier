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
	Route::get('welcome', 'SubscribeController@showWelcome');
});
//account routes

