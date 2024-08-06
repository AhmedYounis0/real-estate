@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="property">
    <div class="container">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="item">
                        <div class="photo">
                            <img class="main" src="uploads/property1.jpg" alt="">
                            <div class="top">
                                <div class="status-sale">
                                    {{ $property->purpose }}
                                </div>
                                <div class="featured">
                                    Featured
                                </div>
                            </div>
                            <div class="price">${{ $property->price }}</div>
                            <div class="wishlist"><a href=""><i class="far fa-heart"></i></a></div>
                        </div>
                        <div class="text">
                            <h3><a href="#">{{ $property->name }}</a></h3>
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
                                    <a href="">{{ ucwords($property->user->name) }} ({{ ucwords( $property->user->job_title ) }})</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                No properties at the moment
            @endforelse
        </div>
    </div>
</div>
@endsection
