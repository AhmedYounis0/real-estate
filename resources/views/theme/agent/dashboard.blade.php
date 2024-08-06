@extends('theme.master')
@section('content')

@include('theme.partials.internal-banner')

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <h3>Hello, {{ ucwords(Auth::user()->name) }}</h3>
                <p>See all the statistics at a glance:</p>

                <div class="row box-items">
                    <div class="col-md-4">
                        <div class="box1">
                            <h4>{{ $CountActiveProperties }}</h4>
                            <p>Active Properties</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box3">
                            <h4>{{ $countActiveFeaturedProperties }}</h4>
                            <p>Featured Properties</p>
                        </div>
                    </div>
                </div>
                <h3 class="mt-5">Recent Properties</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @if($ActiveProperties->count())
                            @foreach($ActiveProperties as $property)
                            <tr>
                                    <td>{{ $loop->index + $ActiveProperties->firstItem() }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->type->name }}</td>
                                    <td>{{ $property->location->name }}</td>
                                    <td>
                                        @if(!empty($property->order_id))
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Not Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('agent.properties.edit',$property->slug) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('agent.properties.destroy',$property->slug) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{ $ActiveProperties->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
