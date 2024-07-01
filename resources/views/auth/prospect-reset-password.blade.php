@extends('web-site.layout.public')

@section('title', 'Espace public')
@section('website-layout-content')
    <section class="section pb-0 hero-section mt-3" id="hero">
        <div class="bg-overlay bg-overlay-pattern"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Changer le mot de passe</h5>
                                <p class="text-muted">Votre nouveau mot de passe doit être différent de l'ancien.</p>
                            </div>

                            <div class="p-2">
                                <form action="{{ route('password.change') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="old_password" class="form-label">Ancien mot de passe <span
                                                style="color: red">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="old_password" value="{{ old('old_password') }}"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" placeholder="Entrer l'ancien mot de passe">
                                        </div>
                                        @error('old_password')
                                            <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Nouveau mot de passe <span
                                                style="color: red">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="new_password" value="{{ old('new_password') }}"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" placeholder="Entrer le nouveau mot de passe">
                                        </div>
                                        @error('new_password')
                                            <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label for="new_password_confirmation" class="form-label">Confirmer nouveau mot
                                                de passe <span style="color: red">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="new_password_confirmation"
                                                    value="{{ old('new_password_confirmation') }}"
                                                    class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                    id="new_password_confirmation" placeholder="Confirmer le mot de passe">
                                            </div>
                                        </div>
                                        @error('new_password_confirmation')
                                            <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Changer le mot de
                                            passe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
