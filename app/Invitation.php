<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'restaurant_id','appointment_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'appointment_at', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Has-many relationship with App\InvitationUser as usersInvited.
     *
     * @return App\InvitationUser
     */
    public function usersInvited()
    {
        return $this->hasMany('App\InvitationUser');
    }

    /**
     * One-to-many relationship with App\Group.
     *
     * @return App\Group
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * One-to-many relationship with App\Restaurant.
     *
     * @return App\Restaurant
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
