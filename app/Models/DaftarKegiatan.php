<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'daftar_kegiatan';
    public $timestamps = false;
    public static $rules = [
        'no_form' => 'required|unique:no_form',
        'nama_kegiatan' => 'required|unique:daftar_kegiatan',
        // tambahkan aturan unik untuk kolom lainnya
    ];
}
