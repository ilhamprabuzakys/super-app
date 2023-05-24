<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            UserSeeder::class,
            KaryawanSeeder::class,
            KotaSeeder::class,
            LokerSeeder::class,
            CompanySeeder::class,
            CoordinateSeeder::class,
        ];
        
        foreach ($seeders as $seeder) {
            if (class_exists($seeder)) {
                $this->call($seeder);
            }
        }

        // \App\Models\User::factory(10)->create();
        // \App\Models\Karyawan::factory(10)->create();
        \App\Models\Coordinate::factory(2000)->create();
    }
}
