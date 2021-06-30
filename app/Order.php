<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
  'customer_name',
  'customer_email',
  'customer_telephone',
  'delivery_address',
  'delivery_time',
  'delivery_notes',
  'order_number',
  'total_paid',
  'restaurant_id',
];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function dishes()
    {
      return $this->belongsToMany('App\Dish', 'order_dish');
      // ->withPivot('dish_quantity')
    }

}
