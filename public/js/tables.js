
function setupTableSorting(selector, disableColumns) {
    $('#' + selector).DataTable({
        columnDefs: [
            {targets: disableColumns, orderable: false}
        ],
        lengthChange: false,
        searching: false,
        paging: false,
        info: false,
    });
}

function setupSearchBar({resetButton, searchButton, searchInput, tableId}) {
    $("#" + resetButton).hide();

    $("#" + searchButton).click(function () {
        var searchText = $("#" + searchInput).val().toLowerCase();
        $("#" + tableId + ' tbody tr').each(function () {
            var rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        toggleResetButton();
    });

    $("#" + resetButton).click(function () {
        $("#" + searchInput).val('');
        $("#" + tableId + ' tbody tr').show();
        toggleResetButton();
    });

    function toggleResetButton() {
        var searchText = $("#" + searchInput).val();
        if (searchText.trim() !== '') {
            $("#" + resetButton).show();
        } else {
            $("#" + resetButton).hide();
        }
    }
}


$(function () {
    const table = $('table').attr('id');
    const resetButton = $('button[type="reset"]').attr('id');
    const searchButton = $('button[type="submit"]').attr('id');
    const searchInput = $('input[type="search"]').attr('id');


    setupSearchBar({
        resetButton: resetButton,
        searchButton: searchButton,
        searchInput: searchInput,
        tableId: table,
    })
});
