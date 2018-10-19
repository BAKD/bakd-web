<?php

namespace BAKD;

use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BountyClaim extends Model
{
    use Traits\Uuids,
        SoftDeletes,
        Actionable;

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
        return $this->belongsTo('BAKD\Bounty')->withTrashed();
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
        if ($this->confirmed === 1) return true;
        return false;
    }

    public function isRejected()
    {
        if ($this->confirmed === 2) return true;
        return false;
    }

    public function isPending()
    {
        if ($this->confirmed === 0) return true;
        return false;
    }

    // TODO: Implement status type resource. Move to view helper
    public function getStatusLabel($statusId)
    {
        if ($statusId == 0) return 'Pending';
        elseif ($statusId == 1) return 'Approved';
        elseif ($statusId == 2) return 'Rejected';
        else return 'N/A';
    }

    // TODO: Move to view helper
    public function checkStatus()
    {
        if ($this->isApproved()) return 'Approved';
        if ($this->isRejected()) return 'Rejected';
        if ($this->isPending()) return 'Pending';
        return 'Unknown';
    }

    // Update a bounty claim status
    public function updateStatus($fields, $confirmedBy)
    {
        $this->confirmed = $fields->confirmed;
        $this->confirmed_by_id = $confirmedBy;
        $this->reason = $fields->reason;
        if (isset($fields->stakes_received) && $fields->confirmed === '1' && $this->bounty->isStakeRewardBounty()) {
            $this->stakes_received = $fields->stakes_received;
        } else {
            $this->stakes_received = 0;
        }
        return $this->save();
    }

    public static function getClaimsByUserId($userId)
    {
        return self::where('user_id', $userId)->get();
    }
}
