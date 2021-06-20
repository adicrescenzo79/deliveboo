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
            $dish = $dishs[$i];
            $dish_obj = new Dish();
            $dish_obj->title = $dish['title'];
            $dish_obj->description = $dish['description'];
            $dish_obj->thumb = $dish['thumb'];
            $dish_obj->price = $dish['price'];
            $dish_obj->series = $dish['series'];
            $dish_obj->sale_date = $dish['sale_date'];
            $dish_obj->type = $dish['type'];
            $dish_obj->save();
        }
    }
}
