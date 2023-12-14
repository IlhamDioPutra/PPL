<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarKegiatan;
use App\Models\RekapAjuanKegiatan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Exports\RekapAjuanKegiatanExport;
use App\Imports\RekapAjuanKegiatanImport;

class RekapAjuanKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = RekapAjuanKegiatan::all();
        $totalAnggaran = DaftarKegiatan::sum('anggaran');
        $totalRekapAnggaran = RekapAjuanKegiatan::sum('anggaran_kegiatan');
        // $totalAnggaranAsli = 600000000;

        
        return view('RekapAjuanKegiatan.index', compact('datas', 'totalAnggaran','totalRekapAnggaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKegiatans = DaftarKegiatan::all();
        return view('RekapAjuanKegiatan.create',compact('daftarKegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('daftar_kegiatan_id', $request->daftar_kegiatan_id);
        Session::flash('max', $request->max);
        Session::flash('vol', $request->vol);
        Session::flash('satuan', $request->satuan);
        Session::flash('biaya', $request->biaya);
        $request->validate(
            [
                'daftar_kegiatan_id' => 'required|numeric',
                'max' => 'required|numeric|gt:0',
                'belanja' => 'required',
                'vol' => 'required|numeric|gt:0',
                'satuan' => 'required',
                'biaya' => 'required|numeric|gt:0',
            ],
            [
                'daftar_kegiatan_id.required' => 'NO FORM WAJIB DI ISI',
                'daftar_kegiatan_id.numeric' => 'NO FORM HARUS ANGKA',
                'max.required' => 'NAMA KEGIATAN WAJIB DI ISI',
                'max.numeric' => 'NO MAX HARUS ANGKA',
                'max.gt' => 'NO MAX HARUS LEBIH BESAR DARI 0',
                'belanja.required' => 'NAMA BELANJA WAJIB DI ISI',
                'vol.required' => 'MASUKAN / KELUARAN WAJIB DI ISI',
                'vol.numeric' => 'MASUKAN / KELUARAN HARUS ANGKA',
                'vol.gt' => 'MASUKAN / KELUARAN HARUS LEBIH BESAR DARI 0',
                'satuan.required' => 'KETERANGAN SATUAN WAJIB DI ISI',
                'biaya.required' => 'BIAYA PER SATUAN WAJIB DI ISI',
                'biaya.numeric' => 'BIAYA PER SATUAN HARUS ANGKA SAJA',
                'biaya.gt' => 'BIAYA PER SATUAN HARUS LEBIH BESAR DARI 0',
            ]
        );

        
        $datas = [
            'daftar_kegiatan_id' => $request->daftar_kegiatan_id,
            'max' => $request->max,
            'belanja' => $request->belanja,
            'vol' => $request->vol,
            'satuan' => $request->satuan,
            'biaya' => $request->biaya,
            'anggaran_kegiatan' => $request->biaya * $request->vol, 
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');
        
        $anggaranTotal = DaftarKegiatan::where('id', $datas['daftar_kegiatan_id'])
                    ->value('anggaran');
        
        $totalAnggaranKegiatan = RekapAjuanKegiatan::where('daftar_kegiatan_id', $datas['daftar_kegiatan_id'])
            ->sum('anggaran_kegiatan');
        $anggaranDimasukkan = $datas['anggaran_kegiatan'] + $totalAnggaranKegiatan;


        if ($anggaranDimasukkan > $anggaranTotal ) {
            return redirect()->to('RBA/RekapAjuanKegiatan')->with('error', 'Data rekap yang anda masukkan melebihi Total Anggaran Kegiatan');
        }
        

        // if ($totalValid < 0){
        //     return redirect()->to('RBA/DaftarKegiatan')->with('error', 'Anggaran Kegiatan yang Anda masukkan Melebihi anggaran Dana');
        // }
        // else {

        RekapAjuanKegiatan::create($datas);
        return redirect()->to('RBA/RekapAjuanKegiatan')->with('success', 'Rekap Data berhasil ditambahkan');
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
        $data = RekapAjuanKegiatan::where('id', $id)->first();
        return view('RekapAjuanKegiatan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [

                'max' => 'required|numeric|gt:0',
                'belanja' => 'required',
                'vol' => 'required|numeric|gt:0',
                'satuan' => 'required',
                'biaya' => 'required|numeric|gt:0',
            ],
            [
                'max.required' => 'NAMA KEGIATAN WAJIB DI ISI',
                'max.numeric' => 'NO MAX HARUS ANGKA',
                'max.gt' => 'NO MAX HARUS LEBIH BESAR DARI 0',
                'belanja.required' => 'NAMA BELANJA WAJIB DI ISI',
                'vol.required' => 'MASUKAN / KELUARAN WAJIB DI ISI',
                'vol.numeric' => 'MASUKAN / KELUARAN HARUS ANGKA',
                'vol.gt' => 'MASUKAN / KELUARAN HARUS LEBIH BESAR DARI 0',
                'satuan.required' => 'KETERANGAN SATUAN WAJIB DI ISI',
                'biaya.required' => 'BIAYA PER SATUAN WAJIB DI ISI',
                'biaya.numeric' => 'BIAYA PER SATUAN HARUS ANGKA SAJA',
                'biaya.gt' => 'BIAYA PER SATUAN HARUS LEBIH BESAR DARI 0',
            ]
        );
        $data = RekapAjuanKegiatan::where('id', $id)->first();

        
        $dataUpdate = [
            'daftar_kegiatan_id' => $data->daftar_kegiatan_id,
            'max' => $request->max,
            'belanja' => $request->belanja,
            'vol' => $request->vol,
            'satuan' => $request->satuan,
            'biaya' => $request->biaya,
            'anggaran_kegiatan' => $request->biaya * $request->vol, 
        ];

        // $anggaranTotal = RekapAjuanKegiatan::with('daftarKegiatan')
        //     ->where('id', $datas['daftar_kegiatan_id'])
        //     ->value('daftar_kegiatan.anggaran');

        
        
        $anggaranTotal = DaftarKegiatan::where('id', $dataUpdate['daftar_kegiatan_id'])
                    ->value('anggaran');
        
        $totalAnggaranKegiatan = RekapAjuanKegiatan::where('daftar_kegiatan_id', $dataUpdate['daftar_kegiatan_id'])
            ->sum('anggaran_kegiatan');
        $anggaranDimasukkan = $dataUpdate['anggaran_kegiatan'] + $totalAnggaranKegiatan;


        if ($anggaranDimasukkan > $anggaranTotal ) {
            return redirect()->to('RBA/RekapAjuanKegiatan')->with('error', 'Data rekap yang anda masukkan melebihi Total Anggaran Kegiatan');
        }

        RekapAjuanKegiatan::where('id', $id)->update($dataUpdate); 
        return redirect()->to('RBA/RekapAjuanKegiatan')->with('success', 'Rekap Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RekapAjuanKegiatan::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $data->delete();

        // Berikan respons sukses jika penghapusan berhasil
        return redirect()->to('RBA/RekapAjuanKegiatan')->with('success','Data berhasil dihapus');
    }

    public function export() 
    {
        return Excel::download(new RekapAjuanKegiatanExport, 'RekapAjuanKegiatan.xlsx');
    }

    public function import(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();

        $data->move('RekapAjuanKegiatan',$namafile);

    

            Excel::import(new RekapAjuanKegiatanImport, \public_path('/RekapAjuanKegiatan/'.$namafile));
            return redirect()->back()->with('success', 'Rekap Data berhasil diimpor');

        
        
    }
        
}

