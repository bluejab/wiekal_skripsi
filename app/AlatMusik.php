<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatMusik extends Model
{
    protected $table = 'alat_musik';

    protected $fillable = [
        'nama_alat_musik',
    ];
}
