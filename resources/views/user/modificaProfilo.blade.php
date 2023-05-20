@extends('layouts.public')

@section('title', 'Modifica Profilo')

@section('content')

    <!-- Modifica profilo -->
    <section class="wrapper">
        <div class="container">
            <form
                action="{{ route('profilo.update') }}"
                method="POST" class="rounded bg-white shadow p-5">
                @csrf
                @method('PUT')
                <h1 class="text-dark fw-bolder fs-1 mb-2">Modifica profilo</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="nome" class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control' }}"
                            value="{{ $utente->nome }}" placeholder="Nome">
                            <label for="nome">Nome</label>
                            @if ($errors->first('nome'))
                                @foreach ($errors->get('nome') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="telefono" class="{{ $errors->has('telefono') ? 'form-control is-invalid' : 'form-control' }}"
                                   value="{{ $utente->telefono }}" placeholder="Telefono">
                            <label for="telefono">Telefono</label>
                            @if ($errors->first('telefono'))
                                @foreach ($errors->get('telefono') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="oldPassword" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" id="oldPassword"
                                   placeholder="Vecchia Password">
                            <label for="oldPassword">Vecchia Password</label>
                            @if ($errors->has('oldPassword'))
                                @foreach ($errors->get('oldPassword') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <select name="genere" class="form-select{{ $errors->has('genere') ? ' is-invalid' : '' }}"
                                    id="genere" placeholder="Genere">
                                <option value="M" {{ $utente->genere == 'M' ? 'selected' : '' }}>Maschio</option>
                                <option value="F" {{ $utente->genere == 'F' ? 'selected' : '' }}>Femmina</option>
                            </select>
                            <label for="genere">Genere</label>
                            @if ($errors->has('genere'))
                                @foreach ($errors->get('genere') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="submit" class="btn submit_btn w-100 my-3">Salva</button>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="cognome" class="{{ $errors->has('cognome') ? 'form-control is-invalid' : 'form-control' }}"
                                   value="{{ $utente->cognome }}" placeholder="Cognome">
                            <label for="nome">Cognome</label>
                            @if ($errors->first('cognome'))
                                @foreach ($errors->get('cognome') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="{{ $errors->has('email') ? 'form-control is-invalid' : 'form-control' }}"
                                   value="{{ $utente->email }}" placeholder="Email">
                            <label for="nome">Email</label>
                            @if ($errors->first('email'))
                                @foreach ($errors->get('email') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="newPassword" class="form-control{{ $errors->has('newPassword') ? ' is-invalid' : '' }}" id="newPassword"
                                   placeholder="Nuova Password">
                            <label for="newPassword">Nuova Password</label>
                            @if ($errors->has('newPassword'))
                                @foreach ($errors->get('newPassword') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="eta"
                                   class="form-control{{ $errors->has('eta') ? ' is-invalid' : '' }}" id="eta"
                                   placeholder="Età" value="{{ $utente->eta }}"
                                   min="16"
                                   max="99">
                            <label for="eta">Età</label>
                            @if ($errors->has('eta'))
                                @foreach ($errors->get('eta') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="reset" class="btn submit_btn w-100 my-3">Annulla</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
