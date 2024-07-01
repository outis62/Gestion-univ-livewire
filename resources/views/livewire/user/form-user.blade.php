<div>
    {{-- The whole world belongs to you. --}}
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4">
                    <span class="text-muted mb-3">
                        Les champs avec <span class="text-danger fs-15">*</span>
                        sont obligatoires
                    </span>
                </div>
                <div class="col-sm-auto ms-auto">
                    <div class="list-grid-nav hstack gap-1">
                        @isset($listRoute['link'])
                            <a href="{{ route($listRoute['link']) }}" title="Retour à la liste des comptes d'accès"
                                class="btn btn-secondary addMembers-modal">
                                <i class="ri-list-check-2 me-1 align-bottom"></i> {{ $listRoute['name'] }}
                            </a>
                        @endisset
                        @isset($addRoute['link'])
                            <a href="{{ route($addRoute['link']) }}" title="Ajouter un nouveau compte"
                                class="btn btn-success addMembers-modal">
                                <i class="ri-add-box-line me-1 align-bottom"></i> {{ $addRoute['name'] }}
                            </a>
                        @endisset
                        @isset($showRoute['link'])
                            <a href="{{ route($showRoute['link'], $user) }}" title="Retour aux détails du compte"
                                class="btn btn-info addMembers-modal">
                                <i class="ri-eye-line me-1 align-bottom"></i> {{ $showRoute['name'] }}
                            </a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="onSubmitForm">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <span class="text-muted mb-2">Information sur le profil</span>
                    <div class="col-xxl-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nom" class="form-label">
                                Nom de famaille
                                <span class="text-danger fs-15">*</span>
                            </label>
                            <input id="nom" type="text" wire:model="nom"
                                class="form-control @error('nom') is-invalid @enderror"
                                placeholder="Renseigner le nom de famille">
                            @error('nom')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="prenom" class="form-label">
                                Prénom(s)
                                <span class="text-danger fs-15">*</span>
                            </label>
                            <input id="prenom" type="text" wire:model="prenom"
                                class="form-control @error('prenom') is-invalid @enderror"
                                placeholder="Renseigner le(s) prenom(s)">
                            @error('prenom')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input id="adresse" type="text" wire:model="adresse"
                                class="form-control @error('adresse') is-invalid @enderror"
                                placeholder="Renseigner l'adresse">
                            @error('adresse')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <span class="text-muted mb-2">Identifiant d'accès à l'application</span>
                    <div class="col-xxl-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="email" class="form-label">
                                Adresse mail
                                <span class="text-danger fs-15">*</span>
                            </label>
                            <input id="email" type="email" @disabled($user->email_verified_at ? true : false) wire:model="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Renseigner l'adresse mail">
                            @error('email')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="role" class="form-label">
                                Rôle
                                <span class="text-danger fs-15">*</span>
                            </label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role"
                                wire:model="role" aria-label="Default select example">
                                <option value="">Choisir le rôle</option>
                                @foreach ($roles as $_role)
                                    <option value="{{ $_role }}"
                                        @if (old('role') == $_role) selected @endif>{{ getRoleText($_role) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('role')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row mt-4">
                            <div class="col-12">
                                <button class="btn btn-{{ $user->id ? 'secondary' : 'success' }}" type="submit">
                                    @if ($user->id)
                                        Mettre à jour
                                    @else
                                        Enregistrer
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
