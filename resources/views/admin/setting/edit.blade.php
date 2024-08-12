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
                                <form action="{{ route('dashboard.settings.update',$setting)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                <label>Key</label>
                                                <input type="text" class="form-control" name="key" disabled value="{{ $setting['key'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Value</label>
                                        <textarea name="value" class="form-control editor" cols="30" rows="10">{{ $setting['value'] }}</textarea>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>Image</label>
                                        <div>
                                            <input class="form-control" type="file" name="image">
                                            <img src="/storage/settings/{{ $setting['image'] }}" style="width: 150px; height: 150px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
