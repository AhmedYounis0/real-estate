@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="/storage/blog/{{ $blog->image }}" alt="" />
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ $blog->created_at->diffForHumans() }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ formatNumber($blog->views) }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
