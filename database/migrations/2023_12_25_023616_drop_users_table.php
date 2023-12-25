<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsersTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Menghapus tabel users jika sudah ada
        Schema::dropIfExists('users');
    }

    /**
     * Batalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Buat kembali tabel users jika perlu
        Schema::create('users', function (Blueprint $table) {
            // Kolom-kolom tabel users
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}

