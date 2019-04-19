<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'is_going', 'restaurant_id', 'response_at', 'appointment_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'appointment_at', 'created_at', 'updated_at'
    ];

    /**
     * One-to-many relationship with App\User.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
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
