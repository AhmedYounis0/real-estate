@extends('admin.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Locations</h1>
                <div class="ml-auto">
                    <a href="{{ route('dashboard.locations.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Preview</th>
                                            <th>Name</th>
                                            <th>Agent</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($properties as $property)
                                            <tr>
                                                <td>{{ 1 + $loop->index }}</td>
                                                <td><img src="/storage/preview/{{ $property->image}}" style="height: 50px; width:50px;"></td>
                                                <td>{{ $property->name }}</td>
                                                <td>{{ $property->user->name }}</td>
                                                <td>{{ $property->location->name}}</td>
                                                <td>{{ $property->type->name }}</td>
                                                <td>{{ $property->purpose }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('theme.properties.show',$property->slug) }}" target="_blank" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                                    <form action="{{ route('dashboard.properties.destroy',$property) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="alert text-center" colspan="5">There is nothing to view</td>
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
