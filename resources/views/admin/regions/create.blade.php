@extends('layouts.dash')


@section('content')
<div class="page-header-title  mb-4">
    <div class="d-inline mx-auto">
        <h4>Ajouter une nouvelle région</h4>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-block">
                    <form method="POST" action="{{route('admin.regions.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom de la région</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Nom de la région">
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
