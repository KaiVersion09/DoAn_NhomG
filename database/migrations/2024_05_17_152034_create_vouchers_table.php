<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     *
     * @return void
     */
=======
>>>>>>> delete_voucher
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('voucher_id');
<<<<<<< HEAD
            $table->string('voucher_name');
=======
            $table->string('voucher_name')->unique();
>>>>>>> delete_voucher
            $table->integer('discount_percentage');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('code')->unique();
            $table->timestamps();
        });
    }

<<<<<<< HEAD
    /**
     * Reverse the migrations.
     *
     * @return void
     */
=======
>>>>>>> delete_voucher
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
