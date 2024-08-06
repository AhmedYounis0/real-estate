@extends('theme.master')
@section('banner_title','Reset Password')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('password.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $request->email }}">
                            <input type="hidden" name="token" value="{{ $request->token }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Retype Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
