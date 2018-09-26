<?php

namespace BAKD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    // TODO: Finish me.
    public function wasClaimed()
    {
        return false;
    }

    // TODO: Finish me.
    public function isOver()
    {
        return false;
    }

    // TODO: Finish me.
    public function isPaused()
    {
        return false;
    }

    // TODO: Finish me.
    public function isStarted()
    {
        return false;
    }

}

