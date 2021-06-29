<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Category;
use App\Order;


use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      $restaurants = Restaurant::where('user_id', '=', $id)->get();
      return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:50',
        'telephone' => 'numeric|digits_between:7,14',
        'address' => 'required|string|max:100',
        'p_iva' => 'required|numeric|digits:11',
        'logo' => 'image|max:5000|nullable',
        'cover_image' => 'image|max:5000|nullable',
        'category_ids.*' => 'exists:categories,id',

      ]);

      $data = $request->all();

      $restaurant = new Restaurant();
      $data['user_id'] = Auth::id();
      $restaurant->fill($data);
      $restaurant['slug'] = $this->generateSlug($data['name']);

      $logo = NULL;
      if (array_key_exists('logo', $data)) {
          $logo = Storage::put('uploads', $data['logo']);
          $restaurant->logo = 'storage/' . $logo;
      }

      $cover = NULL;
      if (array_key_exists('cover_image', $data)) {
          $cover = Storage::put('uploads', $data['cover_image']);
          $restaurant->cover_image = 'storage/' . $cover;
      }

      $restaurant->save();

      if (array_key_exists('category_ids', $data)) {
        $restaurant->categories()->attach($data['category_ids']);
      }

      return redirect()->route('admin.restaurants.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
      $categories = Category::all();

      return view('admin.restaurants.show', compact('restaurant', 'categories'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
      $categories = Category::all();

      if ($restaurant->user_id == Auth::id()) {
        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
      } else {
        return view('security');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
      $request->validate([
        'name' => 'required|string|max:50',
        'telephone' => 'numeric|digits_between:7,14',
        'address' => 'required|string|max:100',
        'p_iva' => 'required|numeric|digits:11',
        'logo' => 'image|max:5000|nullable',
        'cover_image' => 'image|max:5000|nullable',
        'category_ids.*' => 'exists:categories,id',

      ]);

      $data = $request->all();
      //$data['slug'] = $this->generateSlug($data['name'], $restaurant['name'] != $data['name'], $restaurant->slug);
      $data['slug'] = $this->generateSlug($data['name'], $data['name'] != $restaurant->name, $restaurant->slug);

      if (array_key_exists('logo', $data)) {
          $logo = Storage::put('uploads', $data['logo']);
          $data['logo'] = 'storage/' . $logo;
      }


      if (array_key_exists('cover_image', $data)) {
          $cover = Storage::put('uploads', $data['cover_image']);
          $data['cover_image'] = 'storage/' . $cover;
      }

      $restaurant->update($data);

      if (array_key_exists('category_ids', $data)) {
        $restaurant->categories()->sync($data['category_ids']);
      } else {
        $restaurant->categories()->detach($data['category_ids']);
      }

      return redirect()->route('admin.restaurants.show', compact('restaurant'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
      $restaurant->delete();

      return redirect()->route('admin.restaurants.index');
    }

    private function generateSlug(string $title, bool $change = true, string $old_slug = '')
    {

        if (!$change) {
            return $old_slug;
        }
        $slug = Str::slug($title, '-');
        $slug_base = $slug;
        $contatore = 1;
        $restaurant_with_slug = Restaurant::where('slug', '=', $slug)->first();
        while ($restaurant_with_slug) {
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
            $restaurant_with_slug = Restaurant::where('slug', '=', $slug)->first();
        }

        return $slug;
    }

}
