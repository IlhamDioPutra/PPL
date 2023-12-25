@extends('app.main')
@section('pageTitle', 'Manajemen RBA')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
          <h6 class="text-center" style="padding-top: 15px;margin-bottom: 8px;margin-top: 8px;margin-left: 15px;">Rekapitulasi Kegiatan Unit Kerja FKIK</h3>
          {{-- @include('component.pesan') --}}
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
                <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                    <span>
                      @if($datas != null)
                      <a href="{{ route('RBA.RekapitulasiKegiatan.export') }}" class="btn btn-success">Export Excel</a>
                      @else
                      @endif
                    </span>
                <div class="input-group w-sm-25 ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Search" id="search">
                </div>
              </div>
            </div>
                <table class="table" id="dataTables">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light">NO</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">No Form</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Nama Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Max</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Belanja / Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Anggaran Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Anggaran Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Sumber Dana</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Januari</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Januari</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Februari</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Februari</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Maret</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Maret</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP April</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP April</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Mei</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Mei</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Juni</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Juni</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Juli</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Juli</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Agustus</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Agustus</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP September</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP September</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Oktober</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Oktober</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP November</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP November</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi TUP Desember</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Realisasi GUP Desember</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Total Realisasi Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Total Realisasi Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Sisa Saldo Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Sisa Saldo Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Persentase Realisasi Sub Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Persentase Realisasi Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($datas == null)

                    @else
                    @foreach ($datas as $data)
                    <tr>

                      <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                      <td class="text-sm text-secondary mb-0">{{ $data->no_form }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->nama_kegiatan }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->max }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->belanja }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->anggaran, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->anggaran_kegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->sumber_dana}}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_januari, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_januari, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_februari, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_februari, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_maret, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_maret, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_april, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_april, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_mei, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_mei, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_juni, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_juni, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_juli, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_juli, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_agustus, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_agustus, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_september, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_september, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_oktober, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_oktober, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_november, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_november, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_tup_desember, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->realisasi_gup_desember, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->total_realisasi_subkegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->total_realisasi_kegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->sisa_saldo_subkegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->sisa_saldo_kegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->rasio_realisasi_subkegiatan, 0, ",", ".") }}%</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->rasio_realisasi_kegiatan, 0, ",", ".") }}%</td>

                    </tr>
                    @endforeach
                    @endif
                    {{-- <tr style="background-color: rgb(152, 248, 152); ">
                      <th scope="row" class="text-smfw-bold mb-0" ></th>
                      <td class="text-sm text-secondary mb-0">TOTAL</td>
                      <td class="text-sm text-secondary mb-0"></td>
                      <td class="text-sm text-secondary mb-0"></td>
                      <td class="text-sm text-secondary mb-0"></td>
                      <td class="text-sm text-secondary mb-0">{{ $totalAnggaran }}</td>
                      <td class="text-sm text-secondary mb-0"></td>
                      <td class="text-sm text-secondary mb-0"></td>
                    </tr> --}}
                  </tbody>
                </table>
                <ul>
                    <li>TOTAL ANGGARAN: Rp{{ number_format($totalAnggaran, 0, ",", ".") }} </li>
                    <li>TOTAL REALISASI ANGGARAN: Rp{{ number_format($totalRealisasi, 0, ",", ".") }} </li>
                    <li>SISA SALDO: Rp{{ number_format($sisaSaldo, 0, ",", ".") }} </li>
                </ul>
                </div>
              </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                {{-- toastr --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"/>
                {{--  --}}
                {{-- alert delete --}}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                {{--  --}}
              </div>
            </div>
          </div>
          @if (isset($datas)) {
            <p>Tidak ada data </p>
          }
          @else
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
        @endif


        @include('RekapitulasiKegiatan.script')
          @endsection
        </main>


