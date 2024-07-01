@extends('back-office.layout.admin')
@section('title', 'Gestion des unites de mesure')
@section('css')
@endsection
@section('component')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><a href="{{ route('admins.dashboard') }}" class="text-black">Accueil</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('unite-mesure.index') }}">Unité de mesure</a></li>
                        <li class="breadcrumb-item active text-primary">Liste</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Gestion des unités de mesure</h4>
                </div>
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#showModal"><i
                                            class="ri-add-line align-bottom me-1"></i> Nouvelle unitée</button>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                            @if (count($unites) > 0)
                                <table class="table align-middle table-nowrap" id="data-table1">
                                    <thead class="table-light">
                                        <tr>

                                            <th class="sort" data-sort="customer_name">Intitule</th>
                                            <th class="sort" data-sort="customer_name">Type</th>
                                            <th class="sort" data-sort="phone">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($unites as $unite)
                                            <tr>

                                                <td class="customer_name">{{ $unite->libelle ? $unite->libelle : '---' }}
                                                </td>
                                                <td class="customer_name">{{ $unite->type ? $unite->type : '---' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="#" class="dropdown-item edit-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#updateModal{{ $unite->id }}">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"
                                                                    title="Modifier"></i></a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href="#" class="dropdown-item remove-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteRecordModal{{ $unite->id }}"
                                                                style="color: red" title="Supprimer">
                                                                <i class="ri-delete-bin-fill align-bottom me-2"
                                                                    style="color: red"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('modals.unite-mesure.delete_modal')
                                            @include('modals.unite-mesure.update_modal')
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div style="text-align: center;" class="" role="alert">
                                    Aucune unitée de mesure.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.unite-mesure.add_unite_mesure_modal')
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>
@endsection
