@extends('layouts.user')

@section('title', 'Area User')

@section('content')
<div class="static">
    <h3>Area Utente</h3>
    <p>Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
    <p>Seleziona la funzione da attivare</p>
</div>
@endsection


