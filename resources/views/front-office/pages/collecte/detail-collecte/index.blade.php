@extends('front-office.layout.livewire')
@section('title', 'Gestion des détails collecte')
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tableau des détails collecte</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Détails collecte</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('livewire-component')
    <div class="container-fluid">
        @livewire('collecte.detail-collecte.index', [
            'addRoute' => ['link' => 'detail-collecte.create', 'name' => 'Ajouter une détaile collecte'],
            'viewRoute' => ['link' => 'detail-collecte.show', 'name' => 'Détail'],
        ])
    </div>
@endsection
