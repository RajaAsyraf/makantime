<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'created_by',
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
     * Many-to-many relationship with App\GroupUser as groupUsers.
     *
     * @return App\GroupUser
     */
    public function groupUsers()
    {
        return $this->hasMany('App\GroupUser');
    }

   /**
     * Many-to-many relationship with App\Restaurant via pivot table group_restaurant.
     *
     * @return App\Restaurant
     */
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant')->withTimestamps();
    }

    /**
     * Return all group admins
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAdmins()
    {
        return $this->groupUsers()->where('is_admin', true);
    }
}
