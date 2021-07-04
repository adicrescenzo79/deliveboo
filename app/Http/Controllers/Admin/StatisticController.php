<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Order;


use Illuminate\Http\Request;




class StatisticController extends Controller
{
  public function index($restaurant)
  {
      // $orders = Order::where('restaurant_id', '=', $restaurant)->get();

      $id = Auth::id();

      $orders = Order::where('restaurant_id', '=', $restaurant)->get();

      $thisrestaurant = Restaurant::where('id', '=', $restaurant)->first();

      if ($thisrestaurant->user_id == Auth::id()) {
        return view('admin.statistics.index', compact('orders', 'thisrestaurant'));

      } else {
        return view('security');
      }


  }

  // public function show(Restaurant $restaurant)
  // {
  //   $orders = Order::where('restaurant_id', '=', $restaurant)->get();
  //
  //   return view('admin.restaurants.statistics', compact('orders'));
  // }

}
