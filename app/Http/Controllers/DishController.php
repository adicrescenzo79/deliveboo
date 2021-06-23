<?php

namespace App\Http\Controllers;
use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
  public function dishesByRestaurant($restaurant)
  {
    // dd($restaurant);
    $dishes = Dish::where('restaurant_id', '=', $restaurant)->get();
    // $dishes = Dish::all();

    return response()->json([
      'data' => $dishes,
      'success' => true,
    ]);
  }
}
