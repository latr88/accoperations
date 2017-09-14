<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    protected $fillable = [
        'name',
        'group',
        'description'
    ];
    public function accounts()
    {
        return $this->belongsToMany(Account::class)->withTimestamps();
    }
}
