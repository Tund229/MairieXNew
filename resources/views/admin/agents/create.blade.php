@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Ajouter un nouvel utilisateur</h4>
        </div>
    </div>


    <div class="page-body">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Attention !</strong> Vous êtes sur le point d'ajouter un nouvel utilisateur. Assurez-vous
            d'utiliser une
            adresse e-mail valide.
            <br>
            L'utilisateur recevra ses informations de connexion par e-mail par défaut, qu'il pourra ensuite modifier
            à sa
            convenance.

        </div>
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="{{route('admin.agents.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom et Prénoms</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nom et prénom de l'utilisateur">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email de l'utilisateur"
                                        name="email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Téléphone de l'utilisateur"
                                        name="phone">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rôle
                                </label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control">
                                        <option value="" disabled selected style="color: #17a589;">--Choisir un rôle
                                             --
                                        </option>
                                        <option value="admin">Admin</option>
                                        <option value="agent">Agent</option>
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="form-group row justify-content-end m-4">

                                <button class="btn btn-primary" type="submit">Ajouter</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
