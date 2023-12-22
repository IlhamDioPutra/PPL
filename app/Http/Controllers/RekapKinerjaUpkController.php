<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaGup;

class RekapKinerjaUpkController extends Controller
{
    public function index()
    {
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('RekapKinerjaUpk.index',compact('bulans'));
    }
    public function lihatDetail($bulan)
    {
        $datas = SpjBelanjaGup::where('bulan', $bulan)->get();
        $namaBulan = SpjBelanjaGup::where('bulan', $bulan)->first();
        $totalBiaya = $datas->sum('biaya');

        return view('RekapKinerjaUpk.detail', compact('datas','namaBulan','totalBiaya'));

    
    }
}
