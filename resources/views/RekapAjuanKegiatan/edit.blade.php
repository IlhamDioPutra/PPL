@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <h6 class="font-weight-semibold text-lg mb-0">Edit Rekap Daftar Kegiatan</h6>
                <a href="{{ route('RBA.RekapAjuanKegiatan.index') }}" class="btn btn-secondary"><< kembali</a>
                @include('component.pesan')
                <div class="d-sm-flex align-items-center">
                    <div class="ms-auto d-flex">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 ms-3">
                <form method="post" action="{{ route('RBA.RekapAjuanKegiatan.update',$data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="no_form" class="form-label">Pilih No Form:</label>
                        <select class="form-select" name="daftar_kegiatan_id" id="no_form" disabled >
                                <option value="{{ $data->daftar_kegiatan_id }}"selected>{{ $data->DaftarKegiatan->no_form }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="max">Max</label>
                        <input type="number" class="form-control" id="max" placeholder="NO MAX"
                            name="max" value="{{ $data->max }}">
                    </div>
                    <div class="form-group">
                        <label for="belanja">Belanja</label>
                        <input type="text" class="form-control" id="belanja" placeholder="Nama Belanja Kegiatan"
                            name="belanja" value="{{ $data->belanja }}">
                    </div>
                    <div class="form-group">
                        <label for="vol">vol</label>
                        <input type="number" class="form-control" id="vol" placeholder="vol" name="vol"
                            value="{{ $data->vol }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan"
                            placeholder="Masukan Satuan" name="satuan"
                            value="{{ $data->satuan }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya Per Satuan</label>
                        <input type="text" class="form-control" id="biaya" placeholder="Biaya per satuan"
                            name="biaya" value="{{ $data->biaya }}">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
