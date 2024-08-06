@extends('admin.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Packages</h1>
                <div class="ml-auto">
                    <a href="{{ route('dashboard.packages.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($packages->count())
                                            @foreach($packages as $package)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->price }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_{{ $package->id }}"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('dashboard.packages.edit',$package) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('dashboard.packages.destroy',$package) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="modal_{{ $package->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Package Name</label></div>
                                                                    <div class="col-md-8">{{ $package->name }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Price</label></div>
                                                                    <div class="col-md-8">{{ $package->price }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Allowed Duration</label></div>
                                                                    <div class="col-md-8">{{ $package->duration }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Allowed Properties</label></div>
                                                                    <div class="col-md-8">
                                                                        @if($package->properties_allowed < 0)
                                                                            Unlimited
                                                                        @else
                                                                            {{ $package->properties_allowed }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Allowed Featured Properties</label></div>
                                                                    <div class="col-md-8">{{ $package->featured_properties }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Allowed Photos</label></div>
                                                                    <div class="col-md-8">{{ $package->photos_allowed }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Allowed Videos</label></div>
                                                                    <div class="col-md-8">{{ $package->videos_allowed }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            </div>
        </section>
    </div>
@endsection
