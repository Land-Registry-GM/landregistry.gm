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
        Schema::create('ownership_history', function (Blueprint $table) {
             $table->id();
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
            $table->string('previous_owner');
            $table->date('transfer_date');
            $table->string('deed_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ownership_history');
    }
};
