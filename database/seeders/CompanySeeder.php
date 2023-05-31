<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'title' => "PT. Makerindo Prima Solusi",
            'address' => 'Komplek Pesona Ciganitri Blok A39, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287',
            'short_address' => 'Perusahaan software di Bojongsoang, Jawa Barat',
            'email' => 'company@gmail.com',
            'phone' => '0812-1821-0613',
            'province' => 'Jawa Barat',
            'description' => 'Makerindo is an IT company that focuses on manufacturing and developing products according to specifications and mutual agreements in the fields of Embedded System, Website, Desktop, Mobile App & Internet of Things.'
        ]);
    }
}
