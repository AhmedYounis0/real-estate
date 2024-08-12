@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($privacy->count())
                    @foreach($privacy as $value)
                        {!! $value['content'] !!}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
