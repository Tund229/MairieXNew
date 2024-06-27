@extends('layouts.dash')


@section('content')
    <div class="page-header-title">
        <div class="row mx-auto">
            <div class="col-12">
                <h4>Gestion des agents</h4>
            </div>
        </div>

    </div>
    <div class="page-header-title">
        <div class="row mt-2">
            <div class="col-12 text-end">
                <a href="{{ route('admin.agents.create') }}" class="btn btn-primary">Ajouter un agent</a>
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Téléphone</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Editer</th>
                                <th class="text-center">admin</th>
                                <th class="text-center">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr>
                                    <td class="text-center ">{{ $agent->name }}</td>
                                    <td class="text-center">{{ $agent->email }}</td>
                                    <td class="text-center">{{ $agent->phone }}</td>
                                    <td class="text-center">
                                        @if ($agent->role == 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @elseif($agent->role == 'agent')
                                            <span class="badge bg-warning">Agent</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.agents.show', $agent->id) }}"
                                            class="btn btn-secondary btn-icon">
                                            <i class="icofont icofont-pencil"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if ($agent->role == 'admin')
                                            <a href="{{ route('admin.administrator', $agent->id) }}"
                                                class="btn btn-danger btn-icon">
                                                <i class="icofont icofont-hand"></i>
                                            </a>
                                        @elseif($agent->role == 'agent')
                                            <a href="{{ route('admin.administrator', $agent->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <i class="icofont icofont-hand"></i>
                                            </a>
                                        @endif

                                    </td>


                                    <td class="text-center">
                                        <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-warning btn-icon"><i
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
