@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <h4>Add Video</h4>
                @if(session('status'))
                    <div class="alert alert-danger">{{ session('status') }}</div>
                @endif
                <form action="{{ route('agent.videos.store',$property->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Video Code" />
                            </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                        </div>
                    </div>
                </form>

                <h4 class="mt-4">Existing Videos</h4>
                <div class="video-all">
                    <div class="row">
                        @if($videos->count())
                            @foreach($videos as $video)
                            <div class="col-md-6 col-lg-3">
                                    <div class="item item-delete">
                                        <a class="video-button" href="http://www.youtube.com/watch?v={{ $video->name }}">
                                            <img src="http://img.youtube.com/vi/{{ $video->name }}/0.jpg" alt="" />
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                <form action="{{ route('agent.videos.destroy',$video->id) }}" method="POST">
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
