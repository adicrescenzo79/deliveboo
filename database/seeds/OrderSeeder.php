<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($1 = 0; $i < 100; $1++){
        $newStudent = new Student();
        $newStudent->name = $faker->name();
        $newStudent->customer_email = $faker->email();
        $newStudent->customer_telephone = '+39 02 ' . $faker->randomNumber(7,true);
        $newStudent->delivery_address = $faker->streatAddress();
        $newStudent->delivery_time = $faker->time();
        $newStudent->order_number = '#' . $faker->randomNumber(4,true);
        $newStudent->total_paid = $faker->randomFloat(2,25,150);
        $newStudent->created_at = $faker->date();
        $newStudent->updated_at = $newStudent->created_at;
      }
    }
}
