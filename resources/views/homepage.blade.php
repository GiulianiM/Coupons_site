@extends('layouts.public')

@section('title', 'Homepage')

@section('extra-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
@endsection

@section('content')
    <div class="search-container">
        <form class="d-flex" action="{{ route('homepage') }}" method="GET">
            <input class="form-control" type="search" placeholder="Cerca..." aria-label="Search" name="search" required>
            <button class="btn" type="submit">Search</button>
        </form>
    </div>

        <!-- Nuovi Coupon carousel -->
    @if(empty($search) && isset($promozioni))
        <div class="coupons-container">

            <h1 class="d-flex justify-content-center fw-bold pb-3">Nuove Promozioni</h1>
            <div class="carousel-container">
                <!-- Add left arrow -->
                <div class="carousel-arrow carousel-arrow-left">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <div class="carousel-wrapper">

                    <div class="carousel">
                        @foreach($promozioni as $promozione)
                            <div class="slide">
                                <div class="card">
                                    <div class="image">
                                        @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('promozione', ['promozione' => $promozione->idPromozione]) }}" class="card-link">
                                            <h5 class="card-title">{{ $promozione->titolo }}</h5>
                                        </a>
                                        <p class="card-text">{{ $promozione->sconto }}</p>
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

    @isset($promozioniPaginated)
        <!-- Tutti i coupon grid view -->
        @if ($promozioniPaginated->total() > 0)
        <div id="promozioni">
            <div class="coupons-container">
                <h1 class="d-flex justify-content-center fw-bold pb-3">Tutte le Promozioni</h1>
                <div class="grid-view">
                    @foreach($promozioniPaginated as $promozione)
                        <div class="card">
                            <div class="image">
                                @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                            </div>
                            <div class="card-body">
                                <a href="{{ route('promozione', ['promozione' => $promozione->idPromozione]) }}" class="card-link">
                                    <h5 class="card-title">{{ $promozione->titolo }}</h5>
                                </a>
                                <p class="card-text">{{ $promozione->sconto }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                @include('pagination.paginator', ['paginator' => $promozioniPaginated->fragment('promozioni')])
            </div>
        </div>
        @else
            <div class="coupons-container" style="flex-grow: 1;">
                <h1 class="d-flex justify-content-center fw-bold pb-3">Nessuna Promozione trovata 😔</h1>
            </div>
        @endif
    @endisset

@endsection

@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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
