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
        Schema::create('panen', function (Blueprint $table) {
            $table->id('id_panen');
            $table->unsignedBigInteger('id_kandang');
            $table->date('tanggal_mulai');
            $table->integer("jumlah_panen");
            $table->timestamp('tanggal_panen');
            
            //Relasi
            $table->foreign('id_kandang')->references('id_kandang')->on('kandang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panen');
    }
};