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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->integer('amount');
            $table->enum('payment_method',['gcash','maya','bank','cash']);
            $table->enum('status',['pending','completed','failed']);
            $table->string('transaction_ref_no')->nullable();
            $table->string('reservation_ref_no');
            $table->string('payment_receipt')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
