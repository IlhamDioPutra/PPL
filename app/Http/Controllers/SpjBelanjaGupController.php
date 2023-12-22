<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpjBelanjaGup;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Facades\Storage;

class SpjBelanjaGupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SpjBelanjaGup::all();
        return view('SpjBelanjaGup.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKegiatans = DaftarKegiatan::all();
        return view('SpjBelanjaGup.create',compact('daftarKegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'daftar_kegiatan_id' => 'required|numeric',
                'rekap_ajuan_kegiatan_id' => 'required|numeric',
                'bulan' => 'required',
                'dokumen' => 'required|file',
                'biaya' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'rekap_ajuan_kegiatan_id.required' => 'Nama Sub Kegiatan WAJIB DI ISI',
                'rekap_ajuan_kegiatan_id.numeric' => 'Nama Sub Kegiatan HARUS ANGKA',
                'bulan.required' => 'NAMA BULAN WAJIB DI ISI',
                'dokumen.required' => 'NAMA DOKUMEN WAJIB DI ISI',
                'dokumen.file' => 'FILE HARUS ADA',
                'biaya.required' => 'Biaya Kegiatan GUP WAJIB DI ISI',
                'biaya.numeric' => 'Biaya Kegiatan GUP HARUS ANGKA',
                'biaya.gt' => 'Biaya Kegiatan GUP HARUS LEBIH BESAR DARI 0',
            ]
        );

        $file = $request->file('dokumen');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $dokumenFile = $file->storeAs('SPJBelanjaGup', $namaFile);


        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'rekap_ajuan_kegiatan_id' => $request->rekap_ajuan_kegiatan_id,
            'bulan' => $request->bulan,
            'dokumen' => $dokumenFile,
            'biaya' => $request->biaya,
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');
        



        SpjBelanjaGup::create($datas);
        return redirect()->to('GUP/SpjBelanjaGup')->with('success', 'SPJ BELANJA TUP berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SpjBelanjaGup::where('id', $id)->first();
        $daftarKegiatans = DaftarKegiatan::all();
        return view('SpjBelanjaGup.edit', compact('data','daftarKegiatans'));
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
                'biaya' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'rekap_ajuan_kegiatan_id.required' => 'Nama Sub Kegiatan WAJIB DI ISI',
                'rekap_ajuan_kegiatan_id.numeric' => 'Nama Sub Kegiatan HARUS ANGKA',
                'bulan.required' => 'NAMA BULAN WAJIB DI ISI',
                'dokumen.required' => 'NAMA DOKUMEN WAJIB DI ISI',
                'dokumen.file' => 'FILE HARUS ADA',
                'biaya.required' => 'Biaya Kegiatan GUP WAJIB DI ISI',
                'biaya.numeric' => 'Biaya Kegiatan GUP HARUS ANGKA',
                'biaya.gt' => 'Biaya Kegiatan GUP HARUS LEBIH BESAR DARI 0',
            ]
        );

        $file = $request->file('dokumen');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $dokumenFile = $file->storeAs('SPJBelanjaGup', $namaFile);


        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'rekap_ajuan_kegiatan_id' => $request->rekap_ajuan_kegiatan_id,
            'bulan' => $request->bulan,
            'dokumen' => $dokumenFile,
            'biaya' => $request->biaya,
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');
        



        SPJBelanjaGup::where('id', $id)->update($datas); 
        return redirect()->to('GUP/SpjBelanjaGup')->with('success', 'Data GUP Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SPJBelanjaGup::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
        $data->delete();
        
        Storage::delete('public/'. $data->dokumen);

        // Berikan respons sukses jika penghapusan berhasil
        return redirect()->to('GUP/SpjBelanjaGup')->with('success','Data Belanja TUP berhasil dihapus');
    }
    public function downloadGup($id)
    {
        $gup = SpjBelanjaGup::findOrFail($id);
        $pathToFile = public_path("storage/{$gup->dokumen}");

        return response()->download($pathToFile);
    }
}
