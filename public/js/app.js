emailValidate = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
phoneValidate = /^[\+0-9\-\(\)\s]*$/;

function toggleContent(content) {
    $(content).toggleClass('openContent');
}

function openContent(content) {
    $(content).addClass('openContent');
}

function closeContent(content) {
    $(content).removeClass('openContent');
}

function newAuftrag() {
    openContent('.newAuftragContent');
    openContent('.transparentBg');
}

function addAuftrag() {
    $('.fehler').css('display', 'none');
    $('#fehler').html("");

    name = $('.newAuftragContent input[name=name]').val();
    email = $('.newAuftragContent input[name=email]').val();
    telefon = $('.newAuftragContent input[name=kontakt]').val();
    werkzeug = $('.newAuftragContent input[name=werkzeug]').val();
    dringlichkeit = $('.newAuftragContent select[name=dringlichkeit]').val();

    if (name == '') $('#fehler').append("<li>Bitte geben Sie einen Namen ein.</li>");
    if (email == '') $('#fehler').append("<li>Bitte geben Sie eine Email ein.</li>");
    if (werkzeug == '') $('#fehler').append("<li>Bitte wählen Sie ein Werkzeug aus.</li>");
    if (dringlichkeit == '') $('#fehler').append("<li>Bitte wählen Sie die Dringlichkeit aus.</li>");

    if (!emailValidate.test(email)) $('#fehler').append("<li>Die Email-Adresse '" + email + "' ist ungültig.</li>");
    if (telefon != '' && !phoneValidate.test(telefon)) $('#fehler').append("<li>Die Telefonnummer '" + telefon + "' ist ungültig.</li>");

    if ($('#fehler').html() != '') {
        $('.fehler').css('display', 'block');
    } else {
        $.ajax({
            url: 'app/Controllers/WerkstattController.php',
            method: 'POST',
            cache: false,
            data: {
                addAuftrag: 'submit',
                name: name,
                email: email,
                telefon: telefon,
                werkzeug: werkzeug,
                status: 'pendent',
                dringlichkeit: dringlichkeit
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    location.reload();
                } else {
                    $.each(data.fehler, function(i, value) {
                        $('#fehler').append("<li>" + value + "</li>");
                    });
                    $('.fehler').css('display', 'block');
                }
            },
            error: function() {
                console.log(data.fehler);
            }
        });
    }
}

function getAuftrag(id) {
    $.ajax({
        url: 'app/Controllers/WerkstattController.php',
        method: 'POST',
        cache: false,
        data: {
            getAuftrag: 'submit',
            id: id
        },
        success: function(data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                $('.editAuftragContent input[name=name]').val(data.name);
                $('.editAuftragContent input[name=email]').val(data.email);
                $('.editAuftragContent input[name=kontakt]').val(data.telefon);
                $('.editAuftragContent input[name=werkzeug]').val(data.werkzeug);
                $('.editAuftragContent select[name=status]').val(data.aufStatus).change();
                $('.editAuftragContent input[name=id]').val(data.id);
                openContent('.editAuftragContent');
                openContent('.transparentBg');
            } else {
                $.each(data.fehler, function(i, value) {
                    $('#fehler').append("<li>" + value + "</li>");
                });
                $('.fehler').css('display', 'block');
            }
        },
        error: function() {
            alert(data.fehler);
        }
    });
}

function editAuftrag2() {
    $('.fehler').css('display', 'none');
    $('#fehler').html("");

    kontaktperson = $('.editAuftragContent input[name=name]').val();
    email = $('.editAuftragContent input[name=email]').val();
    telefon = $('.editAuftragContent input[name=kontakt]').val();
    werkzeug = $('.editAuftragContent input[name=werkzeug]').val();
    aufStatus = $('.editAuftragContent select[name=status]').val();
    id = $('.editAuftragContent input[name=id]').val();

    if (kontaktperson == '') $('#fehler').append("<li>Bitte geben Sie einen Namen ein.</li>");
    if (email == '') $('#fehler').append("<li>Bitte geben Sie eine Email ein.</li>");
    if (werkzeug == '') $('#fehler').append("<li>Bitte wählen Sie ein Werkzeug aus.</li>");
    if (aufStatus == '') $('#fehler').append("<li>Bitte wählen Sie die Status aus.</li>");

    if (!emailValidate.test(email)) $('#fehler').append("<li>Die Email-Adresse '" + email + "' ist ungültig.</li>");
    if (telefon != '' && !phoneValidate.test(telefon)) $('#fehler').append("<li>Die Telefonnummer '" + telefon + "' ist ungültig.</li>");

    if ($('#fehler').html() != '') {
        $('.fehler').css('display', 'block');
    } else {
        $.ajax({
            url: 'app/Controllers/WerkstattController.php',
            method: 'POST',
            cache: false,
            data: {
                editAuftrag: 'submit',
                id: id,
                name: kontaktperson,
                email: email,
                telefon: telefon,
                werkzeug: werkzeug,
                status: aufStatus
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    if (data.aufStatus == 'abgeschlossen') {
                        var auftragListe = document.querySelectorAll('.container .auftrag');
                        if (auftragListe.length <= 2) {
                            location.reload();
                        }
                        $('#auftrag_' + data.id).remove();
                    } else {
                        $('#auftrag_' + data.id + ' p .name').html(data.name);
                        $('#auftrag_' + data.id + ' p .status').html(data.aufStatus);
                    }
                    closeContent('.editAuftragContent');
                    closeContent('.transparentBg');
                } else {
                    $.each(data.fehler, function(i, value) {
                        $('#fehler').append("<li>" + value + "</li>");
                    });
                    $('.fehler').css('display', 'block');
                }
            },
            error: function() {
                alert(data.fehler);
            }
        });
    }
}

function delAuftrag(id) {
    bestaetigung = confirm('Willst du die Aufgabe wirklich löschen?');
    if (bestaetigung == true) {
        $.ajax({
            url: 'app/Controllers/WerkstattController.php',
            method: 'POST',
            cache: false,
            data: {
                delAuftrag: 'submit',
                id: id
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    var auftragListe = document.querySelectorAll('.container .auftrag');
                    if (auftragListe.length <= 2) {
                        location.reload();
                    }
                    $('#auftrag_' + id).remove();
                } else {
                    $.each(data.fehler, function(i, value) {
                        $('#fehler').append("<li>" + value + "</li>");
                    });
                    $('.fehler').css('display', 'block');
                }
            },
            error: function() {
                alert(data.fehler);
            }
        });
    }
}

function editAuftragStatus() {
    auftraege = getCheckedBoxes('mehrfachauswahl');
    if (auftraege == null) {
        alert('Keine Aufträge ausgewählt');
        return;
    }
    bestaetigung = confirm('Wollen Sie wirklich alle ändern?');
    if (bestaetigung == true) {
        $.each(auftraege, function(i, value) {
            id = value['value'];
            $.ajax({
                url: 'app/Controllers/WerkstattController.php',
                method: 'POST',
                cache: false,
                data: {
                    editAuftragStatus: 'submit',
                    id: id
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == 'success') {
                        location.reload();
                    } else {
                        $.each(data.fehler, function(i, value) {
                            $('#fehler').append("<li>" + value + "</li>");
                        });
                        $('.fehler').css('display', 'block');
                    }
                },
                error: function() {
                    alert(data.fehler);
                }
            });
        });
    }
}

function getCheckedBoxes(name) {
    var checkboxes = document.getElementsByName(name);
    var checkboxesChecked = [];
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxesChecked.push(checkboxes[i]);
        }
    }
    return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}