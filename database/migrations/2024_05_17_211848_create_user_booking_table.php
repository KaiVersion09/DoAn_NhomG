<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('dinner_table_id')->constrained('dinner_tables')->onDelete('cascade');
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->dateTime('booking_time');
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
