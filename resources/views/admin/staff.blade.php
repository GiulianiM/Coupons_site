@extends('layouts.admin')

@section('title', 'Gestione Staff')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            personale</strong>
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
                    @isset($staffs)
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th colspan="2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($staffs as  $staff)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $staff->idUtente }}</td>
                                        <td>{{ $staff->nome }}</td>
                                        <td>{{ $staff->cognome }}</td>
                                        <td><a href="{{ route('staff.edit', ['staff' => $staff->idUtente]) }}"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td><a href="{{ route('staff.delete', ['staff' => $staff->idUtente]) }}"><i class="fas fa-trash table-icon-trash"></i></a></td>
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
                        <button class="btn btn-warning btn-add" type="button" onclick="window.location='{{ route('staff.create') }}'">Inserisci personale</button>
                    </div>
                    <hr>
                    <div><span>Ordina per</span>
                        <div>
                            <select>
                                    <option value="" selected>Nome</option>
                                    <option value="">Cognome</option>
                                    <option value="">Localizzazione</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
