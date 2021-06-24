<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\Category;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  public function restaurantsNr($skip)
  {
    $restaurants = Restaurant::skip($skip)->limit(8)->get();

    return response()->json([
      'data' => $restaurants,
      'success' => true,
    ]);

  }

  public function restaurantByCategory($categoryIndex)
  {
    $category = Category::with('restaurants')->where('id', '=', $categoryIndex)->first();

    return response()->json([
      'data' => $category->restaurants,
      'success' => true,
    ]);

  }

}
