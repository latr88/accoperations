<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'number',
        'name',
        'isActive',
        'description'
    ];

    public function operations()
    {
        return $this->belongsToMany(Operation::class)->withTimestamps();
    }
}



























