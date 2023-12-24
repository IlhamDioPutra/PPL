<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaTup;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SpjBelanjaTupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SpjBelanjaTup::all();
        $totalAnggaran = SpjBelanjaTup::sum('realisasi_tup');
        return view('SpjBelanjaTup.index',compact('datas','totalAnggaran'));
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
        // Session::flash('daftar_kegiatan_id', $request->daftar_kegiatan_id);
        // Session::flash('rekap_ajuan_kegiatans_id', $request->rekap_ajuan_kegiatans_id);
        // Session::flash('bulan', $request->bulan);
        // Session::flash('dokumen', $request->dokumen);
        // Session::flash('rencana_tup', $request->rencana_tup);
        // Session::flash('realisasi_tup', $request->realisasi_tup);
        $request->validate(
            [
                'daftar_kegiatan_id' => 'required|numeric',
                'rekap_ajuan_kegiatan_id' => 'required|numeric',
                'bulan' => 'required',
                'dokumen' => 'required|file',
                'rencana_tup' => 'required|numeric|gt:0',
                'realisasi_tup' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'rekap_ajuan_kegiatan_id.required' => 'Nama Sub Kegiatan WAJIB DI ISI',
                'rekap_ajuan_kegiatan_id.numeric' => 'Nama Sub Kegiatan HARUS ANGKA',
                'bulan.required' => 'NAMA BULAN WAJIB DI ISI',
                'dokumen.required' => 'NAMA DOKUMEN WAJIB DI ISI',
                'dokumen.file' => 'FILE HARUS ADA',
                'rencana_tup.required' => 'ANGGARAN RENCANA TUP WAJIB DI ISI',
                'rencana_tup.numeric' => 'ANGGARAN RENCANA TUP HARUS ANGKA',
                'rencana_tup.gt' => 'ANGGARAN RENCANA TUP HARUS LEBIH BESAR DARI 0',
                'realisasi_tup.required' => 'ANGGARAN REALISASI WAJIB DI ISI',
                'realisasi_tup.numeric' => 'ANGGARAN REALISASI HARUS ANGKA SAJA',
                'realisasi_tup.gt' => 'ANGGARAN REALISASI HARUS LEBIH BESAR DARI 0',
            ]
        );

        $file = $request->file('dokumen');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $dokumenFile = $file->storeAs('SPJBelanjaTup', $namaFile);


        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'rekap_ajuan_kegiatan_id' => $request->rekap_ajuan_kegiatan_id,
            'bulan' => $request->bulan,
            'dokumen' => $dokumenFile,
            'rencana_tup' => $request->rencana_tup,
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
        $data = SpjBelanjaTup::where('id', $id)->first();
        $daftarKegiatans = DaftarKegiatan::all();
        return view('SpjBelanjaTup.edit', compact('data','daftarKegiatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'daftar_kegiatan_id' => 'required|numeric',
                'rekap_ajuan_kegiatan_id' => 'required|numeric',
                'bulan' => 'required',
                'dokumen' => 'required|file',
                'rencana_tup' => 'required|numeric|gt:0',
                'realisasi_tup' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'rekap_ajuan_kegiatan_id.required' => 'Nama Sub Kegiatan WAJIB DI ISI',
                'rekap_ajuan_kegiatan_id.numeric' => 'Nama Sub Kegiatan HARUS ANGKA',
                'bulan.required' => 'NAMA BULAN WAJIB DI ISI',
                'dokumen.required' => 'NAMA DOKUMEN WAJIB DI ISI',
                'dokumen.file' => 'FILE HARUS ADA',
                'rencana_tup.required' => 'ANGGARAN RENCANA TUP WAJIB DI ISI',
                'rencana_tup.numeric' => 'ANGGARAN RENCANA TUP HARUS ANGKA',
                'rencana_tup.gt' => 'ANGGARAN RENCANA TUP HARUS LEBIH BESAR DARI 0',
                'realisasi_tup.required' => 'ANGGARAN REALISASI WAJIB DI ISI',
                'realisasi_tup.numeric' => 'ANGGARAN REALISASI HARUS ANGKA SAJA',
                'realisasi_tup.gt' => 'ANGGARAN REALISASI HARUS LEBIH BESAR DARI 0',
            ]
        );

        $file = $request->file('dokumen');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $dokumenFile = $file->storeAs('SPJBelanjaTup', $namaFile);


        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'rekap_ajuan_kegiatan_id' => $request->rekap_ajuan_kegiatan_id,
            'bulan' => $request->bulan,
            'dokumen' => $dokumenFile,
            'rencana_tup' => $request->rencana_tup,
            'realisasi_tup' => $request->realisasi_tup, 
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');
        



        SPJBelanjaTup::where('id', $id)->update($datas); 
        return redirect()->to('TUP/SPJBelanjaTup')->with('success', 'Data TUP Berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SPJBelanjaTup::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
        $data->delete();
        
        Storage::delete('public/'. $data->dokumen);

        // Berikan respons sukses jika penghapusan berhasil
        return redirect()->to('TUP/SPJBelanjaTup')->with('success','Data Belanja TUP berhasil dihapus');
    }

    public function downloadTup($id)
    {
        $spj = SpjBelanjaTup::findOrFail($id);
        $pathToFile = public_path("storage/{$spj->dokumen}");

        return response()->download($pathToFile);
    }
}
