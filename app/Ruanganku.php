<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruanganku extends Model
{
    protected $table = 'ruanganku';

    protected $fillable = [
        'keterangan','file' ];

    public function getUserId()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
