@extends('layouts._auth.app')
@section('title')
    Login
@endsection
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="input_login_email">Email</label>


            <input id="input_login_email" type="email" class="form-control py-4 @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <!-- todo: show message validation (email) -->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1" for="input_login_password">Password</label>

            <input id="input_login_password" type="password"
                class="form-control py-4 @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">

            <!-- todo: show message validation (password) -->
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="#">Forgot Password?</a>
            <button class="btn btn-primary px-4" type="submit">Login</button>
        </div>
    </form>


@endsection
