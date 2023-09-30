function addArtikel(id) {
    $.ajax({
        url: '/openshift/scripts.php',
        method: 'POST',
        cache: false,
        data: {
            addArtikel: 'submit',
            artikel_id: id,
        },
        success: function (data) {
            data = JSON.parse(data);
            $('#anz_artikel').text(data.anz_artikel);
            $('#anz_artikel').show();
        },
        error: function (xhr, status, error) {
            console.error('Fehler: ' + status + ' - ' + error);
        }
    });
}

function bestellen() {
    $.ajax({
        url: '/openshift/scripts.php',
        method: 'POST',
        cache: false,
        data: {
            clearWarenkorb: 'submit',
        },
        success: function (data) {
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.error('Fehler: ' + status + ' - ' + error);
        }
    });
}