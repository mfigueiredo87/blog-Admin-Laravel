<?php

namespace App\Model\Admin;

 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // criar os relacionamentos entre roles e admin

    public function roles(){
        return $this->belongsToMany('App\Model\Admin\role');//model da relacao
    }
    // Para colocar o nome em inicial maiuscula

    public function getNameAttribute($value){
        return ucfirst($value);
    }
    
    protected $fillable = [
        'name', 'email', 'password','phone','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
