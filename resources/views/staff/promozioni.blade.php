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
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nome promozione</th>
                                <th>Azienda</th>
                                <th>Data creazione</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome promozione</td>
                                <td>Nome azienda</td>
                                <td>26/11/2022</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="border rounded shadow box-content">
                    <strong>Pannello</strong>
                    <div class="d-md-flex justify-content-md-center btn-add-box">
                        <button class="btn btn-warning btn-add" type="button">Inserisci azienda</button>
                    </div>
                    <hr>
                    <div><span>Ordina per</span>
                        <div>
                            <select>
                                <optgroup>
                                    <option value="" selected>Nome</option>
                                    <option value="">Azienda</option>
                                    <option value="">Data creazione</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
