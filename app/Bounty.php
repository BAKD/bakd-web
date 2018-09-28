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
        return $this->hasOne('BAKD\BountyType', 'id', 'type_id');
    }

    public function users()
    {
        return $this->hasMany('BAKD\Users', 'id', 'user_id');
    }

    public function claims()
    {
        return $this->hasMany('BAKD\BountyClaim');
    }

    public function bountyRewardType()
    {
        return $this->hasOne('BAKD\BountyRewardType', 'id', 'bounty_reward_type_id');
    }

    public function wasClaimed()
    {
        if (\Auth::guest()) return false;
        return (bool) !BountyClaim::where('bounty_id', $this->id)->where('user_id', \Auth::user()->id)->get()->isEmpty();
    }

    public function isStakeRewardBounty()
    {
        if ($rewardTypesCollection = $this->bountyRewardType()->first()) {
            if (in_array(strtolower($rewardTypesCollection->name), ['stake', 'stakes'])) {
                return true;
            }
        }
        return false;
    }

    public function getDisplayRewardType($showDashOnFail = true, $default = false)
    {
        if ($rewardTypesCollection = $this->bountyRewardType()->first()) {
            return $rewardTypesCollection->name;
        }
        return $showDashOnFail ? '&mdash;' : '';;
    }

    public function getDisplayRewardAmount($withLabel = false)
    {
        $returnString = '';
        if ($this->isStakeRewardBounty()) {
            $returnString = number_format($this->reward_total);
            if ($withLabel) return $returnString .= ' (POOL)'; // Return the "Total Pool" amount for display purposes
            return $returnString;
        }
        if ($withLabel) return $returnString .= ' COINS';
        return number_format($this->reward);
    }

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
        // No start date. Start immediately.
        if (is_null($this->start_date)) return true;
        return (bool) $this->start_date->lt(Carbon::now());
    }

    public function isRunning()
    {
        return (bool) $this->isStarted() && !$this->isPaused() && !$this->isOver();
    }

}

