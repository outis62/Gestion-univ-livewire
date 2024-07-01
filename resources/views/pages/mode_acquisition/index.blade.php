@extends('front-office.layout.customer')
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
                <h4 class="mb-sm-0"><a href="{{ route('dashboard') }}" class="text-black">Accueil</a></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('mode-acquisition.index') }}">Mode acquisition</a>
                        </li>
                        <li class="breadcrumb-item active text-primary">Liste</li>
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
                <div class="card-header">
                    <h4 class="card-title mb-0">Gestion des modes d'acquisition</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('mode-acquisition.create') }}" type="button"
                                        class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                        Nouveau</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            @if (count($modeAcquisitions) > 0)
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="customer_name">libelle</th>
                                            <th class="sort" data-sort="auteur">Auteur</th>
                                            <th class="sort" data-sort="phone">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($modeAcquisitions as $modeAcquisition)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="option1">
                                                    </div>
                                                </th>
                                                <td class="customer_name">{{ $modeAcquisition->libelle }}</td>
                                                <td class="auteur">{{ $modeAcquisition->auteur }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{ route('mode-acquisition.show', $modeAcquisition->id) }}"
                                                                    class="dropdown-item edit-item-btn"><i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Editer</a></li>
                                                            <li>
                                                                <a href="#" class="dropdown-item remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteRecordModal{{ $modeAcquisition->id }}"
                                                                    style="color: red">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2"
                                                                        style="color: red"></i>
                                                                    Supprimer
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('modals.mode-acquisition.delete_modal')
                                            {{-- @include('modals.unite-mesure.update_modal') --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div style="text-align: center;" class="" role="alert">
                                    Aucun mode d'acquisition.
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

    @include('modals.unite-mesure.add_unite_mesure_modal')




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
