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
            $table->id();
            $table->foreignId('id_kandang');
            $table->timestamp('time');
            $table->integer('amoniak');
            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
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
