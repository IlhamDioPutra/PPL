<p>Data Sub Kegiatan Unit Kerja FKIK</p>
<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>No Form</th>
            <th>Max</th>
            <th>Nama Kegiatan</th>
            <th>Belanja</th>
            <th>IKU</th>
            <th>Vol</th>
            <th>Satuan</th>
            <th>Masukan / Keluaran Output</th>
            <th>Biaya</th>
            <th>Biaya Anggaran</th>
            <th>Total Anggaran</th>
            <th>Sumber Dana</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th></th>
            <td>TOTAL AJUAN ANGGARAN</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalAnggaranDiajukan, 0, '.', '.') }}</td>
            <td></td>
            <td></td>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $data->DaftarKegiatan->no_form }}</td>
            <td>{{ $data->max }}</td>
            <td>{{ $data->DaftarKegiatan->nama_kegiatan }}</td>
            <td>{{ $data->belanja }}</td>
            <td>{{ $data->DaftarKegiatan->iku }}</td>
            <td>{{ $data->vol }}</td>
            <td>{{ $data->satuan }}</td>
            <td>{{ $data->DaftarKegiatan->masukan_keluaran }}</td>
            <td>{{ number_format($data->biaya, 0, ",", ".") }}</td>
            <td>{{ number_format($data->anggaran_kegiatan, 0, ",", ".") }}</td>
            <td>{{ number_format($data->DaftarKegiatan->anggaran, 0, ",", ".") }}</td>
            <td>{{ $data->DaftarKegiatan->sumber_dana }}</td>
        </tr>
        @endforeach
        <tr>
            <th></th>
            <td>TOTAL ANGGARAN</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalAnggaran, 0, '.', '.') }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
