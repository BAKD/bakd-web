<?php

namespace BAKD\Observers;

use BAKD\User;

class UserObserver
{
    /**
     * Handle the b a k d user "created" event.
     *
     * @param  \BAKD\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the b a k d user "updated" event.
     *
     * @param  \BAKD\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the b a k d user "deleted" event.
     *
     * @param  \BAKD\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the b a k d user "restored" event.
     *
     * @param  \BAKD\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the b a k d user "force deleted" event.
     *
     * @param  \BAKD\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
