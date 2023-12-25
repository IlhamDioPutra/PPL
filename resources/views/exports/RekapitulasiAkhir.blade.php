<p>REKAPITULASI AKHIR </p>
<table>
    <thead >
        <tr>
            <th>NO</th>
            <th>Bulan</th>
            <th>Realisasi SPTB TUP</th>
            <th>Realisasi SPTB GUP</th>
            <th>Realisasi PerBulan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bulans as $bulan)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $bulan }}</td>
                <td>{{ number_format($dataTup["Tup{$bulan}"], 0, ',', '.') }}</td>
                <td>{{ number_format($dataGup["Gup{$bulan}"], 0, ',', '.') }}</td>
                <td>{{ number_format($dataTotal["Total{$bulan}"], 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
        <tr>
            <th></th>
            <td>TOTAL REALISASI</td>
            <td>{{ number_format($totalBiayaTup, 0, ',', '.') }}</td>
            <td>{{ number_format($totalBiayaGup, 0, ',', '.') }}</td>
            <td>{{ number_format($totalBiaya, 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
