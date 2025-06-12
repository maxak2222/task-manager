@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 500px;">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-plus-fill me-1"></i> Register</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" type="text" placeholder="Enter your full name"
                            class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                            autofocus>
                        @error('name')
                            <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" placeholder="Enter your email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" placeholder="Create a password"
                            class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" placeholder="Repeat your password" class="form-control"
                            name="password_confirmation">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary ">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="bi bi-person-plus-fill ms-2"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
