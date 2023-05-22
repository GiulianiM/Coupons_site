@extends('layouts.public')

@section('title', 'Errore 404 - Pagina non trovata')

@section('content')
    <div class="error-container rounded bg-white shadow p-5">
        <h1 class="text-center pb-5">Errore 404 - Pagina non trovata</h1>
        <p class="text-center fw-semibold fs pb-5">Non esiste una pagina a questo indirizzo.</p>
        <div class="text-center">
            <a href="{{ route('homepage') }}" class="btn">Torna alla home</a>
        </div>
    </div>
@endsection
