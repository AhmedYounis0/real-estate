@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Why Choose Us</h1>
            <div class="ml-auto">
                <a href="{{ route('dashboard.chooses.create') }}" class="btn btn-primary">Create</a>
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
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($chooses as $choose)
                                            <tr>
                                                <td>{{ 1 + $loop->index }}</td>
                                                <td><i class="{{ $choose->icon }}"></i></td>
                                                <td>{{ $choose->title}}</td>
                                                <td>{!! Str::limit($choose->description,50) !!}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('dashboard.chooses.edit',$choose) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('dashboard.chooses.destroy',$choose) }}" method="POST" class="d-inline">
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
