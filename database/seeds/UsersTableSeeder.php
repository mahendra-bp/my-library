<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'id'              => 3,
                'name'              => 'mahe - Admin',
                'username'        => 'mahe123',
                'email'             => 'mahe@gmail.com',
                'password'        => bcrypt('mahe123'),
                'gambar'            => NULL,
                'level'            => 'admin',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'name'              => 'Pendek - User',
                'username'        => 'bima123',
                'email'             => 'pendek@gmail.com',
                'password'        => bcrypt('pendek123'),
                'gambar'            => NULL,
                'level'            => 'user',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
