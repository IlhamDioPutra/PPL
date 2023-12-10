<?php

namespace App\Imports;

use App\Models\DaftarKegiatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;

class DaftarKegiatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new DaftarKegiatan([
            'no_form' => $row[1],
            'nama_kegiatan' => $row[2],
            'iku' => $row[3],
            'masukan_keluaran' => $row[4],
            'anggaran' => $row[5],
            'sumber_dana' => $row[6],
        ]);
    }

}
