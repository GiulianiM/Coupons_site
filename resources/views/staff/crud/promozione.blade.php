@extends('layouts.admin')

@section('title', 'Form Promozione')

@section('content')
    {{--Aggiunge un suffisso in base al tipo di sconto selezionato--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scontoSelect = document.getElementById('sconto');
            //var scontoValoreInput = document.getElementById('valore_sconto');
            const scontoSuffix = document.getElementById('valore_sconto_suffisso');

            function updateScontoSuffix() {
                const selectedOption = scontoSelect.options[scontoSelect.selectedIndex];
                const scontoType = selectedOption.value;
                let suffix = '';

                switch (scontoType) {
                    case 'quantita':
                        suffix = 'pz';
                        break;
                    case 'percentuale':
                        suffix = '%';
                        break;
                    case 'prezzo_fisso':
                    case 'benvenuto':
                        suffix = '€';
                        break;
                }

                scontoSuffix.textContent = suffix;
            }

            // Aggiorna il suffisso ogni volta che cambia la select
            scontoSelect.addEventListener('change', updateScontoSuffix);

            // Aggiorna il suffisso in base alla scelta iniziale
            updateScontoSuffix();
        });
    </script>
    {{--Datepicker--}}
    <script>
        $(document).ready(function () {
            var today = new Date(); // Ottiene la data odierna

            $('#inizio').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                startDate: today, // Imposta la data di inizio a oggi
            }).datepicker("setDate", today);

            $('#fine').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });

            $('#inizio').on('changeDate', function (selected) {
                var startDate = new Date(selected.date.valueOf());
                $('#fine').datepicker('setStartDate', startDate); // Imposta la data di inizio per l'input 'fine'
            });
        });
    </script>

    {{--Script per la select di 'modalita' e 'luogo' per la fruizione delle promozioni--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var modalitaSelect = document.getElementById('modalita');
            var luogoSelect = document.getElementById('luogo');

            function populateLuogoSelect() {
                //var modalitaValue = modalitaSelect.value;
                var luoghi = modalitaSelect.options[modalitaSelect.selectedIndex].getAttribute('data-luoghi');
                var luoghiArray = luoghi.split(',');
                luogoSelect.innerHTML = '';

                luoghiArray.forEach(function (luogo) {
                    var option = document.createElement('option');
                    option.value = luogo;
                    option.text = luogo;
                    luogoSelect.appendChild(option);
                });
            }

            // aggiorna la select ogni volta che cambia la modalità
            modalitaSelect.addEventListener('change', populateLuogoSelect);

            // popola la select al primo caricamento della pagina
            populateLuogoSelect();
        });
    </script>


    <div class="container">

        <form
            action="{{ isset($promo) ? route('promo.update', ['promo' => $promo->idPromozione]) : route('promo.store') }}"
            method="POST" class="rounded shadow p-5"
            enctype="multipart/form-data">
            @csrf
            @if (isset($promo))
                @method('PUT')
            @endif
            @isset($promo)
                <h3>Modifica promozione</h3>
            @else
                <h3>Aggiungi promozione</h3>
            @endisset


            {{--Azienda a cui la promozione è associata, ordinate per nome--}}
            <div class="form-floating mb-3">
                <select name="idAzienda" id="idAzienda"
                        class="{{$errors->has('idAzienda') ? 'form-control is-invalid' : 'form-control' }}">
                    @foreach($aziende as $azienda)
                        <option value="{{$azienda->idAzienda}}"
                            {{ isset($promo) && $promo->idAzienda == $azienda->idAzienda ? 'selected' : '' }}>
                            {{$azienda->nome}}
                        </option>
                    @endforeach
                </select>
                <label for="idAzienda">Azienda</label>
                @if ($errors->first('idAzienda'))
                    @foreach ($errors->get('idAzienda') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>


            {{--Titolo--}}
            <div class="form-floating mb-3">
                <input type="text" name="titolo" id="titolo"
                       class="{{ $errors->has('titolo') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($promo) ? $promo->titolo : old('titolo') }}" placeholder="Titolo">
                <label for="titolo">Titolo</label>
                @if ($errors->first('titolo'))
                    @foreach ($errors->get('titolo') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            {{--Descrizione--}}
            <div class="form-floating mb-3">
                <textarea name="descrizione" id="descrizione"
                          class="{{$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control' }}"
                          placeholder="Descrizione">{{ isset($promo) ? $promo->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>
                @if ($errors->first('descrizione'))
                    @foreach ($errors->get('descrizione') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Modalità di fruizione--}}
                    <div class="form-floating mb-3">
                        <select name="modalita" id="modalita"
                                class="{{$errors->has('modalita') ? 'form-control is-invalid' : 'form-control' }}">
                            <option value="online"
                                    {{ isset($promo) && $promo->modalita == 'online' ? 'selected' : '' }}
                                    data-luoghi="Sito web, Piattaforma online, URL specifico">
                                Online
                            </option>
                            <option value="negozio"
                                    {{ isset($promo) && $promo->modalita == 'negozio' ? 'selected' : '' }}
                                    data-luoghi="Nome del negozio, Indirizzo del negozio, Città del negozio">
                                Negozio
                            </option>
                            <option value="online_e_negozio"
                                    {{ isset($promo) && $promo->modalita == 'online_e_negozio' ? 'selected' : '' }}
                                    data-luoghi="Sito web, Piattaforma online, URL specifico, Nome del negozio, Indirizzo del negozio, Città del negozio">
                                Online e negozio
                            </option>
                        </select>
                        <label for="modalita">Modalità di fruizione</label>
                        @if ($errors->first('modalita'))
                            @foreach ($errors->get('modalita') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    {{--Luogo di fruizione--}}
                    <div class="form-floating mb-3">
                        <div class="form-floating mb-3">
                            <select name="luogo" id="luogo"
                                    class="{{$errors->has('luogo') ? 'form-control is-invalid' : 'form-control' }}">
                                <option value="1" {{ isset($promo) && $promo->luogo == 1 ? 'selected' : '' }}>

                                </option>
                                <option value="2" {{ isset($promo) && $promo->luogo == 2 ? 'selected' : '' }}>

                                </option>
                                <option value="3" {{ isset($promo) && $promo->luogo == 3 ? 'selected' : '' }}>

                                </option>
                            </select>
                            <label for="luogo">Luogo di fruizione</label>
                            @if ($errors->first('luogo'))
                                @foreach ($errors->get('luogo') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    {{--Data di inizio--}}
                    <div class="form-floating mb-3">
                        <input type="text" name="inizio" id="inizio"
                               class="{{$errors->has('inizio') ? 'form-control is-invalid' : 'form-control' }}"
                               placeholder="Data di inizio"
                               value="{{ isset($promo) ? $promo->inizio : old('inizio') }}">
                        <label for="inizio">Data di inizio</label>
                        @if ($errors->first('inizio'))
                            @foreach ($errors->get('inizio') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    {{--Data di fine--}}
                    <div class="form-floating mb-3">
                        <input type="text" name="fine" id="fine"
                               class="{{$errors->has('fine') ? 'form-control is-invalid' : 'form-control' }}"
                               placeholder="Data di fine"
                               value="{{ isset($promo) ? $promo->fine : old('fine') }}">
                        <label for="fine">Data di fine</label>
                        @if ($errors->first('fine'))
                            @foreach ($errors->get('fine') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row g-2">
                {{--Tipo di sconto--}}
                <div class="col-md">
                        <div class="form-floating mb-3">
                            <select name="sconto" id="sconto"
                                    class="{{$errors->has('sconto') ? 'form-control is-invalid' : 'form-control' }}">
                                {{--Riduzione di un importo fisso dal prezzo totale--}}
                                <option
                                    value="prezzo_fisso" {{ isset($promo) && $promo->sconto == 'prezzo_fisso' ? 'selected' : '' }}>
                                    Prezzo fisso
                                </option>
                                {{--Percentuale sull'importo totale--}}
                                <option
                                    value="percentuale" {{ isset($promo) && $promo->sconto == 'percentuale' ? 'selected' : '' }}>
                                    Percentuale
                                </option>
                                {{--Sconto basato sulla quantità di prodotti acquistati. Ad esempio, uno sconto del 10% sull'acquisto di 3 o più articoli.--}}
                                <option
                                    value="quantita" {{ isset($promo) && $promo->sconto == 'quantita' ? 'selected' : '' }}>
                                    Quantità
                                </option>
                                {{--Sconto per i nuovi clienti che effettuano il loro primo acquisto.--}}
                                <option
                                    value="benvenuto" {{ isset($promo) && $promo->sconto == 'benvenuto' ? 'selected' : '' }}>
                                    Benvenuto
                                </option>
                            </select>
                            <label for="sconto">Tipo di sconto</label>
                            @if ($errors->first('sconto'))
                                @foreach ($errors->get('sconto') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                </div>
                {{--Valore dello sconto--}}
                <div class="col-md">
                    <div class="form-floating input-group mb-3">
                        <input type="number" name="valore_sconto" id="valore_sconto"
                               class="{{ $errors->has('valore_sconto') ? 'form-control is-invalid' : 'form-control' }}"
                               value="{{ isset($promo) ? $promo->valore_sconto : old('valore_sconto') }}"
                               placeholder="Valore sconto">
                        <label for="valore_sconto">Valore sconto</label>
                        <span class="input-group-text" id="valore_sconto_suffisso"></span>
                        @if ($errors->first('valore_sconto'))
                            @foreach ($errors->get('valore_sconto') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{$message}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


            {{--Immagine--}}
            <div class="mb-3">
                <input type="file" id="immagine" name="immagine"
                       class="{{ $errors->has('immagine') ? 'form-control is-invalid' : 'form-control' }}">
                @if ($errors->first('immagine'))
                    @foreach ($errors->get('immagine') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('staff.promos') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
