<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('property_owner', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('owner_id')->constrained()->cascadeOnDelete();
            $table->date('acquisition_date');
            $table->boolean('is_current_owner')->default(true);
            $table->timestamps();
            
            $table->primary(['property_id', 'owner_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_owner');
    }
};
