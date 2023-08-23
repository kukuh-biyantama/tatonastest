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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('hardware_id'); // Use the same data type as the primary key of the 'hardware' table
            $table->text('parameter');
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationship
            $table->foreign('hardware_id')->references('hardware')->on('hardware');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
