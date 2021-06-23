<?php

namespace App\Http\Controllers;
use App\Restaurant;

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
}
