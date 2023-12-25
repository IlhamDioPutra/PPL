<?php

namespace App\Imports;

use App\Models\DaftarKegiatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DaftarKegiatanImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        return new DaftarKegiatan( [
            'no_form' => $row['output_no_form'],
            'nama_kegiatan' => $row['nama_kegiatan'],
            'iku' => $row['iku'],
            'masukan_keluaran' => $row['masukan_keluaran_satuan'],
            'anggaran' => $row['anggaran'],
            'sumber_dana' => $row['sd']
        ]);
    } 
    
    public function rules(): array 
    {
        return[
            '*.output_no_form' => ['unique:daftar_kegiatan,no_form'],
            '*.nama_kegiatan' => ['unique:daftar_kegiatan,nama_kegiatan']

        ];

    }

}
   
