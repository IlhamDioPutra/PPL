<p>Data Daftar Kegiatan Unit Kerja FKIK</p>

<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>No Form</th>
            <th>Nama Kegiatan</th>
            <th>IKU</th>
            <th>Masukan / Keluaran Output</th>
            <th>Anggaran</th>
            <th>Sumber Dana</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th></th>
            <td>TOTAL ANGGARAN</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalAnggaran, 0, ',', '.') }}</td>
            <td></td>
        </tr>
        @foreach ($datas as $data)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $data->no_form }}</td>
                <td>{{ $data->nama_kegiatan }}</td>
                <td>{{ $data->iku }}</td>
                <td>{{ $data->masukan_keluaran }}</td>
                <td>{{ number_format($data->anggaran, 0, '.', '.') }}</td>
                <td>{{ $data->sumber_dana }}</td>
            </tr>
        @endforeach
        <tr>
            <th></th>
            <td>TOTAL REALISASI</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalAnggaran, 0, ',', '.') }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
