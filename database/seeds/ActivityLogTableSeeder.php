<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Activity;

class ActivityLogTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Activity::create(
                array(
                    'user_id' => $index,
                    'service_hours' => $faker->randomDigit,
                    'admin_hours' => $faker->randomDigit,
                    'social_hours' => $faker->randomDigit,
                    'mileage' => $faker->randomDigit,
                    'notes' => $faker->paragraph,
                )
            );
        }
    }

}