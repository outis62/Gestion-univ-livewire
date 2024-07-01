@extends('front-office.layout.customer')
@section('title', 'Gestion des moyens de stockage')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('component')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><a href="{{ route('customersDashboard') }}" class="text-black">Accueil</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('moyen-stockage.index') }}">Moyen stockage</a>
                        </li>
                        <li class="breadcrumb-item active text-primary">Nouveau</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('front-layout-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Nouveau moyen de stockage</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3" action="{{ route('moyen-stockage.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Intitulé</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror"
                                    id="validationDefault01" name="libelle">
                                @error('libelle')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Capacité</label>
                                <input type="number" class="form-control @error('capacite') is-invalid @enderror"
                                    id="validationDefault02" name="capacite" min="0" step="1">
                                @error('capacite')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Etat d'observation</label>
                                <select class="form-select @error('etat_observation') is-invalid @enderror"
                                    id="validationDefault01" name="etat_observation">
                                    <option value="" selected disabled>Sélectionner</option>
                                    <option value="En construction">En construction</option>
                                    <option value="Mauvaise état">Mauvaise état</option>
                                    <option value="Bon Etat">Bon Etat</option>
                                    <option value="Acceptable">Acceptable</option>
                                    <option value="Fonctionnel">Fonctionnel</option>
                                </select>
                                @error('etat_observation')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="yearSelect" class="form-label">Année d'acquisition</label>
                                <select class="form-control @error('annee_acquisition') is-invalid @enderror"
                                    id="yearSelect" name="annee_acquisition">
                                    <option value="" selected disabled>Sélectionner</option>
                                    @for ($year = date('Y'); $year >= 1900; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('annee_acquisition')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Mode d'acquisition</label>
                                <div class="input-group">
                                    <select name="mode_acquisition_id" wire:model="mode_acquisition_id"
                                        class="form-control @error('mode_acquition_id') is-invalid @enderror">
                                        <option value="">Sélectionner</option>
                                        @foreach ($modeAcquisitions as $modeAcquisition)
                                            <option value="{{ $modeAcquisition->id }}">
                                                {{ ucFirst($modeAcquisition->libelle) }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal" title="Ajout nouveau mode d'acquisition">
                                        <i class="bx bx-plus text-white fw-bold" style="color: white"></i>
                                    </button>
                                </div>
                                @error('mode_acquisition_id')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="operation_paysane_id"
                                value="{{ auth()->user()->operation_paysane_id }}">
                            <div class="col-12">
                                <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i>
                                    Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau mode d'acquisition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" class="row g-3" action="{{ route('mode-acquisition.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="libelle" class="form-label">Intitulé</label>
                            <input type="text" id="libelle"
                                class="form-control @error('libelle') is-invalid @enderror"
                                placeholder="Mode d'acquisition" name="libelle">
                            @error('libelle')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="auteur" class="form-label">Auteur</label>
                            <input type="text" id="auteur"
                                class="form-control @error('auteur') is-invalid @enderror" placeholder="Auteur"
                                name="auteur">
                            @error('auteur')
                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success"><i class="bx bx-save me-1"></i>
                            Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
@endsection
