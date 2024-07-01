@extends('front-office.layout.livewire')
@section('title', 'Gestion des commercialisations')
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Ajouter une nouvelle commercialisation</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('commercialisation.index') }}">commercialisations</a>
                        </li>
                        <li class="breadcrumb-item active">Nouvelle</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('livewire-component')

    <div class="container-fluid">
        @livewire('commercialisation.form-commercialisation', [
            'commercialisation' => $commercialisation,
            'listRoute' => ['link' => 'commercialisation.index', 'name' => 'Toutes les commercialisations'],
        ])
    </div>

@endsection
