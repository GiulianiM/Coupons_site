@extends('layouts.admin')

@section('title', 'Form Azienda')

@section('content')
    <div class="container">
        <div class="container-form">
            {{ Form::open(array(isset($azienda) ? route('azienda.update', ['azienda' => $azienda->idAzienda]) : route('azienda.store')), ['class' => 'rounded shadow p-5', 'method' => isset($azienda) ? 'PUT' : 'POST']) }}

            <h3>{{ isset($azienda) ? 'Modifica Azienda' : 'Aggiungi Azienda' }}</h3>

            @csrf
            <div class="form-floating mb-3">
                {{ Form::text('nome', isset($azienda) ? $azienda->nome : old('nome'),array('class'=>$errors->has('nome') ? 'form-control is-invalid' : 'form-control', 'id' => 'nome', 'placeholder' => 'Nome azienda')) }}
                {{ Form::label('nome', 'Nome azienda', array('for' => 'nome')) }}
                @if ($errors->first('nome'))
                    @foreach ($errors->get('nome') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        {{ Form::text('via', isset($azienda) ? $azienda->via : old('via'),array('class'=>$errors->has('via') ? 'form-control is-invalid' : 'form-control', 'id' => 'via', 'placeholder' => 'Via')) }}
                        {{ Form::label('via', 'Via', array('for' => 'via')) }}
                        @if ($errors->first('via'))
                            @foreach ($errors->get('via') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        {{ Form::number('numero_civico', isset($azienda) ? $azienda->numero_civico : old('numero_civico'),array('class'=>$errors->has('numero_civico') ? 'form-control is-invalid' : 'form-control', 'id' => 'numero_civico', 'placeholder' => 'Numero civico')) }}
                        {{ Form::label('numero_civico', 'Numero civico', array('for' => 'numero_civico')) }}
                        @if ($errors->first('numero_civico'))
                            @foreach ($errors->get('numero_civico') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        {{ Form::text('citta', isset($azienda) ? $azienda->citta : old('citta'),array('class'=>$errors->has('citta') ? 'form-control is-invalid' : 'form-control', 'id' => 'citta', 'placeholder' => 'Città')) }}
                        {{ Form::label('citta', 'Città', array('for' => 'citta')) }}
                        @if ($errors->first('citta'))
                            @foreach ($errors->get('citta') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        {{ Form::number('cap', isset($azienda) ? $azienda->cap : old('cap'),array('class'=>$errors->has('cap') ? 'form-control is-invalid' : 'form-control', 'id' => 'cap', 'placeholder' => 'CAP')) }}
                        {{ Form::label('cap', 'CAP', array('for' => 'cap')) }}
                        @if ($errors->first('cap'))
                            @foreach ($errors->get('cap') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                {{ Form::text('ragione_sociale', isset($azienda) ? $azienda->ragione_sociale : old('ragione_sociale'),array('class'=>$errors->has('ragione_sociale') ? 'form-control is-invalid' : 'form-control', 'id' => 'ragione_sociale', 'placeholder' => 'Ragione sociale')) }}
                {{ Form::label('ragione_sociale', 'Ragione sociale', array('for' => 'ragione_sociale')) }}
                @if ($errors->first('ragione_sociale'))
                    @foreach ($errors->get('ragione_sociale') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                {{ Form::textarea('descrizione', isset($azienda) ? $azienda->descrizione : old('descrizione'),array('class'=>$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control', 'id' => 'descrizione', 'placeholder' => 'Descrizione')) }}
                {{ Form::label('descrizione', 'Descrizione', array('for' => 'descrizione')) }}
                @if ($errors->first('descrizione'))
                    @foreach ($errors->get('descrizione') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                {{ Form::select('tipologia', ['1' => '1', '0' => '0'], $azienda->tipologia, ['class' => $errors->has('tipologia') ? 'form-select is-invalid' : 'form-select', 'id'=>"tipologia"]) }}
                {{ Form::label('tipologia', 'Tipologia', array('for' => 'tipologia')) }}
                @if ($errors->first('tipologia'))
                    @foreach ($errors->get('tipologia') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class=" mb-3">
                {{ Form::file('logo',array('class'=>$errors->has('logo') ? 'form-control is-invalid' : 'form-control', 'id' => 'logo', 'placeholder' => 'Logo')) }}
                @if ($errors->first('logo'))
                    @foreach ($errors->get('logo') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            {{ Form::reset('Annulla', ['class' => 'btn btn-danger']) }}
            {{ Form::submit('Salva', ['class' => 'btn btn-success']) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection

{{--<div class="container">
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
</div>--}}

