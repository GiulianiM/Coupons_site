@php
    /*if (empty($imgFile)) {
        $imgFile = 'default.jpg';
    }*/

@endphp

@if(file_exists(public_path('images/aziende/' . $imgFile)) || empty($imgFile))
    <img src="{{ asset('images/aziende/' . $imgFile) }}" class="{{ $attrs ?? '' }}" alt="Immagine azienda">
@else
    <img src="{{ asset('images/aziende/company.png') }}" class="{{ $attrs ?? '' }}" alt="Immagine azienda default">
@endif

<?php
