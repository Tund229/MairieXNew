@extends('layouts.app')

@section('content')
    <section class="">

        <div class="container px-5 mt-4">
            <h2 class="text-center text-primary font-alt" style="margin-bottom: 50px;">Guichets Décès</h2>

            @if (session('status'))
                <div class="alert alert-success text-center d-flex justify-content-between align-items-center"
                    id="statusAlert">
                    {{ session('status') }}
                    <button id="copyButton" class="btn btn-primary">
                        <i class="bi bi-clipboard"></i> Copier le code
                    </button>
                </div>
            @endif
            <form class="" method="POST" action="{{ route('guichet-deces.store') }}" enctype="multipart/form-data">
                @csrf
                

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="prenom_defunt">Prénom du défunt</label>
                        <input type="text" name="prenom_defunt" id="prenom_defunt" class="form-control">
                        @error('prenom_defunt')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nom_defunt">Nom du défunt</label>
                        <input type="text" name="nom_defunt" id="nom_defunt" class="form-control">
                        @error('nom_defunt')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4 mx-auto">
                    <h6 class="text-center text-primary">Informations sur la demande</h6>
                    <div class="form-group col-md-6">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="infos_demande[]"
                                value="extrait de décès"> extrait de décès
                        </label>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="infos_demande[]"
                                value="Certificat de décès"> Certificat de décès
                        </label>
                    </div>

                    @error('infos_demande')
                        <div class="text-danger text-center mt-4">{{ $message }}</div>
                    @enderror
                </div>





                <div class="row mb-4">
                    <h6 class="text-center text-primary">Informations sur le registre</h6>
                    <div class="form-group col-md-6">
                        <label for="numero_acte_deces">N° de l'acte de décès</label>
                        <input type="text" name="numero_acte_deces" id="numero_acte_deces" class="form-control">
                        @error('numero_acte_deces')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="annee_deces">Année de décès</label>
                        <input type="number" name="annee_deces" id="annee_deces" class="form-control">
                        @error('annee_deces')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <div class="row mb-4">

                    <div class="form-group col-md-6">
                        <label for="nombre_copies">Nombre de copie</label>
                        <input type="number" name="nombre_copies" id="nombre_copies" class="form-control">
                        @error('nombre_copies')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group col-md-6">
                        <label for="telephone_demandeur">Téléphone du demandeur</label>
                        <input type="tel" name="telephone_demandeur" id="telephone_demandeur" class="form-control"
                            value="{{ old('telephone_demandeur') }}">
                        @error('telephone_demandeur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-12">
                        <label for="fichier">Joindre le certificat de décès</label>
                        <input type="file" name="fichier" id="fichier" class="form-control">
                        @error('fichier')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4 float-right">
                    <button type="submit" class="btn btn-primary ">Envoyer</button>
                    <a href="{{ route('welcome') }}" class="btn btn-secondary " style="margin-right: 10px;">Annuler</a>

                </div>
            </form>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#region').on('change', function() {
                var regionId = $(this).val();
                if (regionId) {
                    $.get('/departements/' + regionId, function(data) {
                        $('#departement').empty().append($(
                            ' <option value="" disabled selected style="color: #17a589;">--Sélectionnez un département--</option>'
                            ));
                        $.each(data, function(departementId, departementNom) {
                            $('#departement').append($('<option value="' + departementId +
                                '">' +
                                departementNom + '</option>'));
                        });
                    });
                } else {
                    $('#departement').empty().append($(
                        '<option value="">Sélectionnez un département</option>'));
                }
            });


            $('#departement').on('change', function() {
                var departementId = $(this).val();
                if (departementId) {
                    $.get('/mairies/' + departementId, function(data) {
                        $('#mairie').empty().append($(
                            ' <option value="" disabled selected style="color: #17a589;">--Sélectionnez une commune--</option>'
                            ));
                        $.each(data, function(mairieId, mairieNom) {
                            $('#mairie').append($('<option value="' + mairieId + '">' +
                                mairieNom + '</option>'));
                        });
                    });
                } else {
                    $('#mairie').empty().append($('<option value="">Sélectionnez une commune</option>'));
                }
            });
        });
    </script>

    <script>
        const copyButton = document.getElementById('copyButton');
        const statusAlert = document.getElementById('statusAlert');
        const message = {!! json_encode(session('status')) !!};
        const code = {!! json_encode(session('code')) !!}; // Accédez à la variable 'code' envoyée depuis le contrôleur.

        copyButton.addEventListener('click', () => {
            const textToCopy = code;
            const textArea = document.createElement('textarea');
            textArea.value = textToCopy;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            // Modifier le texte du bouton après la copie
            copyButton.innerHTML = '<i class="bi bi-clipboard-check"></i> Copié';
        });
    </script>
@endsection
