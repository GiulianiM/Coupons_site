@extends('layouts.admin')

@section('title', 'Statistiche')

@section('content')
    <div class="container">
        <div class="border rounded shadow d-xl-flex justify-content-xl-center py-3 my-5">
            <strong>Coupon Totali:&nbsp;{{$numeroCouponTotali}}</strong></div>

        <div class="border rounded shadow box-content my-5">
            <div class="d-md-flex align-items-md-center left">
                <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per utente</strong>
            </div>
            <div class="right">
              <form class="d-flex" action="{{ route('admin.stats') }}" method="GET">
                <div class="input-group">
                    <input class="form-control autocomplete" type="search" placeholder="Cerca..."
                           aria-label="Search" name="userSearch">
                    <button class="btn btn-warning" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    @isset($userSearch)
                        <button class="btn btn-warning" type="reset" onclick="window.location='{{ route('admin.stats') }}'">
                            <i class="fa-solid fa-rotate-left"></i>
                        </button>
                    @endisset
                </div>
              </form>
            </div>
            <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                @isset($userStats)
                <table class="table">
                    <thead class="table-light">
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
                <form class="d-flex" action="{{ route('admin.stats') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control autocomplete" type="search" placeholder="Cerca..."
                               aria-label="Search" name="promozioneSearch">
                        <button class="btn btn-warning" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        @isset($promozioneSearch)
                            <button class="btn btn-warning" type="reset" onclick="window.location='{{ route('admin.stats') }}'">
                                <i class="fa-solid fa-rotate-left"></i>
                            </button>
                        @endisset
                    </div>
                </form>
            </div>
            <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                @isset($promozioneStats)
                <table class="table">
                    <thead class="table-light">
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
