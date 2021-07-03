<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', 'RestaurantController@index');
Route::get('/restaurants/nr/{skip}', 'RestaurantController@restaurantsNr');
Route::get('/restaurants/{categorySelectedJson}', 'RestaurantController@restaurantByCategory');
Route::get('/categories', 'CategoryController@index');
Route::get('/dishes/{slug}', 'DishController@dishesByRestaurant');
Route::get('/restaurants/slug/{slug}', 'RestaurantController@restaurantBySlug');
Route::post('checkout', 'CheckoutController@pay');
Route::post('orders', 'OrderController@store');
Route::get('orders/{id}', 'OrderController@ordersByRestaurant');
