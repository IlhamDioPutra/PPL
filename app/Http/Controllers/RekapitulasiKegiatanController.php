<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaGup;
use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapitulasiKegiatanExport;

class RekapitulasiKegiatanController extends Controller
{
    public function index() {
        $datas = DB::table(DB::raw('(SELECT 
        daftar_kegiatan.id,
		rekap_ajuan_kegiatans.id as rekapID,
        daftar_kegiatan.no_form,
        daftar_kegiatan.nama_kegiatan,
        CASE WHEN rekap_ajuan_kegiatans.max IS NOT NULL THEN rekap_ajuan_kegiatans.max ELSE 0 END AS max,
        CASE WHEN rekap_ajuan_kegiatans.belanja IS NOT NULL THEN rekap_ajuan_kegiatans.belanja ELSE 0 END AS belanja,
        daftar_kegiatan.anggaran,
        COALESCE(rekap_ajuan_kegiatans.anggaran_kegiatan, 0) AS anggaran_kegiatan,
        daftar_kegiatan.sumber_dana,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Januari" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_januari,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Januari" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_januari,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Februari" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_februari,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Februari" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_februari,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Maret" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_maret,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Maret" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_maret,
        MAX(CASE WHEN spj_belanja_tups.bulan = "April" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_april,
        MAX(CASE WHEN spj_belanja_gups.bulan = "April" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_april,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Mei" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_mei,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Mei" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_mei,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Juni" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_juni,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Juni" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_juni,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Juli" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_juli,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Juli" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_juli,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Agustus" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_agustus,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Agustus" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_agustus,
        MAX(CASE WHEN spj_belanja_tups.bulan = "September" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_september,
        MAX(CASE WHEN spj_belanja_gups.bulan = "September" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_september,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Oktober" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_oktober,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Oktober" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_oktober,
        MAX(CASE WHEN spj_belanja_tups.bulan = "November" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_november,
        MAX(CASE WHEN spj_belanja_gups.bulan = "November" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_november,
        MAX(CASE WHEN spj_belanja_tups.bulan = "Desember" THEN spj_belanja_tups.realisasi_tup ELSE 0 END) AS realisasi_tup_desember,
        MAX(CASE WHEN spj_belanja_gups.bulan = "Desember" THEN spj_belanja_gups.biaya ELSE 0 END) AS realisasi_gup_desember,

        -- Hitung total_realisasi_subkegiatan
        SUM(
        COALESCE(spj_belanja_tups.realisasi_tup, 0) +
        COALESCE(spj_belanja_gups.biaya, 0)
						) AS total_realisasi_subkegiatan,
						
				COALESCE(rekap_ajuan_kegiatans.anggaran_kegiatan, 0) - SUM(
        COALESCE(spj_belanja_tups.realisasi_tup, 0) +
        COALESCE(spj_belanja_gups.biaya, 0)
						) AS sisa_saldo_subkegiatan,
						
				SUM(
    COALESCE(spj_belanja_tups.realisasi_tup, 0) +
    COALESCE(spj_belanja_gups.biaya, 0)
) 	/
		CASE WHEN rekap_ajuan_kegiatans.anggaran_kegiatan = 0 THEN 1
    ELSE rekap_ajuan_kegiatans.anggaran_kegiatan
		END AS rasio_realisasi_subkegiatan

    FROM 
        daftar_kegiatan 
    LEFT JOIN 
        rekap_ajuan_kegiatans ON daftar_kegiatan.id = rekap_ajuan_kegiatans.daftar_kegiatan_id
    LEFT JOIN
        spj_belanja_tups ON daftar_kegiatan.id = spj_belanja_tups.daftar_kegiatan_id AND rekap_ajuan_kegiatans.id = spj_belanja_tups.rekap_ajuan_kegiatan_id
    LEFT JOIN
        spj_belanja_gups ON daftar_kegiatan.id = spj_belanja_gups.daftar_kegiatan_id AND rekap_ajuan_kegiatans.id = spj_belanja_gups.rekap_ajuan_kegiatan_id
    GROUP BY
        daftar_kegiatan.id, rekap_ajuan_kegiatans.id, daftar_kegiatan.no_form, daftar_kegiatan.nama_kegiatan, rekap_ajuan_kegiatans.max, rekap_ajuan_kegiatans.belanja, daftar_kegiatan.anggaran, rekap_ajuan_kegiatans.anggaran_kegiatan, daftar_kegiatan.sumber_dana) AS subquery'))
    ->select(
        'subquery.no_form',
        'subquery.nama_kegiatan',
        'subquery.max',
        'subquery.belanja',
        'subquery.anggaran',
        'subquery.anggaran_kegiatan',
        'subquery.sumber_dana',
        
        'subquery.realisasi_tup_januari',
        'subquery.realisasi_gup_januari',
        'subquery.realisasi_tup_februari',
        'subquery.realisasi_gup_februari',
        'subquery.realisasi_tup_maret',
        'subquery.realisasi_gup_maret',
        'subquery.realisasi_tup_april',
        'subquery.realisasi_gup_april',
        'subquery.realisasi_tup_mei',
        'subquery.realisasi_gup_mei',
        'subquery.realisasi_tup_juni',
        'subquery.realisasi_gup_juni',
        'subquery.realisasi_tup_juli',
        'subquery.realisasi_gup_juli',
        'subquery.realisasi_tup_agustus',
        'subquery.realisasi_gup_agustus',
        'subquery.realisasi_tup_september',
        'subquery.realisasi_gup_september',
        'subquery.realisasi_tup_oktober',
        'subquery.realisasi_gup_oktober',
        'subquery.realisasi_tup_november',
        'subquery.realisasi_gup_november',
        'subquery.realisasi_tup_desember',
        'subquery.realisasi_gup_desember',
        'subquery.total_realisasi_subkegiatan',

        // Hitung total_realisasi_kegiatan berdasarkan total_realisasi_subkegiatan
        DB::raw('SUM(subquery.total_realisasi_subkegiatan) OVER (PARTITION BY subquery.id) AS total_realisasi_kegiatan'),
        DB::raw('subquery.sisa_saldo_subkegiatan'),
        DB::raw('subquery.anggaran - SUM(subquery.total_realisasi_subkegiatan) OVER (PARTITION BY subquery.id) AS sisa_saldo_kegiatan'),
        DB::raw('COALESCE(subquery.rasio_realisasi_subkegiatan, 0) * 100 AS rasio_realisasi_subkegiatan'),
        DB::raw('COALESCE(SUM(subquery.total_realisasi_subkegiatan) OVER (PARTITION BY subquery.id) / subquery.anggaran, 0 ) * 100 AS rasio_realisasi_kegiatan')
    )
    ->orderBy('subquery.id')
    ->orderBy('subquery.rekapID')
    ->get();
    //total Anggaran
    $totalAnggaran = DaftarKegiatan::sum('anggaran');

    //TotalRealisasi
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
        $totalRealisasi = array_sum($dataTotal);

        //Sisa Saldo
        $sisaSaldo = $totalAnggaran - $totalRealisasi;

        return view('RekapitulasiKegiatan.index',compact('datas','totalAnggaran','totalRealisasi','sisaSaldo'));
    }
    public function export() 
    {
        return Excel::download(new RekapitulasiKegiatanExport, 'RekapitulasiKegiatan.xlsx');
    }
}
