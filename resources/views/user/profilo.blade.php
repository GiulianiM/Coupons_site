@extends('layouts.public')

@section('title', 'Profilo')

@section('content')
    <section class="wrapper">
        <div class="container">
            <form class="rounded bg-white shadow p-5">
                <h1 class="text-dark text-center fw-bolder fs-1 mb-4">Informazioni personali</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3">
                        <p><strong>Username:</strong></p>
                        <p><strong>Email:</strong></p>
                        <p><strong>Nome:</strong></p>
                        <p><strong>Cognome:</strong></p>
                        <p><strong>Telefono:</strong></p>
                        <p><strong>Genere:</strong></p>
                        <p><strong>Età:</strong></p>
                    </div>

                    <div class="col-md-3">
                        <p>{{ $utente->username }}</p>
                        <p>{{ $utente->email }}</p>
                        <p>{{ $utente->nome }}</p>
                        <p>{{ $utente->cognome }}</p>
                        <p>{{ $utente->telefono }}</p>
                        <p>{{ $utente->genere }}</p>
                        <p>{{ $utente->eta }}</p>
                    </div>

                    <div class="text-center">
                        <a class="btn my-3 py-2 px-5" href="" role="button">Modifica profilo</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @can('isUser')
        @isset($promozioni)
            <div id="promozioni">
                <div class="coupons-container">
                    <h1 class="d-flex justify-content-center fw-bold pb-3">Promozioni riscattate</h1>
                    <div class="grid-view">
                        @foreach($promozioni as $promozione)
                            <div class="card">
                                <div class="image">
                                    @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                                </div>
                                <div class="card-body">
                                    <a href="/promozione/{{$promozione->idPromozione}}" class="card-link">
                                        <h5 class="card-title">{{ $promozione->titolo }}</h5>
                                    </a>
                                    <p class="card-text">{{ $promozione->sconto }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    @include('pagination.paginator', ['paginator' => $promozioni->fragment('promozioni')])
                </div>
            </div>
        @endisset
    @endcan
@endsection
