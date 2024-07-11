@extends('layouts.app')

@section('content')

    <section class="container my-5">

        @if (isset($guichetData))
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">État de la demande ({{ $guichetData->code }})</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="https://cdn4.iconfinder.com/data/icons/logistics-delivery-2-5/64/137-512.png"
                                alt="Icône de livraison" class="img-fluid" style="max-width: 150px;">
                        </div>
                        <div class="col-md-8">
                            @if ($guichetData->state == 'en_traitement')
                                <div class="alert alert-warning" role="alert">
                                    <h6 class="alert-heading">En traitement</h6>
                                    <p class="mb-0">Veuillez patienter, votre demande est en cours de traitement.</p>
                                </div>
                            @elseif($guichetData->state == 'rejeté')
                                <div class="alert alert-danger" role="alert">
                                    <h6 class="alert-heading">Demande rejetée</h6>
                                    <p>Votre demande a été rejetée. Veuillez vérifier les informations fournies ou contactez
                                        un agent pour plus d'informations.</p>
                                    <hr>
                                    <h6>Motif du rejet :</h6>
                                    <p class="mb-0">{{ $guichetData->motif }}</p>
                                    <a href="{{route('welcome')}}" class="btn btn-primary mt-3">Reprendre</a>
                                </div>
                            @elseif ($guichetData->state == 'terminé')
                                <div class="alert alert-success" role="alert">
                                    <h6 class="alert-heading">Demande terminée</h6>
                                    @if ($guichetData->fichiers_joints)
                                        <p>Votre demande a été traitée avec succès. Vous pouvez télécharger les fichiers
                                            ci-dessous.</p>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            <small><strong>Attention :</strong> Ces fichiers contiennent des informations
                                                sensibles. Veuillez les manipuler avec précaution.</small>
                                        </div>
                                        <div class="mt-3">
                                            @foreach (json_decode($guichetData->fichiers_joints) as $fichier)
                                                <a href="{{ route('telecharger_fichier', ['nom_fichier' => $fichier]) }}"
                                                    class="btn btn-outline-primary btn-sm me-2 mb-2">
                                                    <i class="bi bi-download me-1"></i>Télécharger {{ basename($fichier) }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="mb-0">Votre demande a été traitée avec succès. VEUILLEZ VENIR LA
                                            RÉCUPÉRER.</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading">Échec de la vérification!</h5>
                <p>Aucune demande ne semble avoir ce code. Veuillez corriger et réessayer.</p>
                <hr>
                <p class="mb-0">Conseils :</p>
                <ul>
                    <li>Vérifiez si vous avez choisi le bon guichet.</li>
                    <li>Revoyez votre code.</li>
                    <li>Contactez un agent si le problème persiste.</li>
                </ul>
                <a href="{{ route('welcome') }}" class="btn btn-primary mt-3">Revérifier</a>
            </div>

        @endif

    </section>

@endsection
