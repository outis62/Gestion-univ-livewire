@extends('front-office.layout.livewire')
@section('title', 'Gestion des Collectes')
<link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet"
    href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Import nouvelle collecte</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customersDashboard') }}"><i
                                    class="ri-home-line"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Collectes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('livewire-component')
    <div class="container-fluid">
        @livewire('collecte.import-excel', [
            'listRoute' => ['link' => 'collecte.index', 'name' => 'Toutes les collectes'],
            'addRoute' => ['link' => 'collecte.create', 'name' => 'Ajouter une collecte'],
        ])
    </div>
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>
@endsection
