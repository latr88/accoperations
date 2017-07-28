<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    //
    public function accounts()
    {
        return $this->belongsToMany(Account::class)->withTimestamps();
    }
}
