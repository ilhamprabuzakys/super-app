<?php

namespace Database\Factories;

use App\Models\Coordinate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoordinateFactory extends Factory
{
    protected $model = Coordinate::class;

    public function definition()
    {
        // Mendapatkan batas koordinat Pulau Jawa
        $minLatitude = -9.668301;
        $maxLatitude = -5.853037;
        $minLongitude = 103.436212;
        $maxLongitude = 114.775628;

        // Menghasilkan koordinat acak di dalam jangkauan Pulau Jawa
        $latitude = fake()->latitude($minLatitude, $maxLatitude);
        $longitude = fake()->longitude($minLongitude, $maxLongitude);

        return [
            'name' => fake()->name,
            'latitude' => $longitude,
            'longitude' => $latitude,
        ];
    }
}
