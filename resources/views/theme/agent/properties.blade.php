@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">
                    @if(session('status'))
                        <div class="alert alert-danger">{{ session('status') }}</div>
                    @endif
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th class="w-100">Options</th>
                                <th class="w-60">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($properties->count())
                            @foreach($properties as $property)
                            <tr>
                                <td><img src="/storage/preview/{{ $property->image }}" style="height: 100px; width: 100px;"></td>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->type->name }}</td>
                                <td>{{ $property->location->name }}</td>
                                <td>{{ $property->purpose }}</td>
                                <td>
                                    @if($property->is_featured == 1)
                                    <span class="badge bg-success">Yes</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('agent.images.index',$property->id) }}" class="btn btn-primary btn-sm btn-sm-custom w-100-p mb_5">Photo Gallery</a>
                                    <a href="{{ route('agent.videos.index',$property->id) }}" class="btn btn-primary btn-sm btn-sm-custom w-100-p mb_5">Video Gallery</a>
                                </td>
                                <td>
                                    <a href="{{ route('agent.properties.edit',$property) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
{{--                                    <a href="" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>--}}
                                    <form action="{{ route('agent.properties.destroy', $property) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
