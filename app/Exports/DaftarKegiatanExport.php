<?php

namespace App\Exports;

use App\Models\DaftarKegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class DaftarKegiatanExport implements FromView
{
    public function view(): View
    {
        $datas = DaftarKegiatan::all();
        $totalAnggaranAsli = 600000000;
        $totalAnggaran = DaftarKegiatan::sum('anggaran');

        return view('exports.daftarKegiatan', compact('datas', 'totalAnggaran','totalAnggaranAsli'));
    }
}