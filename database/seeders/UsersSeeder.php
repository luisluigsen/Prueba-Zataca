<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        for ($i = 0; $i <= 100; $i++) {
            DB::table('users')->insert([
                'user_id' => $faker->randomNumber(),
                'name' => $faker->name(),
            ]);
        }
       
    }
}
