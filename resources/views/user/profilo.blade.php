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
                        <p><strong>Nome:</strong></p>
                        <p><strong>Cognome:</strong></p>
                        @can('isUser')
                            <p><strong>Email:</strong></p>
                            <p><strong>Telefono:</strong></p>
                            <p><strong>Genere:</strong></p>
                            <p><strong>Età:</strong></p>
                        @endcan
                    </div>

                    <div class="col-md-3">
                        <p>{{ $utente->username }}</p>
                        <p>{{ $utente->nome }}</p>
                        <p>{{ $utente->cognome }}</p>
                        @can('isUser')
                            <p>{{ $utente->email }}</p>
                            <p>{{ $utente->telefono }}</p>
                            <p>{{ $utente->genere }}</p>
                            <p>{{ $utente->eta }}</p>
                        @endcan
                    </div>

                    <div class="text-center">
                        <a class="btn my-3 py-2 px-5" href="{{ route('profilo.edit') }}" role="button">Modifica
                            profilo</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @can('isUser')
        @isset($coupons)
            <div id="coupons">
                <div class="coupons-container">
                    <h1 class="d-flex justify-content-center fw-bold pb-3">Promozioni riscattate</h1>
                    <div class="grid-view">
                        @foreach($coupons as $coupon)
                            <div class="card">
                                <div class="image">
                                    @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $coupon->promozione->immagine])
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('coupon.profilo', ['coupon' => $coupon->idCoupon]) }}"
                                       class="card-link">
                                        <h5 class="card-title">{{ $coupon->promozione->titolo }}</h5>
                                    </a>
                                    <p class="card-text">{{ $coupon->promozione->sconto }}</p>
                                    <p class="card-text">{{ $coupon->promozione->valore_sconto }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($expiredCoupons->isEmpty())
                @else
                    <div class="coupons-container">
                        <h1 class="d-flex justify-content-center fw-bold pb-3">Promozioni riscattate scadute</h1>
                        <div class="grid-view">
                            @foreach($expiredCoupons as $coupon)
                                <div class="card">
                                    <div class="image">
                                        @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $coupon->promozione->immagine])
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('coupon.profilo', ['coupon' => $coupon->idCoupon]) }}"
                                           class="card-link">
                                            <h5 class="card-title">{{ $coupon->promozione->titolo }}</h5>
                                        </a>
                                        <p class="card-text">{{ $coupon->promozione->sconto }}</p>
                                        <p class="card-text">{{ $coupon->promozione->valore_sconto }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="d-flex justify-content-center mb-2">
                    @include('pagination.paginator', ['paginator' => $coupons->fragment('coupons')])
                </div>
            </div>
        @endisset
    @endcan
@endsection
