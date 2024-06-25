@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Mettre à jour les informations</h4>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="{{ route('admin.agents.update', $user->id) }}">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom et Prénoms</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        value="{{ $user->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rôle
                                </label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control" id="role">
                                        <option value="" disabled selected style="color: #17a589;">--Choisir un rôle
                                            --
                                        </option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="agent" {{ $user->role === 'agent' ? 'selected' : '' }}>Agent
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Région</label>
                                <div class="col-sm-10">
                                    <select name="region" id="region" class="form-control">
                                        <option value="" disabled style="color: #17a589;">--Sélectionnez une région --
                                        </option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Département</label>
                                <div class="col-sm-10">
                                    <select name="departement" id="departement" class="form-control">
                                        <option value="" disabled style="color: #17a589;">--Sélectionnez un
                                            département --</option>
                                        @foreach ($departements as $departement)
                                            <option value="{{ $departement->id }}">
                                                {{ $departement->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mairie</label>
                                <div class="col-sm-10">
                                    <select name="mairie" id="mairie" class="form-control">
                                        <option value="" disabled style="color: #17a589;">--Sélectionnez une mairie --
                                        </option>
                                        @foreach ($mairies as $mairie)
                                            <option value="{{ $mairie->id }}"
                                                {{  $user->mairie_id === $mairie->id ? 'selected' : '' }}>
                                                {{ $mairie->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('mairie')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-end m-4">
                                <button class="btn btn-primary" type="submit">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
