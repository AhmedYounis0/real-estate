@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Agents</h1>
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($agents as $agent)
                                        <tr>
                                            <td>{{ 1 + $loop->index }}</td>
                                            <td><img src="/storage/agent/{{ $agent->image }}" style="height: 100px; width: 100px;" alt=""></td>
                                            <td>{{ $agent->name}}</td>
                                            <td>{{ $agent->email}}</td>
                                            <td>xx</td>
                                            <td class="pt_10 pb_10">
                                                <form action="{{ route('dashboard.agents.destroy',$agent) }}" method="POST" class="d-inline">
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
