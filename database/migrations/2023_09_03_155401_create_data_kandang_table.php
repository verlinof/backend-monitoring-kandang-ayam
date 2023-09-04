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
            $table->foreignId('id_kandang');
            $table->timestamp('date');
            $table->integer('hari_ke');
            $table->integer('kematian');
            $table->float('pakan');
            $table->float('minum');
            $table->foreignId('id_user');
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