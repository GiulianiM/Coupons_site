@extends('layouts.admin')

@section('title', 'Gestione Utenti')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
    <script>
        $(function (){
            const table = $('table').attr('id');
            setupTableSorting(table, [4]);
        })
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
                        @include('layouts.search_admin')
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
