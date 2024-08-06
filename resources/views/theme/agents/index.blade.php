@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="agent pb_40">
    <div class="container">
        <div class="row">
            @forelse($agents as $agent)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="item">
                        <div class="photo">
                            <a href="{{ route('theme.agents.show',$agent->slug) }}"><img src="/storage/agent/{{ $agent->image }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="{{ route('theme.agents.show',$agent->slug) }}">{{ $agent->name }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            @empty
                No Agents At the moment
            @endforelse
        </div>
    </div>
</div>
@endsection
