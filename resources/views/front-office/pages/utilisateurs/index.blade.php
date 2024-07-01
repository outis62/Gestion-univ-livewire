@extends('front-office.layout.customer')
@section('title', 'Espace utilisateur')
@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <style>
        .dl dt {
    float: left;
    width: 45%;
    padding: 0!important;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
    /* font-size: 13px; */
  }
  .dl dd {
    margin-left: 50% !important;
    /* font-size: 13px; */
  }
  .dl dd {
    margin-left: 50% !important;
    /* font-size: 13px; */
  }
    </style>

@endsection

@section('component')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Liste des utilisateurs de l'op</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                <li class="breadcrumb-item active">utilisateurs</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        @endsection
        @section('front-layout-content')
      
          
           <div class="row">

            <div class="col-md-4">
                <div class="card">
                    {{-- <img class="card-img-top img-fluid" src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}"
                        alt="Card image cap"> --}}
                    {{-- <img class="card-img-top img-fluid" src="{{asset('storage/'.$categorie->image)}}" alt=""> --}}

                    <div class="card-body">
                        <dl class="dl">
                            
                            <dt>Nom:</dt>
                            <dl>{{$organisation->libelle}}</dl>
                            <dt>Niveau:</dt>
                            <dl>{{$organisation->niveau}}</dl>
                            <dt>Date de creation:</dt>
                            <dl>{{$organisation->date_creation}}</dl>
                            <dt>Siege:</dt>
                            <dl>{{$organisation->siege}}</dl>
                            <dt>Statu juridique:</dt>
                            <dl>{{$organisation->statut_juridique}}</dl>
                            <dt>Numero recipisse:</dt>
                            <dl>{{$organisation->numero_recipisse}}</dl>
                            
                        </dl>
                    </div>
                   
                </div><!-- end card -->
            </div><!-- end col -->


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between ">
                        <h5 class="card-title mb-0">Liste des utilisateurs de l'op</h5>
                        <div class="col-sm-auto">
                            <div>
                                <a type="button" href="{{ route('utilisateurs.create') }}"
                                    class="btn btn-success add-btn" id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Ajouter un utilisateur</a>

                            </div>
                            
                        </div>      
                    </div>
                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered table-striped"
                            style="width:100%">
                            <thead>
                                <tr>

                                    <th class="" data-sort="Nom">Nom</th>
                                    <th class="" data-sort="Ville">Prenom</th>
                                    <th class="" data-sort="Email">Email</th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                {{-- @dd($utilisateurs) --}}
                              @foreach ($utilisateurs as $utilisateur)
                              <tr onclick="window.location='{{route('utilisateurs.edit', $utilisateur->id)}}'" style="cursor: pointer;">
                                <td class="Nom">{{ $utilisateur->nom }}</td>
                                <td class="Prenom">{{ $utilisateur->prenom }}</td>
                                <td class="Email"> {{ $utilisateur->email }}</td>

                            </tr>

                              @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection
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

