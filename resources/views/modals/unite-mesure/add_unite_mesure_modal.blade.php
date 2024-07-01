<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form action="{{ route('unite-mesure.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="customername-field"
                            class="form-label @error('libelle') is-invalid @enderror">Libelle</label>
                        <input type="text" id="customername-field" class="form-control"
                            placeholder="Renseigner l'unité" name="libelle"/>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault01" class="form-label">Type</label>
                        <select class="form-select @error('type') is-invalid @enderror" id="validationDefault01"
                            name="type">
                            <option value="" selected disabled>Sélectionner un type</option>
                            <option value="poids">Poids</option>
                            <option value="surface">Surface</option>
                            <option value="distance">Distance</option>
                        </select>
                        @error('type')
                            <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="gap-2 justify-content-end">
                        <button type="submit" class="btn btn-success"><i class="ri-save-line me-2 align-bottom"></i>
                            Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
