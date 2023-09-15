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
        Schema::create('amoniak_sensors', function (Blueprint $table) {
            $table->id('id_amoniak_sensor');
            $table->foreignId('id_kandang');
            $table->timestamp('date');
            $table->integer('amoniak');

            //Relasi
            $table->foreign('id_kandang')->references('id_kandang')->on('kandang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amoniak_sensors');
    }
};