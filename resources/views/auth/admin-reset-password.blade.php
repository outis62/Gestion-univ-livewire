@extends('back-office.layout.admin')
@section('title', 'Gestion administrateur mot de passe')
@section('css')
@endsection
@section('component')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-0">
                <h4 class="mb-sm-0">Mise a jour du mot de passe</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb ms-3">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mot de passe
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="tab-pane ms-2 me-3" id="changePassword" role="tabpanel">
                    <form action="{{ route('password.change') }}" method="POST">
                        @csrf
                        <div class="row g-3 mt-4">
                            <div class="col-lg-4">
                                <label for="old_password" class="form-label ms-2">Ancien mot de passe <span
                                        style="color: red">*</span></label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" name="old_password" value="{{ old('old_password') }}"
                                        class="form-control ms-2 @error('old_password') is-invalid @enderror"
                                        id="old_password" placeholder="Entrer l'ancien mot de passe">
                                </div>
                                @error('old_password')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="new_password" class="form-label">Nouveau mot de passe <span
                                        style="color: red">*</span></label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" name="new_password" value="{{ old('new_password') }}"
                                        class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                                        placeholder="Entrer le nouveau mot de passe">
                                </div>
                                @error('new_password')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="new_password_confirmation" class="form-label">Confirmer nouveau mot de
                                        passe <span style="color: red">*</span></label>
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
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mb-3 me-3">Changer le mot de
                                        passe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
