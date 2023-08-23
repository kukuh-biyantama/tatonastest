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
        Schema::create('hardware_details', function (Blueprint $table) {
            $table->id();
            $table->string('hardware_id'); // Match the type of the referenced column
            $table->string('sensor');
            $table->foreign('hardware_id')->references('hardware')->on('hardware'); // Set up the foreign key
            $table->foreign('sensor')->references('sensor')->on('master_sensors');
            $table->softDeletes()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_details');
    }
};
