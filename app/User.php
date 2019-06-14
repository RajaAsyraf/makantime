<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Many-to-many relationship with App\Invitation through pivot table invitation_user.
     *
     * @return App\Invitation
     */
    public function invitations()
    {
        return $this->belongsToMany('App\Invitation')
                    ->withPivot(['is_going', 'response_at'])
                    ->withTimestamps();
    }

    /**
     * Many-to-many relationship with App\Group through pivot table group_user.
     *
     * @return App\Group
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group')
                    ->withPivot(['is_admin'])
                    ->withTimestamps();
    }

    /**
     * Get all group invitation as member
     * 
     * @return App\GroupMemberInvitation
     */
    public function groupMemberInvitations()
    {
        return $this->hasMany('App\GroupMemberInvitation');
    }
}
