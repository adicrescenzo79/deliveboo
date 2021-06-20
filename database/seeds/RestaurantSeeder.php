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
        $newRestaurant->fill($restaurant)->save();
        $newRestaurant->save();

        foreach ($restaurant_category as $key) {
          if ($key["restaurant_id"] === $newRestaurant->id) {
            $newRestaurant->categories()->attach([$key["category_id"]]);
          }
        }
      }
    }
}
