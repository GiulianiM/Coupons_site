@extends('layouts.public')

@section('title', 'Azienda')

@section('content')

    <!-- Descrizione azienda -->
    <div class="company-container">
        <form class="rounded bg-white shadow p-5">
            <div class="row">
                <div class="col">
                    <div id="logo" class="image">
                        @include('helpers.aziendaImg', ['attrs' => '', 'imgFile' => $azienda->logo])
                    </div>
                </div>
                <div class="col">
                    <h1 class="text-dark fw-bolder fs-1 mb-2">{{$azienda->nome}} {{$azienda->ragione_sociale}}</h1>
                    <br>
                    <h4>Info azienda:</h4>
                    <p>{{$azienda->descrizione}}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h4>Sede:</h4>
                    <p>{{$azienda->via}} {{$azienda->numero_civico}}, {{$azienda->citta}}, {{$azienda->cap}}</p>
                </div>
                <div class="col">
                    <h4>Tipologia:</h4>
                    <p>{{$azienda->tipologia}}</p>
                </div>
            </div>
        </form>
    </div>

    <!-- Coupon azienda -->
    @isset($promozioni)
        <div class="coupons-container">
            <h1 class="d-flex justify-content-center">Promozioni dell'azienda</h1>
            <div class="grid-view">
                @foreach($promozioni as $promozione)
                    <div class="card">
                        <div class="image">
                            @include('helpers.promozioneImg', ['attrs' => 'card-img-top grid-view-img', 'imgFile' => $promozione->immagine])
                        </div>
                        <div class="card-body">
                            <a href="{{ route('promozione', ['promozione' => $promozione->idPromozione]) }}" class="card-link">
                                <h5 class="card-title">{{ $promozione->titolo }}</h5>
                            </a>
                            @if ($promozione->sconto === 'prezzo_fisso')
                                <p class="card-text">Offerta: {{ $promozione->valore_sconto }}€</p>
                            @elseif ($promozione->sconto === 'quantita')
                                <p class="card-text">{{ $promozione->valore_sconto }}</p>
                            @elseif ($promozione->sconto === 'percentuale')
                                <p class="card-text">Sconto: -{{ $promozione->valore_sconto }}%</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            @include('pagination.paginator', ['paginator' => $promozioni])
        </div>
    @endisset
@endsection
