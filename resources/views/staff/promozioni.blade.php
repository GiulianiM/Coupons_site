@extends('layouts.admin')

@section('title', 'Gestione Promozioni')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
    <script>
        $(function () {
            const table = $('table').attr('id');
            const resetButton = $('button[type="reset"]').attr('id');
            const searchButton = $('button[type="submit"]').attr('id');
            const searchInput = $('input[type="search"]').attr('id');

            setupTableSorting(table, [6, 7]);
            setupSearchBar({
                resetButton: resetButton,
                searchButton: searchButton,
                searchInput: searchInput,
                tableId: table,
            });
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
                        @include('layouts.search_admin')
                    </div>
                    <div class="table custom-scrollbar max-height overflow-auto">
                        @isset($promos)
                            <table class="table" id="table-promozioni">
                                <thead class="table-light ">
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
