<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'first_name' => $faker->name,
                'username' => "user$i@gmail.com",
                'dob' => date('y-m-d'),
                'password' => bcrypt('password'),
                'gender' => $faker->randomElement(['male', 'female']),

            ]);
        }
    }
}
