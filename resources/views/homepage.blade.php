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
    <script>
        $(document).ready(function () {
            $('.resetButton').hide();
            $('#promozioni').hide();

            $('.searchButton').click(function (event) {
                var searchText = $('.searchInput').val().trim().toLowerCase();
                var descriptionText = $('.searchDescription').val().trim().toLowerCase();
                var hasResults = false;

                if (searchText !== '' || descriptionText !== '') {
                    $('#carosello').hide();
                    $('#promozioniPaginated').hide();
                    $('#promozioni').show();

                    $('#promozioni .card').each(function () {
                        var card = $(this);
                        var cardCompany = card.data('company').toLowerCase();
                        var cardDescription = card.data('description').toLowerCase();

                        var searchTextMatch = searchText === '' || cardCompany.includes(searchText);
                        var descriptionTextMatch = descriptionText === '' || cardDescription.includes(descriptionText);

                        if (searchTextMatch && descriptionTextMatch) {
                            card.show();
                            hasResults = true;
                        } else {
                            card.hide();
                        }

                        toggleSearchResults(hasResults);
                    });
                } else {
                    alert('Inserisci del testo per effettuare la ricerca.');
                }

                toggleResetButton();
                toggleSearchResults(hasResults);
            });

            $('.resetButton').click(function () {
                $('.searchInput').val('');
                $('.searchDescription').val('');
                $('#carosello').show();
                $('#promozioniPaginated').show();
                $('#promozioni').hide();
                toggleResetButton();
            });

            toggleResetButton();
        });

        function toggleResetButton() {
            var searchText = $('.searchInput').val();
            var descriptionText = $('.searchDescription').val();

            if (searchText.trim() !== '') {
                $('.resetButton').show();
            }
            if (descriptionText.trim() !== '') {
                $('.resetButton').show();
            } else {
                $('.resetButton').hide();
            }
        }

        function toggleSearchResults(hasResults) {
            var searchHeader = $('#searchHeader');

            if (hasResults) {
                searchHeader.text('Risultati della ricerca').show();
            } else {
                searchHeader.text('Nessun risultato trovato 😔').show();
            }
        }

    </script>
@endsection

@section('content')
    <div class="search-container">
        <div class="input-group">
            <input class="form-control searchInput" type="search" placeholder="Cerca azienda..." aria-label="Search">
            <input class="form-control searchDescription" type="search" placeholder="Cerca descrizione..."
                   aria-label="Search">
            <button class="btn btn-warning searchButton" type="button">
                <i class="fa fa-search"></i>
            </button>
            <button class="btn btn-warning resetButton" type="button">
                <i class="fa-solid fa-rotate-left"></i>
            </button>
        </div>
    </div>

    <!-- Nuovi Coupon carousel -->
    @if(isset($promozioniCarosello) && count($promozioniCarosello) > 0)
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


    @isset($promozioni)
        <div id="promozioni" class="coupons-container">
            <h1 id="searchHeader" class="d-flex justify-content-center fw-bold pb-3">Risultati della
                ricerca</h1>
            <div class="grid-view">
                @foreach($promozioni as $promozione)
                    <div class="card" data-company="{{ $promozione->azienda->nome }}"
                         data-description="{{ $promozione->descrizione }}">
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
        </div>
    @endisset
@endsection
