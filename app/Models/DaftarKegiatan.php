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
}
