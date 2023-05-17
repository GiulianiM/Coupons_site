@extends('layouts.public')

@section('title', 'FAQ')

@section('content')
    <div class="faq-container">
        <h1 class="d-flex justify-content-center fw-bold pb-3">FAQ</h1>
        <p class="text-center mb-5"> Find the answers for the most frequently asked questions below</p>
        <div class="row">
            @isset($faqs)
                @foreach($faqs as $faq)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3"><i class="fas fa-pen-alt pe-2"></i>{{ $faq->titolo }}</h6>
                        <p>{{ $faq->descrizione }}</p>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
