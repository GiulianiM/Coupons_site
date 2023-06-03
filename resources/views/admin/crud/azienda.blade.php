@extends('layouts.admin')

@section('title', 'Form Azienda')

@section('scripts')
    @parent
    <script src="{{ asset('js/form_validation.js') }}"></script>
    <script src="{{ asset('js/file_validator.js') }}"></script>

    <script>
        $(function (){
            const actionUrl = "{{ isset($azienda) ? route('azienda.update', ['azienda' => $azienda->idAzienda]) : route('azienda.store') }}";
            const formId = $('.container > form').attr('id');
            validateForm(actionUrl, formId);
        })
    </script>
@endsection

@section('content')
    <div class="container">
        <form
            id="companyform"
            action="{{ isset($azienda) ? route('azienda.update', ['azienda' => $azienda->idAzienda]) : route('azienda.store') }}"
            method="POST" class="rounded shadow p-5"
            enctype="multipart/form-data">
            @csrf
            @isset($azienda)
                <h3>Modifica azienda</h3>
            @else
                <h3>Aggiungi azienda</h3>
            @endisset

            {{--Nome Aazienda--}}
            <div class="form-floating mb-3">
                <input type="text" name="nome" id="nome"
                       class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($azienda) ? $azienda->nome : old('nome') }}" placeholder="Nome azienda">
                <label for="nome">Nome azienda</label>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Via--}}
                    <div class="form-floating mb-3">
                        <input type="text" name="via" id="via"
                               class="{{ $errors->has('via') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->via : old('via') }}"
                               placeholder="Via">
                        <label for="via">Via</label>
                    </div>
                </div>
                <div class="col-md">
                    {{--Numero civico--}}
                    <div class="form-floating mb-3">
                        <input type="number" name="numero_civico" id="numero_civico"
                               class="{{ $errors->has('numero_civico') ? 'form-control is-invalid' : 'form-control'}}"
                               value="{{ isset($azienda) ? $azienda->numero_civico : old('numero_civico') }}"
                               placeholder="Numero civico">
                        <label for="numero_civico">Numero civico</label>
                    </div>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Città--}}
                    <div class="form-floating mb-3">
                        <input type="text" name="citta" id="citta"
                               class="{{ $errors->has('citta') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->citta : old('citta') }}"
                               placeholder="Citta">
                        <label for="citta">Città</label>
                    </div>
                </div>
                <div class="col-md">
                    {{--CAP--}}
                    <div class="form-floating mb-3">
                        <input type="number" name="cap" id="cap"
                               class="{{ $errors->has('cap') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($azienda) ? $azienda->cap : old('cap') }}"
                               placeholder="CAP">
                        <label for="cap">CAP</label>
                    </div>
                </div>
            </div>

            {{--Descrizione--}}
            <div class="form-floating mb-3">
                <textarea name="descrizione" id="descrizione"
                          class="{{$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control' }}"
                          placeholder="Descrizione">{{ isset($azienda) ? $azienda->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>
            </div>

            {{--Ragione sociale--}}
            <div class="form-floating mb-3">
                <input type="text" name="ragione_sociale" id="ragione_sociale"
                       class="{{ $errors->has('ragione_sociale') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($azienda) ? $azienda->ragione_sociale : old('ragione_sociale') }}"
                       placeholder="Ragione sociale">
                <label for="ragione_sociale">Ragione Sociale</label>
            </div>

            {{-- Tipolgia --}}
            <div class="form-floating mb-3">
                <select name="tipologia" id="tipologia"
                        class="{{$errors->has('tipologia') ? 'form-control is-invalid' : 'form-control' }}">
                    <option value="" {{ (old('tipologia') == null) ? 'selected' : '' }} disabled>Seleziona la tipologia</option>
                    @foreach(['tecnologia', 'moda', 'alimentari'] as $option)
                        <option value="{{$option}}" {{isset($azienda) && $azienda->tipologia === $option || old('tipologia') == $option ? 'selected' : '' }} >
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
                <label for="tipologia">Tipologia</label>
            </div>
            <div class="mb-3">
                <input type="file" id="logo" name="logo"
                       class="{{ $errors->has('logo') ? 'form-control is-invalid' : 'form-control' }}">
            </div>


            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.aziende') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection




