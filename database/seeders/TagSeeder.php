<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' =>  'Berita'
        ]);
        Tag::create([
            'name' =>  'Olahraga'
        ]);
        Tag::create([
            'name' =>  'Hiburan'
        ]);
        Tag::create([
            'name' =>  'Keagamaan'
        ]);
        Tag::create([
            'name' =>  'Teknologi'
        ]);
    }
}
