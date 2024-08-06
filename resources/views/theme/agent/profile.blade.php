@extends('theme.master')
@section('banner_title','Edit Profile')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <form action="{{ route('agent.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Photo</label>
                            <div class="form-group">
                                <img src="/storage/agent/{{ Auth::user()->image }}" alt="" class="user-photo">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Photo</label>
                            <div class="form-group">
                                <input type="file" name="image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Name *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Company Name ( Optional )</label>
                            <div class="form-group">
                                <input type="text" name="company_name" class="form-control" value="{{ Auth::user()->company_name }}">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Position *</label>
                            <div class="form-group">
                                <input type="text" name="job_title" class="form-control" value="{{ Auth::user()->job_title }}">
                                @error('job_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Biography</label>
                            <textarea name="bio" class="form-control editor" cols="30" rows="10">{{ Auth::user()->bio }}</textarea>
                            @error('bio')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone *</label>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address *</label>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website ( Optional )</label>
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" placeholder="https://www.example.com">
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
