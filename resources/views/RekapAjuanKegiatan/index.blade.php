@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
          <h6 class="text-center">Informasi Rekap Ajuan Kegiatan</h3>
          {{-- @include('component.pesan') --}}
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
                
                <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                  <a href="{{ route('RBA.RekapAjuanKegiatan.create') }}">
                  <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                      <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                          <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                        </svg>
                      </span>
                      <span class="btn-inner--text" style="font-size: 1.2em;">Tambahkan Data Rekap Ajuan Kegiatan</span>
                    </button></a>
                    <span>
                      @if(isset($datas))
                      <a href="{{ route('RBA.RekapAjuanKegiatan.Export') }}" class="btn btn-success">Export Excel</a>
                      @else
                      @endif
                    </span>
                    <span>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Excel
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr088.svg-->
                              <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black"/>
                                <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black"/>
                                </svg></span>
                                <!--end::Svg Icon-->
                            </div>
                            </div>
                            <form action="{{ route('RBA.RekapAjuanKegiatan.Import') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="file" name="file" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan </button>
                            </div>
                          </div>
                         </form>
                        </div>
                      </div>
                    </span>
                    <span class="ms-2">
                      <a href="{{ route('RBA.RekapAjuanKegiatan.Panduan') }}" class="btn btn-info">Panduan Import <i class="fa fa-question-circle"></i></a>
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
              <div style="text-align: right; margin-right: 20vw;">
                @if(isset($totalRekapAnggaran))
                <span class="text-sm font-weight-bold">total anggaran Yang diajukan : {{ number_format($totalRekapAnggaran, 0, ",", ".") }}</span>
                @else
                @endif
            </div>
            <form class="d-inline form-delete" action="" method="post">
              @csrf
              @method('DELETE')
                <table class="table" id="dataTables">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light">NO</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">No Form</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Max</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Nama Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Belanja</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">IKU</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Vol</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Satuan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Masukan / Keluaran Output</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Biaya</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Biaya Anggaran</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Total Anggaran</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Sumber Dana</th>
                      <th scope="col" class="text-secondary text-center text-sm font-weight-bold opacity-7 border-light ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($datas->count() === 0) 
                      
                    
                    @else
                    @foreach ($datas as $data)
                    <tr>
                      
                      <th scope="row" class="text-sm text-secondary mb-0">{{ $loop->iteration }}</th>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->no_form }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->max }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->nama_kegiatan }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->belanja }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->iku }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->vol }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->satuan }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->masukan_keluaran }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->biaya, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->anggaran_kegiatan, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ number_format($data->DaftarKegiatan->anggaran, 0, ",", ".") }}</td>
                      <td class="text-sm text-secondary mb-0">{{ $data->DaftarKegiatan->sumber_dana }}</td>
                      <td class="text-sm text-secondary mb-0 text-center">
                        <a href="{{ route('RBA.RekapAjuanKegiatan.edit', $data->id) }}" class="btn btn-info text-sm mb-0">Edit</a>
                        <div class="d-inline form-delete">
                          <button type="button" name="btn-delete" onclick="del('{{ $data->id }}')" class="btn btn-danger text-sm mb-0 btndelete">Delete</button>
                        </div>
                      </td>
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
            </form>

                <div style="text-align: right; margin-right: 20vw;">
                  @if(isset($totalAnggaran))
                  <span class="text-sm font-weight-bold">TOTAL ANGGARAN :  {{ number_format($totalAnggaran, 0, ",", ".") }}</span>
                  @else
                  @endif
                </div>
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
          @if ($datas->count() === 0) {
            <p>Tidak ada data </p>
          }
          @else
          <script>
            function del(id) {
              
              var id = id;
        
                    // Tampilkan SweetAlert dengan id yang ditemukan
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success me-2",
                            cancelButton: "btn btn-danger ms-2"
                        },
                        buttonsStyling: false
                    });
        
                    swalWithBootstrapButtons.fire({
                        title: "Apakah kamu yakin",
                        text: "Data akan hilang Jika kamu klik HAPUS",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hapus Rekap Data",
                        cancelButtonText: "Tidak, Batalkan!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Tambahkan penanganan hapus di sini dengan id yang ditemukan
                            $('.form-delete').attr('action' , `{{ route('RBA.RekapAjuanKegiatan.destroy', "") }}/${id}`);
                            $('.form-delete').submit();

                            // Berhasil menghapus, tampilkan pesan SweetAlert
                                   swalWithBootstrapButtons.fire({
                                      title: "Berhasil",
                                      text: "Data telah dihapus",
                                      icon: "success"
                                    }).then((result) => {
                                    // toastr.success('Data berhasil dihapus')
                                    location.reload();
                            });
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: `{{ route('RBA.RekapAjuanKegiatan.destroy', "") }}/${id}`,
                        //         data: {
                        //             '_token': $('meta[name="csrf-token"]').attr('content'),
                        //             '_method': 'DELETE'
                        //         },
                        //         success: function (data) {
                        //     // Berhasil menghapus, tampilkan pesan SweetAlert
                        //            swalWithBootstrapButtons.fire({
                        //               title: "Berhasil",
                        //               text: "Data telah dihapus",
                        //               icon: "success"
                        //             }).then((result) => {
                        //             // toastr.success('Data berhasil dihapus')
                        //             location.reload();
                        //     });
                        // },
                        //         error: function (data) {
                        //             console.log('Error:', data);
                        //         }
                        //     });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Dibatalkan",
                                text: "Data tidak dihapus",
                                icon: "error"
                            });
                        }
                    });
             
            }

            $(document).ready(function () {
                // Tangkap klik tombol delete
                
            });
            @endif
        </script>
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

        
        @include('RekapAjuanKegiatan.script')
          @endsection
        </main>


