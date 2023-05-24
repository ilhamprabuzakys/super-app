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
        $minLatitude = -7.668301;
        $maxLatitude = -6.853037;
        $minLongitude = 106.436212;
        $maxLongitude = 108.775628;

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
