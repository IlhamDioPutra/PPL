<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAjuanKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function daftarKegiatan()
    {
        return $this->belongsTo(DaftarKegiatan::class);
    }

    public function spjBelanjaTUP()
    {
        return $this->hasMany(SpjBelanjaTup::class);
    }
}
