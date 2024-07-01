<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- aos css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/aos/aos.css') }}" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <title>Email</title>
</head>

<body>
    <div>
        <div class="row">
            <div class="col-12">
                {{-- <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                    <h5 class="mb-0 pb-1 text-decoration-underline">Card Text Alignment</h5>
                </div> --}}
                <div class="row" style="display: flex;
                justify-content: center;
                margin: 50 20">
                   
                    <div class="col-xxl-4 col-lg-6">
                        <div class="card card-body text-center">
                            <div class="avatar-sm mx-auto mb-3">
                                <div class="avatar-title bg-soft-success text-success fs-17 rounded">
                                   <img src="{{asset('assets/images/companies/img-6')}}" alt="">
                                </div>
                            </div>
                            <h4 class="card-title">{{ $msg }}</h4>
                            <p class="card-text text-muted">{{ $messages }}.</p>
                            <a href="{{route('login')}}" class="btn btn-success">Se connecter</a>
                        </div>
                    </div><!-- end col -->
                   
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->

       
        {{-- <h1>{{ $msg }} </h1> --}}
        {{-- <p>Merci de nous regoindre, nous sommes ravis de vous avoir parmis nous!</p> --}}
        {{-- <p>{{ $messages }}</p> --}}
    </div>
  <!-- JAVASCRIPT -->
    <script src="{{ '/assets/libs/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- aos js -->
    <script src="{{ asset('assets/libs/aos/aos.js') }}"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <!-- animation init -->
    <script src="{{ asset('assets/js/pages/animation-aos.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
     <!-- Masonry plugin -->
     <script src="{{asset('assets/libs/masonry-layout/masonry.pkgd.min.js')}}"></script>

     <script src="{{asset('assets/js/pages/card.init.js')}}"></script>
</body>

</html>

{{-- <dl class="dl">
    <dt>Titre de l'activité :</dt>
    <dd> {activite.current?.titre} </dd>

    <dt>Type d'activité  :</dt>
    <dd > {activite.current.type.libelle} </dd>
    
       
            <dt>Thème  :</dt>
            <dd > {activite.current?.theme} </dd>
       
    
</dl> --}}

