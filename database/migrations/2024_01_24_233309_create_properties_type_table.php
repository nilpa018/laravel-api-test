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
        Schema::create('properties_types', function (Blueprint $table) {
            $table->id();
            $table->boolean('apartment_flat')->default(0);
            $table->boolean('building')->default(0);
            $table->boolean('building_site')->default(0);
            $table->boolean('castle')->default(0);
            $table->boolean('co_ownership')->default(0);
            $table->boolean('property')->default(0);
            $table->boolean('simple_house')->default(0);
            $table->boolean('land')->default(0);
            $table->boolean('on_map')->default(0);
            $table->boolean('stable')->default(0);
            $table->boolean('statutory_open_land')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_types');
    }
};
