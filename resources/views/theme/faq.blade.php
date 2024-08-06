@extends('theme.master')
@section('content')
@include('theme.partials.internal-banner')
<div class="page-content faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="accordion" id="accordionExample">
                    @if($faqs->count())
                        @foreach($faqs as $faq)
                        <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="false" aria-controls="collapse_{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse_{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
