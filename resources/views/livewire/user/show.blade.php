<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-auto ms-auto">
                    <div class="list-grid-nav hstack gap-1">
                        @isset($listRoute['link'])
                            <a href="{{ route($listRoute['link']) }}" title="Retour à la liste des accès"
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
                        @isset($editRoute['link'])
                            @if ($userConnected->id !== $user->id)
                                <a href="{{ route($editRoute['link'], $user) }}" title="Modifier les information du compte"
                                    class="btn btn-warning addMembers-modal">
                                    <i class="ri-pencil-line me-1 align-bottom"></i> {{ $editRoute['name'] }}
                                </a> 
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="avatar-lg">
                                <img src="{{ asset('assets/images/users/user_profil.png') }}" alt="user-img"
                                    class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <div class="col-12">
                            <dl class="mt-3 dl">
                                <dt>Nom:</dt>
                                <dd>{{ $user->nom ? $user->nom : '---' }}</dd>
                                <dt>Prenom:</dt>
                                <dd>{{ $user->prenom ? $user->prenom : '---' }}</dd>
                                <dt>Adresse:</dt>
                                <dd>{{ $user->adresse ? $user->adresse : '---' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            @if ($userConnected->id !== $user->id)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-warning waves-effect waves-light"
                                    wire:click='generatePassword'>Reinitialiser Mot de passe</button>
                                <button type="button"
                                    class="btn btn-outline-{{ $user->statut ? 'danger' : 'success' }} waves-effect waves-light"
                                    wire:click='setAccountState'>{{ $user->statut ? 'Verouiller' : 'Déverouiller' }}
                                    le compte</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <dl class="mt-1 dl">
                        <dt>Email:</dt>
                        <dd>{{ $user->email ? $user->email : '---' }}</dd>
                        <dt>Role :</dt>
                        <dd>
                            @if ($user->role == 'handler-admin')
                                <span>Administrateur</span>
                            @elseif ($user->role == 'agent-admin')
                                <span>Agent administrateur</span>
                            @elseif ($user->role == 'handler-op')
                                <span>Responsable cooperative paysane</span>
                            @elseif ($user->role == 'agent-op')
                                <span>Agent cooperative paysane</span>
                            @else
                                <span>Prospect</span>
                            @endif
                        </dd>
                        <dt>Date de création :</dt>
                        <dd>{{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') : '---' }}
                        </dd>
                        <dt>Compte:</dt>
                        <dd>
                            @if ($user->statut)
                                <span class="badge badge-outline-success">
                                    <i class="ri-lock-unlock-line"></i>
                                    Accessible
                                </span>
                            @else
                                <span class="badge badge-outline-danger">
                                    <i class="ri-lock-2-line"></i>
                                    Blocqué
                                </span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
