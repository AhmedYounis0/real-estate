@extends('theme.master')
@section('content')
<div class="blog">
    <div class="container">
        <div class="row">
            @if($blogs->count())
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="/storage/blog/{{ $blog->image }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('theme.blogs.show',$blog) }}">{{ $blog->title }}</a>
                                </h2>
                                <div class="short-des">
                                    {!! Str::limit(strip_tags($blog->content), 180) !!}
                                </div>
                                <div class="button">
                                    <a href="{{ route('theme.blogs.show',$blog) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
