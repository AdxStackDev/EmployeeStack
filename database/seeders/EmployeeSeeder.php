<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('employees')->insert([
                'first_name'        => $faker->firstName,
                'last_name'         => $faker->lastName,
                'image'             => $faker->imageUrl($width = 640, $height = 480),
                'email'             => $faker->unique()->safeEmail,
                'phone'             => $faker->phoneNumber,
                'address'           => $faker->address,
                'gender'            => $faker->randomElement(['male', 'female']),
                'dob'               => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'join_date'         => $faker->date($format = 'Y-m-d', $max = 'now'),
                'job_type'          => $faker->jobTitle,
                'city'              => $faker->city,
                'salary'            => $faker->numberBetween(30000, 100000),
                'age'               => $faker->numberBetween(20, 60),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
