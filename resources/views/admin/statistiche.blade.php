@extends('layouts.admin')

@section('title', 'Statistiche')

@section('content')
    <div class="container">
        <div class="border rounded shadow d-xl-flex justify-content-xl-center align-items-xl-center py-2"><strong>Coupon totali emessi: {numero}</strong></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left"><strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista aziende</strong></div>
                    <div class="right">
                        <div class="input-group"><input class="form-control autocomplete" type="text" placeholder="Cerca..."><button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button></div>
                    </div>
                    <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nome azienda</th>
                                <th>Ragione sociale</th>
                                <th>Localizzazione</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left"><strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista aziende</strong></div>
                    <div class="right">
                        <div class="input-group"><input class="form-control autocomplete" type="text" placeholder="Cerca..."><button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button></div>
                    </div>
                    <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nome azienda</th>
                                <th>Ragione sociale</th>
                                <th>Localizzazione</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nome azienda</td>
                                <td>SRL</td>
                                <td>Abruzzo</td>
                                <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
