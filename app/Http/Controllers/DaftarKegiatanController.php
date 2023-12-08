<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarKegiatan;
use Illuminate\Support\Facades\Session;

class DaftarKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DaftarKegiatan::all();
        $totalAnggaran = DaftarKegiatan::sum('anggaran');
        return view('RBA.index', compact('datas', 'totalAnggaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('RBA.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Disini adalah kondisi di dalam mengisi data yaitu :
        Session::flash('no_form', $request->no_form);
        Session::flash('nama_kegiatan', $request->nama_kegiatan);
        Session::flash('iku', $request->iku);
        Session::flash('masukan_keluaran', $request->masukan_keluaran);
        Session::flash('anggaran', $request->anggaran);
        Session::flash('sumber_dana', $request->sumber_dana);
        $request->validate(
            [
                'no_form' => 'required|unique:daftar_kegiatan,no_form',
                'nama_kegiatan' => 'required|unique:daftar_kegiatan,nama_kegiatan',
                'iku' => 'required',
                'masukan_keluaran' => 'required',
                'anggaran' => 'required|numeric',
                'sumber_dana' => 'required',
            ],
            [
                'no_form.required' => 'NO FORM WAJIB DI ISI',
                'no_form.unique' => 'NO FORM YANG DI INPUT TELAH DIGUNAKAN',
                'nama_kegiatan.required' => 'NAMA KEGIATAN WAJIB DI ISI',
                'nama_kegiatan.unique' => 'NAMA KEGIATAN YANG DI INPUT TELAH DIGUNAKAN',
                'iku.required' => 'NAMA IKU WAJIB DI ISI',
                'masukan_keluaran.required' => 'MASUKAN / KELUARAN WAJIB DI ISI',
                'anggaran.required' => 'JUMLAH ANGGARAN WAJIB DI ISI',
                'anggaran.numeric' => 'INPUT YANG DIMASUKKAN HARUS ANGKA SAJA',
                'sumber_dana.required' => 'SUMBER DANA WAJIB DI ISI',
            ]
        );
        $datas = [
            'no_form' => $request->no_form,
            'nama_kegiatan' => $request->nama_kegiatan,
            'iku' => $request->iku,
            'masukan_keluaran' => $request->masukan_keluaran,
            'anggaran' => $request->anggaran,
            'sumber_dana' => $request->sumber_dana,
        ];
        DaftarKegiatan::create($datas);
        return redirect()->to('RBA/DaftarKegiatan')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */

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
    public function edit($id)
    {
        $data = DaftarKegiatan::where('no_form', $id)->first();
        return view('RBA.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'iku' => 'required',
                'masukan_keluaran' => 'required',
                'anggaran' => 'required|numeric',
                'sumber_dana' => 'required',
            ],
            [
                'iku.required' => 'NAMA IKU WAJIB DI ISI',
                'masukan_keluaran.required' => 'MASUKAN / KELUARAN WAJIB DI ISI',
                'anggaran.required' => 'JUMLAH ANGGARAN WAJIB DI ISI',
                'anggaran.numeric' => 'INPUT YANG DIMASUKKAN HARUS ANGKA SAJA',
                'sumber_dana.required' => 'SUMBER DANA WAJIB DI ISI',
            ]
        );
        $data = [
            'iku' => $request->iku,
            'masukan_keluaran' => $request->masukan_keluaran,
            'anggaran' => $request->anggaran,
            'sumber_dana' => $request->sumber_dana,
        ];
        DaftarKegiatan::where('no_form', $id)->update($data); 
        return redirect()->to('RBA/DaftarKegiatan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DaftarKegiatan::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $data->delete();

        // Berikan respons sukses jika penghapusan berhasil
        return redirect()->to('RBA/DaftarKegiatan')->with('success','Data berhasil dihapus');
    }
    
}
