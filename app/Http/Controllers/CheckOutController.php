<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function cart(Request $re)
    {
      return view('checkout');
    }

    public function checkOut()
    {

    }

}
