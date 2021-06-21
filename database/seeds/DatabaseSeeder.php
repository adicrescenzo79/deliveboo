<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
              UserSeeder::class,
              CategorySeeder::class,
              RestaurantSeeder::class,
              DishSeeder::class,
              OrderSeeder::class,
        ]
        );
    }
}
