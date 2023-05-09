<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => \bcrypt('admin'),
            'role' => 'admin',
            'kota_id' => \random_int(1,3),
            'kecamatan_id' => \random_int(1,8),
        ]);

        User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'username' => 'moderator',
            'password' => \bcrypt('moderator'),
            'role' => 'moderator',
            'kota_id' => \random_int(1,3),
            'kecamatan_id' => \random_int(1,8),
        ]);

        User::create([
            'name' => 'Ilham Prabu Zaky S',
            'email' => 'ilhamprabuzakys@gmail.com',
            'username' => 'ilhamprabuzakys',
            'password' => \bcrypt('password'),
            'role' => 'user',
            'kota_id' => \random_int(1,3),
            'kecamatan_id' => \random_int(1,8),
        ]);
    }
}
