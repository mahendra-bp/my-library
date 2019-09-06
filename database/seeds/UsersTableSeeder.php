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
                'id'              => 1,
                'name'              => 'mahe - Admin',
                'username'        => 'mahe123',
                'email'             => 'mahe@gmail.com',
                'password'        => bcrypt('mahe123'),
                'gambar'            => 'gambar/kucing1.jpg',
                'level'            => 'admin',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'name'              => 'bima - User',
                'username'        => 'bima123',
                'email'             => 'bima@gmail.com',
                'password'        => bcrypt('bima123'),
                'gambar'            => 'gambar/kucing2.jpg',
                'level'            => 'user',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 3,
                'name'              => 'putra - User',
                'username'        => 'putra123',
                'email'             => 'putra@gmail.com',
                'password'        => bcrypt('putra123'),
                'gambar'            => 'gambar/kucing3.jpg',
                'level'            => 'user',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 4,
                'name'              => 'saskeh - User',
                'username'        => 'saskeh123',
                'email'             => 'saskeh@gmail.com',
                'password'        => bcrypt('saskeh123'),
                'gambar'            => 'gambar/saskeh.jpg',
                'level'            => 'user',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
