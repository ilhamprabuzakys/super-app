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
            // 'mobile_no' => '085162783743',
            'username' => 'admin',
            'password' => \bcrypt('admin'),
            'role' => 'admin',
        ]);

        $user2= User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            // 'mobile_no' => '085155001870',
            'username' => 'moderator',
            'password' => \bcrypt('moderator'),
            'role' => 'moderator',
        ]);

        $user3= User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            // 'mobile_no' => '085162783742',
            'username' => 'user',
            'password' => \bcrypt('user'),
            'role' => 'user',
        ]);
        
        // $user4= User::create([
        //     'name' => 'Ilham Prabu Zaky S',
        //     'email' => 'ilhamprabuzakys@gmail.com',
        //     // 'mobile_no' => '085162783742',
        //     'username' => 'ilhamprabuzakys',
        //     'password' => \bcrypt('password'),
        //     'role' => 'user',
        // ]);

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
