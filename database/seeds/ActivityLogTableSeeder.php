<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Activity;
use App\Cerf;
use App\User;

class ActivityLogTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        DB::table('activity_log')->delete();

        // Gets an array with event IDs and an array with user IDs.
        $cerf_ids = Cerf::all()->lists('id')->toArray();
        $user_ids = User::all()->lists('id')->toArray();

        for ($counter = 0; $counter < 30; $counter++) {

            // Chooses random keys in both arrays.
            $rand_cerf_id = $cerf_ids[array_rand($cerf_ids)];
            $rand_user_id = $user_ids[array_rand($user_ids)];

            // No two activity records should have the same user_id and cerf_id combination.
            if (Activity::where('user_id', '=', $rand_user_id)
                        ->where('cerf_id', '=', $rand_cerf_id)->exists()) {
                continue;
            }

            Activity::create(
                array(
                    'user_id' => $rand_user_id,
                    'cerf_id' => $rand_cerf_id,
                    'service_hours' => $faker->randomDigit,
                    'planning_hours' => $faker->randomDigit,
                    'traveling_hours' => $faker->randomDigit,
                    'admin_hours' => $faker->randomDigit,
                    'social_hours' => $faker->randomDigit,
                    'mileage' => $faker->randomDigit,
                    'notes' => $faker->paragraph
                )
            );
        }
    }

}