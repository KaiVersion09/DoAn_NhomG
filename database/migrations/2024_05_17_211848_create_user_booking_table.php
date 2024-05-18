<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_booking', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('user_id');
            $table->integer('dinner_table_id');
            $table->dateTime('booking_time');
            $table->integer('branch_id');
            $table->integer('number_of_guests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_booking');
    }
};
