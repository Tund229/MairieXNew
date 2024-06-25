@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Ajouter un nouveau département</h4>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="{{ route('admin.departements.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Région</label>
                                <div class="col-sm-10">
                                    <select name="region" id="region" class="form-control">
                                        <option value="" disabled selected style="color: #17a589;">--Sélectionnez une
                                            région --
                                        </option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nom du département</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nom du département">
                                    @error('name')
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
