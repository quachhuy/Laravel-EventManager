<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Registration;

class RegistrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0;$i<50;$i++){
            Registration::create([
                'event_id' => $faker->numberBetween(1,5),
                'attendee_id' => $faker->numberBetween(1,20),
            ]);
        }
    }
}
