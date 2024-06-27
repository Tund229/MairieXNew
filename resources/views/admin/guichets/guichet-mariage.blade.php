@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Guichet Mariage</h4>
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
                                        <th class="text-center">Nom époux</th>
                                        <th class="text-center">Prénom époux</th>
                                        <th class="text-center">Nom épouse</th>
                                        <th class="text-center">Prénom épouse</th>
                                        <th class="text-center">Année registe</th>
                                        <th class="text-center">Numéro régistre</th>
                                        <th class="text-center">Tel</th>
                                        <th class="text-center">Nature de la demande</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Agent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guichetMariages as $guichetMariage)
                                        <tr>
                                            <td class="text-center">{{ $guichetMariage->nom_epoux }}</td>
                                            <td class="text-center">{{ $guichetMariage->prenom_epoux }}</td>
                                            <td class="text-center">{{ $guichetMariage->nom_epouse }}</td>
                                            <td class="text-center">{{ $guichetMariage->prenom_epouse }}</td>
                                            <td class="text-center">{{ $guichetMariage->annee_registre }}</td>
                                            <td class="text-center">{{ $guichetMariage->numero_registre_bulletin }}</td>
                                            <td class="text-center">{{ $guichetMariage->telephone }}</td>
                                            <td class="text-center">
                                                @php
                                                    $infosDemande = json_decode($guichetMariage->infos_demande, true);
                                                @endphp

                                                <ul>
                                                    @foreach ($infosDemande as $info)
                                                        <li>{{ $info }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>

                                            <td class="text-center">{{ $guichetMariage->code }}</td>
                                            <td class="text-center">
                                                @if ($guichetMariage->state == 'en_traitement')
                                                    <span class="badge bg-warning text-dark">En
                                                        traitement</span>
                                                @elseif($guichetMariage->state == 'rejeté')
                                                    <span class="badge bg-danger">Rejetée</span>
                                                @elseif ($guichetMariage->state == 'terminé')
                                                    <span class="badge bg-success">Terminé</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $guichetMariage->agent->name ?? '-' }}</td>

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
