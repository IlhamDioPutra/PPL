@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <h6 class="font-weight-semibold text-lg mb-0">Tambahkan Data SPJ Belanja TUP</h6>
                <a href="{{ route('TUP.SpjBelanjaTup.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        @include('component.pesan')
                        <div class="d-sm-flex align-items-center">
                            <div class="ms-auto d-flex">
                            </div>
                        </div>
            </div>
            <div class="col-lg-8 mt-5 ms-3">
                <form method="post" action="{{ url('/TUP/SpjBelanjaTup') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="daftar_kegiatan_id" class="form-label">Pilih No Form:</label>
                        <select class="form-select" name="daftar_kegiatan_id" id="daftar_kegiatan_id" >
                            @foreach ($daftarKegiatans as $daftarKegiatan)
                                @if(old('daftar_kegiatan_id') == $daftarKegiatan->id)
                                <option value="{{ $daftarKegiatan->id }}"selected>{{ $daftarKegiatan->no_form }}</option>
                                @else
                                <option value="{{ $daftarKegiatan->id }}">{{ $daftarKegiatan->no_form }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rekap_ajuan_kegiatan_id" class="form-label">Pilih Sub Kegiatan:</label>
                        <select class="form-select" name="rekap_ajuan_kegiatan_id" id="rekap_ajuan_kegiatan_id" >
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bulan" class="form-label">Pilih Bulan</label>
                        <select class="form-select" name="bulan" id="bulan" >
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                        </select>
                    </div>
                      
                    <div class="form-group">
                        <label for="dokumen" class="form-label">Pilih Dokumen</label>
                        <input type="file" class="form-control" id="dokumen" placeholder="Pilih Dokumen"
                            name="dokumen">
                    </div>
                    <div class="form-group">
                        <label for="rencana_tup">RENCANA TUP</label>
                        <input type="number" class="form-control" id="rencana_tup" placeholder=" Masukan Rencana Biaya TUP" name="rencana_tup"
                            value="{{ Session::get('rencana_tup') }}">
                    </div>
                    <div class="form-group">
                        <label for="realisasi_tup">REALISASI TUP</label>
                        <input type="number" class="form-control" id="realisasi_tup"
                            placeholder="Masukan Biaya realisasi TUP" name="realisasi_tup"
                            value="{{ Session::get('realisasi_tup') }}">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                // Ketika daftar_kegiatan_id dipilih
                $('#daftar_kegiatan_id').on("change",function () {
                    var daftarKegiatanId = $(this).val();
        
                    // Lakukan permintaan Ajax
                    $.ajax({
                        type: 'GET',
                        url: '/api/v1/DaftarKegiatan/' + daftarKegiatanId, // Sesuaikan dengan endpoint API Anda
                        success: function (res) {
                            // Bersihkan opsi rekap_ajuan_kegiatans_id sebelum menambahkan yang baru
                            $('#rekap_ajuan_kegiatan_id').empty();
        
                            res.data.rekap_ajuan_kegiatan_id.map(_data => {
                                $('#rekap_ajuan_kegiatan_id').append(`<option value="${_data.id}">${_data.max} - ${_data.belanja}</option>`)
                            });

                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    </main>
@endsection
