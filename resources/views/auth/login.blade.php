@extends('layouts.master')
@section('title', 'Page d\'authentification')
<div class="auth-page-wrapper auth-bg-cove d-flex justify-content-center align-items-center min-vh-100"
    style="background-image: url('../assets/images/Agriculture_v2.jpg')">
    <div class="bg-overlay"></div>
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Bienvenue !</h5>
                                <p class="fw-bold text-black">Accéder à votre espace <br>
                                    en vous
                                    connectant
                                    ici</strong></p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Renseigner votre e-mail" name="email">
                                        @error('email')
                                            <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        {{-- <div class="float-end">
                                            <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                        </div> --}}
                                        <label class="form-label" for="password-input">Mot de passe</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password"
                                                class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                placeholder="Renseigner votre mot de passe" id="password-input"
                                                name="password" @old('password')>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Se souvenir de
                                            moi</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Se
                                            connecter</button>
                                    </div>
                                    @if (session()->has('error'))
                                        <div style="margin-top: 10px;" class="alert alert-danger" role="alert">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
