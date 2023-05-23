@extends('layouts.admin')

@section('title', 'Gestione Promozioni')

@section('extra-css-jquery')
    <script>
        $(function () {
            initializeDataTable('#table-promozioni', [6, 7]);

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
            //imposto all'inizio che il pulsante di reset sia nascosto
            $('.resetButton').hide();

            /* al click del pulsante di ricerca prendo il testo scritto nella barra di ricerca
             e lo confronto con il testo di ogni riga della tabella
             se il testo della riga contiene il testo della barra di ricerca allora mostro la riga
             altrimenti la nascondo*/
            $('.searchButton').click(function () {
                var searchText = $('.searchInput').val().toLowerCase();

                $('table tbody tr').each(function () {
                    var rowText = $(this).text().toLowerCase();

                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                toggleResetButton();
            });

            $('.resetButton').click(function () {
                $('#searchInput').val('');
                $('table tbody tr').show();
                toggleResetButton();
            });

            function toggleResetButton() {
                var searchText = $('.searchInput').val();

                if (searchText.trim() !== '') {
                    $('.resetButton').show();
                } else {
                    $('.resetButton').hide();
                }
            }
        });

    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            promozioni</strong>
                    </div>
                    <div class="right">
                        <div class="input-group">
                            <input class="form-control searchInput" type="search" placeholder="Cerca..."
                                   aria-label="Search">
                            <button class="btn btn-warning searchButton" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-warning resetButton" type="button">
                                <i class="fa-solid fa-rotate-left"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table mt-5 custom-scrollbar max-height overflow-auto">
                        @isset($promos)
                            <table class="table" id="table-promozioni">
                                <thead class="table-light sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>Titolo</th>
                                    <th>Azienda</th>
                                    <th>Descrizione</th>
                                    <th>Data inizio</th>
                                    <th>Data fine</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promos as $promozione)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$promozione->titolo}}</td>
                                        <td>{{$promozione->azienda->nome}}</td>
                                        <td>{{$promozione->descrizione}}</td>
                                        <td>{{$promozione->inizio}}</td>
                                        <td>{{$promozione->fine}}</td>
                                        <td><a href="{{ route('promo.edit', ['promo' => $promozione->idPromozione]) }}"><i
                                                    class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td>
                                            <a href="{{ route('promo.delete', ['promo' => $promozione->idPromozione]) }}"><i
                                                    class="fas fa-trash table-icon-trash"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="border rounded shadow box-content">
                    <strong>Pannello</strong>
                    <div class="d-md-flex justify-content-md-center btn-add-box">
                        <button class="btn btn-warning btn-add" type="button"
                                onclick="window.location='{{ route('promo.create') }}'">Inserisci Promozione
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
