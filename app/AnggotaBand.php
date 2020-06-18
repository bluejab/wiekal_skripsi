<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaBand extends Model
{
    protected $table = 'anggota_band';

    protected $fillable = ['band_id','user_id'];

    public function getUserId()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function getBandId()
    {
        return $this->hasOne('App\Band','id','band_id');
    }
}
