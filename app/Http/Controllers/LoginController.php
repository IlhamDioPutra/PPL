<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index() 
    {
        return view('Auth.login');
    }

    public function Authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rememberMe = $request->has('remember');

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            // Gantilah '/dashboard' dengan path yang sesuai dengan tujuan setelah login berhasil
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'message' => 'Email atau kata sandi yang anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
