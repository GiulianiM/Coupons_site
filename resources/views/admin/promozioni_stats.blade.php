@extends('layouts.admin')

@section('title', 'Statistiche')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
    <script>
        $(function (){
            const table = $('table').attr('id');
            setupTableSorting(table);
        })
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="border rounded shadow box-content my-5">
            <div class="d-md-flex align-items-md-center left">
                <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Coupon per
                    Promozione</strong></div>
            <div class="right">
                @include('layouts.search_admin')
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
