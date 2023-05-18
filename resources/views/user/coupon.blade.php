@extends('layouts.public')

@section('title', 'Promozione')

@section('content')

    <div class="promozione-container">
        <div class="card p-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image">
                        @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $coupon->promozione->immagine])
                    </div>
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">{{ $coupon->promozione->azienda->nome }}</small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-text text-center fw-b pb-3">{{$coupon->promozione->titolo}}</h5>
                    <p class="card-text text-start">{{$coupon->promozione->descrizione}}</p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-start" style="margin-left: 8em">
                        <p class="card-text">Periodo: {{ $coupon->promozione->inizio }} - {{ $coupon->promozione->fine }}</p>
                        <p class="card-text">Dove utilizzarlo: {{ $coupon->promozione->luogo }}</p>
                        <h1 class="card-title mt-5">Codice: {{ $coupon->codice }}</h1>
                    </div>
                    <div class="mt-auto ms-5">
                        <h5 class="card-title">Tipo di sconto: {{ $coupon->promozione->sconto }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
