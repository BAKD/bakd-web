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

    public function rewardType()
    {
        return $this->hasOne('BAKD\BountyRewardType');
    }

    public function wasClaimed()
    {
        return (bool) !BountyClaim::where('bounty_id', $this->id)->where('user_id', \Auth::user()->id)->get()->isEmpty();
    }

    public function isOver()
    {
        // dd($this->end_date);
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
        return (bool) $this->start_date->gt(Carbon::now());
    }

    public function isRunning()
    {
        return (bool) $this->isStarted() && !$this->isPaused() && !$this->isOver();
    }

}

