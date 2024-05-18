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
        Schema::create('dinnertables', function (Blueprint $table) { // Chỉnh sửa tên bảng thành 'dinnertables'
            $table->id();
            $table->string('name'); // tên bàn
            $table->string('image'); // Cột ảnh
            $table->integer('chair'); // Cột số ghế
            $table->unsignedBigInteger('branch_id'); // Thêm trường branch_id
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinnertables');
    }
};
