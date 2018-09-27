<?php

/*
|--------------------------------------------------------------------------
| BAKD Web Routes
|--------------------------------------------------------------------------
| Web routes for the entire BAKD ICO Management & Networking Platform
|
*/

// -----------------
// PRE-DEFINED ROUTES
// -----------------
Auth::routes();

// -----------------
// FRONTEND ROUTES
// -----------------
Route::group([
    'name' => 'frontend.',
    'namespace' => 'Frontend',
    'middleware' => [],
], function () {
    // Frontend routes for all public static pages.
    Route::get('/',          'PageController@index')->name('home');
    Route::get('about',      'PageController@about')->name('about');
    Route::get('privacy',    'PageController@privacy')->name('privacy');
    Route::get('terms',      'PageController@terms')->name('terms');
    Route::get('contact-us', 'PageController@contact')->name('contact');

    // Public/non authed landing pages for each main app resource
    Route::get('bounties', 'PageController@bounties')->name('bounties');
    Route::get('campaigns', 'PageController@campaigns')->name('campaigns');
    Route::get('members', 'PageController@members')->name('members');
});

// -----------------
// MEMBER ROUTES
// -----------------
Route::group([
    'name' => 'member.',
    'namespace' => 'Member',
    'prefix' => 'member',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'PageController@index')->name('home');




    Route::get('/bounty', 'BountyController@index')->name('bounty.home');
    Route::get('/bounty/{id}', 'BountyController@show')->name('bounty.show');
    Route::get('/bounty/{id}/claim', 'BountyClaimController@create')->name('bounty.claim');
    Route::post('/bounty/{id}/claim', 'BountyClaimController@claimForm')->name('bounty.claim.post');
});

// -----------------
// MANAGE ROUTES
// -----------------
Route::group([
    'name' => 'manage.',
    'namespace' => 'Manage',
    'prefix' => 'manage',
    'middleware' => ['auth', 'auth.admin'],
], function () {
    Route::get('/', 'PageController@index')->name('home');
});
