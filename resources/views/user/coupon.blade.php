@extends('layouts.public')

@section('title', 'Promozione')

@section('extra-css-jquery')
    <style>
        @media print {
            #alert {
                display: none !important;
            }

            .navbar {
                display: none !important;
            }

            body footer {
                visibility: hidden !important;
            }
        }
    </style>
@endsection

@section('content')

    @if (session('message'))
        <div class="alert alert-warning text-center" id="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('message') }}
        </div>
    @endif

    <div class="promozione-container">
        <div class="card p-5">
            <div class="coupon-container">
                <h1 class="coupon-header">Coupon</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                            @include('helpers.promozioneImg', ['attrs' => 'coupon-image', 'imgFile' => $coupon->promozione->immagine])
                        </div>
                    </div>
                    <div class="col-md-6 my-4">
                        <div class="coupon-info text-start">
                            <p class="fw-bold mb-0">Descrizione:</p><span>{{ $coupon->promozione->descrizione }}</span>
                            <p class="fw-bold mb-0 mt-2">Riscattato dall'utente:</p><span>{{ $coupon->utente->nome }} {{ $coupon->utente->cognome }} ({{ $coupon->utente->username }})</span>
                            <p class="fw-bold mb-0 mt-2">Modalità di fruizione:</p><span>{{ $coupon->promozione->modalita }}</span>
                            @if ($coupon->promozione->sconto === 'prezzo_fisso')
                                <p class="fw-bold mb-0 mt-2">Offerta:</p><span>{{ $coupon->promozione->valore_sconto }}€</span>
                            @elseif ($coupon->promozione->sconto === 'quantita')
                                <p class="fw-bold mb-0 mt-2">Offerta:</p><span>Acquista 1 e ricevi {{ $coupon->promozione->valore_sconto }} in regalo</span>
                            @elseif ($coupon->promozione->sconto === 'percentuale')
                                <p class="fw-bold mb-0 mt-2">Sconto:</p><span>-{{ $coupon->promozione->valore_sconto }}%</span>
                            @endif
                        </div>
                    </div>
                </div>

                <h1 class="coupon-code">Codice univoco: {{ $coupon->codice }}</h1>
            </div>
        </div>
    </div>
@endsection
