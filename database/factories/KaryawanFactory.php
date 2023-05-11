<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = resolve(UserFactory::class)->make();

        return [
            'nama' => $users['name'],
            'umur' => random_int(20,40),
            'alamat' => fake()->address(),
            'user_id' => $users->id,
            'kota_id' => random_int(1,5),
            'kecamatan_id' => random_int(1,5),
        ];
    }
}
