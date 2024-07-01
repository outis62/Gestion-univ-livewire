@extends('front-office.layout.livewire')
@section('title', 'Espace administrateur')
@section('component')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ $user->nom }} {{ $user->prenom }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('cooperatives.users.index') }}">Cooperatives</a>
                        </li>
                        <li class="breadcrumb-item active">Détail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('livewire-component')

    <div class="container-fluid">
        @livewire('user.show', [
            'user' => $user,
            'listRoute' => ['link' => 'cooperatives.users.index', 'name' => 'Tous les comptes'],
            'addRoute' => ['link' => 'cooperatives.users.create', 'name' => 'Ajouter un compte'],
            'editRoute' => ['link' => 'cooperatives.users.edit', 'name' => 'Modifier compte'],
            'viewRoute' => ['link' => 'cooperatives.users.show', 'name' => 'Détail'],
        ])
    </div>

@endsection
