<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';

    protected $fillable = ['band_id','jenis_acara','lokasi','tanggal','waktu_mulai','waktu_selesai'];

    public function getBandId()
    {
        return $this->hasOne('App\Band','id','band_id');
    }
    
}
