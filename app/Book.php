<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['judul', 'isbn', 'penerbit', 'pengarang', 'tahun_terbit', 'jumlah_buku', 'lokasi', 'deskripsi', 'cover'];

    /**
     * Method One To Many 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
