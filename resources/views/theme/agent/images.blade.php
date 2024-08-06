@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <h4>Add Photo</h4>
                @if(session('status'))
                    <div class="alert alert-danger">{{ session('status') }}</div>
                @endif
                <form action="{{ route('agent.images.store',$property_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="hidden" name="property_id" value="{{ $property_id }}">
                                <input type="file" name="images[]" multiple />
                            </div>
                        </div>
                        @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                        </div>
                    </div>
                </form>
                <h4 class="mt-4">Existing Photos</h4>
                <div class="photo-all">
                    <div class="row">
                        @if($images->count())
                            @foreach($images as $image)
                            <div class="col-md-6 col-lg-3">
                                    <div class="item item-delete">
                                        <a href="/storage/images/{{ $image->name }}" class="magnific">
                                            <img src="/storage/images/{{ $image->name }}" alt="" />
                                            <div class="icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <form action="{{ route('agent.images.destroy',$image) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger mb_20">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
