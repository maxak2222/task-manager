@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-sm w-100" style="max-width: 500px;">
        <div class="card-header">
            <h5 class="mb-0"><i class="bi bi-box-arrow-in-right me-1"></i> Login</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" placeholder="Enter your email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"  autofocus>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" placeholder="Enter your password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" >

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
