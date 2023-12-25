@extends('Auth.layouts.main')


<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
        </div>
    </div>
</div>
<main class="main-content  mt-0">
        @section('content')
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto" style="border-radius: 15px; background-color: white;">
                        <div class="text-center mb-4">
                            <img src="../assets/img/unib.png" alt="UNIB" class="img-fluid"
                                style="max-height: 150px; width: auto; margin-bottom: -75px; margin-left: 125px;">
                        </div>
                        <div class="card card-plain mt-4">
                            <div class="card-header pb-0 text-left bg-transparent text-center">
                                <h3 class="font-weight-black text-dark display-6" style="text-align: center;margin-left: 0px;">Manajemen Keuangan</h3>
                                <p class="mb-0" style="text-align: center;">Fakultas Kedokteran dan Ilmu Kesehatan Universitas Bengkulu</p>
                            </div>
                            <div class="text-center">
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @error('message')
                                    <div class="alert alert-danger text-sm" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="login">
                                    @csrf
                                    <label>Email Address</label>
                                    <div class="mb-3">
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter your email address" aria-label="Email"
                                            aria-describedby="email-addon">
                                    </div>
                                    <div class="form-group" style="position: relative">
                                        <label>Password</label>
                                        <div class="mb-3 form-password-toggle">
                                            <input type="password" id="password" name="password"
                                                class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon"
                                                oninput="updatePasswordToggleIcon()"
                                                onchange="updatePasswordToggleIcon()"
                                                style="padding-right: 32px; position: relative;">
                                            <div id="password-toggle-icon" class="password-toggle-icon"
                                                style="position: absolute; top: 80%; transform: translateY(-80%); right: 10px;">
                                                <i class="fa fa-eye" aria-hidden="true"
                                                    onclick="togglePasswordVisibility()"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <script>
                                        function togglePasswordVisibility() {
                                            var passwordInput = document.getElementById('password');
                                            var passwordToggleIcon = document.getElementById('password-toggle-icon').firstElementChild;

                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                passwordToggleIcon.classList.remove('fa-eye');
                                                passwordToggleIcon.classList.add('fa-eye-slash');
                                            } else {
                                                passwordInput.type = 'password';
                                                passwordToggleIcon.classList.remove('fa-eye-slash');
                                                passwordToggleIcon.classList.add('fa-eye');
                                            }
                                        }

                                        function updatePasswordToggleIcon() {
                                            var passwordInput = document.getElementById('password');
                                            var passwordToggleIcon = document.getElementById('password-toggle-icon').firstElementChild;

                                            if (passwordInput.value.trim() !== '') {
                                                // Jika input tidak kosong, biarkan ikon terlihat
                                                passwordToggleIcon.style.visibility = 'visible';
                                            } else {
                                                // Jika input kosong, sembunyikan ikon
                                                passwordToggleIcon.style.visibility = 'hidden';
                                            }
                                        }
                                    </script>


                                    <!-- Di dalam formulir, setelah kolom kata sandi -->
                                    <div class="form-group">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="rememberMe"
                                                name="remember">
                                            <label class="form-check-label" for="rememberMe"
                                                style="color: black; margin-bottom: -2px;">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-3">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                            <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                style="background-image: url('../assets/img/fkik.jpg');
                                       filter: blur(5px); /* Atur tingkat blur di sini, misalnya 10px */">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        @endsection
