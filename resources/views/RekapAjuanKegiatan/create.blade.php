@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <h6 class="font-weight-semibold text-lg mb-0">Tambahkan Data Rekap Ajuan Kegiatan</h6>
                <a href="{{ route('RBA.RekapAjuanKegiatan.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        @include('component.pesan')
                        <div class="d-sm-flex align-items-center">
                            <div class="ms-auto d-flex">
                            </div>
                        </div>
            </div>
            <div class="col-lg-8 mt-5 ms-3">
                <form method="post" action="{{ url('/RBA/RekapAjuanKegiatan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="no_form" class="form-label">Pilih No Form:</label>
                        <select class="form-select" name="daftar_kegiatan_id" id="no_form" >
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
                        <label for="max">Max</label>
                        <input type="number" class="form-control" id="max" placeholder="NO MAX"
                            name="max" value="{{ Session::get('max') }}">
                    </div>
                    <div class="form-group">
                        <label for="belanja">Belanja</label>
                        <input type="text" class="form-control" id="belanja" placeholder="Nama Belanja Kegiatan"
                            name="belanja" value="{{ Session::get('belanja') }}">
                    </div>
                    <div class="form-group">
                        <label for="vol">vol</label>
                        <input type="number" class="form-control" id="vol" placeholder="vol" name="vol"
                            value="{{ Session::get('vol') }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan"
                            placeholder="Masukan Satuan" name="satuan"
                            value="{{ Session::get('satuan') }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya Per Satuan</label>
                        <input type="text" class="form-control" id="biaya" placeholder="Biaya per satuan"
                            name="biaya" value="{{ Session::get('biaya') }}">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
