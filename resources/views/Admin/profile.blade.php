@extends('app.main')
@section('pageTitle', 'Manajemen Profile')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- ... Bagian lain dari kode ... -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text-center">
                            <div class="col-md-12" style="padding-left: 365px; margin-top:4px; margin-bottom:-50px;">
                                <div class="avatar avatar-xl mx-auto mb-3"
                                    style="border: solid 2px #ccc; border-radius: 50%; overflow: hidden; position: relative; width: 120px; height: 120px;">
                                    <img src="{{ asset('assets/img/Admin-icon.png') }}" alt="Profile Image"
                                        class="w-100 h-100 object-fit-cover border-radius-lg shadow">
                                </div>
                            </div>
                            <div class="card-header text-center" style="color: blueviolet; font-weight: 600;">Profile</div>
                          
                            @include('component.onlyError')
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('users.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('New Password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="location">{{ __('Location') }}</label>
                                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', Auth::user()->location) }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
