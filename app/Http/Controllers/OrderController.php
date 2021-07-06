<?php

namespace App\Http\Controllers;
use App\Order;
use App\Dish;

use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function store(Request $request){

    $data = $request->json()->all();

    // return response()->json([$data['orderForm']['customer_name']]);

    $validator = Validator::make($data,[
      // 'orderForm'->['customer_name'] => 'required|string|max:50',
      // 'orderForm'->['customer_email'] => 'required|string|max:50',
      // 'orderForm'->['customer_telephone'] => 'numeric|digits_between:7,14',
      // 'orderForm'->['delivery_address'] => 'required|string|max:100',
      // 'orderForm'->['delivery_time'] => 'required|date_format:H:i',
      // 'orderForm'->['delivery_notes'] => 'nullable|string|max:500',
      // 'orderForm'->['total_paid'] => 'required|numeric',
      // 'orderForm'->['restaurant_id'] => 'exists:restaurants,id',

      'orderForm.customer_name' => 'required|string|max:50',
      'orderForm.customer_email' => 'required|string|max:50',
      'orderForm.customer_telephone' => 'numeric|digits_between:7,14',
      'orderForm.delivery_address' => 'required|string|max:100',
      'orderForm.delivery_time' => 'required|date_format:H:i',
      'orderForm.delivery_notes' => 'nullable|string|max:500',
      'orderForm.total_paid' => 'required|numeric',
      'orderForm.restaurant_id' => 'exists:restaurants,id',
      'dish_ids.*' => 'exists:dishes,id',

    ]);
    if ($validator->fails()){
      return response()->json([
              'success' => false,
              'validation' => $validator->errors()
      ]);

    } //else {
    //   return response()->json(['tuttappost']);
    //
    // }

    $dataOrder = $data['orderForm'];


      // return response()->json([$dataOrder]);

    // $comic_obj = new Comic();
    // $comic_obj->title = $comic['title'];
    // $comic_obj->description = $comic['description'];
    // $comic_obj->thumb = $comic['thumb'];
    // $comic_obj->price = $comic['price'];
    // $comic_obj->series = $comic['series'];
    // $comic_obj->sale_date = $comic['sale_date'];
    // $comic_obj->type = $comic['type'];
    // $comic_obj->save();

    $dataOrder['order_number'] = '#' . rand(1000, 9999);


    $order = new Order();
    $order->customer_name = $dataOrder['customer_name'];
    $order->customer_email = $dataOrder['customer_email'];
    $order->customer_telephone = $dataOrder['customer_telephone'];
    $order->delivery_address = $dataOrder['delivery_address'];
    $order->delivery_time = $dataOrder['delivery_time'];
    $order->delivery_notes = $dataOrder['delivery_notes'];
    $order->order_number = '#' . rand(1000, 9999);
    $order->total_paid = $dataOrder['total_paid'];
    $order->restaurant_id = $dataOrder['restaurant_id'];
    $order->save();

    // if (array_key_exists('dish_ids', $data)){
    //   $order->dishes()->attach($data['dish_ids']);
    // }

    // $cart = $data['cart'];

    return response()->json([
        'success' => true,
    ]);













  }



  public function ordersByRestaurant(string $id)
  {
    // return response()->json([$data['orderForm']['customer_name']]);
    // return response()->json(['ok']);

    $orders = Order::where('restaurant_id', '=', $id)->get();

    return response()->json([
      'data' => $orders,
      'success' => true,
    ]);

  }
}
