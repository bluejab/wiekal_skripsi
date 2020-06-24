<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','umur','phone','kota','gender','alatmusik','genre','fotoprofil'
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
    
    public function band()
    {
        return $this->HasOne('App\Band', 'user_id', 'id');
    }

    public function alatMusik()
    {
        return $this->HasOne('App\AlatMusik' , 'id', 'alatmusik');
    }

    public function genreMusik()
    {
        return $this->HasOne('App\Genre' , 'id', 'genre');
    }

    public function AnggotaBandId()
    {
        return $this->HasOne('App\AnggotaBand' , 'user_id', 'id');
    }
}
