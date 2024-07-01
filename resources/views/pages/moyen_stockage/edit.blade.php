@extends('front-office.layout.customer')
@section('title', 'Gestion des moyens de stockage')
@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('component')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Accueil</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('moyen-stockage.index') }}">Moyen de stockage</a>
                        </li>
                        <li class="breadcrumb-item active">Editer</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('front-layout-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Mise a jour moyen stockage</h4>

                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3" action="{{ route('moyen-stockage.update', $moyenStockage->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Intitule</label>
                                <input type="text" class="form-control" id="validationDefault01" name="libelle"
                                    value="{{ $moyenStockage->libelle }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Capacite</label>
                                <input type="text" class="form-control" id="validationDefault02" name="capacite"
                                    value="{{ $moyenStockage->capacite }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Etat d'observation</label>
                                <select class="form-select" id="validationDefault01" name="etat_observation" required>
                                    <option value="En construction"
                                        {{ $moyenStockage->etat_observation == 'En construction' ? 'selected' : '' }}>En
                                        construction</option>
                                    <option value="Mauvaise état"
                                        {{ $moyenStockage->etat_observation == 'Mauvaise état' ? 'selected' : '' }}>Mauvaise
                                        état</option>
                                    <option value="Bon Etat"
                                        {{ $moyenStockage->etat_observation == 'Bon Etat' ? 'selected' : '' }}>Bon Etat
                                    </option>
                                    <option value="Acceptable"
                                        {{ $moyenStockage->etat_observation == 'Acceptable' ? 'selected' : '' }}>Acceptable
                                    </option>
                                    <option value="Fonctionnel"
                                        {{ $moyenStockage->etat_observation == 'Fonctionnel' ? 'selected' : '' }}>
                                        Fonctionnel</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Annee acquisition</label>
                                <input type="text" class="form-control" id="validationDefault02" name="annee_acquisition"
                                    value="{{ $moyenStockage->annee_acquisition }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Mode d'acquisition</label>
                                <select name="mode_acquisition_id" wire:model="mode_acquisition_id" class="form-control">
                                    @foreach ($modeAcquisitions as $modeAcquisition)
                                        <option value="{{ $modeAcquisition->id }}"
                                            {{ $moyenStockage->modeAcquisition && $moyenStockage->modeAcquisition->id == $modeAcquisition->id ? 'selected' : '' }}>
                                            {{ ucFirst($modeAcquisition->libelle) }} </option>
                                    @endforeach
                                </select>
                                @error('mode_acquisition_id')
                                    <div style="margin-top: 10px;" class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Modifier</button>
                            </div>
                        </form>
                    </div>




                </div>

            </div>
        </div>
    </div> <!-- end col -->
    </div>
    <!-- end row -->

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
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
