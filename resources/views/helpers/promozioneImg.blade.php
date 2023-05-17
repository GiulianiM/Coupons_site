@php
    if (empty($imgFile)) {
        $imgFile = 'default.jpg';
    }
    if ($attrs != null) {
        $attrs = 'class="' . $attrs . '"';
    }

@endphp
<img src="{{ asset('images/promozioni/' . $imgFile) }}" class="{{ $attrs ?? '' }}">

