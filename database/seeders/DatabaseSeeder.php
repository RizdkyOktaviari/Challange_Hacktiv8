<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for($i = 1;$i <=50;$i++)
        {       
            $faker = Faker::create('id_ID');
        DB::table('users')->insert([
            'name' => $faker->name(),
            'email' => $faker->safeEmail(),
            'password' => $faker->password()
        ]);
        }
    }
    
}
