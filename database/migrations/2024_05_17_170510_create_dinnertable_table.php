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
        Schema::create('dinnertable', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // tên bàn
            $table->string('image'); // Cột ảnh
            $table->integer('chair'); // Cột số ghế
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinnertable');
    }
};
