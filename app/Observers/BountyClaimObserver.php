<?php

namespace BAKD\Observers;

use BAKD\BountyClaim;

class BountyClaimObserver
{
    /**
     * Handle the b a k d bounty claim "created" event.
     *
     * @param  \BAKD\BountyClaim  $bountyClaim
     * @return void
     */
    public function created(BountyClaim $bountyClaim)
    {
        //
    }

    /**
     * Handle the b a k d bounty claim "updated" event.
     *
     * @param  \BAKD\BountyClaim  $bountyClaim
     * @return void
     */
    public function updated(BountyClaim $bountyClaim)
    {
        //
    }

    /**
     * Handle the b a k d bounty claim "deleted" event.
     *
     * @param  \BAKD\BountyClaim  $bountyClaim
     * @return void
     */
    public function deleted(BountyClaim $bountyClaim)
    {
        //
    }

    /**
     * Handle the b a k d bounty claim "restored" event.
     *
     * @param  \BAKD\BountyClaim  $bountyClaim
     * @return void
     */
    public function restored(BountyClaim $bountyClaim)
    {
        //
    }

    /**
     * Handle the b a k d bounty claim "force deleted" event.
     *
     * @param  \BAKD\BountyClaim  $bountyClaim
     * @return void
     */
    public function forceDeleted(BountyClaim $bountyClaim)
    {
        //
    }
}
