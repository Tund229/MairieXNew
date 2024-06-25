@extends('layouts.dash')


@section('content')
<div class="page-header-title  mb-4">
    <div class="d-inline mx-auto">
        <h4>Mettre à jour la mairie</h4>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-block">
                    <form method="POST" action="{{ route('admin.mairies.update', $mairie->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Département</label>
                            <div class="col-sm-10">
                                <select name="departement" id="departement" class="form-control">
                                    <option value="" disabled selected style="color: #17a589;">--Sélectionnez un département
                                         --
                                    </option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}" {{  $mairie->departement_id === $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                                @error('departement')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom de la mairie</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $mairie->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
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
