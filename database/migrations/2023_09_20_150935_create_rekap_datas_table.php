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
        Schema::create('rekap_datas', function (Blueprint $table) {
            $table->id('id_rekap_data');
            $table->foreignId('id_kandang');
            $table->date('hari');
            $table->float('rata_rata_amoniak');
            $table->float('rata_rata_suhu');
            $table->float('rata_rata_kelembaban');
            $table->float('pakan');
            $table->float('minum');
            $table->integer('jumlah_kematian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_datas');
    }
};