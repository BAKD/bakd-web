<?php

namespace BAKD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BountyClaimAttachment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bounty_claim_attachments';

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

    public function claim()
    {
        return $this->belongsTo('BAKD\BountyClaim', 'bounty_claim_id');
    }
    
    public function bounty()
    {
        return $this->hasOne('BAKD\Bounty');
    }

    public function user()
    {
        return $this->hasOne('BAKD\User');
    }
}
