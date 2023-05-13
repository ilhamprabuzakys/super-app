<?php

namespace Database\Seeders;

use App\Models\Loker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loker::create([
            'title' => 'IT Web Developer',
            'salary' => '5.000.000 - 10.000',
            'desc' => '
            <li>Menguasai HTML</li>
            <li>Menguasai CSS</li>
            <li>Menguasai PHP</li>',
        ]);
        Loker::create([
            'title' => 'IT Mobile Developer',
            'salary' => '5.000.000 - 10.000',
            'desc' => '
            <li>Menguasai Java</li>
            <li>Menguasai Spring</li>
            <li>Menguasai PHP</li>',
        ]);
        Loker::create([
            'title' => 'IT Desktop Developer',
            'salary' => '5.000.000 - 10.000',
            'desc' => '
            <li>Menguasai C++</li>
            <li>Menguasai Unity</li>'
        ]);
    }
}
