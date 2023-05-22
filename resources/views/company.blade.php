@extends('layouts.public')

@section('title', 'La nostra azienda')

@section('content')
    <div class="company-container">
        <form class="rounded bg-white shadow p-5">
                    <h1 class="text-dark fw-bolder fs-1 mb-2">Coupon Site</h1>
                    <br>
                    <h5 style="font-weight: normal">Coupon Site è un'azienda all'avanguardia specializzata nella generazione di coupon personalizzati per aziende esterne. I nostri coupon possono essere utilizzati per promuovere sconti, offerte speciali, campagne promozionali e molto altro ancora.</h5>
                    <h5 style="font-weight: normal">Se desideri promuovere i tuoi prodotti o servizi attraverso coupon efficaci e di alta qualità, contatta <a href="{{route('collabora')}}">Coupon Site</a> oggi stesso. Il nostro team sarà lieto di aiutarti a realizzare le tue strategie promozionali e a ottenere risultati tangibili nel tuo settore di riferimento."</h5>
                    <br>
                    <h5 style="font-weight: normal">Per ulteriori informazioni inviare un email a: coupon.site@support.com </h5>
        </form>
    </div>
@endsection
