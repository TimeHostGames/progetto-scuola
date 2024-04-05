function openModal() {
    document.getElementById('modale').classList.remove('hidden');
}

function closeModal(event = null) {
    if (event) event.preventDefault();
    document.getElementById('modale').classList.add('hidden');
}

function createUser() {
    
    $.ajax({
        url: "/api/auth/discord",
        method: "GET",
    }).then((ajax_res) => {
        if(ajax_res.status == "success") {
            $('#contenitore-globale-modali').html(ajax_res.result);
            $('#contenitore-globale-modali #modal-qr-code').modal('show');
        }
    });
}