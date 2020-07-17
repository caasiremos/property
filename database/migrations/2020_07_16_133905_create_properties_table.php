<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('county');
            $table->string('town');
            $table->text('description');
            $table->string('post_code');
            $table->string('full_detail_url')->nullable();
            $table->string('displayable_address');
            $table->string('image_url')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('bedroom_number');
            $table->string('bathroom_number');
            $table->double('price');
            $table->string('property_type');
            $table->string('property_status');
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
        Schema::dropIfExists('properties');
    }
}
