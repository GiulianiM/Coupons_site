@extends('layouts.public')

@section('title', 'Collabora con noi')

@section('content')
    <div class="company-container">
        <form class="rounded bg-white shadow p-5">
            <div class="col">
                <div class="image">
                    <img src="{{asset('images/logo.png')}}" class="d-inline-block align-top" alt="Logo" style="width: 150px; height: auto">
                </div>
            </div>
            <div class="col">
                <h1 class="text-dark fw-bolder fs-1 mb-2">Collabora con noi:</h1>
                <br>
                <h5 style="font-weight: normal">Siamo lieti di invitare la vostra azienda a collaborare con noi per l'emissione di coupon per sconti. Come esperti nel settore, offriamo soluzioni personalizzate per promuovere i vostri prodotti o servizi attraverso offerte speciali. La nostra piattaforma permette di raggiungere una vasta base di clienti interessati, fornendo loro opportunità uniche per risparmiare e sperimentare ciò che la vostra azienda ha da offrire.</h5>
                <h5 style="font-weight: normal">Saremmo entusiasti di discutere le modalità di collaborazione e di lavorare insieme per ottenere risultati tangibili nel vostro settore di riferimento. Unitevi a noi per una partnership di successo nel mondo dei coupon per sconti.</h5>
                <h5 style="font-weight: normal">Per ulteriori informazioni inviare un email a: coupon.site@support.com </h5>
            </div>
        </form>
    </div>
@endsection
