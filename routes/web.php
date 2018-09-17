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
            Route::get('about',      'PageController@index')->name('about');
            Route::get('privacy',    'PageController@index')->name('privacy');
            Route::get('terms',      'PageController@index')->name('terms');
            Route::get('contact-us', 'PageController@index')->name('contact');

        });
    });
});

// -----------------
// MEMBER ROUTES
// -----------------
Route::name('member.')->group(function () {
    Route::namespace('Member')->group(function () {
        Route::prefix('manage')->group(function () {
            Route::middleware(['auth'])->group(function () {  // TODO: Refine middleware selection

                // Member routes for authenticated users of the BAKD Platform.
                // A "member" can be any of the following roles: Investor, Campaign Owner, BAKD Employee, etc.
                Route::get('/', 'PageController@index')->name('home');

                // Vanity Subdomain Routing for Investor Profiles
                // Route::domain('{account}.bakd.me')->group(function () {
                //     Route::get('user/{id}', function ($account, $id) {
                //         return print_r($account);
                //     });
                // });

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

                // Management routes for BAKD Administrators
                Route::get('/', 'PageController@index')->name('home');

            });
        });
    });
});
