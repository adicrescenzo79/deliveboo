<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50)->required();
            $table->string('customer_email', 50)->required();
            $table->string('customer_telephone', 15)->required();
            $table->string('delivery_address', 50)->required();
            $table->dateTime('delivery_time', 0)->required();
            $table->char('order_number',6)->required(); // #00000
            $table->float('total_paid',5,2)->required();
            // $table->string('counter')->nullable();
            $table->unsignedBigInteger("restaurant_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
