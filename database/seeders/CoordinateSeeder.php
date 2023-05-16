<?php

namespace Database\Seeders;

use App\Models\Coordinate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coordinate::create([
            'name' => 'Titik A',
            'latitude' => '107.65916557097387',
            'longitude' => '-6.967572626601935',
        ]);
        
        Coordinate::create([
            'name' => 'Titik B',
            'latitude' => '107.6584135540374',
            'longitude' => '-6.96652630006794',
        ]);
        
        Coordinate::create([
            'name' => 'Titik C',
            'latitude' => '107.65937607204768',
            'longitude' => '-6.967657161754914',
        ]);
    }
}
