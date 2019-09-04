<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Book::insert([
            [
                'id'              => 3,
                'judul'              => 'vue js fullstack',
                'isbn'        => '2358899283',
                'pengarang'             => 'yuli',
                'penerbit'        => 'andi',
                'tahun_terbit'            => 2019,
                'jumlah_buku'            => 12,
                'deskripsi'    => NULL,
                'lokasi'    => 'rak2',
                'cover'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 4,
                'judul'              => 'laravel 6.0',
                'isbn'        => '23588900282',
                'pengarang'             => 'mahe',
                'penerbit'        => 'andi',
                'tahun_terbit'            => 2019,
                'jumlah_buku'            => 8,
                'deskripsi'    => NULL,
                'lokasi'    => 'rak3',
                'cover'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 5,
                'judul'              => 'dev ops',
                'isbn'        => '23588992132',
                'pengarang'             => 'mahe',
                'penerbit'        => 'lala',
                'tahun_terbit'            => 2017,
                'jumlah_buku'            => 5,
                'deskripsi'    => NULL,
                'lokasi'    => 'rak2',
                'cover'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
