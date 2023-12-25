@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="ms-2">
            <a href="{{ route('RBA.RekapAjuanKegiatan.index') }}" class="btn btn-secondary mt-2 mb-3"><< kembali</a>
          <h6>PANDUAN FORMAT IMPORT REKAP AJUAN KEGIATAN</h6>
          <p>
            Untuk melakukan Import data anda terlebih dahulu harus membuat file dengan ketentuan Membuat Heading Row sebagai berikut :
            <ul>
                <li>Mak</li>
                <li>Belanja</li>
                <li>Vol</li>
                <li>Satuan</li>
                <li>Biaya</li>
                <li>Anggaran</li>
                <li>No Form</li>
            </ul>
            Berikut adalah Contohnya :
          </p>
        </div>
          {{-- @include('component.pesan') --}}
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div class="ms-auto d-flex">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
                <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">

              </div>

                <table class="table" id="dataTables">
                  <thead class="bg-gray-100">
                    <tr>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Mak</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Belanja</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Vol</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Satuan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Biaya</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Anggaran</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">No Form</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-sm text-secondary mb-0">Masukkan Jenis Mak Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Belanja / Sub Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Volume Belanja</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Satuan Belanja</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Biaya Per Satuan Belanja</td>
                      <td class="text-sm text-secondary mb-0">Hasil dari (biaya * vol)</td>
                      <td class="text-sm text-secondary mb-0">Masukkan NO FORM</td>
                  </tbody>
                </table>
                <div class="ms-2 font">
                <h6 style="font-style: italic">Note :</h6>
                <ul>
                    <li style="font-style: italic">Total Anggaran yang diajukan untuk Sub Kegiatan Tidak Boleh Melebihi Anggaran Utama Kegiatan</li>
                    <li style="font-style: italic">Kolom No Form Harus Ada berdasarkan No Form di Menu Daftar Kegiatan</li>
                    <li style="font-style: italic">Format yang di import harus sesuai</li>
                </ul>
                <p style="font-style: italic">Jika Tidak Memenuhi Keadaan Diatas Mungkin Akan Menyebabkan Data gagal DiImport</p>
                <p style="font-weight: bold">Contoh Import File Excel Yang Benar :</p>
                <span>
                    <a href="{{ route('RBA.RekapAjuanKegiatan.Download') }}" class="btn btn-success">Download Contoh Excel</a>
                  </span>

                </div>
                </div>
                </div>
    
        
          @endsection
        </main>


