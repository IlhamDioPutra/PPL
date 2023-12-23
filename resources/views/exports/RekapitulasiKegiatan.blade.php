<p>REKAPITULASI KEGIATAN UNIT KERJA FKIK</p>

<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>No Form</th>
            <th>Nama Kegiatan</th>
            <th>Max</th>
            <th>Belanja / Sub Kegiatan</th>
            <th>Anggaran Kegiatan</th>
            <th>Anggaran Sub Kegiatan</th>
            <th>Sumber Dana</th>
            <th>Realisasi TUP Januari</th>
            <th>Realisasi GUP Januari</th>
            <th>Realisasi TUP Februari</th>
            <th>Realisasi GUP Februari</th>
            <th>Realisasi TUP Maret</th>
            <th>Realisasi GUP Maret</th>
            <th>Realisasi TUP April</th>
            <th>Realisasi GUP April</th>
            <th>Realisasi TUP Mei</th>
            <th>Realisasi GUP Mei</th>
            <th>Realisasi TUP Juni</th>
            <th>Realisasi GUP Juni</th>
            <th>Realisasi TUP Juli</th>
            <th>Realisasi GUP Juli</th>
            <th>Realisasi TUP Agustus</th>
            <th>Realisasi GUP Agustus</th>
            <th>Realisasi TUP September</th>
            <th>Realisasi GUP September</th>
            <th>Realisasi TUP Oktober</th>
            <th>Realisasi GUP Oktober</th>
            <th>Realisasi TUP November</th>
            <th>Realisasi GUP November</th>
            <th>Realisasi TUP Desember</th>
            <th>Realisasi GUP Desember</th>
            <th>Total Realisasi Sub Kegiatan</th>
            <th>Total Realisasi Kegiatan</th>
            <th>Sisa Saldo Sub Kegiatan</th>
            <th>Sisa Saldo Sub Kegiatan</th>
            <th>Persentase Realisasi Sub Kegiatan</th>
            <th>Persentase Realisasi Kegiatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $data->no_form }}</td>
            <td>{{ $data->nama_kegiatan }}</td>
            <td>{{ $data->max }}</td>
            <td>{{ $data->belanja }}</td>
            <td>{{ number_format($data->anggaran, 0, ',', '.') }}</td>
            <td>{{ number_format($data->anggaran_kegiatan, 0, ',', '.') }}</td>
            <td>{{ $data->sumber_dana }}</td>
            <td>{{ number_format($data->realisasi_tup_januari, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_januari, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_februari, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_februari, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_maret, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_maret, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_april, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_april, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_mei, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_mei, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_juni, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_juni, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_juli, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_juli, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_agustus, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_agustus, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_september, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_september, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_oktober, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_oktober, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_november, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_november, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_tup_desember, 0, ',', '.') }}</td>
            <td>{{ number_format($data->realisasi_gup_desember, 0, ',', '.') }}</td>
            <td>{{ number_format($data->total_realisasi_subkegiatan, 0, ',', '.') }}</td>
            <td>{{ number_format($data->total_realisasi_kegiatan, 0, ',', '.') }}</td>
            <td>{{ number_format($data->sisa_saldo_subkegiatan, 0, ',', '.') }}</td>
            <td>{{ number_format($data->sisa_saldo_kegiatan, 0, ',', '.') }}</td>
            <td>{{ number_format($data->rasio_realisasi_subkegiatan, 0, ',', '.') }}%</td>
            <td>{{ number_format($data->rasio_realisasi_kegiatan, 0, ',', '.') }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>
<ul>
    <li>TOTAL ANGGARAN: Rp{{ number_format($totalAnggaran, 0, ',', '.') }} </li>
    <li>TOTAL REALISASI ANGGARAN: Rp{{ number_format($totalRealisasi, 0, ',', '.') }} </li>
    <li>SISA SALDO: Rp{{ number_format($sisaSaldo, 0, ',', '.') }} </li>
</ul>
