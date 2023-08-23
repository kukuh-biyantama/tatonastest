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
        Schema::create('hardware', function (Blueprint $table) {
            $table->string('hardware')->primary(); // Set 'hardware' as unique
            $table->string('location');
            $table->integer('timezone');
            $table->datetime('localtime'); // Change to datetime
            $table->double('latitude', 10, 6);
            $table->double('longitude', 10, 6);
            $table->string('created_by')->default('admin'); // Specify data type and nullable
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
