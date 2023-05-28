$(function () {
    $('[data-bs-toggle="tooltip"]').tooltip()

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

