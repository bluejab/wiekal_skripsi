<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LamaranAnggota extends Model
{
    protected $table = 'lamaran_anggota';

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
