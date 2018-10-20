<?php

namespace BAKD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Bounty extends Model
{
    use Traits\Uuids,
        SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bounty';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'];

    public function type()
    {
        return $this->belongsTo('BAKD\BountyType');
    }

    public function users()
    {
        return $this->hasMany('BAKD\User');
    }

    public function claims()
    {
        return $this->hasMany('BAKD\BountyClaim');
    }

    public function bountyRewardType()
    {
        return $this->belongsTo('BAKD\BountyRewardType');
    }

    // Alias
    public function rewardTypes()
    {
        return $this->bountyRewardType();
    }

    public function isClaimable()
    {
        // TODO: Setup checks for the claim system. Need to work out multiple/single claim bounties
        // For example, are we allowing multiple claims per user for all bounties regardless of payout
        // type for now?

        // Bounty is not over, paused, or not started yet.
        return (bool) !$this->isOver() && !$this->isPaused() && $this->isRunning();
    }

    public function wasClaimed()
    {
        // Only check for claims on logged in users
        if (\Auth::guest()) return false;
        return (bool) !BountyClaim::where('bounty_id', $this->id)->where('user_id', \Auth::user()->id)->get()->isEmpty();
    }

    public function isStakeRewardBounty()
    {
        if ($rewardTypesCollection = $this->bountyRewardType) {
            if (in_array(strtolower($rewardTypesCollection->name), ['stake', 'stakes'])) {
                return true;
            }
        }
        return false;
    }

    // TODO: Move me to view helper
    public function getDisplayRewardType($showDashOnFail = true, $default = false)
    {
        if ($rewardTypesCollection = $this->bountyRewardType) {
            return $rewardTypesCollection->name;
        }
        return $showDashOnFail ? '&mdash;' : '';;
    }

    // TODO: Move me to view helper
    // Mainly meant for stake rewards, we'll remove the coin label for now.
    public function getDisplayRewardAmount($withLabel = false)
    {
        $returnString = '';
        if ($this->isStakeRewardBounty()) {
            $returnString = number_format($this->reward_total);
            if ($withLabel) return $returnString .= ' (TOTAL)'; // Return the "Total Pool" amount for display purposes
            return $returnString;
        }
        return number_format($this->reward);
    }

    // TODO: Move me to view helper
    // Get the display version of a bounty date, with a label if it is paused or completed.
    public function getDisplayEndDate()
    {
        if ($this->isOver()) {
            return '<span class="badge badge-success">COMPLETED</span>';
        } else if ($this->isPaused()) {
            return '<span class="badge badge-warning">PAUSED</span>';
        } else {
            return !is_null($this->end_date) ? $this->end_date->diffForHumans() : 'Never';
        }
    }

    // TODO: Move me to view helper
    // Get the display version of a bounty date, with a label if it is paused or completed.
    public function getDisplayStartDate()
    {
        if ($this->isOver()) {
            return '<span class="badge badge-success">COMPLETED</span>';
        } else if ($this->isPaused()) {
            return '<span class="badge badge-warning">PAUSED</span>';
        } else {
            return !is_null($this->start_date) ? $this->start_date->diffForHumans() : 'Now';
        }
    }

    // TODO: Setup config or env setting for placeholder image path instead of burying it in here
    public function getImage()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/icon.png');
    }

    // Check if a bounty is over
    public function isOver()
    {
        // No end date, this bounty will run indefinitely.
        if (is_null($this->end_date)) return false;
        return (bool) $this->end_date->lt(Carbon::now());
    }

    public function isPaused()
    {
        return $this->status === 'PAUSED' ? true : false;
    }

    public function isStarted()
    {
        // No start date. Starts immediately.
        if (is_null($this->start_date)) return true;
        return (bool) $this->start_date->lt(Carbon::now());
    }

    // Alias
    public function notStarted()
    {
        return !$this->isStarted();
    }

    public function isRunning()
    {
        return (bool) $this->isStarted() && !$this->isPaused() && !$this->isOver();
    }

    // Get the pending reward for a user who is participating in a stake bounty.
    // Calculate reward by using following formula:
    // (userStakes / totalStakes) * totalCoinPool
    public function pendingStakeReward($userId)
    {
        if ($this->totalUserStakes($userId) === 0) return 0;
        return floor(($this->totalUserStakes($userId) / $this->totalStakesDistributed()) * $this->getRewardPool());
    }

    // Get the users current stake %
    public function pendingStakeRewardPercentage($userId)
    {
        if ($this->totalUserStakes($userId) === 0) return 0;
        return floor($this->totalUserStakes($userId) / $this->totalStakesDistributed() * 100);
    }

    // Get the total stakes awarded to a single user of a specific bounty
    public function totalUserStakes($userId)
    {
        return BountyClaim::where('bounty_id', $this->id)->where('user_id', $userId)->sum('stakes_received');
    }

    // Get the total number of stakes distributed for an entire single bounty
    public function totalStakesDistributed()
    {
        return BountyClaim::where('bounty_id', $this->id)->sum('stakes_received');
    }

    // Get the total reward pool for a bounty
    public function getRewardPool()
    {
        return $this->reward_total;
    }
}

