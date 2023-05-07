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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title');
            $table->integer('room_price');
            $table->string('room_image');
            $table->text('room_description');
            $table->integer('bedrooms')->default(0);
            $table->integer('max_guests');
            $table->enum('unit_type',['studio','cozy','luxury','vip']);
            $table->integer('status')->default(1);
            $table->integer('owner_id')->default(1);
            $table->integer('parking')->default(0);
            $table->boolean('pet_friendly')->default(0);
            $table->boolean('smoking_allowed')->default(0);
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
};
