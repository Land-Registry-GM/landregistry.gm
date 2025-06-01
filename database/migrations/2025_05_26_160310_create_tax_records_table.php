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
        Schema::create('tax_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->decimal('assessed_value', 12, 2);
            $table->integer('tax_year');
            $table->decimal('tax_due', 12, 2);
            $table->boolean('tax_paid')->default(false);
            $table->date('last_payment_date')->nullable();
            $table->timestamps();
        });

        Schema::create('tax_exemptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_record_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->decimal('amount', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_exemptions');
        Schema::dropIfExists('tax_records');
    }
};
