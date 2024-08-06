@extends('admin.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Update Why Choose Us</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.chooses.update',$choose)}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label>Icon</label>
                                            <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
                                            @error('icon')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $choose->title }}">
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label>Textarea</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $choose->description }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
