@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="property-result">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="property-filter">
                    <form action="{{ route('theme.search') }}" method="GET">
                        <div class="widget">
                            <h2>Find Anything</h2>
                            <input type="text" name="name" class="form-control" placeholder="Search Titles ..." />
                        </div>

                        <div class="widget">
                            <h2>Location</h2>
                            <select name="location_id" class="form-control select2">
                                <option disabled selected>--- Select ---</option>
                                @if($locations->count())
                                    @foreach($locations as $location)
                                        <option value="{{ $location->slug }}">{{ $location->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Type</h2>
                            <select name="type_id" class="form-control select2">
                                <option disabled selected>--- Select ---</option>
                                @if($types->count())
                                    @foreach($types as $type)
                                        <option value="{{ $type->slug }}">{{ $type->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Status</h2>
                            <select name="purpose" class="form-control select2">
                                <option disabled selected>--- Select ---</option>
                                <option value="For Rent">For Rent</option>
                                <option value="For Sale">For Sale</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Bedrooms</h2>
                            <select name="bedroom" class="form-control select2">
                                <option disabled selected>--- Select ---</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Bathrooms</h2>
                            <select name="bathroom" class="form-control select2">
                                <option selected disabled>--- Select ---</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Min Price</h2>
                            <input type="text" name="min_price" class="form-control" placeholder="Min price" />
                        </div>

                        <div class="widget">
                            <h2>Max Price</h2>
                            <input type="text" name="max_price" class="form-control" placeholder="Max price" />

                        </div>

                        <div class="filter-button">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="property">
                    <div class="container">
                        <div class="row">
                            @if($result->count())
                                @foreach($result as $property)
                                <div class="col-lg-6 col-md-6 col-sm-12">
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
                                                <h3><a href="{{ route('theme.properties.show',$property->slug) }}">{{ $property->name }}</a></h3>
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
                                                        <a href="{{ route('theme.agents.show',$property->user->slug) }}">{{ $property->user->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
