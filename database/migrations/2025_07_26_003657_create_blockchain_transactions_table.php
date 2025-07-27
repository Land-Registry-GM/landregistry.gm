<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blockchain_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_hash')->unique();
            $table->string('block_hash')->nullable();
            $table->bigInteger('block_number')->nullable();
            $table->string('from_address');
            $table->string('to_address')->nullable();
            $table->decimal('value', 64, 0)->default(0);
            $table->decimal('gas_used', 64, 0)->nullable();
            $table->decimal('gas_price', 64, 0)->nullable();
            $table->text('input')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, failed
            $table->json('metadata')->nullable();
            $table->timestamps();
            
            $table->index('transaction_hash');
            $table->index('from_address');
            $table->index('to_address');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blockchain_transactions');
    }
};
