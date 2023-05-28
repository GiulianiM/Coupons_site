@extends('layouts.admin')

@section('title', 'Statistiche')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="border rounded shadow box-content my-5">
            <div class="d-md-flex align-items-md-center left">
                <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per
                    utente</strong>
            </div>
            <div class="right">
                @include('layouts.search_admin')
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
    </div>
@endsection
