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
            $table->uuid('property_id')->primary();
            $table->enum('property_type', ['House', 'Apartment']);
            $table->text('property_address');
            $table->string('property_image');
            $table->enum('property_sales_type', ['Rent', 'Sale']);
            $table->enum('property_status', ['Available', 'Booked', 'Sold']);
            $table->bigInteger('property_price');
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
