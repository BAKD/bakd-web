<?php

namespace BAKD\Observers;

use BAKD\BountyType;

class BountyTypeObserver
{
    /**
     * Handle the b a k d bounty type "created" event.
     *
     * @param  \BAKD\BountyType  $bountyType
     * @return void
     */
    public function created(BountyType $bountyType)
    {
        //
    }

    /**
     * Handle the b a k d bounty type "updated" event.
     *
     * @param  \BAKD\BountyType  $bountyType
     * @return void
     */
    public function updated(BountyType $bountyType)
    {
        //
    }

    /**
     * Handle the b a k d bounty type "deleted" event.
     *
     * @param  \BAKD\BountyType  $bountyType
     * @return void
     */
    public function deleted(BountyType $bountyType)
    {
        //
    }

    /**
     * Handle the b a k d bounty type "restored" event.
     *
     * @param  \BAKD\BountyType  $bountyType
     * @return void
     */
    public function restored(BountyType $bountyType)
    {
        //
    }

    /**
     * Handle the b a k d bounty type "force deleted" event.
     *
     * @param  \BAKD\BountyType  $bountyType
     * @return void
     */
    public function forceDeleted(BountyType $bountyType)
    {
        //
    }
}
