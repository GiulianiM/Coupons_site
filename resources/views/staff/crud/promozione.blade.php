@extends('layouts.admin')

@section('title', 'Form Promozione')

@section('scripts')
    @parent
    <script src="{{ asset('js/promozione.js') }}"></script>
    <script src="{{ asset('js/form_validation.js') }}"></script>
    <script src="{{ asset('js/file_validator.js') }}"></script>

    <script>
        $(function (){
            const actionUrl = "{{ isset($promo) ? route('promo.update', ['promo' => $promo->idPromozione]) : route('promo.store') }}";
            const formId = $('.container > form').attr('id');
            validateForm(actionUrl, formId);
        })
    </script>
@endsection

@section('content')
    <div class="container">
        <form
            id="productsform"
            action="{{ isset($promo) ? route('promo.update', ['promo' => $promo->idPromozione]) : route('promo.store') }}"
            method="POST" class="rounded shadow p-5"
            enctype="multipart/form-data">
            @csrf
            @isset($promo)
                <h3>Modifica promozione</h3>
            @else
                <h3>Aggiungi promozione</h3>
            @endisset


            {{--Azienda a cui la promozione è associata, ordinate per nome--}}
            <div class="form-floating mb-3">
                <select name="idAzienda" id="idAzienda"
                        class="form-control">
                    <option value="" {{ (old('idAzienda') == null) ? 'selected' : '' }} disabled>Seleziona l'azienda
                    </option>
                    @foreach($aziende as $azienda)
                        <option value="{{$azienda->idAzienda}}"
                            {{ isset($promo) && $promo->idAzienda == $azienda->idAzienda || old('idAzienda') == $azienda->idAzienda ? 'selected' : '' }}>
                            {{$azienda->nome}}
                        </option>
                    @endforeach
                </select>
                <label for="idAzienda">Azienda</label>
            </div>


            {{--Titolo--}}
            <div class="form-floating mb-3">
                <input type="text" name="titolo" id="titolo"
                       class="form-control"
                       value="{{ isset($promo) ? $promo->titolo : old('titolo') }}" placeholder="Titolo">
                <label for="titolo">Titolo</label>
            </div>

            {{--Descrizione--}}
            <div class="form-floating mb-3">
                <textarea name="descrizione" id="descrizione"
                          class="form-control"
                          placeholder="Descrizione">{{ isset($promo) ? $promo->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>

            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Modalità di fruizione--}}
                    <div class="form-floating mb-3">
                        <select name="modalita" id="modalita"
                                class="form-control">
                            <option value="" {{ (old('modalita') == null) ? 'selected' : '' }} disabled>Seleziona la
                                modalità
                            </option>
                            <option value="Online"
                                {{ isset($promo) && $promo->modalita == 'Online' || old('modalita') == 'Online'? 'selected' : '' }}>
                                Online
                            </option>
                            <option value="Negozio"
                                {{ isset($promo) && $promo->modalita == 'Negozio' || old('modalita') == 'Negozio' ? 'selected' : '' }}>
                                Negozio
                            </option>
                        </select>
                        <label for="modalita">Modalità di fruizione</label>
                    </div>
                </div>
                <div class="col-md">
                    {{--Luogo di fruizione--}}
                    <div class="form-floating mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="luogo" id="luogo"
                                   class="form-control"
                                   placeholder="Luogo di fruizione"
                                   value="{{ isset($promo) ? $promo->luogo : old('luogo') }}">
                            <label for="luogo">Luogo di fruizione</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Data di inizio--}}
                    <div class="form-floating mb-3">
                        <input type="date" name="inizio" id="inizio"
                               class="form-control"
                               placeholder="Data di inizio"
                               value="{{ isset($promo) ? $promo->inizio : old('inizio') }}">
                        <label for="inizio">Data di inizio</label>
                    </div>
                </div>
                <div class="col-md">
                    {{--Data di fine--}}
                    <div class="form-floating mb-3">
                        <input type="date" name="fine" id="fine"
                               class="form-control"
                               placeholder="Data di fine"
                               value="{{ isset($promo) ? $promo->fine : old('fine') }}">
                        <label for="fine">Data di fine</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                {{--Tipo di sconto--}}
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <select name="sconto" id="sconto"
                                class="form-control">
                            <option value="" {{ (old('sconto') == null) ? 'selected' : '' }} disabled>Seleziona</option>
                            {{--Riduzione di un importo fisso dal prezzo totale--}}
                            <option
                                value="prezzo_fisso" {{ isset($promo) && $promo->sconto == 'prezzo_fisso' || old('sconto') == 'prezzo_fisso'  ? 'selected' : '' }}>
                                Prezzo fisso
                            </option>
                            {{--Percentuale sull'importo totale--}}
                            <option
                                value="percentuale" {{ isset($promo) && $promo->sconto == 'percentuale' || old('sconto') == 'percentuale' ? 'selected' : '' }}>
                                Percentuale
                            </option>
                            {{--Esempio, prendi 3 paghi 2.--}}
                            <option
                                value="quantita" {{ isset($promo) && $promo->sconto == 'quantita' || old('sconto') == 'quantita' ? 'selected' : '' }}>
                                Quantità
                            </option>
                        </select>
                        <label for="sconto">Tipo di sconto</label>
                    </div>
                </div>
                {{--Valore dello sconto--}}
                <div class="col-md">
                    <div class="form-floating mb-3 valore_sconto_select">
                        <select name="valore_sconto_select" id="valore_sconto_select" class="form-control">
                            <option
                                value="2x1" {{ isset($promo) && $promo->valore_sconto == '2x1' || old('valore_sconto') == '2x1' ? 'selected' : '' }}>
                                2x1
                            </option>
                            <option
                                value="3x2" {{ isset($promo) && $promo->valore_sconto == '3x2' || old('valore_sconto') == '3x2' ? 'selected' : '' }}>
                                3x2
                            </option>
                            <option
                                value="4x2" {{ isset($promo) && $promo->valore_sconto == '4x2' || old('valore_sconto') == '4x2' ? 'selected' : '' }}>
                                4x2
                            </option>
                            <option
                                value="5x3" {{ isset($promo) && $promo->valore_sconto == '5x3' || old('valore_sconto') == '5x3' ? 'selected' : '' }}>
                                5x3
                            </option>
                        </select>
                        <label for="valore_sconto_select">Valore dello sconto</label>
                    </div>
                    <div class="form-floating mb-3 valore_sconto_text">
                        <input type="text" name="valore_sconto_text" id="valore_sconto_text"
                               class="form-control"
                               placeholder="Valore dello sconto"
                               value="{{ isset($promo) ? $promo->valore_sconto : old('valore_sconto') }}"
                               data-bs-toggle="tooltip"
                               data-bs-placement="bottom"
                               title="Inserisci solo il valore numerico.
                                      Verranno aggiunti il prefisso e/o il suffisso corretto in sede di visualizzazione">
                        <label for="valore_sconto_select">Valore dello sconto</label>
                    </div>
                </div>
            </div>

            {{-- Immagine --}}
            <div class="mb-3">
                <input type="file" id="immagine" name="immagine" class="form-control" accept="image/jpeg, image/png, image/gif, image/svg+xml">
            </div>

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('staff.promos') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
