function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;

    var out = '<div class="invalid-feedback ms-2 errors">';

    if (elemErrors.length === 1) {
        // Se c'è solo un errore, aggiungi semplicemente il messaggio di errore a "out"
        out += elemErrors[0];
    } else if (elemErrors.length > 1) {
        // Se ci sono più di un errore, crea una lista non ordinata di valori con gli errori
        out += '<ul>';
        for (var i = 0; i < elemErrors.length; i++) {
            out += '<li>' + elemErrors[i] + '</li>';
        }
        out += '</ul>';
    }

    out += '</div>'
    return out;
}


function doElemValidation(id, actionUrl, formId) {

    var formElems;

    //prendo il token CSRF dal form e lo aggiungo alla formdata
    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    console.log(errMsgs.errors[id]);

                    if (errMsgs.errors[id] === undefined) {
                        $("#" + id).removeClass('is-invalid');
                    } else {
                        $("#" + id).addClass('is-invalid');
                        $("#" + id).parent().find('.errors').html(' ');
                        $("#" + id).parent().find('label').after(getErrorHtml(errMsgs.errors[id]));
                    }
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + id);
    if (elem.attr('type') === 'file') {
        // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}


function doFormValidation(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));

    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs.errors, function (id) {
                    if (errMsgs.errors[id] === undefined) {
                        $("#" + id).removeClass('is-invalid');
                    } else {
                        $("#" + id).addClass('is-invalid');
                        $("#" + id).parent().find('.errors').html(' ');
                        $("#" + id).parent().find('label').after(getErrorHtml(errMsgs.errors[id]));
                    }
                });
            }
        },
        success: function (data) {
          window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}

function validateForm(actionUrl, formId){
    //intercetta la perdita di focus dell'input
    $(":input").on('blur',function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $('input[type="date"], input[type="number"]').on('change', function() {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#" + formId).on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
}
