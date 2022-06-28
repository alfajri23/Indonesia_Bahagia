@extends('layouts.layout_auth')
@section('content')

<div class="login-clean" style="height: 100vh;">
    <form method="post" action="{{ route('authAdmin') }}">
        @csrf
        <h3 class="mb-4">Login Admin</h3>
        @error('error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror

        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email" @error('email') is-invalid @enderror>
            @error('email')
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
        </div>
        </form>
</div>

@endsection