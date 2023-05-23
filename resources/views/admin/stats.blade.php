@extends('layouts.admin')

@section('title', 'Statistiche')

@section('extra-css-jquery')
    <script>
        $(function () {
            initializeDataTable('#table-statistiche-promozioni, #table-statistiche-utenti', [3, 4]);

            function initializeDataTable(selector, disableColumns) {
                $(selector).DataTable({
                    columnDefs: [
                        { targets: disableColumns, orderable: false }
                    ],
                    lengthChange: false,
                    searching: false,
                    paging: false,
                    info: false,
                });
            }
        });

        $(function () {
            $('.resetButton-utenti').hide();

            $('.searchButton-utenti').click(function () {
                var searchText = $('.searchInput-utenti').val().toLowerCase();

                $('#table-statistiche-utenti tbody tr').each(function () {
                    var rowText = $(this).text().toLowerCase();

                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                toggleResetButton('.searchInput-utenti', '.resetButton-utenti');
            });

            $('.resetButton-utenti').click(function () {
                $('.searchInput-utenti').val('');
                $('#table-statistiche-utenti tbody tr').show();
                toggleResetButton('.searchInput-utenti', '.resetButton-utenti');
            });

            function toggleResetButton(searchInputClass, resetButtonClass) {
                var searchText = $(searchInputClass).val();

                if (searchText.trim() !== '') {
                    $(resetButtonClass).show();
                } else {
                    $(resetButtonClass).hide();
                }
            }
        });

        $(function () {
            // Imposto all'inizio che il pulsante di reset sia nascosto
            $('.resetButton-promozioni').hide();

            // Al click del pulsante di ricerca per le promozioni
            $('.searchButton-promozioni').click(function () {
                var searchText = $('.searchInput-promozioni').val().toLowerCase();

                $('#table-statistiche-promozioni tbody tr').each(function () {
                    var rowText = $(this).text().toLowerCase();

                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                toggleResetButton('.searchInput-promozioni', '.resetButton-promozioni');
            });

            // Al click del pulsante di reset per le promozioni
            $('.resetButton-promozioni').click(function () {
                $('.searchInput-promozioni').val('');
                $('#table-statistiche-promozioni tbody tr').show();
                toggleResetButton('.searchInput-promozioni', '.resetButton-promozioni');
            });

            function toggleResetButton(searchInputClass, resetButtonClass) {
                var searchText = $(searchInputClass).val();

                if (searchText.trim() !== '') {
                    $(resetButtonClass).show();
                } else {
                    $(resetButtonClass).hide();
                }
            }
        });

    </script>
@endsection

@section('content')
    <div class="container">
        <div class="border rounded shadow d-xl-flex justify-content-xl-center py-3 my-5">
            <strong>Coupon Totali: {{$numeroCouponTotali}}</strong></div>

        <div class="border rounded shadow box-content my-5">
            <div class="d-md-flex align-items-md-center left">
                <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per utente</strong>
            </div>
            <div class="right">
                <div class="input-group">
                    <input class="form-control searchInput-utenti" type="search"  placeholder="Cerca..." aria-label="Search">
                    <button class="btn btn-warning searchButton-utenti" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="btn btn-warning resetButton-utenti" type="button">
                        <i class="fa-solid fa-rotate-left"></i>
                    </button>
                </div>
            </div>
            <div class="table custom-scrollbar max-height overflow-auto">
                @isset($userStats)
                <table class="table" id="table-statistiche-utenti">
                    <thead class="table-light ">
                    <tr>
                        <th>#</th>
                        <th>Id utente</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Coupon riscattati</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($userStats as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $user->idUtente }}</td>
                            <td>{{ $user->nome }}</td>
                            <td>{{ $user->cognome }}</td>
                            <td>{{ $user->numero_coupon }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endisset
            </div>
        </div>

        <div class="border rounded shadow box-content my-5">
            <div class="d-md-flex align-items-md-center left">
                <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per Promozione</strong></div>
            <div class="right">
                <div class="input-group">
                    <input class="form-control searchInput-promozioni" type="search"  placeholder="Cerca..." aria-label="Search">
                    <button class="btn btn-warning searchButton-promozioni" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="btn btn-warning resetButton-promozioni" type="button">
                        <i class="fa-solid fa-rotate-left"></i>
                    </button>
                </div>
            </div>
            <div class="table custom-scrollbar max-height overflow-auto">
                @isset($promozioneStats)
                <table class="table" id="table-statistiche-promozioni">
                    <thead class="table-light ">
                    <tr>
                        <th>#</th>
                        <th>Id promozione</th>
                        <th>Titolo</th>
                        <th>Stato</th>
                        <th>Numero Coupon Emessi</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($promozioneStats as $promozione)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $promozione->idPromozione }}</td>
                            <td>{{ $promozione->titolo }}</td>
                            <td>{{ $promozione->stato }}</td>
                            <td>{{ $promozione->numero_coupon }}</td>

                        </tr>
                @endforeach
                    </tbody>
                </table>
                @endisset
            </div>
        </div>
    </div>
@endsection
