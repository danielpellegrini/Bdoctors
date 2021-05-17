<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model

{
    protected $fillable =['guest_name','guest_email','content','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
