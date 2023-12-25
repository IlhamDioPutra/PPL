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
        User::factory()->create([
            'name' => 'Administrator FKIK UNIB',
            'email' => 'admin@fkik.com',
            'password' => Hash::make('admin'),
            'location' => "FKIK Universitas Bengkulu",
        ]);
    }
}
