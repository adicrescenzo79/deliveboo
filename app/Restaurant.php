<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable = [
    'name',
    'slug',
    'telephone',
    'address',
    'p_iva',
    'logo',
    'cover_image'
  ];
}
