<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/security', function () {
    return view('security');
});

Route::get('/payment', function () {
    return view('guests.payment');
})->name('payment');


Route::get('restaurants/{slug}', 'RestaurantController@menu')->name('restaurants.menu');
Route::get('checkout', 'CheckoutController@checkout')->name('checkout');



Auth::routes();

//rotte admin
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('restaurants', 'RestaurantController');
        Route::resource('restaurants.dishes', 'DishController')->shallow();
        Route::resource('restaurants.statistics', 'StatisticController');

    });

Route::get('/payment/make', 'PaymentController@make')->name('payment.make');
