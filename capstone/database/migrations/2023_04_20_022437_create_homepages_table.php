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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('homepage_title');
            $table->string('homepage_picture');
            $table->string('about_title');
            $table->string('about_title_2');
            $table->text('about_description');
            $table->string('about_picture');
            $table->string('amenities_title');
            $table->string('amenities_title_2');
            $table->text('amenities_description');
            $table->string('amenities_picture');
            $table->string('featured_picture');        
            $table->string('featured_title_1');        
            $table->string('featured_icon_1');        
            $table->text('featured_description_1');
            $table->string('featured_title_2');        
            $table->string('featured_icon_2');        
            $table->text('featured_description_2');
            $table->string('featured_title_3');        
            $table->string('featured_icon_3');        
            $table->text('featured_description_3');        
            $table->string('unit_title');
            $table->string('unit_title_2');
            $table->string('unit_picture');
            $table->integer('unit_price');
            $table->text('unit_list');
            $table->string('location_title');
            $table->string('location_title_2');
            $table->text('location_description');
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
        Schema::dropIfExists('homepages');
    }
};
