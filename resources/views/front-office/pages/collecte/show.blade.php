@extends('front-office.layout.livewire')
@section('title', 'Gestion des collectes')
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Detail collecte</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('collecte.index') }}">Collectes</a>
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
        @livewire('collecte.show', [
            'collecte' => $collecte,
            'detailRoute' => ['link' => 'detail-collecte.add', 'name' => 'Ligne de collecte'],
            'listRoute' => ['link' => 'collecte.index', 'name' => 'Toutes les collectes'],
            'addRoute' => ['link' => 'collecte.create'],
            'editRoute' => ['link' => 'collecte.edit'],
            'viewRoute' => ['link' => 'collecte.show', 'name' => 'Détail'],
        ])
    </div>

@endsection
