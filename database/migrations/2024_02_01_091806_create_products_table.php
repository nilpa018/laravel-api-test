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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('address', 150);
            $table->string('locality', 100);
            $table->string('country',100);
            $table->string('property_description', 250)->nullable();
            $table->string('owner', 100);
            $table->string('representative', 100);
            $table->string('price', 10);
            $table->string('payment',100);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('properties_details_id');
            $table->unsignedBigInteger('properties_types_id');
            $table->unsignedBigInteger('agreements_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('properties_details_id')->references('id')->on('properties_details');
            $table->foreign('properties_types_id')->references('id')->on('properties_types');
            $table->foreign('agreements_id')->references('id')->on('agreements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
