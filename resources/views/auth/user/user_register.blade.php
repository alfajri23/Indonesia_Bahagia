@extends('layouts.layout_auth')
@section('content')

    <div class="login-clean" style="height: 100vh">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <h2 class="sr-only">Register Form</h2>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Nama" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control @error('telepon') is-invalid @enderror" type="tel" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}">
                @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">{{ __('Register') }}</button>
            </div>

            <p class="mb-1 mt-3">
                Sudah punya akun,
                <a href="{{ route('login') }}">
                Login Sekarang{{ __('') }}
                </a>
            </p>
            
        </form>

            

    </div>

@endsection