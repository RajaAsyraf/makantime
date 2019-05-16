<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use SoftDeletes;
    
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
     * Many-to-many relationship with App\User through pivot table invitation_user.
     *
     * @return App\Invitation
     */
    public function users()
    {
        return $this->belongsToMany('App\User')
                    ->withPivot(['is_going', 'response_at'])
                    ->withTimestamps();
    }

    /**
     * Filter users that respond going
     * 
     * @return Collection
     */
    public function usersGoing()
    {
        return $this->users()->wherePivot('is_going', 1);
    }
    
    /**
     * Filter users that respond not going
     * 
     * @return Collection
     */
    public function usersNotGoing()
    {
        return $this->users()->wherePivot('is_going', false)->wherePivot('response_at', '!=', NULL);
    }

    /**
     * Filter users that never submit response yet
     * 
     * @return Collection
     */
    public function usersNotResponse()
    {
        return $this->users()->wherePivot('response_at', NULL);
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

    /**
     * Return App\User that created the invitation
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
