<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kota1 = Kota::create([
            'nama' => 'Kota Bandung'
        ]);
        $kota2 = Kota::create([
            'nama' => 'Kabupaten Bandung'
        ]);
        $kota3 = Kota::create([
            'nama' => 'Kota Cimahi'
        ]);
        $kota4 = Kota::create([
            'nama' => 'Kota Cimahi Utara'
        ]);
        $kota5 = Kota::create([
            'nama' => 'Kota Jakarta'
        ]);

        $kecamatan1 = Kecamatan::create([
            'nama' => 'Batununggal',
            'kota_id' => $kota1->id,
        ]);
        $kecamatan2 = Kecamatan::create([
            'nama' => 'Majalaya',
            'kota_id' => $kota2->id,
        ]);
        $kecamatan3 = Kecamatan::create([
            'nama' => 'Cibeureum',
            'kota_id' => $kota3->id,
        ]);
        $kecamatan4 = Kecamatan::create([
            'nama' => 'Cibulat',
            'kota_id' => $kota4->id,
        ]);
        $kecamatan5 = Kecamatan::create([
            'nama' => 'Sulaksono',
            'kota_id' => $kota5->id,
        ]);
    }
}
