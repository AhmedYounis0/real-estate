@extends('theme.master')
@section('banner_title','Agent Registration')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <form action="{{ route('agent.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Agent Name *</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Position *</label>
                            <input type="text" name="job_title" class="form-control">
                            @error('job_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address *</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password *</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password *</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Create Account
                            </button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('login') }}" class="primary-color">Existing Already? Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
