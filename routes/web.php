<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/catalog', 'TidingController@index')->name('tidings');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('updateprofile');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api', function () { return view('api'); })->name('api');;