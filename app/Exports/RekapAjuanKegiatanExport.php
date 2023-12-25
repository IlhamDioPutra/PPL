<?php

namespace App\Exports;

use App\Models\DaftarKegiatan;
use App\Models\RekapAjuanKegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapAjuanKegiatanExport implements FromView
{
    /**
    * 
    */
    public function view() : View
    {
        $datas = RekapAjuanKegiatan::all();
        // $totalAnggaranAsli = 600000000;
        $totalAnggaran = DaftarKegiatan::sum('anggaran');
        $totalAnggaranDiajukan = RekapAjuanKegiatan::sum('anggaran_kegiatan');

        return view('exports.RekapAjuanKegiatan', compact('datas', 'totalAnggaran','totalAnggaranDiajukan'));
    }
}
