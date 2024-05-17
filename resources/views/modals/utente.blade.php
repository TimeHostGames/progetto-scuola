<div class="modal fade" id="modal-cartella" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-cartella-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-cartella-label"><?= $folder ? 'Modifica' : 'Nuova' ?> cartella</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/documents/<?= $folder ? 'mod' : 'add' ?>/folder" id="form-<?= $folder ? 'mod' : 'add' ?>-folder" method="post">
                    @csrf
                    <?php if(!$folder) { ?>
                        @method('PUT')
                    <?php } ?>

                    <input type="hidden" name="parent_uuid" value="<?= $parent_uuid ?: '' ?>">

                    <?php if($folder) { ?>
                        <input type="hidden" name="folder_uuid" value="<?= $folder->uuid ?>">
                    <?php } ?>

                    <input type="hidden" name="parent_uuid" value="<?= $parent_uuid ?: '' ?>">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" value="<?= $folder ? $folder->name : '' ?>" placeholder="Nome cartella..." name="name" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" form="form-<?= $folder ? 'mod' : 'add' ?>-folder" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </div>
</div>