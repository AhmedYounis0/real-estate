@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <form action="{{ route('agent.properties.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Property Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Price *</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($featuredCount > $featuredProperties)
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Featured</label>
                            <select name="is_featured" class="form-control">
                                <option selected disabled>Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        @endif
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Location *</label>
                            <select name="location_id" class="form-control">
                                <option selected disabled>--- Select ---</option>
                                @forelse($locations as $location)
                                <option value="{{ $location->id }}" @if($location->id == old('location_id')) selected @endif>{{ $location->name }}</option>
                                @empty
                                <option disabled>No locations found</option>
                                @endforelse
                            </select>
                            @error('location_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Type *</label>
                            <select name="type_id" class="form-control">
                                <option selected disabled>--- Select ---</option>
                                @forelse($types as $type)
                                    <option value="{{ $type->id }}"  @if($type->id == old('type_id')) selected @endif>{{ $type->name }}</option>
                                @empty
                                    <option disabled>No types found</option>
                                @endforelse
                            </select>
                            @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Purpose *</label>
                            <select name="purpose" class="form-control">
                                <option selected disabled>--- Select ---</option>
                                <option value="For Sale" @if(old('purpose') == 'For Sale') selected @endif>For Sale</option>
                                <option value="For Rent" @if(old('purpose') == 'For Rent') selected @endif>For Rent</option>
                            </select>
                            @error('purpose')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Bedrooms *</label>
                            <select name="bedroom" class="form-control">
                                <option selected disabled>--- Select ---</option>
                                @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" @if(old('bedroom') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('bedroom')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Bathrooms *</label>
                            <select name="bathroom" class="form-control">
                                <option selected disabled>--- Select ---</option>
                                @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" @if(old('bathroom') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('bathroom')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="size" class="form-label">Size (Sqft) *</label>
                            <input type="text" name="size" class="form-control" value="{{ old('size') }}">
                            @error('size')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Floor</label>
                            <input type="text" name="floor" class="form-control" value="{{ old('floor') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Garage</label>
                            <input type="text" name="garage" class="form-control" value="{{ old('garage') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Balcony</label>
                            <input type="text" name="balcony" class="form-control" value="{{ old('balcony') }}">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Built Year</label>
                            <input type="text" name="built_year" class="form-control" value="{{ old('built_year') }}">
                            @error('built_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Location Map</label>
                            <textarea name="location_map" class="form-control h-150" cols="30" rows="10">{{ old('location_map') }}</textarea>
                            @error('location_map')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Amenities</label>
                            <div class="row">
                                @if(count($amenities) > 0)
                                    @foreach($amenities as $amenity)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity->id }}" id="chk{{ $amenity->id }}">
                                                <label class="form-check-label" for="chk{{ $amenity->id }}">
                                                    {{ $amenity->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @error('amenities')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="file" class="form-control" name="image" />
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
