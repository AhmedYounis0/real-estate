@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.user-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <h3>Hello, {{ ucwords(Auth::user()->name) }}</h3>
                <div class="row box-items">
                    <div class="col-md-4">
                        <div class="box1">
                            <h4>{{ $wishlistCount }}</h4>
                            <p>Wishlist Properties</p>
                        </div>
                    </div>
{{--                    <div class="col-md-4">--}}
{{--                        <div class="box2">--}}
{{--                            <h4>3</h4>--}}
{{--                            <p>Messages</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
