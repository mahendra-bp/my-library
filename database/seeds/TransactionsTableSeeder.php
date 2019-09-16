<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Transaction::insert([
            [
                'id'              => 1,
                'kode_transaksi'          => TR0001,
                'anggota_id'                => 1,
                'buku_id'             => 1,
                'tgl_pinjam'    => '2019-02-17',
                'tgl_kembali'        => '2019-02-24',
                'status'                => 'pinjam',
                'ket'            => 'pinjam pertama',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'kode_transaksi'          => TR0002,
                'anggota_id'                => 2,
                'buku_id'             => 4,
                'tgl_pinjam'    => '2019-02-17',
                'tgl_kembali'        => '2019-02-24',
                'status'                => 'pinjam',
                'ket'            => 'pinjam kedua',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
