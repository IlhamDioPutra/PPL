<?php

namespace App\Imports;

use App\Models\RekapAjuanKegiatan;
use Maatwebsite\Excel\Concerns\ToModel;

class RekapAjuanKegiatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RekapAjuanKegiatan([
            //
        ]);
    }
}
