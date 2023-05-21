@extends('layouts.admin')

@section('title', 'Statistiche')

@section('content')
    <div class="container">
        <div class="border rounded shadow d-xl-flex justify-content-xl-center py-3"><strong>Coupon Totali:&nbsp;{{$numeroCouponTotali}}</strong></div>





        <div class="border rounded shadow box-content">
            <div class="d-md-flex align-items-md-center left"><strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per utente</strong></div>
            <div class="right">
                <div class="input-group"><input class="form-control autocomplete" type="text" placeholder="Cerca..."><button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button></div>
            </div>
            <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Id utente</th>
                        <th>Coupon riscattati</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $user->idUtente }}</td>
                            <td>{{ $user->numero_coupon }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="border rounded shadow box-content">
            <div class="d-md-flex align-items-md-center left"><strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon Promozioni</strong></div>
            <div class="right">
                <div class="input-group"><input class="form-control autocomplete" type="text" placeholder="Cerca..."><button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button></div>
            </div>
            <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Id promozione</th>
                        <th>Numero Coupon Emessi</th>
                        <th>Stato</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($promozioni as $promozione)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $promozione->idPromozione }}</td>
                            <td>{{ $promozione->numero_coupon }}</td>
                            <td>{{ $promozione->stato }}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
