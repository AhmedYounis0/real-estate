@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Expire Date</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                            @if($orders->count())
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->package->name }}</td>
                                    <td>${{ $order->package->price }}</td>
                                    <td>{{ $order->purchase_date }}</td>
                                    <td>{{ $order->expire_date }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        @if($order->status == 'active')
                                        <span class="badge bg-success">{{ $order->status }}</span>
                                        @else
                                        <span class="badge bg-danger">{{ $order->status }}</span>
                                        @endif
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
