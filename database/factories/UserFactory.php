<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        // $email = fake()->unique()->safeEmail();
        // $jumlahKaryawan = Karyawan::count();
        
        
        static $count = 3;
        $email = sprintf('%d.%s@best-corporation.id', $count++, 'karyawan');
        $username = explode('@', $email)[0];
        return [
            'name' => fake()->name(),
            'email' => $email,
            'username' => $username,
            'password' => \bcrypt('password'), // password
            'remember_token' => Str::random(10),
            // 'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
