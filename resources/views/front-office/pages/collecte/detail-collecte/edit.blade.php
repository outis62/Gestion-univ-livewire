@extends('front-office.layout.livewire')
@section('title', 'Gestion des détails collectes')
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Modifier ligne de collecte</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('detail-collecte.create') }}">Ligne de collecte</a>
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
        @livewire('collecte.detail-collecte.form-detail-collecte', [
            'detailCollecte' => $detailCollecte,
            'showRoute' => ['link' => 'collecte.show', 'name' => 'Révenir aux détails'],
            'listRoute' => ['link' => 'collecte.index', 'name' => 'Toutes les collectes'],
        ])
    </div>
@endsection
