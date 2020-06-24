<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CariAnggota extends Model
{
    protected $table = 'cari_anggota';

    protected $fillable = ['keahlian_anggota'];

    public function alatMusik()
    {
        return $this->hasMany('App\AlatMusik','id','alatmusik_id'); 
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function band()
    {
        return $this->hasOne('App\Band','id','band_id');
    }
}
