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
Route::name('frontend.')->group(function () {
    Route::namespace('Frontend')->group(function () {
        Route::middleware([])->group(function () {  // TODO: Refine middleware selection
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
            Route::get('u/{id}', 'PageController@profile')->name('members.profile');
        });
    });
});

// -----------------
// MEMBER ROUTES
// -----------------
Route::name('member.')->group(function () {
    Route::namespace('Member')->group(function () {
        Route::prefix('member')->group(function () {
            Route::middleware(['auth'])->group(function () {  // TODO: Refine middleware selection
                Route::get('/', 'PageController@index')->name('home');

                // Bounties
                Route::get('/bounty', 'BountyController@index')->name('bounty.home');
                Route::get('/bounty/{id}', 'BountyController@show')->name('bounty.show');

                // Claims for All Bounties Related to Auth'd User
                Route::get('/claims', 'BountyClaimController@all')->name('claims.all');

                // Claims For Specific Bounties
                Route::get('/bounty/{id}/claims', 'BountyClaimController@index')->name('bounty.claims');
                Route::get('/bounty/{id}/claim', 'BountyClaimController@create')->name('bounty.claim');
                Route::post('/bounty/{id}/claim', 'BountyClaimController@store')->name('bounty.claim.save');
                Route::get('/bounty/claim/{id}', 'BountyClaimController@show')->name('bounty.claim.show');
                Route::get('/bounty/claim/{id}/edit', 'BountyClaimController@edit')->name('bounty.claim.edit');
                Route::post('/bounty/claim/{id}/edit', 'BountyClaimController@update')->name('bounty.claim.edit.save');
                Route::get('/bounty/claim/{id}/cancel', 'BountyClaimController@destroy')->name('bounty.claim.cancel');

                // Regular Member Dashboard - Visible to all members
                Route::get('/dashboard', 'MemberController@index')->name('dashboard.home');
            });
        });
    });
});

// -----------------
// MANAGE ROUTES
// -----------------
Route::name('manage.')->group(function () {
    Route::namespace('Manage')->group(function () {
        Route::prefix('manage')->group(function () {
            Route::middleware(['auth', 'auth.admin'])->group(function () {  // TODO: Refine middleware selection
                Route::get('/', 'PageController@index')->name('home');
            });
        });
    });
});
