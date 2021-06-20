<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $restaurants = config(restaurants);

      foreach ($restaurants as $restaurant) {
        $newRestaurant = new Restaurant();
        $newRestaurant->name = $restaurant['name'];
        $newRestaurant->slug = $restaurant['slug'];
        $newRestaurant->telephone = $restaurant['telephone'];
        $newRestaurant->address = $restaurant['address'];
        $newRestaurant->p_iva = $restaurant['p_iva'];
        $newRestaurant->logo = $restaurant['logo'];
        $newRestaurant->cover_image = $restaurant['cover_image'];
        $newStudent->save();
      }
    }
}
