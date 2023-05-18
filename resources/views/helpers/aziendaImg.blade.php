@php
    if (empty($imgFile)) {
        $imgFile = 'default.jpg';
    }

@endphp
<img src="{{ asset('images/aziende/' . $imgFile) }}" class="{{ $attrs ?? '' }}">

<?php
