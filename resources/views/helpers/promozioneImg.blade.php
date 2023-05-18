@php
    if (empty($imgFile)) {
        $imgFile = 'default.jpg';
    }

@endphp
<img src="{{ asset('images/promozioni/' . $imgFile) }}" class="{{ $attrs ?? '' }}">

