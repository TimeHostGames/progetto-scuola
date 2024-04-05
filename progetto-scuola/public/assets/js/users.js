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

    if(nome == "" || cognome == "" || email == "" || rfid == "")
        return true;

    $.ajax({
        url: "/users/create",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: {
            nome, cognome, email, rfid
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