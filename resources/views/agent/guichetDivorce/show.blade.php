@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Guichet Divorce (Demande N° {{ $guichetDivorce->code }})</h4>
        </div>
    </div>

    <div class="page-body">
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
        <div class="row">
            <!-- Data widget start -->
            <div class="col-md-12 col-xl-12">
                <div class="card project-task">
                    <div class="card-header">
                        <div class="card-header-left ">
                            <h5>Informations de la demande @if ($guichetDivorce->state == 'en_traitement')
                                    <span class="badge bg-warning text-white">En
                                        traitement</span>
                                @elseif($guichetDivorce->state == 'rejeté')
                                    <span class="badge bg-danger text-white">Rejetée</span>
                                @elseif ($guichetDivorce->state == 'terminé')
                                    <span class="badge bg-success text-white">Terminé</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="card-block p-b-10">
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Région
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->region->name }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Département
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->departement->name }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Mairie
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->mairie->name }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    N° de l'acte de divorce
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->numero_acte_divorce }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Année de divorce
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->annee_divorce }}</p>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Nature de la demande</label>
                                <ul class="list-group">
                                    @php
                                        $infosDemande = json_decode($guichetDivorce->infos_demande, true);
                                    @endphp
                                    @foreach ($infosDemande as $info)
                                        <li class="list-group-item"> &rarr; {{ $info }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Nombre de copies
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->nombre_copies }}</p>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Téléphone du demandeur
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->telephone }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Date de la demande
                                </label>
                                <p class="list-group-item">{{ $guichetDivorce->created_at }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Date de rejet/validation
                                </label>
                                <p class="list-group-item">
                                    {{ $guichetDivorce->date_validation_rejet ?? 'En traitement' }}</p>
                            </div>
                        </div>



                        <div class="col-md-4">
                            @if ($guichetDivorce->state == 'en_traitement')
                                <a href="{{ route('agent.divorce_valide', $guichetDivorce->id) }}"
                                    class="btn btn-primary">Valider</a>
                                <a href="#" id="rejeterBtn" class="btn btn-danger">Rejeter</a>
                            @endif
                        </div>

                        @error('motif')
                            <div class="text-danger mt-4">{{ $message }}</div>
                        @enderror
                        <div class="form-group row" id="commentForm" style="display: none">
                            <div class="col-12 col-sm-12">
                                <form id="rejeterForm"
                                    action="{{ route('agent.divorce_rejete', ['id' => $guichetDivorce->id]) }}"
                                    method="get">
                                    <label for="motif" class="col-form-label">
                                        Motif du rejet
                                    </label>
                                    <textarea name="motif" class="form-control"></textarea>
                                    <button type="submit" class="btn btn-primary mt-4">Valider le rejet</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        document.getElementById('rejeterBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le lien de suivre
            // Affiche le formulaire de commentaire
            document.getElementById('commentForm').style.display = 'block';

        });
    </script>
@endsection
