@extends('layouts.public')

@section('title', 'Homepage')

@section('extra-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
@endsection

@section('content')
    <div class="search-container container-fluid">
        <form class="d-flex" role="search" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" placeholder="Cerca..." aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <!-- Nuovi Coupon carousel -->
    <div class="coupons-container">
        <h1 class="d-flex justify-content-center fw-bold pb-3">Nuovi Coupon</h1>
        <div class="carousel-container">
            <!-- Add left arrow -->
            <div class="carousel-arrow carousel-arrow-left">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="carousel-wrapper">
                @isset($promozioni)
                    <div class="carousel">
                        @foreach($promozioni as $promozione)
                            <div class="slide">
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
                            </div>
                        @endforeach
                    </div>
                @endisset
                <div class="carousel-arrow carousel-arrow-right">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tutti i coupon grid view -->
    <div class="coupons-container">
        <h1 class="d-flex justify-content-center fw-bold pb-3">Tutti i Coupon</h1>
        <div class="grid-view">
            @isset($promozioni)
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
            @endisset
        </div>
    </div>

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
