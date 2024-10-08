@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="property-result pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <div class="main-photo">
                        <img src="/storage/preview/{{ $property->image }}" alt="">
                    </div>
                    <h2>
                        Description
                    </h2>
                    <p>{!! $property->description !!}</p>
                </div>
                @if($property->images->count())
                <div class="left-item">
                    <h2>
                        Photos
                    </h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach($property->images as $image)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a href="/storage/images/{{ $image->name }}" class="magnific">
                                        <img src="/storage/images/{{ $image->name }}" alt="" />
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if($property->videos->count())
                <div class="left-item">
                    <h2>
                        Videos
                    </h2>
                    <div class="video-all">
                        <div class="row">
                            @foreach($property->videos as $video)
                            <div class="col-md-6 col-lg-4">
                                    <div class="item">
                                        <a class="video-button" href="http://www.youtube.com/watch?v={{ $video->name }}">
                                            <img src="http://img.youtube.com/vi/{{ $video->name }}/0.jpg" alt="" />
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="left-item">
                    @if($relatedProperties->count())
                    <h2>
                        Related Properties
                    </h2>
                    <div class="property related-property pt_0 pb_0">
                        <div class="row">
                            @foreach($relatedProperties as $relatedProperty)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item">
                                        <div class="photo">
                                            <img class="main" src="/storage/preview/{{ $relatedProperty->image }}" alt="">
                                            <div class="top">
                                                <div class="status-sale">
                                                    {{ $relatedProperty->purpose }}
                                                </div>
                                                @if($relatedProperty->is_featured)
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                @endif
                                            </div>
                                            <div class="price">${{ $relatedProperty->price }}</div>
                                            <div class="wishlist"><a href=""><i class="far fa-heart"></i></a></div>
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('theme.properties.show',$relatedProperty->slug) }}">{{ $relatedProperty->name }}</a></h3>
                                            <div class="detail">
                                                <div class="stat">
                                                    <div class="i1">{{ $relatedProperty->size }} sqft</div>
                                                    <div class="i2">{{ $relatedProperty->bedroom }} Bed</div>
                                                    <div class="i3">{{ $relatedProperty->bathroom }} Bath</div>
                                                </div>
                                                @if($relatedProperty->address)
                                                <div class="address">
                                                    <i class="fas fa-map-marker-alt"></i> {{ $relatedProperty->address }}
                                                </div>
                                                @endif
                                                <div class="type-location">
                                                    <div class="i1">
                                                        <i class="fas fa-edit"></i> {{ $relatedProperty->type->name }}
                                                    </div>
                                                    <div class="i2">
                                                        <i class="fas fa-location-arrow"></i> {{ $relatedProperty->location->name }}
                                                    </div>
                                                </div>
                                                <div class="agent-section">
                                                    <img class="agent-photo" src="/storage/agent/{{ $relatedProperty->user->image }}" alt="">
                                                    <a href="{{ route('theme.agents.show',$relatedProperty->user->slug) }}">{{ $relatedProperty->user->name }} ({{ $relatedProperty->user->job_title }})</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-4 col-md-12">

                <div class="right-item">
                    <h2>Agent</h2>
                    <div class="agent-right d-flex justify-content-between align-items-center">
                        <div class="left">
                            <img src="/storage/agent/{{ $property->user->image }}" alt="{{ $property->user->name }}">
                        </div>
                        <div class="right">
                            <h3><a href="{{ route('theme.agents.show', $property->user->slug) }}">{{ $property->user->name }}</a></h3>
                            <h4>{{ $property->user->job_title }}</h4>
                        </div>
                        <div class="ml-auto">
                            <button class="btn btn-primary" onclick="sendMessage({{ $property->user->id }})">Send Message</button>
                        </div>
                    </div>
                    <div class="table-responsive mt_25">
                        <table class="table table-bordered">
                            <tr>
                                <td>Posted On: </td>
                                <td>{{ $property->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>{{ $property->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone: </td>
                                <td>{{ $property->user->phone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="right-item">
                    <h2>Features</h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Price</b></td>
                                    <td>${{ $property->price }}</td>
                                </tr>
                                <tr>
                                    <td><b>Location</b></td>
                                    <td>{{ $property->location->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Type</b></td>
                                    <td>{{ $property->type->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Status</b></td>
                                    <td>{{ $property->purpose }}</td>
                                </tr>
                                <tr>
                                    <td><b>Bedroom:</b></td>
                                    <td>{{ $property->bedroom }}</td>
                                </tr>
                                <tr>
                                    <td><b>Bathroom:</b></td>
                                    <td>{{ $property->bathroom }}</td>
                                </tr>
                                <tr>
                                    <td><b>Size:</b></td>
                                    <td>{{ $property->size }} sqft</td>
                                </tr>
                                <tr>
                                    @if($property->floor)
                                    <td><b>Floor:</b></td>
                                    <td>{{ $property->floor }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($property->garage)
                                    <td><b>Garage:</b></td>
                                    <td>{{ $property->garage }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($property->balcony)
                                    <td><b>Balcony:</b></td>
                                    <td>{{ $property->balcony }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($property->address)
                                    <td><b>Address:</b></td>
                                    <td>{{ $property->address }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($property->built_year)
                                    <td><b>Built Year:</b></td>
                                    <td>{{ $property->built_year }}</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if($property->amenities->count())
                <div class="right-item">
                    <h2>Amenities</h2>
                    <div class="amenity">
                        <ul class="amenity-ul">
                            @foreach($property->amenities as $amenity)
                            <li><i class="fas fa-check-square"></i> {{ $amenity->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="right-item">
                    <h2>Location Map</h2>
                    <div class="location-map">
                        {!! $property->location_map !!}
                    </div>
                </div>

                <div class="right-item">
                    <h2>Enquery Form</h2>
                    <div class="enquery-form">
                        <form id="enquiryForm" action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="property" value="{{ $property->id }}">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" />
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Address" />
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number" />
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control h-150" name="message" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#enquiryForm').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Clear previous errors
            $('.error-message').html('');

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                url: '/enquiry', // Ensure this URL matches your route
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if (response.status === 'success') {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#enquiryForm')[0].reset(); // Clear the form fields
                    }
                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response.status === 'error') {
                        // Handle validation errors
                        var errorMessages = '';
                        $.each(response.errors, function(key, value) {
                            errorMessages += '<div class="alert alert-danger">' + value[0] + '</div>';
                        });
                        $('#message').html(errorMessages);
                    } else {
                        console.error(error);
                    }
                }
            });
        });
    });
</script>
@endsection
