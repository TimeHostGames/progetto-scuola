function openModal() {
    $('#modale').removeClass('hidden');
}

function closeModal(event = null) {
    if (event) event.preventDefault();
    $('#modale').addClass('hidden');
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

function apriModaleModifica() {
    console.log("id");
    // $.ajax({
    //     url: "/modale-modifica-utente",
    //     method: "GET",
    //     dataType: "json",
    //     data: {
    //         id: id
    //     }
    // }).then((ajax_res) => {
    //     if(ajax_res.status == "success") {
    //         $('#contenitore-globale-modali').html(ajax_res.result);
    //         $('#contenitore-globale-modali #modal-qr-code').modal('show');
    //     }
    // });
}