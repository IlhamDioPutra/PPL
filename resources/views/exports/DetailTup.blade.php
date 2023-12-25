
<p>Rincian TUP bulan {{ $namaBulan->bulan }}</p>
<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>No Form</th>
            <th>Max</th>
            <th>Nama Kegiatan</th>
            <th>PAGU Kegiatan</th>
            <th>Belanja</th>
            <th>PAGU Belanja</th>
            <th>Rencana TUP</th>
            <th>Realisasi TUP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $data->DaftarKegiatan->no_form }}</td>
                <td>{{ $data->RekapAjuanKegiatan->max }}</td>
                <td>{{ $data->DaftarKegiatan->nama_kegiatan }}</td>
                <td>{{ number_format($data->DaftarKegiatan->anggaran, 0, ',', '.') }}</td>
                <td>{{ $data->RekapAjuanKegiatan->belanja }}</td>
                <td>{{ number_format($data->RekapAjuanKegiatan->anggaran_kegiatan, 0, ',', '.') }}</td>
                <td>{{ number_format($data->rencana_tup, 0, ',', '.') }}</td>
                <td>{{ number_format($data->realisasi_tup, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <th></th>
                <td>Total Anggaran</td>
                <td></td>
                <td></td>
                <td>{{ number_format($totalAnggaranPagu, 0, ',', '.') }}</td>
                <td></td>
                <td>{{ number_format($totalAnggaranBelanja, 0, ',', '.') }}</td>
                <td>{{ number_format($totalRencanaTup, 0, ',', '.') }}</td>
                <td>{{ number_format($totalRealisasiTup, 0, ',', '.') }}</td>
            </tr>

    </tbody>
</table>
