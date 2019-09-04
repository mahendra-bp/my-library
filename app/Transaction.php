<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['kode_transaksi', 'anggota_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    public function members()
    {
        return $this->belongsTo(Member::class, 'anggota_id');
    }

    public function books()
    {

        return $this->belongsTo(Book::class, 'buku_id');
    }
}
