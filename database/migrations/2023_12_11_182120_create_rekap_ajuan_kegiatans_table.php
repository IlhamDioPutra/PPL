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
        Schema::create('rekap_ajuan_kegiatans', function (Blueprint $table) {
            $table->id();
            
             // Kolom-kolom tambahan sesuai kebutuhan
             $table->integer('max');
             $table->string('belanja');
             $table->integer('vol');
             $table->string('satuan');
             $table->integer('biaya');
             $table->integer('anggaran_kegiatan');
 
             // Foreign key ke daftar_kegiatan
             $table->unsignedBigInteger('daftar_kegiatan_id');
             $table->foreign('daftar_kegiatan_id')
                   ->references('id')->on('daftar_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_ajuan_kegiatans');
    }
};
