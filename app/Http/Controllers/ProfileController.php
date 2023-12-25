<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::id());

        return view('Admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|min:6', // Password bisa kosong atau minimal 6 karakter
            'location' => 'max:255',
        ]
        // [
        //     'name.min:3' => 'NAMAYANG ANDA MASUKKAN MINIMAL TERDIRI DARI 3 SIMBOL, ANGKA, ATAU HURUF',
        //     'email.min:3' => 'EMAIL YANG ANDA MASUKKAN MINIMAL TERDIRI DARI 3 SIMBOL, ANGKA, ATAU HURUF',
        //     'email.unique:users,email' => 'EMAIL YANG ANDA MASUKKAN TELAH DIGUNAKAN OLEH USER LAIN',
        //     'password.min:3' => 'EMAIL YANG ANDA MASUKKAN MINIMAL TERDIRI DARI 3 SIMBOL, ANGKA, ATAU HURUF',
        // ]
    );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'location' => $request->location,
        ];

        // Update password jika diisi
        // if (!empty($request->password)) {
        //     $data['password'] = Hash::make($request->password);
        // }

        User::find(Auth::id())->update($data);


        return redirect()->route('users.profile')->with('success', 'Profile updated successfully.');
    }
}
