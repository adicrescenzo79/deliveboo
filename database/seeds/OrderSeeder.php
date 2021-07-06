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
        for ($i = 0; $i < 50000; $i++) {
            $newOrder = new Order();
            $newOrder->customer_name = $faker->name();
            $newOrder->customer_email = $faker->email();
            $newOrder->customer_telephone = '+39 02 ' . $faker->randomNumber(7, true);
            $newOrder->delivery_address = $faker->streetAddress();
            $newOrder->delivery_time = $faker->time();
            $newOrder->delivery_notes = $faker->sentence();
            $newOrder->order_number = '#' . $faker->randomNumber(4, true);
            $newOrder->total_paid = $faker->randomFloat(2, 25, 150);
            $newOrder->restaurant_id = $faker->numberBetween(1, 28);
            $newOrder->created_at = $faker->dateTimeInInterval('-3 years', '+3 years');
            $newOrder->updated_at = $newOrder['created_at'];
            $newOrder->save();
        }
    }
}
