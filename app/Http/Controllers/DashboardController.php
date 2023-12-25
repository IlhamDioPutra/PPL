<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaGup;
use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;

class DashboardController extends Controller
{
    public function index() {
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

        $totalAnggaran = DaftarKegiatan::sum('anggaran');
        $sisaSaldo = $totalAnggaran - $totalBiaya;
        
    
        return view('Dashboard.dashboard', compact('dataGup', 'dataTup', 'dataTotal','bulans','totalBiayaTup','totalBiayaGup','totalBiaya','totalAnggaran','sisaSaldo'));
    }
}
