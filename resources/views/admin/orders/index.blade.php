@extends('admin.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Orders</h1>
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
                                            <th>Purchase Date</th>
                                            <th>Expire Date</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ 1 + $loop->index }}</td>
                                                <td>{{ $order->package->name}}</td>
                                                <td>{{ $order->package->price}}</td>
                                                <td>{{ $order->purchase_date}}</td>
                                                <td>{{ $order->expire_date}}</td>
                                                <td>{{ $order->payment_method}}</td>
                                                <td>
                                                @if($order->status == 'active')
                                                    <span class="badge bg-success">{{ $order->status }}</span>
                                                @endif
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <form action="{{ route('dashboard.orders.destroy',$order) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td class="alert text-center" colspan="9">There is nothing to view</td>
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
