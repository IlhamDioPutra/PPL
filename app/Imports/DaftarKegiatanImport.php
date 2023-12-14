<?php

namespace App\Imports;

use App\Models\DaftarKegiatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;

class DaftarKegiatanImport implements ToModel
{
    private $totalAnggaranImported = 0;
    /**
    * @param array $row
    
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         // Menghitung total anggaran yang diimpor
        //  $this->totalAnggaranImported += (int)$row[5];

        //  // Menghitung total anggaran keseluruhan (termasuk yang sudah ada di database)
        //  $totalAnggaranDigunakan = DaftarKegiatan::sum('anggaran');
        //  $totalAnggaranRealisasi = $this->totalAnggaranImported + $totalAnggaranDigunakan;
 
        //  // Menetapkan batasan anggaran
        //  $batasanAnggaran = 600000000;
 
        //  // Memeriksa apakah total anggaran melebihi batasan
        //  if ($totalAnggaranRealisasi > $batasanAnggaran) {
        //      // Jika melebihi batasan, kembalikan null (tidak membuat instance model)
        //      return null;
        //  }
 
         // Jika tidak melebihi batasan, buat dan kembalikan instance model DaftarKegiatan
         return new DaftarKegiatan([
             'no_form' => $row[1],
             'nama_kegiatan' => $row[2],
             'iku' => $row[3],
             'masukan_keluaran' => $row[4],
             'anggaran' => $row[5],
             'sumber_dana' => $row[6],
         ]);

    }
    public function getTotalAnggaranImported()
    {
        return $this->totalAnggaranImported;
    }

}
