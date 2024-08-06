@extends('admin.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Send Email to Subscribers</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('dashboard.subscribers.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                                @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Textarea</label>
                                        <textarea name="content" class="form-control editor" cols="30" rows="10">{{ old('content') }}</textarea>
                                        @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
