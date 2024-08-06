@extends('theme.master')
@section('banner_title','Login')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Login
                            </button>
                            <a href="{{ route('password.request') }}" class="primary-color">Forgot Password?</a>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('user.register') }}" class="primary-color">Don't have an account? Create Account</a>
                            <br>
                            <a href="{{ route('agent.register') }}" class="primary-color">Don't have an account? Create Account As Agent</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
