@extends('layouts.admin')

@section('title', 'Gestione Aziende')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            aziende</strong>
                    </div>
                    <div class="right">
                        <div class="input-group">
                            <input class="form-control autocomplete" type="text" placeholder="Cerca...">
                            <button class="btn btn-warning" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                    @isset($aziende)
                        <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                            <table class="table">
                                <thead class="table-light">
                                  <tr>
                                    <th>#</th>
                                    <th>ID Azienda</th>
                                    <th>Nome azienda</th>
                                    <th>Ragione sociale</th>
                                    <th>Localizzazione</th>
                                    <th colspan="2"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($aziende as $azienda)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $azienda->idAzienda }}</td>
                                      <td>{{ $azienda->nome }}</td>
                                      <td>{{ $azienda->ragioneSociale }}</td>
                                      <td>{{ $azienda->citta }}</td>
                                      <!-- da aggiungere pagina di modifica e funzione di delete -->
                                      <td><a href="#"><i class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                      <td><a href="#"><i class="fas fa-trash table-icon-trash"></i></a></td>
                                    </tr>
                                  @endforeach
                                </tbody>
                           </table>
                        </div>
                    @endisset
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
                                    <option value="" selected>Nome azienda</option>
                                    <option value="">Ragione sociale</option>
                                    <option value="">Localizzazione</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
