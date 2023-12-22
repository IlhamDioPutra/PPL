@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="row justify-content-center">
                 <h6 class=""> REKAPITULASI AKHIR </h6>
            </div>
          {{-- @include('component.pesan') --}}
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
                <span>
                    <a href="{{ route('RBA.RekapitulasiAkhir.export') }}" class="btn btn-success ms-3 mt-3">Export Rekapitulasi Akhir</a>
                </span>

              </div>
              {{-- <div style="text-align: right; margin-right: 20vw;">
                <span class="text-sm font-weight-bold">total anggaran Yang diajukan : {{ number_format($totalRekapAnggaran, 0, ",", ".") }}</span>
            </div> --}}
            <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">
                <table class="table" border="1">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light">NO</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Bulan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi SPTB TUP</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi SPTB GUP</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi PerBulan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bulans as $bulan)
                    <tr> 
                      <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                      <td class="text-sm text-secondary mb-0">{{ $bulan }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($dataTup["Tup{$bulan}"],0, ",", "." ) }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($dataGup["Gup{$bulan}"],0, ",", "." )}}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($dataTotal["Total{$bulan}"],0, ",", ".")}}</td>
                    </tr>
                    @endforeach
                    <tr border="0"> 
                        <th scope="row" class="text-sm text-secondary mb-0"></th>
                        <td class="text-sm text-secondary mb-0">TOTAL REALISASI</td>
                        <td class="text-sm text-secondary mb-0">{{ number_format($totalBiayaTup,0, ",", "." ) }}</td>
                        <td class="text-sm text-secondary mb-0">{{ number_format($totalBiayaGup,0, ",", "." )}}</td>
                        <td class="text-sm text-secondary mb-0">{{ number_format($totalBiaya,0, ",", ".")}}</td>
                    </tr>
                  </tbody>
                </form>
                </table>
            </div>
        </div>

                {{-- <div style="text-align: right; margin-right: 20vw;">
                  <span class="text-sm font-weight-bold">TOTAL ANGGARAN :  {{ number_format($totalAnggaran, 0, ",", ".") }}</span>
                </div> --}}
                </div>
              </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">

            </div>
          </div>
           <script>
            @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
           @endif 
        </script>
           <script>
            @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
           @endif 
        </script>

        
        @include('SpjBelanjaGup.script')
          @endsection
        </main>


