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
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trans_id');
            $table->string('hardware_id'); // Use the same data type as the primary key of the 'hardware' table
            $table->string('sensor');
            $table->float('value');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships
            $table->foreign('trans_id')->references('id')->on('transaksis');
            $table->foreign('hardware_id')->references('hardware')->on('hardware');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_details');
    }
};
