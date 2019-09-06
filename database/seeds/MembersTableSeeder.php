<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Member::insert([
            [
                'id'              => 1,
                'user_id'          => 1,
                'npm'                => 15118748,
                'nama'             => 'Admin Mahendra ',
                'tempat_lahir'    => 'Solo',
                'tgl_lahir'        => '1998-02-17',
                'jk'                => 'L',
                'prodi'            => 'TI',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'user_id'          => 2,
                'npm'                => 10000375,
                'nama'             => 'User Bima',
                'tempat_lahir'    => 'Jogja',
                'tgl_lahir'        => '1996-01-01',
                'jk'                => 'L',
                'prodi'            => 'TI',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
