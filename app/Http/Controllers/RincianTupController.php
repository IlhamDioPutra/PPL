<?php

namespace App\Http\Controllers;

use App\Exports\DetailTupExport;
use Illuminate\Http\Request;
use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Carbon;
use App\Models\RekapAjuanKegiatan;
use Maatwebsite\Excel\Facades\Excel;

class RincianTupController extends Controller
{
    public function index()
    {
        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('RincianTup.index',compact('bulans'));
    }

    public function lihatDetail($bulan)
    {

    //      // Ambil data dari model SpjBelanjaTup berdasarkan bulan
    // $datas = SpjBelanjaTup::where('bulan', $bulan)->get();
    // $namaBulan = SpjBelanjaTup::where('bulan', $bulan)->first();

    // $bulanSebelumnya = '';
    // switch ($bulan) {
    //     case 'Januari':
    //         $bulanSebelumnya = 'Desember';
    //         break;
    //     case 'Februari':
    //         $bulanSebelumnya = 'Januari';
    //         break;
    //     // Tambahkan case untuk bulan-bulan lainnya sesuai kebutuhan
    //     default:
    //         // Logika default jika tidak sesuai dengan bulan yang diharapkan
    //         break;
    // }
    // $dataBulanSebelumnya = SpjBelanjaTup::where('bulan', $bulanSebelumnya)
    //     ->get();
    

    //     $dataBulanSebelumnya = $datas->map(function ($datas) use ($dataBulanSebelumnya) {
    //         $filteredData = $dataBulanSebelumnya->first(function ($item) use ($datas) {
    //             return $item->daftar_kegiatan_id == $datas->daftar_kegiatan_id &&
    //                    $item->rekap_ajuan_kegiatan_id == $datas->rekap_ajuan_kegiatan_id;
    //         });
    
    //         return $filteredData ? $filteredData : (object)[
    //             'daftar_kegiatan_id' => $datas->daftar_kegiatan_id,
    //             'rekap_ajuan_kegiatan_id' => $datas->rekap_ajuan_kegiatan_id,
    //             // Set properti lain sesuai kebutuhan
    //             'realisasi_tup' => 0,
    //         ];
    //     });
    // dd($dataBulanSebelumnya);

    // // Kirim data ke halaman detail
    // return view('RincianTup.detail', compact('datas', 'namaBulan', 'dataBulanSebelumnya'));
        // Ambil data dari model SpjBelanjaTup berdasarkan bulan
        $datas = SpjBelanjaTup::where('bulan', $bulan)->get();
        $namaBulan = SpjBelanjaTup::where('bulan', $bulan)->first();


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
        
        return view('RincianTup.detail', compact('datas','namaBulan','totalAnggaranPagu','totalAnggaranBelanja','totalRencanaTup','totalRealisasiTup'));
    }
    public function export($bulan) 
    {
        return Excel::download(new DetailTupExport($bulan), 'DetailRekapTUP-' . $bulan .'.xlsx');
        
    }
}
