<div class="modal fade" id="updateModal{{ $unite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form action="{{ route('unite-mesure.update', $unite->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Libelle</label>
                        <input type="text" id="customername-field" class="form-control" name="libelle"
                            value="{{ $unite->libelle }}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="gap-2 justify-content-end">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
