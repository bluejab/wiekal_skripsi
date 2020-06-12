<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'band';

    protected $fillable = ['nama_band','user_id','genre','kota','skill_member','logo','deskripsi'];
    
    
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function carianggota()
    {
        return $this->hasOne('App\CariAnggota','id','posting_id');
    }

    
}
