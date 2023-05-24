<?php

namespace App\Jobs;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        static $count = 3;
        // $faker = Factory::create();
        $jmlhdata = 500;
        for ($i = 1; $i <= $jmlhdata; $i++)
        {
            $email = sprintf('%d.%s@makerindo.id', $count++, 'karyawan');
            $username = explode('@', $email)[0];
            $data = [
                'name' => fake()->name(),
                'email' => $email,
                'username' => $username,
                'password' => \bcrypt('password'), // password
                'remember_token' => Str::random(10),
                // 'email_verified_at' => now(),
            ];
            User::create($data);
        }
    }
}
