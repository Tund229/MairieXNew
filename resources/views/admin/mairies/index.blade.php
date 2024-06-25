@extends('layouts.dash')


@section('content')
    <div class="page-header-title">
        <div class="row mx-auto">
            <div class="col-12">
                <h4>Gestion des mairies</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.mairies.create') }}" class="btn btn-primary">Ajouter une mairie</a>
            </div>
        </div>
    </div>


    <div class="page-body mt-4">
        <!-- Basic table card start -->
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
                                <th class="text-center">Nom</th>
                                <th class="text-center">Département</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Editer</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mairies as $mairie)
                                <tr>
                                    <td class="text-center">{{ $mairie->name }}</td>
                                    <td class="text-center">{{ optional($mairie->departements)->name }}</td>
                                    <td class="text-center">
                                        @if ($mairie->state == 1)
                                            <span class="badge bg-success">Actif</span>
                                        @elseif($mairie->state == 0)
                                            <span class="badge bg-danger">Inactif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary btn-icon" href="{{ route('admin.mairies.show', $mairie->id) }}"
                                            data-target="#exampleModal" data-id="{{ $mairie->id }}">
                                            <i class="icofont icofont-pencil"></i>
                                        </a>

                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.mairies.destroy', $mairie->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-icon"><i
                                                    class="icofont icofont-trash"></i></button>
                                        </form>
                                    </td>

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
