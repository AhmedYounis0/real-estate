@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content pricing">
    <div class="container">
        <div class="row pricing">
            @if($packages->count())
                @foreach($packages as $package)
                <div class="col-lg-3 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{ $package->name }}</h2>
                        <h3 class="card-price">${{ rtrim(rtrim($package->price,'0'), '.') }}</h3>
                        <h4 class="card-day">({{ $package->duration }} Days)</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @if($package->properties_allowed < 0)
                                <span class="fa-li">
                                    <i class="fas fa-check"></i>
                                </span> Unlimited Properties Allowed
                                @else
                                    <span class="fa-li">
                                    <i class="fas fa-check"></i>
                                </span> {{ $package->properties_allowed }} Properties Allowed
                                @endif
                            </li>
                            <li>
                                @if($package->featured_properties < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Featured Property
                                @elseif($package->featured_properties == 0)
                                <span class="fa-li"><i class="fas fa-times"></i></span>No Featured Property
                                @else
                                <span class="fa-li"><i class="fas fa-check"></i></span>{{ $package->featured_properties }} Featured Property
                                @endif
                            </li>
                            <li>
                                @if($package->photos_allowed < 0)
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Photos per Property
                                @elseif($package->photos_allowed == 0)
                                    <span class="fa-li"><i class="fas fa-times"></i></span>No Photos per Property
                                @else
                                    <span class="fa-li"><i class="fas fa-check"></i></span>{{ $package->photos_allowed }} Photos per Property
                                @endif
                            </li>
                            <li>
                                @if($package->videos_allowed < 0)
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Videos per Property
                                @elseif($package->videos_allowed == 0)
                                    <span class="fa-li"><i class="fas fa-times"></i></span>No Videos per Property
                                @else
                                    <span class="fa-li"><i class="fas fa-check"></i></span>{{ $package->videos_allowed }} Videos per Property
                                @endif
                            </li>
                        </ul>
                        <div class="buy">
                            @if(!Auth::check())
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    Choose Plan
                                </a>
                            @elseif(Auth::user()->role == 'agent')
                                <a href="{{ route('agent.package.payment') }}" class="btn btn-primary">
                                    Choose Plan
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
