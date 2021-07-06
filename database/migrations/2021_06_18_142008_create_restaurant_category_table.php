<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantCategoryTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('restaurant_category', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('restaurant_id');
      $table->unsignedBigInteger('category_id');

      $table->foreign('restaurant_id')
      ->references('id')
      ->on('restaurants')
      ->onDelete('cascade');

      $table->foreign('category_id')
      ->references('id')
      ->on('categories')
      ->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('restaurant_category');
  }
}
