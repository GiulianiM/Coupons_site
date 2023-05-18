@extends('layouts.admin')

@section('title', 'Form Azienda')

@section('content')
    <div class="container">
        <h1>{{ isset($azienda) ? 'Modifica Azienda' : 'Aggiungi Azienda' }}</h1>

        <form
            action="{{ isset($azienda) ? route('azienda.update', ['azienda' => $azienda->idAzienda]) : route('azienda.store') }}"
            method="POST">
            @csrf
            @if (isset($azienda))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"
                       value="{{ isset($azienda) ? $azienda->nome : old('nome') }}">
                @error('nome')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="via">Via</label>
                <input type="text" name="via" id="via" class="form-control"
                       value="{{ isset($azienda) ? $azienda->via : old('via') }}">
                @error('via')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="citta">Città</label>
                <input type="text" name="citta" id="citta" class="form-control"
                       value="{{ isset($azienda) ? $azienda->citta : old('citta') }}">
                @error('citta')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cap">CAP</label>
                <input type="number" name="cap" id="cap" class="form-control"
                       value="{{ isset($azienda) ? $azienda->cap : old('cap') }}">
                @error('cap')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                {{ Form::file('logo', ['id' => 'logo']) }}
                @error('logo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="ragione_sociale">Ragione Sociale</label>
                <input type="text" name="ragione_sociale" id="ragione_sociale" class="form-control"
                       value="{{ isset($azienda) ? $azienda->ragione_sociale : old('ragione_sociale') }}">
                @error('ragione_sociale')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <textarea name="descrizione" id="descrizione"
                          class="form-control">{{ isset($azienda) ? $azienda->descrizione : old('descrizione') }}</textarea>
                @error('descrizione')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tipologia">Tipologia</label>
                <select name="tipologia" id="tipologia" class="form-control">
                    <option value="1" {{ isset($azienda) && $azienda->tipologia == 1 ? 'selected' : '' }}>Tipologia 1
                    </option>
                    <option value="2" {{ isset($azienda) && $azienda->tipologia == 2 ? 'selected' : '' }}>Tipologia 2
                    </option>
                    <option value="3" {{ isset($azienda) && $azienda->tipologia == 3 ? 'selected' : '' }}>Tipologia 3
                    </option>
                </select>
                @error('tipologia')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
