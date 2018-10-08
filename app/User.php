<?php

namespace BAKD;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Spatie\Permission\Traits\HasRoles;
use \Spatie\Permission\Traits\HasPermissions;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function bountyClaims()
    {
        return $this->hasMany('BAKD\BountyClaim');
    }

    public function bounties()
    {
        return $this->belongsTo('BAKD\Bounty');
    }

    public function getGravatar($size = '125')
    {
        return "//www.gravatar.com/avatar/{$this->email}?s={$size}";
    }

    public function getFollowingCount()
    {
        return number_format(rand(200, 5000));
    }

    public function getFollowerCount()
    {
        return number_format(rand(100, 100000));
    }

    
}
