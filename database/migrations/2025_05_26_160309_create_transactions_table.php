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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('transaction_type');
            $table->foreignId('buyer_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('owners')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->date('transaction_date');
            $table->string('deed_number');
            $table->boolean('tax_paid')->default(false);
            $table->string('recorded_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
