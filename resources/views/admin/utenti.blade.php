@extends('layouts.admin')

@section('title', 'Gestione Utenti')

@section('extra-css-jquery')
    <script>
        $(function () {
            initializeDataTable('#table-utenti', [4]);

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
            <div class="col-md-12">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            utenti</strong>
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
                        @isset($users)
                            <table class="table" id="table-utenti">
                                <thead class="table-light ">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->nome}}</td>
                                        <td>{{$user->cognome}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{ route('user.delete', ['user' => $user->idUtente]) }}"><i
                                                    class="fas fa-trash table-icon-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
