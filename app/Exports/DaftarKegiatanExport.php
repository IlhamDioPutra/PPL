<?php

namespace App\Exports;

use App\Models\DaftarKegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class DaftarKegiatanExport implements FromView
{
    public function view(): View
    {

        return view('exports.daftarKegiatan', [
            'datas' => DaftarKegiatan::all(),
            'totalAnggaran' =>DaftarKegiatan::sum('anggaran')
        ]);
    }
}