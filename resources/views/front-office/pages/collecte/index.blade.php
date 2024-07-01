@extends('front-office.layout.livewire')
@section('title', 'Gestion des Collectes')
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tableau des collectes</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Collectes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('livewire-component')
    <div class="container-fluid">
        @livewire('collecte.index', [
            'importExcel' => ['link' => 'collecte.importExcel', 'name' => 'Importer un fichier excel'],
            'addRoute' => ['link' => 'collecte.create', 'name' => 'Ajouter une collecte'],
            'viewRoute' => ['link' => 'collecte.show', 'name' => 'Détail'],
        ])
    </div>
@endsection
