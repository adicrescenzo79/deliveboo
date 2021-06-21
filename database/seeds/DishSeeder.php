<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');

        for ($i = 0; $i < count($dishes); $i++) {
            $dish = $dishes[$i];
            $dish_obj = new Dish();
            $dish_obj->name = $dish['name'];
            $dish_obj->description = $dish['description'];
            $dish_obj->image = $dish['image'];
            $dish_obj->price = $dish['price'];
            $dish_obj->visibility = $dish['visibility'];
            $dish_obj->restaurant_id = $dish['restaurant_id'];
            $dish_obj->save();
        }
    }
}
