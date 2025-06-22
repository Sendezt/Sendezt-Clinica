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
        Schema::create('daftar_polis', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pasien')->constrained('pasien')->onDelete('cascade');
            $table->foreignId('id_jadwal_periksa')->constrained('jadwal_periksas')->onDelete('cascade');
            $table->text('keluhan')->nullable();
            $table->integer('no_antrian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_polis');
    }
};
