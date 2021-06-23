<?php

namespace App\Http\Controllers;
use App\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    return response()->json([
      'data' => $categories,
      'success' => true,
    ]);

  }

}
