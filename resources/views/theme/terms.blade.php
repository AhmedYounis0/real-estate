@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($terms->count())
                    @foreach($terms as $term)
                        {!! $term['content'] !!}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
