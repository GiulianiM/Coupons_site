@extends('layouts.admin')

@section('title', 'Gestione Promozioni')

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
                        <div class="input-group">
                            <input class="form-control autocomplete" type="text" placeholder="Cerca...">
                            <button class="btn btn-warning" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                        @isset($promos)
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nome promozione</th>
                                    <th>Azienda</th>
                                    <th>Data creazione</th>
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
                                        <td>{{$promozione->created_at}}</td>
                                        <td>{{$promozione->inizio}}</td>
                                        <td>{{$promozione->fine}}</td>
                                        <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
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
                        <button class="btn btn-warning btn-add" type="button">Inserisci Promozione</button>
                    </div>
                    <hr>
                    <div><span>Ordina per</span>
                        <div>
                            <select>
                                <optgroup>
                                    <option value="" selected>Nome promozione/option>
                                    <option value="">Azienda</option>
                                    <option value="">Data creazione</option>
                                    <option value="">Data inizio</option>
                                    <option value="">Data fine</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
