<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Restaurant;
use App\Dish;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant)
    {
        $dishes = Dish::where('restaurant_id', '=', $restaurant)->get();

        $actualRestaurant = Restaurant::where('id', '=', $restaurant)->first();

        if ($dishes->isEmpty()) {
          $restaurant = Restaurant::where('id', '=', $restaurant)->first();
          return view('admin.dishes.create', compact('restaurant'));
        }

        return view('admin.dishes.index', compact('dishes', 'actualRestaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurantId)
    {
      $restaurant = Restaurant::where('id', '=', $restaurantId)->first();

      if ($restaurant->user_id == Auth::id()) {
        return view('admin.dishes.create', compact('restaurant'));
      } else {
        return view('security');
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant)
    {
        $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'string|max:500|nullable',
        'price' => 'required|numeric',
        'image' => 'image|nullable|max:5000',
        'visibility' => 'required|boolean',
      ]);

        $data = $request->all();
        $dish = new Dish();
        $data['restaurant_id'] = $restaurant;
        $dish->fill($data);

        $cover = null;
        if (array_key_exists('image', $data)) {
            $cover = Storage::put('uploads', $data['image']);
            $dish->image = 'storage/' . $cover;
        }

        $dish->save();

        return redirect()->route('admin.restaurants.dishes.index', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
      if ($dish->restaurant->user_id == Auth::id()) {
        return view('admin.dishes.edit', compact('dish'));
      } else {
        return view('security');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
      $request->validate([
      'name' => 'required|string|max:50',
      'description' => 'string|max:500|nullable',
      'price' => 'required|numeric',
      'image' => 'image|nullable|max:5000',
      'visibility' => 'required|boolean',
    ]);

        $data = $request->all();

        if (array_key_exists('image', $data)) {
            $cover = Storage::put('uploads', $data['image']);
            $dish->image = 'storage/' . $cover;
        }

        $dish->update($data);
        
        $restaurant = Restaurant::where('id', '=', $dish['restaurant_id'])->first();

        return redirect()->route('admin.restaurants.dishes.index', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $restaurant = $dish->restaurant_id;
        $dish->delete();

        return redirect()->route('admin.restaurants.dishes.index', compact('restaurant'));
    }
}
