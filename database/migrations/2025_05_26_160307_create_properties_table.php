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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_id')->unique();
            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->decimal('centroid_lat', 10, 7)->nullable();
            $table->decimal('centroid_lng', 10, 7)->nullable();
            $table->json('boundary_coordinates')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('ownership_type_id')->nullable();
            $table->unsignedBigInteger('land_use_type_id')->nullable();
            $table->unsignedBigInteger('zoning_id')->nullable();
            $table->decimal('area', 10, 2);
            $table->string('survey_plan_number')->nullable();
            $table->text('boundary_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
