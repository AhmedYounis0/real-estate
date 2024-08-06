@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="agent-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner">
                    <div class="photo">
                        <img src="/storage/agent/{{ $user->image }}" alt="">
                    </div>
                    <div class="detail">
                        <h3>{{ ucwords($user->name) }}</h3>
                        <h4>{{ ucwords($user->job_title) }}</h4>
                        <p>{!! $user->bio !!}</p>
                        <div class="contact d-flex justify-content-center">
                            <div class="item"><i class="fas fa-map-marker-alt"></i> {{ $user->address }}</div>
                            <div class="item"><i class="fas fa-phone"></i> {{ $user->phone }}</div>
                            <div class="item"><i class="far fa-envelope"></i> {{ $user->email }}</div>
                            @if(isset($user->website))
                            <div class="item"><i class="fas fa-globe"></i> {{ $user->website }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="property">
    <div class="container">
        <div class="row">
            @if($properties->count())
                @foreach($properties as $property)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="item">
                        <div class="photo">
                            <img class="main" src="/storage/preview/{{ $property->image }}" alt="">
                            <div class="top">
                                <div class="status-sale">
                                    {{ $property->purpose }}
                                </div>
                                @if($property->is_featured)
                                <div class="featured">
                                    Featured
                                </div>
                                @endif
                            </div>
                            <div class="price">${{ $property->price }}</div>
                            <div class="wishlist"><a href=""><i class="far fa-heart"></i></a></div>
                        </div>
                        <div class="text">
                            <h3><a href="{{ $property->slug }}">{{ $property->name }}</a></h3>
                            <div class="detail">
                                <div class="stat">
                                    <div class="i1">{{ $property->size }} sqft</div>
                                    <div class="i2">{{ $property->bedroom }} Bed</div>
                                    <div class="i3">{{ $property->bathroom }} Bath</div>
                                </div>
                                <div class="address">
                                    <i class="fas fa-map-marker-alt"></i> {{ $property->address }}
                                </div>
                                <div class="type-location">
                                    <div class="i1">
                                        <i class="fas fa-edit"></i> {{ $property->type->name }}
                                    </div>
                                    <div class="i2">
                                        <i class="fas fa-location-arrow"></i> {{ $property->location->name }}
                                    </div>
                                </div>
                                <div class="agent-section">
                                    <img class="agent-photo" src="/storage/agent/{{ $property->user->image }}" alt="">
                                    <a href="">{{ $property->user->name }} ({{ $property->user->job_title }})</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    {{ $properties->render('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
