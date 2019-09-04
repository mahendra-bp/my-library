<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['user_id', 'npm', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'prodi'];

    // one to one
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // one to many, satu member bisa banyak trannsaksi
    /**
     * Method One To Many 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
