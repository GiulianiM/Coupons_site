@extends('layouts.admin')

@section('title', 'Form Azienda')

@section('content')
    <div class="container">

        <form
            action="{{ isset($azienda) ? route('azienda.update', ['azienda' => $azienda->idAzienda]) : route('azienda.store') }}"
            method="POST" class="rounded shadow p-5"
            enctype="multipart/form-data">
            @csrf
            @if (isset($azienda))
                @method('PUT')
            @endif

            @isset($azienda)
                <h3>Modifica azienda</h3>
            @else
                <h3>Aggiungi azienda</h3>
            @endisset

            <div class="form-floating mb-3">
                <input type="text" name="nome" id="nome"
                       class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($azienda) ? $azienda->nome : old('nome') }}" placeholder="Nome azienda">
                <label for="nome">Nome azienda</label>
                @if ($errors->first('nome'))
                    @foreach ($errors->get('nome') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" name="via" id="via"
                               class="{{ $errors->has('via') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->via : old('via') }}"
                               placeholder="Via">
                        <label for="via">Via</label>
                        @if ($errors->first('via'))
                            @foreach ($errors->get('via') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="number" name="numero_civico" id="numero_civico"
                               class="{{ $errors->has('numero_civico') ? 'form-control is-invalid' : 'form-control'}}"
                               value="{{ isset($azienda) ? $azienda->numero_civico : old('numero_civico') }}"
                               placeholder="Numero civico"
                               min="1"
                               max="300">
                        <label for="numero_civico">Numero civico</label>
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

            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="text" name="citta" id="citta"
                               class="{{ $errors->has('citta') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->citta : old('citta') }}"
                               placeholder="Citta">
                        <label for="citta">Città</label>
                        @if ($errors->first('citta'))
                            @foreach ($errors->get('citta') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input type="number" name="cap" id="cap"
                               class="{{ $errors->has('cap') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->cap : old('cap') }}"
                               placeholder="CAP">
                        <label for="cap">CAP</label>
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
                <textarea name="descrizione" id="descrizione"
                          class="{{$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control' }}"
                          placeholder="Descrizione">{{ isset($azienda) ? $azienda->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>
                @if ($errors->first('descrizione'))
                    @foreach ($errors->get('descrizione') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="ragione_sociale" id="ragione_sociale"
                       class="{{ $errors->has('ragione_sociale') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($azienda) ? $azienda->ragione_sociale : old('ragione_sociale') }}"
                       placeholder="Ragione sociale">
                <label for="ragione_sociale">Ragione Sociale</label>
                @if ($errors->first('ragione_sociale'))
                    @foreach ($errors->get('ragione_sociale') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>


            <div class="form-floating mb-3">

                <select name="tipologia" id="tipologia"
                        class="{{$errors->has('tipologia') ? 'form-control is-invalid' : 'form-control' }}">
                    @foreach(['elettronica', 'moda', 'alimentare', 'turismo'] as $option)
                        <option value="{{$option}}" {{isset($azienda) && $azienda->tipologia === $option ? 'selected' : '' }} >
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                    {{--Metodo classico--}}
                    {{--<option value="" {{ isset($azienda) && $azienda->tipologia == 1 ? 'selected' : '' }}>Tipologia
                        1
                    </option>
                    <option value="2" {{ isset($azienda) && $azienda->tipologia == 2 ? 'selected' : '' }}>Tipologia
                        2
                    </option>
                    <option value="3" {{ isset($azienda) && $azienda->tipologia == 3 ? 'selected' : '' }}>Tipologia
                        3
                    </option>--}}
                </select>
                <label for="tipologia">Tipologia</label>
                @if ($errors->first('tipologia'))
                    @foreach ($errors->get('tipologia') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3">
                <input type="file" id="logo" name="logo"
                       class="{{ $errors->has('logo') ? 'form-control is-invalid' : 'form-control' }}">
                @if ($errors->first('logo'))
                    @foreach ($errors->get('logo') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <input type="hidden" value="{{ isset($azienda) ? $azienda->logo : '' }}" name="old_logo">

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.aziende') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
{{--@section('content')
    <div class="container box-form">

        @isset($azienda)
            {{ Form::open(array('route'=> array('azienda.update', $azienda->idAzienda),'class' => 'rounded shadow p-5')) }}
        @else
            {{ Form::open(array('route' => 'azienda.store', 'class' => 'rounded shadow p-5')) }}
        @endisset

        --}}{{-- Metodo alternativo, poco leggibile--}}{{--
        --}}{{-- {{ Form::open(array('route' => isset($azienda) ? ['azienda.update', $azienda->idAzienda] : 'azienda.store', 'method' => isset($azienda) ? 'PUT' : 'POST', 'class' => 'rounded shadow p-5')) }}--}}{{--

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
            {{ Form::select('tipologia', ['1' => '1', '0' => '0'], isset($azienda) ? $azienda->tipologia : 0, ['class' => $errors->has('tipologia') ? 'form-select is-invalid' : 'form-select', 'id'=>"tipologia"]) }}
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

        {!! Form::close() !!}
    </div>

@endsection--}}




