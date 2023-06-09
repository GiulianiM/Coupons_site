@extends('layouts.public')

@section('title', 'Aziende')

@section('content')

    <!-- Tutte le aziende grid view -->
    <div class="company-container">
        <h1 class="d-flex justify-content-center fw-bold pb-3">Aziende</h1>
        @isset($aziende)
        <div class="grid-view">
            @foreach($aziende as $azienda)
                <div class="company-card">
                    <div class="image">
                        @include('helpers.aziendaImg', ['attrs' => 'logo', 'imgFile' => $azienda->logo])
                    </div>
                    <div class="card-body">
                        <a href="{{ route('azienda', ['azienda' => $azienda->idAzienda]) }}" class="card-link">
                            <h5 class="card-title">{{$azienda->nome}}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @endisset
    </div>

    <div class="d-flex justify-content-center">
        @include('pagination.paginator', ['paginator' => $aziende])
    </div>
@endsection
