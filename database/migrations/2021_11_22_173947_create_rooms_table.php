<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('details')->nullable();
            $table->bigInteger('price_per_night')->default(0);
            $table->bigInteger('price_per_day')->default(0);
            $table->bigInteger('price_per_week')->default(0);
            $table->string("room_types")->comment("single, double, triple, smoking/non‐ smoking, twin beds, double bed queen size/king aize");
            $table->boolean("is_room_available")->default(true);
            $table->bigInteger('floor_number')->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
