<?php

namespace Database\Seeders;

use App\Models\Karyawan;
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
        $user1= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => \bcrypt('admin'),
            'role' => 'admin',
        ]);

        $user2= User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'username' => 'moderator',
            'password' => \bcrypt('moderator'),
            'role' => 'moderator',
        ]);

        $user3= User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => \bcrypt('user'),
            'role' => 'user',
        ]);

        $karyawan1 = Karyawan::create([
            'nama' => 'Karyawan 1',
            'umur' => random_int(20,50),
            'jenis_kelamin' => 'Pria',
            'alamat' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, amet?",
            'kota_id' => \random_int(1,5),
            'kecamatan_id' => \random_int(1,5),
            'user_id' => $user1->id,
        ]);
        $karyawan2 = Karyawan::create([
            'nama' => 'Karyawan 2',
            'umur' => random_int(20,50),
            'jenis_kelamin' => 'Pria',
            'alamat' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, amet?",
            'kota_id' => \random_int(1,5),
            'kecamatan_id' => \random_int(1,5),
            'user_id' => $user2->id,
        ]);
        $karyawan3 = Karyawan::create([
            'nama' => 'Karyawan 3',
            'umur' => random_int(20,50),
            'jenis_kelamin' => 'Pria',
            'alamat' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, amet?",
            'kota_id' => \random_int(1,5),
            'kecamatan_id' => \random_int(1,5),
            'user_id' => $user3->id,
        ]);
        
    }
}
