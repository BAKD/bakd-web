<?php

namespace BAKD\Providers;

use BAKD\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \BAKD\User::observe(\BAKD\Observers\UserObserver::class);
        \BAKD\Bounty::observe(\BAKD\Observers\BountyObserver::class);
        \BAKD\BountyType::observe(\BAKD\Observers\BountyTypeObserver::class);
        \BAKD\BountyClaim::observe(\BAKD\Observers\BountyClaimObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
