<?php

/*
|--------------------------------------------------------------------------
| BAKD Web Routes
|--------------------------------------------------------------------------
|
| Here is where all of the available BAKD frontend web routes are registered.
|
*/

// Homepage
Route::get('/', function () {
    return view('index');
});

// Predefined Framework Auth Routes
Auth::routes();

Route::get('/', 'Frontend\PageController@index')->name('frontend.home');
Route::get('/dashboard', 'Member\PageController@index')->name('member.home');
