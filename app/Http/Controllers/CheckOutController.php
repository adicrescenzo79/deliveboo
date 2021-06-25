<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function cart(Request $request)
    {
      $data = $request->all();


      return response()->json([
        'data' => $data,
        'success' => true,
      ]);

    }

    public function checkout()
    {
      return view('guests.checkout');
    }

}
