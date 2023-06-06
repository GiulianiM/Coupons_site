@extends('layouts.public')

@section('title', 'Promozione')

@section('content')

    <div class="promozione-container">
        <div class="card p-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image">
                        @include('helpers.promozioneImg', ['attrs' => ' pe-4', 'imgFile' => $promozione->immagine])
                    </div>
                    <div class="card-body">
                        <p class="card-text mt-4 fw-bold">{{ $promozione->azienda->nome }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="card-text text-center fw-b pb-3">{{$promozione->titolo}}</h5>
                    <p class="card-text text-start">{{$promozione->descrizione}}</p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-start" style="margin-left: 8em">
                        <p class="card-text"><span class="fw-bold">Periodo:</span> Dal {{ $promozione->inizio }} al {{ $promozione->fine }}</p>
                        <p class="card-text"><span class="fw-bold">Dove utilizzarlo:</span> {{ $promozione->luogo }}</p>
                    </div>
                    <div class="mt-auto ms-5">
                        @if ($promozione->sconto === 'prezzo_fisso')
                            <p class="card-text"><span class="fw-bold">Offerta:</span> {{ $promozione->valore_sconto }}€</p>
                        @elseif ($promozione->sconto === 'quantita')
                            <p class="card-text fw-bold">{{ $promozione->valore_sconto }}</p>
                        @elseif ($promozione->sconto === 'percentuale')
                            <p class="card-text"><span class="fw-bold">Sconto:</span> -{{ $promozione->valore_sconto }}%</p>
                        @endif
                        @auth
                            @can('isUser')
                                <a href="{{ route('riscatta', ['promozione' => $promozione->idPromozione]) }}" class="btn">Riscatta</a>
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
