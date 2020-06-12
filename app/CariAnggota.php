<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CariAnggota extends Model
{
    protected $table = 'cari_anggota';

    protected $fillable = ['keahlian_anggota'];
}
