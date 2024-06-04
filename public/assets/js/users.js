function openModal() {
    $('#modale').removeClass('hidden');
}

function closeModal(event = null) {
    if (event) event.preventDefault();
    $('#modale').addClass('hidden');
}

function openModalModifica(id) {
    $('#modale-modifica').removeClass('hidden');
}

function closeModalModifica(event = null) {
    if (event) event.preventDefault();
    $('#modal-modifica-utente').addClass('hidden');
}

function createUser() {
    let nome = $('#nome-input').val();
    let cognome = $('#cognome-input').val();
    let email = $('#email-input').val();
    let rfid = $('#rfid-input').val();
    let password = $('#password-input').val();

    if(nome == "" || cognome == "" || email == "" || rfid == "" || password == "")
        return true;

    $.ajax({
        url: "/users/create",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: {
            nome, cognome, email, rfid, password
        }
    }).then((ajax_res) => {
        closeModal();
        if(ajax_res.status == "success") {
            Swal.fire({
                title: 'Successo',
                text: 'L\'utente è stato creato con successo',
                icon: 'success',
                confirmButtonText: 'Capito',
            }).then((res) => {
                return true;
            });
        }
    });
}

function apriModaleModifica(id) {
    $.ajax({
        url: "/modale-modifica-utente",
        method: "GET",
        dataType: "json",
        data: {
            id: id
        }
    }).then((ajax_res) => {
        if(ajax_res.status == "success") {
            $('#contenitore-globale-modali').html(ajax_res.result);
            $('#contenitore-globale-modali #modal-modifica-utente').removeClass('hidden');
        }
    });
}

function modificaUtente() {
    let id = $('#id_utente').val();
    let nome = $('#nome-input-modifica').val();
    let cognome = $('#cognome-input-modifica').val();
    let email = $('#email-input-modifica').val();
    let rfid = $('#rfid-input-modifica').val();

    $.ajax({
        url: "/modifica-utente",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: {
            id: id,
            nome: nome,
            cognome: cognome,
            email: email,
            rfid: rfid
        }
    }).then((ajax_res) => {
        closeModalModifica();
        if(ajax_res.status == "success") {
            Swal.fire({
                title: 'Successo',
                text: 'L\'utente è stato modificato con successo',
                icon: 'success',
                confirmButtonText: 'Capito',
            }).then((res) => {
                return true;
            });
        }
    });
}