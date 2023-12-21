<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpjBelanjaGup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function daftarKegiatan()
    {
        return $this->belongsTo(DaftarKegiatan::class);
    }

    public function rekapAjuanKegiatan()
    {
        return $this->belongsTo(RekapAjuanKegiatan::class);
    }
}
