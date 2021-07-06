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
      $restaurants = config('restaurants');

      $restaurant_category = config('restaurant_category');

      foreach ($restaurants as $restaurant) {
        $newRestaurant = new Restaurant();
        $newRestaurant->user_id = $restaurant['user_id'];
        $newRestaurant->name = $restaurant['name'];
        $newRestaurant->slug = $restaurant['slug'];
        $newRestaurant->telephone = $restaurant['telephone'];
        $newRestaurant->address = $restaurant['address'];
        $newRestaurant->p_iva = $restaurant['p_iva'];
        $newRestaurant->logo = $restaurant['logo'];
        $newRestaurant->cover_image = $restaurant['cover_image'];
        $newRestaurant->save();

        foreach ($restaurant_category as $relation) {
          if ($relation["restaurant_id"] === $newRestaurant->id) {
            $newRestaurant->categories()->attach([$relation["category_id"]]);
          }
        }
      }
    }
}
