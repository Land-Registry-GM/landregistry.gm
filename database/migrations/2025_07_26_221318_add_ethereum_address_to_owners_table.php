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
        Schema::table('owners', function (Blueprint $table) {
            $table->string('ethereum_address', 42)->nullable()->after('phone')->comment('Ethereum wallet address');
        });
    }
    
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->dropColumn('ethereum_address');
        });
    }
};
