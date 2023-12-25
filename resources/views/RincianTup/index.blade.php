@extends('app.main')
@section('pageTitle', 'Manajemen TUP')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="row justify-content-center">
                 <h6 class="text-center" style="padding-top: 15px;margin-bottom: 8px;margin-top: 8px;margin-left: 15px;"> RINCIAN TUP </h6>
            </div>
          {{-- @include('component.pesan') --}}
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">

              </div>
              {{-- <div style="text-align: right; margin-right: 20vw;">
                <span class="text-sm font-weight-bold">total anggaran Yang diajukan : {{ number_format($totalRekapAnggaran, 0, ",", ".") }}</span>
            </div> --}}
            <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">
                <table class="table">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light">NO</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Nama Bulan</th>
                      <th scope="col" class="text-secondary text-center text-sm font-weight-bold opacity-7 border-light ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($bulans) === 0)


                    @else
                    @foreach ($bulans as $bulan)
                    <tr>
                      <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                      <td class="text-sm text-secondary mb-0">{{ $bulan }}</td>
                      <td class="text-sm text-secondary mb-0 text-center">
                        <a href="{{ route('Tup.RincianTup.detail', $bulan) }}" class="btn btn-info">Lihat Detail</a>
                      </td>
                    </tr>
                    @endforeach
                    @endif
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


        @include('SpjBelanjaTup.script')
          @endsection
        </main>


