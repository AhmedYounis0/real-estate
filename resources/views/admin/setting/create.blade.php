@extends('admin.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setting</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('status'))
                                    <div class="alert alert-danger">{{ session('status') }}</div>
                                @endif
                                <form action="{{ route('dashboard.settings.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                <label>Key</label>
                                                <input type="text" class="form-control" name="key" value="{{ old('key') }}">
                                                @error('key')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Value</label>
                                        <textarea name="value" class="form-control editor" cols="30" rows="10">{{ old('value') }}</textarea>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Image</label>
                                        <div>
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
