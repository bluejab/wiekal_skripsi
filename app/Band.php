<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Band extends Model
{
    use Notifiable;

    protected $table = 'band';

    protected $fillable = ['nama_band','user_id','genre','kota','skill_member','logo','deskripsi'];
    
    
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function getGenre()
    {
        return $this->hasOne('App\Genre','id','genre');
    }
    
    public function cariAnggota()
    {
        return $this->hasMany('App\CariAnggota','band_id','id');
    }

    public function AnggotaBandId()
    {
        return $this->HasMany('App\AnggotaBand' , 'band_id', 'id');
    }
}
