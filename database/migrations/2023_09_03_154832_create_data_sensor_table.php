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
        Schema::create('data_sensor', function (Blueprint $table) {
            $table->id('id_data_sensor');
            $table->foreignId('id_kandang');
            $table->timestamp('date');
            $table->integer('suhu');
            $table->integer('kelembaban');
            $table->integer('amoniak');
            $table->enum('classification', ['normal', 'abnormal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sensor');
    }
};