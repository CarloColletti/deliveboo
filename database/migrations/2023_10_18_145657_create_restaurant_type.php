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
        Schema::create('restaurant_type', function (Blueprint $table) {
            $table->foreignId('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('restaurant_type');
    }
};
