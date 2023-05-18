@extends('layouts.public')

@section('title', 'Promozione')

@section('content')

    <div class="promozione-container">
        <div class="card p-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image">
                        @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                    </div>
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">{{ $promozione->azienda->nome }}</small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-text text-center fw-b pb-3">{{$promozione->titolo}}</h5>
                    <p class="card-text text-start">{{$promozione->descrizione}}</p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-start" style="margin-left: 8em">
                        <p class="card-text">Periodo: {{ $promozione->inizio }} - {{ $promozione->fine }}</p>
                        <p class="card-text">Dove utilizzarlo: {{ $promozione->luogo }}</p>
                    </div>
                    <div class="mt-auto ms-5">
                        <h5 class="card-title">{{ $promozione->sconto }}</h5>
                        @auth
                            @can('isUser')
                                <a href="#" class="btn">Riscatta</a>
                            @endcan
                        @else
                            <a href="{{ route('signup') }}" class="btn">Effettua il signup per riscattare</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
