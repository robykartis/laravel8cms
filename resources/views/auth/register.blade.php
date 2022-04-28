@extends('layouts._auth.app')
@section('title')
    Login
@endsection
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="input_login_email">Name</label>

            <input id="input_login_email" type="text" class="form-control py-4 @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1" for="input_login_email">Email</label>
            <input id="input_login_email" type="email" class="form-control py-4 @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">

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
                autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1" for="input_login_password">Confirm Password</label>



            <input iid="input_login_password" type="password" class="form-control py-4" name="password_confirmation"
                required autocomplete="new-password">




        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

            <button class="btn btn-primary px-4" type="submit">Register</button>
        </div>
    </form>


@endsection
