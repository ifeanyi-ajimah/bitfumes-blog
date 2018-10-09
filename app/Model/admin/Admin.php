<?php

namespace App\Model\admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','status','phone',
    ];


    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
    	return $this->belongsToMany('App\Model\admin\Role');
    }

    
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
   
}
