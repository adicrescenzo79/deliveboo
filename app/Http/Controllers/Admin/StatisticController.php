<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



use App\Order;
use App\Restaurant;



use Illuminate\Http\Request;




class StatisticController extends Controller
{
  public function index()
  {
      // $orders = Order::where('restaurant_id', '=', $restaurant)->get();

      $id = Auth::id();

      $orders = Order::with('restaurants')->where('user_id', '=', $id)->get();

      $restaurants = Restaurant::all();

      return view('admin.statistics.index', compact('orders', 'restaurants'));
  }

  // public function show(Restaurant $restaurant)
  // {
  //   $orders = Order::where('restaurant_id', '=', $restaurant)->get();
  //
  //   return view('admin.restaurants.statistics', compact('orders'));
  // }

}
