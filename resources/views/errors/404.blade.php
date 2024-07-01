@extends('layouts.master2')
<!-- auth-page wrapper -->
<div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/error400-cover.png') }}" alt="error img" class="img-fluid">
                        <div class="mt-3">
                            <h3 class="text-uppercase">Oops!!!!</h3>
                            <p class="text-muted mb-4">Vous avez essayé d'accéder à une page qui n'est pas disponible.
                                retour à l'accueil</p>
                            {{-- <a href="{{ route('login') }}" class="btn btn-success"><i
                                    class="mdi mdi-home me-1"></i>RETOUR</a> --}}
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth-page content -->
</div>
<!-- end auth-page-wrapper -->
