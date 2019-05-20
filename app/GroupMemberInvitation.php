<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupMemberInvitation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'user_id', 'email', 'is_complete', 'created_by',
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
     * Relationship with App\Group
     * 
     * @return App\Group
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Relationship with App\User to get inviter
     * 
     * @return App\User
     */
    public function inviter()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
