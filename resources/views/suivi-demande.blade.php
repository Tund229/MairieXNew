@extends('layouts.app')


@section('content')
    @if (isset($guichetData))
        <style>
            body {
                letter-spacing: 0.7px;
                background-color: #eee;
            }

            .card-1 {
                box-shadow: 2px 2px 12px 0px #17a589;
            }

            p {
                font-size: 13px;
            }

            .small {
                font-size: 9px !important;
            }
        </style>

        <section class="container d-flex justify-content-center mt-4">
            <div>
                <div class="card shaodw-lg  card-1 bg-primary">
                    <div class="card-body  d-flex py-5">
                        <div class="row no-gutters  mx-auto justify-content-start flex-sm-row flex-column">
                            <div class="col-md-4  text-center"><img class="irc_mi img-fluid mr-0"
                                    src="https://cdn4.iconfinder.com/data/icons/logistics-delivery-2-5/64/137-512.png"
                                    width="150" height="150"></div>
                            <div class="col-md-6 ">
                                <div class="card border-0 ">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><b>Etat de la demande({{$guichetData->code}})</b></h5>
                                        <p class="card-text text-center">
                                            @if ($guichetData->state == 'en_traitement')
                                                <span class="badge bg-warning text-dark">En traitement</span>
                                                <p> Veuillez patienter, votre demande est en cours de traitement.
                                                </p>
                                            @elseif($guichetData->state == 'rejeté')
                                                <span class="badge bg-danger">Rejetée</span>
                                                <p> Votre demande a été rejetée. Veuillez vérifier les informations fournies
                                                    ou contactez un agent pour plus d'informations.
                                                </p>
                                                <h6 class="text-center">Motif du rejet :</h6>
                                                <p style="color: #ff7f7f;" class="text-center">
                                                    {{$guichetData->motif}}
                                                </p>


                                                <a type="button" class="btn btn-primary">Reprendre</a>
                                            @elseif ($guichetData->state == 'terminé')
                                                <span class="badge bg-success">Terminé</span>
                                                <p> Votre demande a été traitée avec succès. VEUILLEZ VENIR LE RECUPERE.
                                                </p>
                                            @endif

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <style>
            p {
                color: #fff;
                font-size;
                1.1em;
            }

            .alert-heading {
                color: #fff;
            }

            .bg-success {
                background-color: #f0715f !important;
            }



            .btn-white {
                color: #5e676f;
                background-color: #fff;
                border-color: transparent;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .05)
            }
        </style>
        <section>
            <div class="col-12 container mt-4">
                <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="alert bg-success py-4" role="alert">
                        <div class="">
                            <h5 class="alert-heading text-center">Echec de la vérification!</h5>
                            <p>Aucune demande ne semble avoir ce code. Veuillez corriger et réessayer.</p>
                            <p>Conseils :</p>
                            <ul>
                                <li>Vérifiez si vous avez choisi le bon guichet.</li>
                                <li>Revoyez votre code.</li>
                                <li>Contactez un agent si le problème persiste.</li>
                            </ul>
                            <a href="{{ route('welcome') }}" class="btn btn-primary mt-3" data-abc="true">Revérifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
