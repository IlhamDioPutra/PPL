<?php

namespace App\Exports;

use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;
use App\Models\RekapAjuanKegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DetailTupExport implements FromView
{
    protected $bulan;

    /**
     * Konstruktor untuk menerima nilai bulan
     */
    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }
    /**
    * 
    */
    public function view() : View
    {
        $datas = SpjBelanjaTup::where('bulan',  $this->bulan)->get();
        $namaBulan = SpjBelanjaTup::where('bulan',  $this->bulan)->first();


        // Ambil daftar_kegiatan_id yang berbeda dari $datas
        $daftarKegiatanIds = $datas->pluck('daftar_kegiatan_id')->unique();
        // Hitung total anggaran pagu untuk setiap daftar_kegiatan_id
        $totalAnggaranPagu = DaftarKegiatan::whereIn('id', $daftarKegiatanIds)
            ->sum('anggaran');

        $rekapAjuanKegiatanIds = $datas->pluck('rekap_ajuan_kegiatan_id')->unique();
        $totalAnggaranBelanja = RekapAjuanKegiatan::whereIn('id', $rekapAjuanKegiatanIds)
            ->sum('anggaran_kegiatan');

        $totalRencanaTup = $datas->sum('rencana_tup');
        $totalRealisasiTup = $datas->sum('realisasi_tup');
        
        return view('exports.DetailTup', compact('datas','namaBulan','totalAnggaranPagu','totalAnggaranBelanja','totalRencanaTup','totalRealisasiTup'));


    }
}
