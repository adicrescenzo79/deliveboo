<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\Category;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  public function index()
  {
    $restaurants = Restaurant::all();

    return response()->json([
      'data' => $restaurants,
      'success' => true,
    ]);

  }

  public function restaurantByCategory($categoryIndex)
  {
    // $restaurants = Restaurant::all();
    $restaurants = Restaurant::with('categories')->where('id', '=', $categoryIndex)->get();
    return response()->json([
      'data' => $restaurants,
      'success' => true,
    ]);

  }

}
