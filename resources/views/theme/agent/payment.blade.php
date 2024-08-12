@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            @include('theme.partials.agent-dashboard-sidebar')
            <div class="col-lg-9 col-md-12">
                @if($orders->count())
                <h4>Current Plan</h4>
                    <div class="row box-items mb-4">
                    @foreach($orders as $order)
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>${{ $order->package->price }}</h4>
                                <p>{{ $order->package->name }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endif
                <h4>Upgrade Plan (Make Payment)</h4>
                <div class="table-responsive">
                    <table class="table table-bordered upgrade-plan-table">
                        <tr>
                            <td>
                            <form action="{{ route('agent.payment') }}" method="post">
                                @csrf
                                <select name="package_id" class="form-control">
                                    @foreach($packages as $package)
                                        @if($package->name != 'Free')
                                        <option value="{{ $package['id'] }}">{{ $package['name'] }} (${{ $package['price'] }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm buy-button" type="submit">Pay with payPal</button>
                            </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{ route('agent.stripe') }}" method="post">
                                    @csrf
                                    <select name="package_id" class="form-control">
                                        @foreach($packages as $package)
                                            @if($package->name != 'Free')
                                                <option value="{{ $package['id'] }}">{{ $package['name'] }} (${{ $package['price'] }})</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm buy-button" type="submit">Pay with card</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
