<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
    'name',
    'description',
    'price',
    'image',
    'visibility',
    'restaurant_id'
  ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function orders()
    {
      return $this->belongsToMany('App\Order', 'order_dish');
      // ->withPivot('dish_quantity')
    }

}
