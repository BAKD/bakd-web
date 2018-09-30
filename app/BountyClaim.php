<?php

namespace BAKD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BountyClaim extends Model
{
    use Traits\Uuids,
        SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bounty_claim';

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
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo('BAKD\User');
    }

    public function bounty()
    {
        return $this->belongsTo('BAKD\Bounty');
    }

    public function attachments()
    {
        return $this->hasMany('BAKD\BountyClaimAttachment');
    }

    public function confirmedBy()
    {
        return $this->hasOne('BAKD\User', 'confirmed_by_id');
    }

    public function isApproved()
    {
        return (bool) $this->confirmed === 1 ? true : false;
    }

    public function isRejected()
    {
        return (bool) $this->confirmed === 2 ? true : false;
    }

    public function isPending()
    {
        return (bool) $this->confirmed === 0 ? true : false;
    }
}
