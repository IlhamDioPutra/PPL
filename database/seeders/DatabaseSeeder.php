<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $photoPath = $this->uploadPhoto();

        User::factory()->create([
            'name' => 'Administrasi FKIK UNIB',
            'email' => 'admin@fkik.com',
            'password' => Hash::make('admin'),
            'about' => "Manajemen Keuangan Fakultas Kedokteran dan Kesehatan Universitas Bengkulu.",
            'photo' => $photoPath,
        ]);
    }

    private function uploadPhoto()
    {
        // Ganti 'public/photos' dengan direktori tempat Anda ingin menyimpan foto di dalam folder 'public'
        $storagePath = 'public/photos';

        // Contoh menggunakan foto default atau Anda dapat menyediakan foto yang sesuai
        $photoContent = file_get_contents(public_path('photos/baru.jpg'));

        // Generate nama unik untuk foto
        $photoName = 'photo_' . time() . '.jpg';

        // Simpan foto ke penyimpanan
        Storage::put($storagePath . '/' . $photoName, $photoContent);

        // Mengembalikan path foto yang dapat disimpan di kolom 'photo'
        return $storagePath . '/' . $photoName;
    }
}
