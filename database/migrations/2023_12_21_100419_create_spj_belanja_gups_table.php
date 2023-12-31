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
        Schema::create('spj_belanja_gups', function (Blueprint $table) {
            $table->id();

            // Kolom-kolom tambahan sesuai kebutuhan
            $table->enum('bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
            $table->string('dokumen');
            $table->integer('biaya');

            // Foreign key ke daftar_kegiatan dan rekap_ajuan_kegiatans
            $table->unsignedBigInteger('rekap_ajuan_kegiatan_id');
            $table->unsignedBigInteger('daftar_kegiatan_id');
            $table->foreign('rekap_ajuan_kegiatan_id')
                  ->references('id')
                  ->on('rekap_ajuan_kegiatans')
                  ->onDelete('CASCADE') 
                  ->onUpdate('CASCADE');
            $table->foreign('daftar_kegiatan_id')
                   ->references('id')
                   ->on('daftar_kegiatan')
                   ->onDelete('CASCADE')  
                   ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spj_belanja_gups');
    }
};
