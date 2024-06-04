{{-- <div class="modal fade" id="modal-modifica-utente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-modifica-utente-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-modifica-utente-label">Modifica utente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/modifica-utente" id="form-modifica-utente" method="post">
                    @csrf
                    <input type="hidden" name="id_utente" value="<?= $user->id ?>">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" value="<?= $user->name ?>" placeholder="Inserisci nome" name="name" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" form="form-modifica-utente" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal-modifica-utente">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div>
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
              <h1>DA METTE ICONA</h1>
            </div>
            <input type="hidden" name="id_utente" id="id_utente" value="<?= $user->id ?>">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Creazione utente</h3>
                <div class="mt-4 mb-4">
                  <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                  <input type="text" value="<?= $user->name ?>" name="nome-modifica" id="nome-input-modifica" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                  <label for="cognome" class="block text-sm font-medium text-gray-700">Cognome</label>
                  <input type="text" value="<?= $user->cognome ?>" name="cognome-modifica" id="cognome-input-modifica" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" value="<?= $user->email ?>" name="email-modifica" id="email-input-modifica" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                  <label for="rfid" class="block text-sm font-medium text-gray-700">Rfid</label>
                  <input type="rfid" value="<?= $user->rfid_token ?>" name="rfid-modifica" id="rfid-input-modifica" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
            <button type="button" onclick="modificaUtente()" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Modifica Utente</button>
            <button type="button" onclick="closeModalModifica()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>