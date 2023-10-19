<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_order', function (Blueprint $table) {
            $table->smallInteger('quantity');
            $table->dateTime('created_at');
            $table->foreignId('dish_id');
            $table->foreign('dish_id')->references('id')->on('dishes')->cascadeOnDelete();
            $table->foreignId('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes_order');   
    }
};
