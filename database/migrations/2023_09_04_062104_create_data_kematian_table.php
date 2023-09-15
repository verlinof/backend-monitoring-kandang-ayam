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
        Schema::create('data_kematian', function (Blueprint $table) {
            $table->id('id_data_kematian');
            $table->foreignId('id_data_kandang');
            $table->integer('kematian_terbaru');
            $table->integer('jumlah_kematian');
            $table->integer('jam_awal');
            $table->integer('jam_akhir');
            $table->timestamp('hari');

            //Relasi
            $table->foreign('id_data_kandang')->references('id_data_kandang')->on('data_kandang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kematian');
    }
};