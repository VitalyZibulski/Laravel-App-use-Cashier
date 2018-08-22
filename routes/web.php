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

//account routes

