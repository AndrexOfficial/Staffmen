<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs() {
        return $this->belongsToMany('App\Job', 'user_jobs');
    }

    public function myEvents() {
        return $this->hasMany('App\Event');
    }

    public function events() {
        return $this->hasMany('App\EventMember');
    }

    public function eventsAccepted() {
        return $this->hasMany('App\EventMember')->where('state', 1);
    }

    public function attending() {
        return $this->hasMany('App\EventMember')->where('state', 1);
    }

    public function pending() {
        return $this->hasMany('App\EventMember')->where('state', 0);
    }

    public function requests() {
        return $this->hasMany('App\EventMember')->where('type', 1);
    }

    public function invites() {
        return $this->hasMany('App\EventMember')->where('type', 2);
    }

}
