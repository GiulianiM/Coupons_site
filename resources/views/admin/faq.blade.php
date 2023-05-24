@extends('layouts.admin')

@section('title', 'Gestione FAQ')

@section('extra-css-jquery')
    <script>
        $(function () {
            initializeDataTable('#table-faq', [3, 4]);

            function initializeDataTable(selector, disableColumns) {
                $(selector).DataTable({
                    columnDefs: [
                        {targets: disableColumns, orderable: false}
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
                            FAQ</strong>
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
                    <div class="table custom-scrollbar max-height overflow-auto">
                        @isset($faqs)
                            <table class="table" id="table-faq">
                                <thead class="table-light ">
                                <tr>
                                    <th>#</th>
                                    <th>Titolo</th>
                                    <th>Descrizione</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->titolo }}</td>
                                        <td>{{ $faq->descrizione }}</td>

                                        <td><a href="{{ route('faq.edit', ['faq' => $faq->idFaq]) }}"><i
                                                    class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td><a href="{{ route('faq.delete', ['faq' => $faq->idFaq]) }}"><i
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
                                onclick="window.location='{{ route('faq.create') }}'">Inserisci FAQ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
