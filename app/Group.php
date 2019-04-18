<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

   /**
     * Many-to-many relationship with App\User via pivot table group_user.
     *
     * @return App\User
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
