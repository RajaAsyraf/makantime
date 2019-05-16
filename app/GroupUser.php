<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'user_id', 'is_admin'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The accessors to inlude to the model's array form.
     *
     * @var array
     */
    protected $with= ['group'];

    /**
     * BelongsTo relationship with App\Invitation
     * 
     * @return App\Group
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
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
