@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
          <h6 class="ms-3">Hallo Admin</h3>
            <p class="ms-3">Informasi Rekap Data Keuangan FKIK</p>
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
                <div class="d-flex mt-3 mb-3 auto ms-11">
                    <div class="card text-white bg-primary mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL ANGGARAAN</h5>
                            <h6 class="card-text">RP.{{ $totalAnggaran }}</h6>
                        </div>
                    </div>
                
                    <div class="card text-white bg-success mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL REALISASI TUP</h5>
                            <h6 class="card-text">RP.{{ $totalBiayaTup }}</h6>
                        </div>
                    </div>
                
                    <div class="card text-white bg-success mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL REALISASI GUP</h5>
                            <h6 class="card-text">RP.{{ $totalBiayaGup }}</h6>
                        </div>
                    </div>
                
                    <div class="card text-dark bg-info mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">SISA SALDO</h5>
                            <h6 class="card-text">RP.{{ $sisaSaldo }}</h6>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <canvas id="myChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                datasets: [{
                  label: 'Jumlah Pengeluaran Anggaran RP dalam tahun ini',
                  data: [
                    {!! $dataTotal['TotalJanuari'] !!},
                    {!! $dataTotal['TotalFebruari'] !!},
                    {!! $dataTotal['TotalMaret'] !!},
                    {!! $dataTotal['TotalApril'] !!},
                    {!! $dataTotal['TotalMei'] !!},
                    {!! $dataTotal['TotalJuni'] !!},
                    {!! $dataTotal['TotalJuli'] !!},
                    {!! $dataTotal['TotalAgustus'] !!},
                    {!! $dataTotal['TotalSeptember'] !!},
                    {!! $dataTotal['TotalOktober'] !!},
                    {!! $dataTotal['TotalNovember'] !!},
                    {!! $dataTotal['TotalDesember'] !!}
                ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
          @endsection
        </main>


