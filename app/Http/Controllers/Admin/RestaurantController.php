<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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
        return view('admin.restaurants.create');
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
        'telephone' => 'string',
        'address' => 'required|string|max:100',
        'p_iva' => 'required|string|max:15',
        'logo' => 'image|max:100|nullable',
        'cover_image' => 'image|max:100|nullable',
      ]);

      $data = $request->all();
      $restaurant = new Restaurant();
      $data['user_id'] = Auth::id();
      $restaurant->fill($data);
      $restaurant['slug'] = $this->generateSlug($data['name']);

      $restaurant->save();

      // $data['slug'] = $this->generateSlug($data['name'], $data['name'] != $restaurant->name, $restaurant->slug);
      // $restaurant = new Restaurant();
      // $restaurant->create($data);
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
      return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
      return view('admin.restaurants.edit', compact('restaurant'));

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
        'telephone' => 'string',
        'address' => 'required|string|max:100',
        'p_iva' => 'required|string|max:15',
        'logo' => 'image|max:100|nullable',
        'cover_image' => 'image|max:100|nullable',
      ]);

      $data = $request->all();
      //$data['slug'] = $this->generateSlug($data['name'], $restaurant['name'] != $data['name'], $restaurant->slug);
      $data['slug'] = $this->generateSlug($data['name'], $data['name'] != $restaurant->name, $restaurant->slug);
      $restaurant->update($data);
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
