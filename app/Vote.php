<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
