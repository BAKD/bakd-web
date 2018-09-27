<?php

namespace BAKD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BountyClaimUser extends Model
{
    use Traits\Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bounty_claim_user';

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
    protected $dates = ['created_at', 'updated_at'];

    public function bounty()
    {
        return $this->belongsTo('BAKD\Bounty');
    }

    public function user()
    {
        return $this->belongsTo('BAKD\User');
    }
}
