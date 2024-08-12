@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.user-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Price</th>
                            <th class="w-100">Detail</th>
                        </tr>
                        @forelse($wishlists as $wishlist)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $wishlist->property->name }}</td>
                                <td>{{ ucwords($wishlist->property->user->name) }}</td>
                                <td>${{ $wishlist->property->price }}</td>
                                <td>
                                    <a href="{{ route('theme.properties.show',$wishlist->property->slug) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center alert alert-danger">No properties in the wishlist</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
