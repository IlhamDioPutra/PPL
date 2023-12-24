<?php

namespace App\Http\Controllers;


use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DaftarKegiatan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DaftarKegiatanExport;
use App\Imports\DaftarKegiatanImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DaftarKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DaftarKegiatan::all();
        $totalAnggaran = DaftarKegiatan::sum('anggaran');
        // $totalAnggaranAsli = 600000000;

        
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
        // $totalAnggaran = 600000000;
        // $totalAnggaranDigunakan = DaftarKegiatan::sum('anggaran') + $datas['anggaran'];
        // $totalValid = $totalAnggaran - $totalAnggaranDigunakan;

        if ($datas['anggaran'] < 0) {
            return redirect()->to('RBA/DaftarKegiatan')->with('error', 'Anggaran Dana tidak boleh negatif');
        }

        // if ($totalValid < 0){
        //     return redirect()->to('RBA/DaftarKegiatan')->with('error', 'Anggaran Kegiatan yang Anda masukkan Melebihi anggaran Dana');
        // }
        // else {

        DaftarKegiatan::create($datas);
        return redirect()->to('RBA/DaftarKegiatan')->with('success', 'Data berhasil ditambahkan');
        

    }

    /**
     * Display the specified resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id) : JsonResponse
    {
        $DaftarKegiatan = DaftarKegiatan::findOrFail($id);
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => [
                'DaftarKegiatan' => DaftarKegiatan:: findOrFail($id),
                'no_form' => $DaftarKegiatan->no_form,
                'nama_kegiatan' => $DaftarKegiatan->nama_kegiatan,
                'anggaran' => $DaftarKegiatan->anggaran,
                'rekap_ajuan_kegiatan_id' => $DaftarKegiatan->rekapAjuanKegiatan,
            ],
        ]);
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
        // $totalAnggaran = 600000000;
        // $totalAnggaranDigunakan = DaftarKegiatan::sum('anggaran') + $data['anggaran'];
        // $totalValid = $totalAnggaran - $totalAnggaranDigunakan;

        if ($data['anggaran'] < 0) {
            return redirect()->to('RBA/DaftarKegiatan')->with('error', 'Anggaran Dana tidak boleh negatif');
        }

        // if ($totalValid < 0){
        //     return redirect()->to('RBA/DaftarKegiatan')->with('error', 'Anggaran Kegiatan yang Anda masukkan Melebihi anggaran Dana');
        // }
        // else {
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
    public function export() 
    {
    return Excel::download(new DaftarKegiatanExport, 'DaftarKegiatan.xlsx');
    }

    public function import(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();

            try {
                Excel::import(new DaftarKegiatanImport,$data);
                return redirect()->back()->with('success', 'Data berhasil diimpor');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Format data yang anda masukkan salah');
            }
           
        
    }
    public function panduan() {

        return view('RBA.panduan');
    }
    public function downloadContoh() {
        $pathToFile = public_path("storage/ContohImport/Contoh_Import_DaftarKegiatan.xlsx");

        return response()->download($pathToFile);
    }
    
}
