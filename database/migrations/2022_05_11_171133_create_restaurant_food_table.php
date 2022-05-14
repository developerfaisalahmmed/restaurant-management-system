<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_food', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_food_name');
            $table->integer('restaurant_food_quantity');
            $table->integer('restaurant_food_price');
            $table->string('restaurant_food_image')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('restaurant_food');
    }
}
