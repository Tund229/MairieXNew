@extends('layouts.dash')

@section('content')
    @if (session('error_message'))
        <div class="alert alert-danger text-center d-flex justify-content-between align-items-center">
            {{ session('error_message') }}
        </div>
    @endif

    @if (session('success_message'))
        <div class="alert alert-success text-center d-flex justify-content-between align-items-center">
            {{ session('success_message') }}
        </div>
    @endif


    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Profil de l'utilisateur</h4>
        </div>
    </div>


    <div class="page-body">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Attention !</strong> Ici vous avez la possiblité de changer votre mot de passe.
            <br>
            <br>

        </div>
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="{{ route('profile_update', $id) }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ancien mot de passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Ancien mot de passe"
                                        name="old_password">
                                    @error('old_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nouveau mot de passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Nouveau mot de passe"
                                        name="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Confirmer le mot de passe"
                                        name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end m-4">
                                <button class="btn btn-primary" type="submit">Mettre à jour le profil</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
