<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\Restaurant;

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
            $dish_obj->price = $dish['price'];
            $dish_obj->image = $dish['image'];
            $dish_obj->visibility = $dish['visibility'];
            $dish_obj->created_at = $dish['created_at'];
            $dish_obj->updated_at = $dish['updated_at'];
            $dish_obj->save();
        }
    }
}
