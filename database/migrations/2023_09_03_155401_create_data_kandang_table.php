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
        Schema::create('data_kandang', function (Blueprint $table) {
            $table->id('id_data_kandang');
            $table->date('waktu');
            $table->integer('populasi');
            $table->integer('pakan');
            $table->integer('minum');
            $table->enum('keterangan',['normal','abnormal']);
            $table->foreignId('id_kandang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kandang');
    }
};