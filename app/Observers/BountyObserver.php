<?php

namespace BAKD\Observers;

use BAKD\Bounty;

class BountyObserver
{
    /**
     * Handle the b a k d bounty "created" event.
     *
     * @param  \BAKD\Bounty  $bounty
     * @return void
     */
    public function created(Bounty $bounty)
    {
        //
    }

    /**
     * Handle the b a k d bounty "updated" event.
     *
     * @param  \BAKD\Bounty  $bounty
     * @return void
     */
    public function updated(Bounty $bounty)
    {
        //
    }

    /**
     * Handle the b a k d bounty "deleted" event.
     *
     * @param  \BAKD\Bounty  $bounty
     * @return void
     */
    public function deleted(Bounty $bounty)
    {
        //
    }

    /**
     * Handle the b a k d bounty "restored" event.
     *
     * @param  \BAKD\Bounty  $bounty
     * @return void
     */
    public function restored(Bounty $bounty)
    {
        //
    }

    /**
     * Handle the b a k d bounty "force deleted" event.
     *
     * @param  \BAKD\Bounty  $bounty
     * @return void
     */
    public function forceDeleted(Bounty $bounty)
    {
        //
    }
}
