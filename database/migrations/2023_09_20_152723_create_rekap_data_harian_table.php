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
        Schema::create('rekap_data_harian', function (Blueprint $table) {
            $table->id('id_rekap_harian');
            $table->foreignId('id_kandang');
            $table->date('date');
            $table->integer('amoniak');
            $table->integer('suhu');
            $table->integer('kelembaban');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_data_harian');
    }
};