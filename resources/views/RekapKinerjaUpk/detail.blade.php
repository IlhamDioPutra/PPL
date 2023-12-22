@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="d-block ms-3 mt-2">
                <a href="{{ route('Gup.RekapKinerjaUpk.index') }}" class="btn btn-secondary"><< kembali</a>
            </div>
            <h6 class="text-center">Rincian TUP bulan {{ optional($namaBulan)->bulan }}</h6>
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
                        @if(isset($namaBulan))
                        <a href="{{ route('Gup.RekapKinerjaUpk.export', $namaBulan->bulan) }}" class="btn btn-success">Export Excel</a>
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
                <table class="table" id="dataTables">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light">NO</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">No Form</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Nama Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Mak</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Belanja</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Total Biaya</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($datas->count() === 0) 
                      
                    
                    @else
                    @foreach ($datas as $data)
                    <tr>
                      
                      <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->no_form }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->nama_kegiatan }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->RekapAjuanKegiatan->max }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->RekapAjuanKegiatan->belanja  }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->biaya, 0, ",", ".")  }}</td>
                       
                    </tr>
                    @endforeach
    
                  </tbody>
                </table>
                <ul>
                    <li>TOTAL Biaya : RP{{ number_format($totalBiaya, 0, ",", ".") }}</li>
                </ul>
                @endif
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


