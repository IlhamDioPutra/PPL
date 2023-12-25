<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SpjBelanjaGup;
use App\Models\SpjBelanjaTup;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapitulasiAkhirExport;

class RekapitulasiAkhirController extends Controller
{
    public function index()
    {
        // Tentukan array untuk menyimpan variabel GUP, TUP, dan Total
        $dataGup = [];
        $dataTup = [];
        $dataTotal = [];
    
        // Loop untuk setiap bulan
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        foreach ($bulans as $bulan) {
            // Ambil total biaya GUP dan simpan ke variabel GUP
            $biayaGup = SpjBelanjaGup::where('bulan', $bulan)->sum('biaya') ?? 0;
            $dataGup["Gup{$bulan}"] = $biayaGup;
    
            // Ambil total realisasi TUP dan simpan ke variabel TUP
            $realisasiTup = SpjBelanjaTup::where('bulan', $bulan)->sum('realisasi_tup') ?? 0;
            $dataTup["Tup{$bulan}"] = $realisasiTup;
    
            // Hitung total biaya GUP dan total realisasi TUP untuk bulan yang sama
            $total = $biayaGup + $realisasiTup;
            $dataTotal["Total{$bulan}"] = $total;
        }

        $totalBiayaTup = array_sum($dataTup);
        $totalBiayaGup = array_sum($dataGup);
        $totalBiaya = array_sum($dataTotal);
        
    
        return view('RekapitulasiAkhir.index', compact('dataGup', 'dataTup', 'dataTotal','bulans','totalBiayaTup','totalBiayaGup','totalBiaya'));
    }

    public function export() 
    {
        return Excel::download(new RekapitulasiAkhirExport, 'RekapitulasiAkhir.xlsx');
    }
    
}
