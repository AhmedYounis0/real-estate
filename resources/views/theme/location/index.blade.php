@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="location pb_40">
    <div class="container">
        <div class="row">
            @if($locations->count())
                @foreach($locations as $location)
                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="item">
                    <div class="photo">
                        <a href="{{ route('theme.locations.show',$location) }}"><img src="/storage/location/{{ $location->image }}" alt=""></a>
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('theme.locations.show',$location) }}">{{ $location->name }}</a></h2>
                        <h4>({{ $location->properties->count() }} Properties)</h4>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
