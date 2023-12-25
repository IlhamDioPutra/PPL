@extends('app.main')
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold mb-0">Halo, Administrator</h3>
                        <p class="mb-0">Ayo Data Pengeluaran FKIK UNIB!</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="row my-4 mb-5">
            <div class="col-lg-12">
                <div class="card shadow-xs border">
                    <div class="card-body py-3 text-center">
                        <!-- Container for photo and explanation -->
                        <div class="d-flex flex-row align-items-left">
                            <img src="../assets/img/fkik.jpg" alt="FKIK" style="max-width: 50%; max-height: 100%;" class="img-fluid mb-3 me-3">
                            <div class="text-start">
                                <p class="mb-3 text-justify">
                                    Sistem Informasi Keuangan FKIK (E-Financial FKIK) merupakan solusi inovatif yang diterapkan oleh Fakultas Kedokteran dan Ilmu Kesehatan (FKIK) untuk efisiensi dan transparansi manajemen keuangan. E-Financial FKIK bertujuan untuk meningkatkan efisiensi, akurasi, dan transparansi dalam pengelolaan keuangan fakultas.
                                </p>
                                <p class="mb-0 text-justify">
                                    Sistem ini mengintegrasikan berbagai aspek keuangan, termasuk anggaran, pengeluaran, dan pelaporan keuangan, dalam satu platform terpusat. Dengan menggunakan E-Financial FKIK, pihak terkait memiliki akses yang mudah dan cepat terhadap informasi keuangan. Hal ini memungkinkan keterbukaan dan transparansi dalam setiap transaksi keuangan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="card-body px-0 py-0">
                <div class="d-flex mt-3 mb-3 auto ms-11">
                    <div class="card text-white bg-primary mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">Total Anggaran</h5>
                            <h6 class="card-text">RP.{{ $totalAnggaran }}</h6>
                        </div>
                    </div>

                    <div class="card text-white bg-primary mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">Total Realisasi TUP</h5>
                            <h6 class="card-text">RP.{{ $totalBiayaTup }}</h6>
                        </div>
                    </div>

                    <div class="card text-white bg-primary mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">Total Realisasi GUP</h5>
                            <h6 class="card-text">RP.{{ $totalBiayaGup }}</h6>
                        </div>
                    </div>

                    <div class="card text-white bg-primary mb-3 mx-2" style="max-width: 21vw;">
                        <div class="card-body">
                            <h5 class="card-title">Sisa Saldo</h5>
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
          @include('partial.footer')
          @endsection
        </main>


