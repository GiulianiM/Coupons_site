@extends('layouts.admin')

@section('title', 'Gestione Promozioni')

@section('extra-css-jquery')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                    <form class="d-flex" action="{{ route('staff.promos') }}" method="GET">
                        <div class="input-group">
                            <input class="form-control autocomplete" type="search" placeholder="Cerca..."
                                   aria-label="Search" name="search">
                            <button class="btn btn-warning" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            @isset($search)
                                <button class="btn btn-warning" type="reset"
                                        onclick="window.location='{{ route('staff.promos') }}'">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            @endisset
                        </div>
                    </form>
                    <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                        @isset($promos)
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Titolo</th>
                                    <th>Azienda</th>
                                    <th>Descrizione</th>
                                    <th>Data inizio</th>
                                    <th>Data fine</th>
                                    <th colspan="2"></th>
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
                    <hr>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Ordina per
                        </button>
                        {{--Metodo abbreviato--}}
                        <ul class="dropdown-menu">
                            @foreach(['titolo', 'azienda', 'descrizione', 'inizio', 'fine'] as $option)
                                <li>
                                    <a class="dropdown-item{{ $orderby === $option ? ' active' : '' }}"
                                       href="{{ route('staff.promos', ['order_by' => $option]) }}">
                                        {{ ucfirst($option) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{--Metodo lungo--}}
                        {{--<ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ $orderby === 'titolo' ? ' active' : '' }}" href="{{ route('staff.promos', ['order_by' => 'titolo']) }}">Titolo</a></li>
                            <li><a class="dropdown-item {{ $orderby === 'idAzienda' ? ' active' : '' }}" href="{{ route('staff.promos', ['order_by' => 'idAzienda']) }}">Azienda</a></li>
                            <li><a class="dropdown-item {{ $orderby === 'descrizione' ? ' active' : '' }}" href="{{ route('staff.promos', ['order_by' => 'descrizione']) }}">Descrizione</a></li>
                            <li><a class="dropdown-item {{ $orderby === 'inizio' ? ' active' : '' }}" href="{{ route('staff.promos', ['order_by' => 'inizio']) }}">Data inizio</a></li>
                            <li><a class="dropdown-item {{ $orderby === 'fine' ? ' active' : '' }}" href="{{ route('staff.promos', ['order_by' => 'fine']) }}">Data fine</a></li>
                        </ul>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
