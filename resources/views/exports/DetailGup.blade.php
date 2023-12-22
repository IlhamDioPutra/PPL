<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>No Form</th>
            <th>Nama Kegiatan</th>
            <th>Mak</th>
            <th>Belanja</th>
            <th>Total Biaya</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->no_form }}</td>
                <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->nama_kegiatan }}</td>
                <td class="text-sm text-secondary mb-0">{{ $data->RekapAjuanKegiatan->max }}</td>
                <td class="text-sm text-secondary mb-0">{{ $data->RekapAjuanKegiatan->belanja }}</td>
                <td class="text-sm text-secondary mb-0">{{ number_format($data->biaya, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row" class="text-sm text-secondary mb-0"></th>
            <td class="text-sm text-secondary mb-0">JUMLAH</td>
            <td class="text-sm text-secondary mb-0"></td>
            <td class="text-sm text-secondary mb-0"></td>
            <td class="text-sm text-secondary mb-0"></td>
            <td class="text-sm text-secondary mb-0">{{ number_format($totalBiaya, 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
