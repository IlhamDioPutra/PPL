<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Facades\Session;

class SpjBelanjaTupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SpjBelanjaTup::all();
        return view('SpjBelanjaTup.index',compact('datas'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKegiatans = DaftarKegiatan::all();
        return view('SpjBelanjaTup.create',compact('daftarKegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('daftar_kegiatan_id', $request->daftar_kegiatan_id);
        Session::flash('rekap_ajuan_kegiatans_id', $request->rekap_ajuan_kegiatans_id);
        Session::flash('bulan', $request->bulan);
        Session::flash('dokumen', $request->dokumen);
        Session::flash('rencana_tup', $request->rencana_tup);
        Session::flash('realisasi_tup', $request->realisasi_tup);
        $request->validate(
            [
                'daftar_kegiatan_id' => 'required|numeric',
                'rekap_ajuan_kegiatans_id' => 'required|numeric',
                'bulan' => 'required',
                'dokumen' => 'required|file',
                'rencana_tup' => 'required|numeric|gt:0',
                'realisasi_tup' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'rekap_ajuan_kegiatans_id.required' => 'Nama Sub Kegiatan WAJIB DI ISI',
                'rekap_ajuan_kegiatans_id.numeric' => 'Nama Sub Kegiatan HARUS ANGKA',
                'bulan.required' => 'NAMA BULAN WAJIB DI ISI',
                'dokumen.required' => 'NAMA DOKUMEN WAJIB DI ISI',
                'dokumen.file' => 'FILE HARUS ADA',
                'rencana_tup.required' => 'ANGGARAN RENCANA TUP WAJIB DI ISI',
                'rencana_tup.numeric' => 'ANGGARAN RENCANA TUP HARUS ANGKA',
                'rencana_tup.gt' => 'ANGGARAN RENCANA TUP HARUS LEBIH BESAR DARI 0',
                'realisai_tup.required' => 'ANGGARAN REALISASI WAJIB DI ISI',
                'realisai_tup.numeric' => 'ANGGARAN REALISASI HARUS ANGKA SAJA',
                'realisai_tup.gt' => 'ANGGARAN REALISASI HARUS LEBIH BESAR DARI 0',
            ]
        );

        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'rekap_ajuan_kegiatans_id' => $request->rekap_ajuan_kegiatans_id,
            'bulan' => $request->bulan,
            'dokumen' => $request->dokumen,
            'rencana_tup' => $request->rencana_tup,
            'biaya' => $request->biaya,
            'realisasi_tup' => $request->realisasi_tup, 
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');
        



        SpjBelanjaTup::create($datas);
        return redirect()->to('TUP/SpjBelanjaTup')->with('success', 'SPJ BELANJA TUP berhasil ditambahkan');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
