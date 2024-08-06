@extends('admin.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Update Location</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.locations.update',$location)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label>Location Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $location->name }}">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label>Image</label>
                                    <div>
                                        <input class="form-control mb-3" type="file" name="image">
                                        <img class="mb-3" src="/storage/location/{{ $location->image }}" style="width: 100px; height:100px;">
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
