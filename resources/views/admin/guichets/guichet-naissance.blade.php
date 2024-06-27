@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Guichet naissance</h4>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">
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
                                        <th class="text-center">Prénom</th>
                                        <th class="text-center">Tel</th>
                                        <th class="text-center">Nature de la demande</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Agent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guichetNaissances as $guichetNaissance)
                                        <tr>
                                           
                                            <td class="text-center">{{ $guichetNaissance->nom }}</td>
                                            <td class="text-center">{{ $guichetNaissance->prenom }}</td>
                                            <td class="text-center">{{ $guichetNaissance->telephone }}</td>
                                            <td class="text-center">
                                                @php
                                                    $infosDemande = json_decode($guichetNaissance->infos_demande, true);
                                                @endphp

                                                <ul>
                                                    @foreach ($infosDemande as $info)
                                                        <li>{{ $info }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>

                                            <td class="text-center">{{ $guichetNaissance->code }}</td>
                                            <td class="text-center">
                                                @if ($guichetNaissance->state == 'en_traitement')
                                                    <span class="badge bg-warning text-dark">En
                                                        traitement</span>
                                                @elseif($guichetNaissance->state == 'rejeté')
                                                    <span class="badge bg-danger">Rejetée</span>
                                                @elseif ($guichetNaissance->state == 'terminé')
                                                    <span class="badge bg-success">Terminé</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $guichetNaissance->agent->name ?? '-' }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
