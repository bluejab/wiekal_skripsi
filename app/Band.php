<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'band';

    protected $fillable = ['nama_band','user_id','genre','kota','skill_member','logo','deskripsi'];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
