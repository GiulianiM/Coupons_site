@extends('layouts.public')

@section('title', 'Promozione')

@section('extra-css')
    <style>
        @media print {
            .navbar {
                display: none; !important;
            }

            footer {
                display: none !important;
            }
        }
    </style>
@endsection

@section('content')

    @if (session('message'))
        <div class="alert alert-warning text-center">
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
                        </div>
                    </div>
                </div>
                <h1 class="coupon-code">Codice univoco: {{ $coupon->codice }}</h1>
            </div>
        </div>
    </div>
@endsection
