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
                <h4 class="mb-sm-0"><a href="{{ route('customersDashboard') }}" class="text-black">Accueil</a></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('moyen-stockage.index') }}">Moyen de stockage</a>
                        </li>
                        <li class="breadcrumb-item active text-primary">Liste</li>
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
                <div class="card-header">
                    <h4 class="card-title mb-0">Gestion des moyens de stockage</h4>
                </div>
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('moyen-stockage.create') }}" type="button"
                                        class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                        Nouveau</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            @if (count($moyenStockages) > 0)
                                <table class="table table-striped table-bordered text-nowrap w-100 table-sm"
                                    id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="customer_name">Intitule</th>
                                            <th class="sort" data-sort="capacite">Capacité</th>
                                            <th class="sort" data-sort="etat">Etat</th>
                                            <th class="sort" data-sort="annee">Année d'acquisition</th>
                                            <th class="sort" data-sort="mode">Mode d'acquisition</th>
                                            <th class="sort" data-sort="action">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($moyenStockages as $moyenStockage)
                                            <tr>
                                                <td class="customer_name">{{ $moyenStockage->libelle }}</td>
                                                <td class="capacite">{{ $moyenStockage->capacite }}</td>
                                                <td class="etat">{{ $moyenStockage->etat_observation }}</td>
                                                <td class="annee">{{ $moyenStockage->annee_acquisition }}</td>
                                                <td class="mode">
                                                    {{ $moyenStockage->modeAcquisitions ? $moyenStockage->modeAcquisitions->libelle : 'Pas de mode d\'acquisition' }}
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('moyen-stockage.edit', $moyenStockage->id) }}"
                                                                class="dropdown-item edit-item-btn"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"
                                                                    title="Modifier"></i>
                                                            </a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href="#" class="dropdown-item remove-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteRecordModal{{ $moyenStockage->id }}"
                                                                style="color: red" title="Supprimer">
                                                                <i class="ri-delete-bin-fill align-bottom me-2"
                                                                    style="color: red"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('modals.moyen-stockage.delete_modal')
                                            {{-- @include('modals.unite-mesure.update_modal') --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div style="text-align: center;" class="" role="alert">
                                    Aucun moyen de stockage.
                                </div>
                            @endif
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@section('script')
@endsection
@endsection
