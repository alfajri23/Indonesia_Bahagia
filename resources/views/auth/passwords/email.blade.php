@extends('layouts.layout_auth')

@section('content')

<div class="login-clean" style="height: 100vh;">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h3 class="mb-4">{{ __('Reset Password') }}</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <label for="email" class="text-end">
            {{ __('E-Mail Address') }} :
        </label>
        <div class="row">

            <div class="form-group col-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-1">
            {{ __('Send Password Reset Link') }}
        </button>

    
        <p class="mb-1 mt-3">
            <a href="{{ route('register') }}">
            Daftar Sekarang{{ __('') }}
            </a>
        </p>

        <p class="mb-1">
            <a href="{{ route('login') }}">
            Login{{ __('') }}
            </a>
        </p>

        
        </form>
</div>

@endsection
