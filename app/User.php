<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function detail() {
        return $this->hasOne(UserDetail::class);
    }


    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function departments() {
        return $this->belongsToMany(Department::class);
    }

    public function votes() {
        return $this->belongsToMany(Vote::class)->withTimestamps();
    }

    public function medicalServices() {
        return $this->belongsToMany(MedicalService::class);
    }

    public function sponsors() {
        return $this->belongsToMany(Sponsor::class)->withTimestamps();
    }

    // getting details to get the picture into dashboard
    public function getPic()
    {
        return $this->detail;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname','address', 'department','vote',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
