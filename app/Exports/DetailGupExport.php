<?php

namespace App\Exports;

use App\Models\SpjBelanjaGup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DetailGupExport implements FromView
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
        $datas = SpjBelanjaGup::where('bulan',  $this->bulan)->get();
        $namaBulan = SpjBelanjaGup::where('bulan',  $this->bulan)->first();
        $totalBiaya = $datas->sum('biaya');

        return view('exports.DetailGup', compact('datas','namaBulan','totalBiaya'));
        
    }
}
