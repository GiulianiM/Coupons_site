@extends('layouts.admin')

@section('title', 'Form Promozione')

@section('links')
    @parent
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>
    {{--Aggiunge un suffisso in base al tipo di sconto selezionato--}}
    <script>
        $(function () {
            var actionUrl = "{{ isset($promo) ? route('promo.update', ['promo' => $promo->idPromozione]) : route('promo.store') }}";
            var formId = 'productsform';
            //intercetta la perdita di focus dell'input
            $(":input").change(function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#" + formId).on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });


            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            })

            var startDateInput = $('#inizio');
            var endDateInput = $('#fine');

            var today = new Date().toISOString().split('T')[0];
            startDateInput.attr('min', today);
            endDateInput.attr('min', today);

            startDateInput.on('change', function () {
                var startDate = new Date(startDateInput.val());
                // Imposta la data di fine minima a quella successiva alla data di inizio
                var nextDay = new Date(startDate.getTime() + 24 * 60 * 60 * 1000); //sommiamo al giorno corrente un giorno in millisecondi
                var nextDayFormatted = nextDay.toISOString().split('T')[0];
                endDateInput.attr('min', nextDayFormatted);

                var endDate = new Date(endDateInput.val());
                if (endDate <= startDate) {
                    endDateInput.val(nextDayFormatted);
                }
            });

            function showValoreSconto() {
                var selectedOption = $('#sconto').val();
                if (selectedOption === null) {
                    $('.valore_sconto_select, .valore_sconto_text').hide();
                } else if (selectedOption == 'quantita') {
                    $('.valore_sconto_select').show();
                    $('.valore_sconto_text').hide();
                } else {
                    $('.valore_sconto_select').hide();
                    $('.valore_sconto_text').show();
                }
            }

            $('#sconto').change(function () {
                showValoreSconto();
            });

            showValoreSconto();
        });

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
                            <option value="online"
                                {{ isset($promo) && $promo->modalita == 'online' || old('modalita') == 'online'? 'selected' : '' }}>
                                Online
                            </option>
                            <option value="negozio"
                                {{ isset($promo) && $promo->modalita == 'negozio' || old('modalita') == 'negozio' ? 'selected' : '' }}>
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
                                value="3x2" {{ isset($promo) && $promo->valore_sconto == '3x2' || old('valore_sconto') == '2x1' ? 'selected' : '' }}>
                                3x2
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


            {{--Immagine--}}
            <div class="mb-3">
                <input type="file" id="immagine" name="immagine"
                       class="form-control">
            </div>

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('staff.promos') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
