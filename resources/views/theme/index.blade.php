@extends('theme.master')
@section('content')
<div class="slider" style="background-image: url({{ '/storage/settings/'.$siteSettings['banner_home']['image'] }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <div class="text">
                        <h2>Discover Your New Home</h2>
                        <p>
                            You can get your desired awesome properties, homes, condos etc. here by name, category or location.
                        </p>
                    </div>
                    <div class="search-section">
                        <form action="{{ route('theme.search') }}" method="GET">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Find Anything ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="location_id" class="form-select select2">
                                                <option disabled selected>Select Location</option>
                                                @if($locations->count())
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="type_id" class="form-select select2">
                                                <option disabled selected>Select Type</option>
                                                @if($types->count())
                                                    @foreach($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="property">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Featured Properties</h2>
                    <p>Find out the awesome properties that you must love</p>
                </div>
            </div>
        </div>
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

{{--                                        {{ dd(Auth::user()->wishlist()->attach(8)) }}--}}
                                    </div>
                                    @if($property->is_featured)
                                    <div class="featured">
                                        Featured
                                    </div>
                                    @endif
                                </div>
                                <div class="price">${{ $property->price }}</div>
                                <div class="wishlist">
                                    @if (Auth::check() && Auth::user()->role == 'user')
{{--                                        @php--}}
{{--                                            // Check if the property is in the wishlist--}}
{{--                                            $inWishlist = $wishlists->contains('property_id', $property->id);--}}
{{--                                        @endphp--}}

                                        @if($wishlist->contains('property_id', $property->id))
                                            <a href="#" class="wishlist-toggle in-wishlist" data-property-id="{{ $property->id }}">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        @else
                                            <a href="#" class="wishlist-toggle" data-property-id="{{ $property->id }}">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a href="#" class="wishlist-toggle" data-property-id="{{ $property->id }}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="{{ route('theme.properties.show',$property->slug) }}">Sea Side Property</a></h3>
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
                                        <a href="{{ route('theme.agents.show',$property->user->slug) }}"> {{ ucwords($property->user->name) }} ({{ ucwords($property->user->job_title) }})</a>
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

<div class="why-choose" style="background-image: url({{ '/storage/settings/'.$siteSettings['why-choose']['image'] }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Why Choose Us</h2>
                    <p>
                        Describing why we are best in the property business
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($chooses->count())
                @foreach($chooses as $choose)
                <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="{{ $choose->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $choose->title }}</h2>
                                <p>{!! $choose->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="agent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Agents</h2>
                    <p>
                        Meet our expert property agents from the following list
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($agents->count())
                @foreach($agents as $agent)
                <div class="col-lg-3 col-md-3">
                        <div class="item">
                            <div class="photo">
                                <a href="{{ route('theme.agents.show',$agent->slug) }}"><img src="/storage/agent/{{ $agent->image }}" alt=""></a>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('theme.agents.show',$agent->slug) }}">{{ ucwords($agent->name) }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="location pb_40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Locations</h2>
                    <p>
                        Check out all the properties of important locations
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($locations->count())
                @foreach($locations as $location)
                <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item">
                            <div class="photo">
                                <a href="{{ route('theme.locations.show',$location->slug) }}"><img src="uploads/location1.jpg" alt=""></a>
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('theme.locations.show',$location->slug) }}">{{ $location->name }}</a></h2>
                                <h4>({{ $location->properties->count() }} Properties)</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="testimonial" style="background-image: url({{ '/storage/settings/'.$siteSettings['happy-client']['image'] }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Our Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    @if($testimonials->count())
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="photo">
                                <img src="/storage/testimonial/{{ $testimonial->image }}" alt="" />
                            </div>
                            <div class="text">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->job_title }}</p>
                            </div>
                            <div class="description">
                                <p>{{ strip_tags($testimonial->content) }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Latest News</h2>
                    <p>
                        Check our latest news from the following section
                    </p>
                </div>
            </div>
        </div>
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
                                    <a href="{{ route('theme.blogs.show',$blog->slug) }}">{{ $blog->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>{{ Str::limit(strip_tags($blog->content,100)) }}</p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('theme.blogs.show',$blog->slug) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.wishlist-toggle', function(e) {
        e.preventDefault();

        let $this = $(this);
        let propertyId = $this.attr('data-property-id');

        if ($this.hasClass('in-wishlist')) {
            // Remove from wishlist
            $.ajax({
                type: 'DELETE',
                url: "{{ route('theme.wishlist.destroy') }}", // Adjust to your remove route
                data: {
                    'property_id': propertyId
                },
                success: function(data) {
                    if (data.success) {
                        $this.html('<i class="far fa-heart"></i>');
                        $this.removeClass('in-wishlist');
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 401) {
                        window.location.href = '/login';
                    }
                    console.log(xhr.responseText);
                }
            });
        } else {
            // Add to wishlist
            $.ajax({
                type: 'post',
                url: "{{ route('theme.wishlist.store') }}",
                data: {
                    'property_id': propertyId
                },
                success: function(data) {
                    $this.html('<i class="fas fa-heart"></i>');
                    $this.addClass('in-wishlist');
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 401) {
                        window.location.href = '/login';
                    }
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
