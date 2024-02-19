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
        Schema::create('properties_details', function (Blueprint $table) {
            $table->id();
            $table->boolean('balcony')->default(0);
            $table->boolean('by_the_sea')->default(0);
            $table->boolean('good_condition')->default(0);
            $table->boolean('country_side')->default(0);
            $table->boolean('equipped')->default(0);
            $table->boolean('floor')->default(0);
            $table->boolean('furnished_flat')->default(0);
            $table->boolean('lift')->default(0);
            $table->boolean('new')->default(0);
            $table->boolean('stairs')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_details');
    }
};
