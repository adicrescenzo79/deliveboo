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
  'order_number',
  'total_paid',
  'restaurant_id',
  'created_at',
  'updated_at'
];

  public function restaurant()
  {
    return $this->belongsTo('App\Reastaurant');
  }

}
