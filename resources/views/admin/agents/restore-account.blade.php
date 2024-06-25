@extends('layouts.dash')


@section('content')
<div class="page-header-title">
    <div class="row mx-auto">
        <div class="col-12">
            <h4>Demande de restauration de compte</h4>
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
                                <th class="text-center">Mairie</th>
                                <th class="text-center">Restaurer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restoreAgents as $restoreAgent)
                                <tr>
                                    <td class="text-center ">{{ $restoreAgent->name }}</td>
                                    <td class="text-center">{{ $restoreAgent->email }}</td>
                                    <td class="text-center">{{ $restoreAgent->phone }}</td>
                                    <td class="text-center">{{ $restoreAgent->mairies->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.restore_account_valide', $restoreAgent->id) }}"
                                            class="btn btn-primary">
                                            Restaurer
                                        </a>
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
