@extends('app.main')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="card border shadow-xs mb-4">
            <div class="ms-2">
            <a href="{{ route('RBA.DaftarKegiatan.index') }}" class="btn btn-secondary mt-2 mb-3"><< kembali</a>
          <h6>PANDUAN FORMAT DATA DAFTAR KEGIATAN</h6>
          <p>
            Untuk melakukan Import data anda terlebih dahulu harus membuat file dengan ketentuan Membuat Heading Row sebagai berikut :
            <ul>
                <li>Output No Form</li>
                <li>Nama Kegiatan</li>
                <li>IKU</li>
                <li>Masukan Keluaran Satuan</li>
                <li>Anggaran</li>
                <li>SD</li>
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
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Output No Form</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Nama Kegiatan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">IKU</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Masukan Keluaran Satuan</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">Anggaran</th>
                      <th scope="col" class="text-secondary text-sm font-weight-bold opacity-7 border-light ps-2">SD</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-sm text-secondary mb-0">Masukkan Jenis Output No Form Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Nama Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan IKU Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukan Keluaran Satuan Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Anggaran Kegiatan</td>
                      <td class="text-sm text-secondary mb-0">Masukkan Sumber Dana</td>
                  </tbody>
                </table>
                <div class="ms-2 font">
                <h6 style="font-style: italic">Note :</h6>
                <ul>
                    <li style="font-style: italic">Tiap data di kolom Output No Form Harus unik dan berbeda antar data Daftar Kegiatan Lainnya</li>
                    <li style="font-style: italic">Tiap data di kolom Nama Kegiatan Harus unik dan berbeda antar data Daftar Kegiatan Lainnya</li>
                    <li style="font-style: italic">Format yang di import harus sesuai</li>
                </ul>
                <p style="font-style: italic">Jika Tidak Memenuhi Keadaan Diatas Mungkin Akan Menyebabkan Data gagal DiImport</p>
                <p style="font-weight: bold">Contoh Import File Excel Yang Benar :</p>
                <span>
                    <a href="{{ route('RBA.DaftarKegiatan.Download') }}" class="btn btn-success">Download Contoh Excel</a>
                  </span>

                </div>
                </div>
                </div>
    
        
          @endsection
        </main>


