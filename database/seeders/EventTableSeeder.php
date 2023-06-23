<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0;$i<5;$i++){
            Event::create([
                'title' => $faker->sentence(3, true),
                'description' => $faker->paragraph(3, true),
                'date' => $faker->date(),
                'location' => $faker->address()
            ]);
        }
    }
}
