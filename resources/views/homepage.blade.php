@extends('layouts.public')

@section('title', 'Homepage')

@section('extra-css-jquery')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script>
        $(document).ready(function () {
            $('.carousel').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 4,
                slidesToScroll: 4,
                adaptiveHeight: true,
                prevArrow: $('.carousel-arrow-left'),
                nextArrow: $('.carousel-arrow-right'),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection

@section('content')
    <div class="search-container">
        <form class="d-flex" action="{{ route('homepage') }}" method="GET">
            <div class="form-group">
                <input class="form-control" type="text" id="company" name="company" placeholder="Nome azienda" value="{{ request('company') }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="description" name="description" placeholder="Descrizione offerta" value="{{ request('description') }}">
            </div>
            <button class="btn" type="submit">Cerca</button>
        </form>
    </div>

    <!-- Nuovi Coupon carousel -->
    @if(empty($search) && isset($promozioniCarosello) && count($promozioniCarosello) > 0)
        <div id="carosello" class="coupons-container">
            <h1 class="d-flex justify-content-center fw-bold pb-3">Nuove Promozioni</h1>
            <div class="carousel-container">
                <!-- Add left arrow -->
                <div class="carousel-arrow carousel-arrow-left">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <div class="carousel-wrapper">

                    <div class="carousel">
                        @foreach($promozioniCarosello as $promozione)
                            <div class="slide">
                                <div class="card">
                                    <div class="image">
                                        @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('promozione', ['promozione' => $promozione->idPromozione]) }}"
                                           class="card-link">
                                            <h5 class="card-title">{{ $promozione->titolo }}</h5>
                                        </a>
                                        @if ($promozione->sconto === 'prezzo_fisso')
                                            <p class="card-text">Offerta: {{ $promozione->valore_sconto }}€</p>
                                        @elseif ($promozione->sconto === 'quantita')
                                            <p class="card-text">Acquista 1 e ricevi {{ $promozione->valore_sconto }} in
                                                regalo</p>
                                        @elseif ($promozione->sconto === 'percentuale')
                                            <p class="card-text">Sconto: -{{ $promozione->valore_sconto }}%</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="carousel-arrow carousel-arrow-right">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Tutti i coupon grid view -->

    @if(isset($promozioniPaginated) && $promozioniPaginated->count() > 0)
        <div id="promozioniPaginated" class="coupons-container">
            <h1 class="d-flex justify-content-center fw-bold pb-3">Tutte le Promozioni</h1>
            <div class="grid-view">
                @foreach($promozioniPaginated as $promozione)
                    <div class="card">
                        <div class="image">
                            @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                        </div>
                        <div class="card-body">
                            <a href="{{ route('promozione', ['promozione' => $promozione->idPromozione]) }}"
                               class="card-link">
                                <h5 class="card-title">{{ $promozione->titolo }}</h5>
                            </a>
                            @if ($promozione->sconto === 'prezzo_fisso')
                                <p class="card-text">Offerta: {{ $promozione->valore_sconto }}€</p>
                            @elseif ($promozione->sconto === 'quantita')
                                <p class="card-text">Acquista 1 e ricevi {{ $promozione->valore_sconto }} in regalo</p>
                            @elseif ($promozione->sconto === 'percentuale')
                                <p class="card-text">Sconto: -{{ $promozione->valore_sconto }}%</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pt-3">
                @include('pagination.paginator', ['paginator' => $promozioniPaginated->fragment('promozioniPaginated')])
            </div>
        </div>
    @else
        <h1 class="d-flex justify-content-center fw-bold pb-3">Nessuna promozione trovata 😔</h1>
    @endif
@endsection
