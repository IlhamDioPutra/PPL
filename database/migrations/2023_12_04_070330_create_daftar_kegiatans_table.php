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
        Schema::create('daftar_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('no_form')->unique(); 
            $table->string('nama_kegiatan')->unique(); 
            $table->string('iku'); 
            $table->string('masukan_keluaran'); 
            $table->integer('anggaran'); 
            $table->string('sumber_dana'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_kegiatan');
    }
};
