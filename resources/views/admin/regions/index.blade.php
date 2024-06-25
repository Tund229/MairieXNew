@extends('layouts.dash')


@section('content')
    <div class="page-header-title">
        <div class="row mx-auto">
            <div class="col-12">
                <h4>Gestion des régions</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.regions.create') }}" class="btn btn-primary">Ajouter une région</a>
            </div>
        </div>
    </div>


    <div class="page-body mt-4">
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
        <div class="card px-2">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr class="text-nowrap">
                                <th class="text-center">Nom de la région</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Editer</th>
                                {{-- <th class="text-center">Supprimer</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regions as $region)
                                <tr>
                                    <td class="text-center">{{ $region->name }}</td>
                                    <td class="text-center">
                                        @if ($region->state == 1)
                                            <span class="badge bg-success">Actif</span>
                                        @elseif($region->state == 0)
                                            <span class="badge bg-danger">Inactif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary btn-icon" href="{{ route('admin.regions.show', $region->id) }}"
                                            data-target="#exampleModal" data-id="{{ $region->id }}">
                                            <i class="icofont icofont-pencil"></i>
                                    </a>

                                    </td>
                                    {{-- <td class="text-center">
                                        <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-icon"><i
                                                    class="icofont icofont-trash"></i></button>
                                        </form>
                                    </td> --}}
                            
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Basic table card end -->

    </div>

@endsection
