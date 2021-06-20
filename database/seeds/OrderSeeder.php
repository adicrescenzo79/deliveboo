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
      for ($i = 0; $i < 100; $i++){
        $newOrder = new Order();
        $newOrder->name = $faker->name();
        $newOrder->customer_email = $faker->email();
        $newOrder->customer_telephone = '+39 02 ' . $faker->randomNumber(7,true);
        $newOrder->delivery_address = $faker->streatAddress();
        $newOrder->delivery_time = $faker->time();
        $newOrder->order_number = '#' . $faker->randomNumber(4,true);
        $newOrder->total_paid = $faker->randomFloat(2,25,150);
        $newOrder->created_at = $faker->date();
        $newOrder->updated_at = $newOrder->created_at;
      }
    }
}
