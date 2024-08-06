@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Amenities</h1>
            <div class="ml-auto">
                <a href="{{ route('dashboard.amenities.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (@session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($amenities as $amenity)
                                            <tr>
                                                <td>{{ 1 + $loop->index }}</td>
                                                <td>{{ $amenity->name}}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('dashboard.amenities.edit',$amenity) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('dashboard.amenities.destroy',$amenity) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td class="alert text-center" colspan="2">There is nothing to view</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
