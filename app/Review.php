<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name', 'email', 'body', 'user_id'
    ];
}


