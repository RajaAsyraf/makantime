<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvitationUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invitation_id', 'user_id', 'is_going'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'response_at', 'created_at', 'updated_at'
    ];

    /**
     * BelongsTo relationship with App\Invitation
     * 
     * @return App\Invitation
     */
    public function invitation()
    {
        return $this->belongsTo('App\Invitation');
    }

    /**
     * BelongsTo relationship with App\User
     * 
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
