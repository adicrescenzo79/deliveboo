<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'slug',
    'telephone',
    'address',
    'p_iva',
    'logo',
    'cover_image',
  ];

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'restaurant_category');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
