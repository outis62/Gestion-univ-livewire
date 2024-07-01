@extends('front-office.layout.customer')
@section('title', 'Espace utilisateur')
@section('component')
    <!-- start page title -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">
                            @if ($userid != null)
                                Formulaire de modification
                            @else
                                Formulaire de creation
                            @endif
                        </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Formulaire</a></li>
                                <li class="breadcrumb-item active">Formulaire</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
        @endsection
        @section('front-layout-content')


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">
                                {{ isset($userid) ? $utilisateur->nom : 'Formulaire de creation' }} </h4>
                        </div><!-- end card header -->
                        <div class="card-body form-steps">
                            @if ($userid != null)
                                <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                @else
                                    <form action="{{ route('utilisateurs.store') }}" method="POST">
                                        @csrf
                            @endif
                            <div class="text-center pt-3 pb-4 mb-1">
                                <h5>{{ isset($userid) ? 'Etapes de modification' : 'Etapes de creation' }}</h5>
                            </div>


                            <div class="tab-content">


                                <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel"
                                    aria-labelledby="pills-info-desc-tab">
                                    <div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="Nom">Nom</label>
                                                    <input type="text" class="form-control" id="Nom" name="nom"
                                                        value="{{ isset($utilisateur) ? $utilisateur->nom : '' }}"
                                                        placeholder="Nom d'utilisateur" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="Prenom">Prenom
                                                    </label>
                                                    <input type="text" class="form-control" id="Prenom" name="prenom"
                                                        value="{{ isset($utilisateur) ? $utilisateur->prenom : '' }}"
                                                        placeholder="Prenom d'utilisateur" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input type="text" class="form-control" id="Email" name="email"
                                                        value="{{ isset($utilisateur) ? $utilisateur->email : '' }}"
                                                        placeholder="Email d'utilisateur" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="role" value="agent-op">

                                        </div>

                                    </div>
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <div>
                                            <a href="{{ route('utilisateurs.index') }}" type="button"
                                                class="btn btn-primary"> <i
                                                    class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i><span>Annuler</span></a>

                                        </div>
                                        @if ($userid != null)
                                            <button type="submit"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="pills-success-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Modifier</button>
                                        @else
                                            <button type="submit"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="pills-success-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Enregistrer</button>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- end tab content -->
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->


                <!-- end col -->
            </div><!-- end row -->


            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>

@section('script')
    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>

@endsection
@endsection
