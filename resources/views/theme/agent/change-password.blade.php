@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('agent.password-update') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="">Current Password</label>
                            <div class="form-group">
                                <input type="password" name="current_password" class="form-control">
                                @error('current_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="">New Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="">Confirm Password</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
