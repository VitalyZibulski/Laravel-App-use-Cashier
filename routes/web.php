<?php

//site routes
Route::get('/','SiteController@showHome');
Route::get('/post/{slug}','SiteController@showPost');

//auth routes
Route::auth();
Route::get('/logout','Auth\LoginController@logout');

//subs routes

//account routes

