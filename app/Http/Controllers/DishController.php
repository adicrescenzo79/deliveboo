<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Restaurant;

use Illuminate\Http\Request;

class DishController extends Controller
{
  public function dishesByRestaurant(string $slug)
  {
    // dd($restaurant);
    $restaurant = Restaurant::where('slug', '=', $slug)->first();

    $dishes = Dish::where('restaurant_id', '=', $restaurant->id)->get();
    // $dishes = Dish::all();

    return response()->json([
      'data' => $dishes,
      'success' => true,
    ]);
  }


}
