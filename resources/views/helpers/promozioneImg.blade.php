@php
    /*if (empty($imgFile)) {
        $imgFile = 'default.jpg';
    }*/

@endphp

@if(file_exists(public_path('images/promozioni/' . $imgFile)) &&  !empty($imgFile))
    <img src="{{ asset('images/promozioni/' . $imgFile) }}" class="{{ $attrs ?? '' }}" alt="Immagine promozione">
@else
    <img src="{{ asset('images/promozioni/promozione.png') }}" class="{{ $attrs ?? '' }}" alt="Immagine promozione default">
@endif

<?php
