<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';

    protected $fillable = ['jenis_acara','lokasi','tanggal','waktu_mulai','waktu_selesai'];
    
}
