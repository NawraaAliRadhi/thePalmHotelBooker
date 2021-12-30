<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("room_id");
            $table->unsignedBigInteger("user_id");
            $table->dateTime("checkin")->nullable();
            $table->dateTime("checkout")->nullable();
            $table->unsignedBigInteger("total_price")->default(0);
            $table->unsignedBigInteger("guest_numbers")->default(0);
            $table->boolean("is_approved")->default(false);
            $table->unsignedBigInteger("number_of_nights")->default(0);
            $table->timestamps();

            //Foreign keys
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
