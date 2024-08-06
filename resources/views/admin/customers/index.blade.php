@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Customers</h1>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <td>{{ 1 + $loop->index }}</td>
                                            <td>{{ $customer->name}}</td>
                                            <td>{{ $customer->email}}</td>
                                            <td>xx</td>
                                            <td class="pt_10 pb_10">
                                                <form action="{{ route('dashboard.customers.destroy',$customer) }}" method="POST" class="d-inline">
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
