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
        Schema::create('data_kandangs', function (Blueprint $table) {
            $table->id('id_data_kandang');
            $table->foreignId('id_kandang');
            $table->integer('hari_ke');
            $table->float('pakan');
            $table->float('minum');
            $table->float('bobot');
            $table->timestamp('date');
            $table->enum('classification',['normal','abnormal']);

            //Relasi
            $table->foreign('id_kandang')->references('id_kandang')->on('kandangs');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kandangs');
    }
};