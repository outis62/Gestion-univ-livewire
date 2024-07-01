@extends('front-office.layout.customer')
@section('title', 'Espace utilisateur')
@section('component')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                        <li class="breadcrumb-item active">dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('front-layout-content')
    <span>
        Tableau de bord utilisateur connecté
    </span>
@endsection
