<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','created_by'
    ];

    /**
     * Return App\User that created the restaurant
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
