<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('blockchain_tx_hash')->nullable()->after('status');
            $table->timestamp('blockchain_verified_at')->nullable()->after('blockchain_tx_hash');
        });
    }
    
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['blockchain_tx_hash', 'blockchain_verified_at']);
        });
    }
};
