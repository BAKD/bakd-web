<?php

namespace BAKD\Helpers;

use \Carbon\Carbon;

class FrontendHelper extends BaseHelper
{
    public static function getTimeSince($milestone = 'announcement', $period = 'days')
    {
        if (!$milestone) throw new Exception('Please provide a date/time milestone to return.');

        $now = new Carbon('now');
        $m = strtolower($milestone);

        if ($m === 'announcement') {
            $started = new Carbon(config('bakd.dates.announcement'), config('bakd.dates.timezone'));
            // )->diffInDays($now);
        } elseif ($m === 'alpha') {
            $started = new Carbon(config('bakd.dates.alpha'), config('bakd.dates.timezone'));
            // )->diffInDays($now);
        } else {
            throw new InvalidArgumentException('We do not currently support this date/time milestone.');
        }

        // dd($started);

        // $date =
        return $started->{'diffIn' . ucfirst($period)}($now);
    }
}
