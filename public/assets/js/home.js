function openGate(event_uuid) {
    $.ajax({
        url: "/open_gate",
        method: "GET",
        dataType: "json",
        // data: {
        //     uuid: event_uuid
        // }
    }).then((ajax_res) => {
        if(ajax_res.stato == "true") {
            Swal.fire({
                title: 'Successo',
                text: 'Azione eseguita correttamente!',
                icon: 'success',
                confirmButtonText: 'Capito',
            }).then((res) => {
                return true;
            });
        }
    });
}