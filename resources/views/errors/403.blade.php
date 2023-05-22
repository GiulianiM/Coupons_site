@extends('layouts.public')

@section('title', 'Errore 403 - Accesso negato')

@section('content')
    <div class="error-container rounded bg-white shadow p-5">
        <h1 class="text-center pb-5">Errore 403 - Accesso negato</h1>
        <p class="text-center fw-semibold fs pb-5">Non hai il permesso per accedere a questa pagina.</p>
        <div class="text-center">
            <a href="{{ route('homepage') }}" class="btn">Torna alla Home</a>
        </div>
    </div>
@endsection
