@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <h6 class="font-weight-semibold text-lg mb-0">Tambahkan Data Daftar Kegiatan</h6>
                <a href="{{ route('RBA.DaftarKegiatan.index') }}" class="btn btn-secondary"><< kembali</a>
                @include('component.pesan')
                <div class="d-sm-flex align-items-center">
                    <div class="ms-auto d-flex">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 ms-3">
                <form method="post" action="{{ url('/RBA/DaftarKegiatan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="no_form">No form</label>
                        <input type="text" class="form-control" id="no_form" placeholder="No form" name="no_form" value="{{ Session::get('no_form') }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ Session::get('nama_kegiatan') }}">
                    </div>
                    <div class="form-group">
                        <label for="iku">IKU</label>
                        <input type="text" class="form-control" id="iku" placeholder="Jenis IKU" name="iku" value="{{ Session::get('iku') }}">
                    </div>
                    <div class="form-group">
                        <label for="masukan_keluaran">Masukan / Keluaran Output</label>
                        <input type="text" class="form-control" id="masukan_keluaran"
                            placeholder="Masukan / Keluaran Output" name="masukan_keluaran" value="{{ Session::get('masukan_keluaran') }}">
                    </div>
                    <div class="form-group">
                        <label for="Anggaran">Anggaran</label>
                        <input type="number" class="form-control" id="Anggaran" placeholder="Anggaran" name="anggaran" value="{{ Session::get('anggaran') }}">
                    </div>
                    <div class="form-group">
                        <label for="Sumber_Dana">Sumber Dana</label>
                        <input type="text" class="form-control" id="Sumber_Dana" placeholder="Sumber Dana" name="sumber_dana" value="{{ Session::get('sumber_dana') }}">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
