@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('theme.contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" />
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            {!! NoCaptcha::renderJs() !!}--}}
{{--                            {!! NoCaptcha::display() !!}--}}
{{--                        </div>--}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799198932!2d-74.25987701513004!3d40.69767006272707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1645362221879!5m2!1sen!2sbd" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
