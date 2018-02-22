<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remmber_token',
    ];

    public function getJWTIdentifier() {
        return $this->getKey(); // Eloquent Model method
    }


    public function getJWTCustomClaims() {
        return [];
    }


    public function galleries()
    {
        return $this->hasMany('App\Gallery','user_id');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
