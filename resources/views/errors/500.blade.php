@extends('layouts.public')

@section('title', 'Errore 500 - Errore del server')

@section('content')
    <div class="error-container rounded bg-white shadow p-5">
        <h1 class="text-center pb-5">Errore 500 - Errore del server</h1>
        <p class="text-center fw-semibold fs pb-5">Si è verificato un errore del server.</p>
        <div class="text-center">
            <a href="{{ route('homepage') }}" class="btn">Torna alla Home</a>
        </div>
    </div>
@endsection
