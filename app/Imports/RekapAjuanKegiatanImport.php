<?php

namespace App\Imports;

use App\Models\DaftarKegiatan;
use App\Models\RekapAjuanKegiatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RekapAjuanKegiatanImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
             // Cari ID Daftar Kegiatan berdasarkan no_form
            // Cari ID Daftar Kegiatan berdasarkan no_form
        $daftarKegiatan = DaftarKegiatan::where('no_form', $row['no_form'])->first();

        // Cek apakah jumlah anggaran_kegiatan sudah melebihi anggaran di DaftarKegiatan
        $totalAnggaranKegiatan = RekapAjuanKegiatan::where('daftar_kegiatan_id', $daftarKegiatan->id)
            ->sum('anggaran_kegiatan');

        $anggaranYangAkanDiimpor = $row['anggaran'];

        if (($totalAnggaranKegiatan + $anggaranYangAkanDiimpor) <= $daftarKegiatan->anggaran) {
            // Jika tidak melebihi anggaran, buat data baru
            $datas = [
                'max' => $row['mak'],
                'belanja' => $row['belanja'],
                'vol' => $row['vol'],
                'satuan' => $row['satuan'],
                'biaya' => $row['biaya'],
                'anggaran_kegiatan' => $row['anggaran'],
                'daftar_kegiatan_id' => $daftarKegiatan->id,
            ];
            RekapAjuanKegiatan::create($datas);
        } 
        }
    }
}
