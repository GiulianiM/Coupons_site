@extends('layouts.admin')

@section('title', 'Gestione Aziende')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
    <script>
        $(function (){
            const table = $('table').attr('id');
            setupTableSorting(table, [5, 6]);
        })
    </script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            aziende</strong>
                    </div>
                    <div class="right">
                        @include('layouts.search_admin')
                    </div>
                    <div class="table custom-scrollbar max-height overflow-auto">
                        @isset($aziende)
                            <table class="table" id="table-aziende">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>ID Azienda</th>
                                    <th>Nome azienda</th>
                                    <th>Tipologia</th>
                                    <th>Localizzazione</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aziende as $azienda)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $azienda->idAzienda }}</td>
                                        <td>{{ $azienda->nome }}</td>
                                        <td>{{ $azienda->tipologia }}</td>
                                        <td>{{ implode(', ', [$azienda->citta,$azienda->cap, $azienda->via, $azienda->numero_civico]) }}</td>

                                        <td><a href="{{ route('azienda.edit', ['azienda' => $azienda->idAzienda]) }}"><i
                                                    class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td><a href="{{ route('azienda.delete', ['azienda' => $azienda->idAzienda]) }}"><i
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
                                onclick="window.location='{{ route('azienda.create') }}'">Inserisci azienda
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
