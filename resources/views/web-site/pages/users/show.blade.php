@extends('web-site.layout.public')

@section('title', 'Espace public')
@section('website-layout-content')
    <section class="section pb-0 hero-section mt-3" id="hero">
        <div class="bg-overlay bg-overlay-pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-0">
                        <h4 class="mb-sm-0">Profil {{ $profil->nom }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb ms-3">
                                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $profil->nom }}
                                    {{ $profil->prenom }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div>
                                    <a href="{{ route('prospect.utilisateurs.edit', $profil) }}" class="btn btn-success"><i
                                            class="ri-edit-box-line align-bottom"></i>
                                        Modifier les informations</a>
                                </div>
                                <div class="ms-3">
                                    <a href="{{ route('reset_password') }}" class="btn btn-warning"><i
                                            class="bx bx-lock-open-alt"></i>
                                        Modifier mot de passe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informations personnelle</h5>
                            <div class="col-12">
                                <dl class="mt-3 dl">
                                    <dt>Nom:</dt>
                                    <dd>{{ $profil->nom ? $profil->nom : '---' }}</dd>
                                    <dt>Prenom:</dt>
                                    <dd>{{ $profil->prenom ? $profil->prenom : '---' }}</dd>
                                    <dt>Adresse:</dt>
                                    <dd>{{ $profil->adresse ? $profil->adresse : '---' }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informations du compte</h5>
                            <div class="col-12">
                                <dl class="mt-3 dl">
                                    <dt>Email:</dt>
                                    <dd>{{ $profil->email ? $profil->email : '---' }}</dd>
                                    <dt>Role:</dt>
                                    <dd>{{ getRoleText($profil->role ? $profil->role : '---') }}</dd>
                                    <dt>Date creation:</dt>
                                    <dd>{{ formatDate($profil->created_at ? $profil->created_at : '---') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
