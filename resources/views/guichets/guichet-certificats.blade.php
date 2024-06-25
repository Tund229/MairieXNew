@extends('layouts.app')

@section('content')
    <section>
        <div class="container px-5 mt-4">
            <h2 class="text-center text-primary font-alt" style="margin-bottom: 50px;">Guichet Certificats</h2>
            @if (session('status'))
                <div class="alert alert-success text-center d-flex justify-content-between align-items-center"
                    id="statusAlert">
                    {{ session('status') }}
                    <button id="copyButton" class="btn btn-primary">
                        <i class="bi bi-clipboard"></i> Copier le code
                    </button>
                </div>
            @endif

            <form class="" method="POST" action="{{ route('guichet-certificats.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <label for="region">Région</label>
                        <select name="region" id="region" class="form-control">
                            <option value="" disabled selected style="color: #17a589;">--Sélectionnez une région --
                            </option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        @error('region')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="region">Département</label>
                        <select name="departement" id="departement" class="form-control">
                            <option value="" disabled selected style="color: #17a589;">--Sélectionnez un département
                                --
                            </option>

                        </select>
                        @error('departement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="mairie">Commune</label>
                        <select name="mairie" id="mairie" class="form-control">
                            <option value="" disabled selected style="color: #17a589;">--Sélectionnez une commune--
                            </option>
                        </select>
                        @error('mairie')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control"
                            value="{{ old('prenom') }}">
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            value="{{ old('nom') }}">
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="form-group col-md-6">
                        <label for="lieu_naissance">Lieu de naissance</label>
                        <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control"
                            value="{{ old('lieu_naissance') }}">
                        @error('lieu_naissance')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="telephone">Téléphone du demandeur</label>
                        <input type="tel" name="telephone" id="telephone" class="form-control"
                            value="{{ old('telephone') }}">
                        @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="row mb-4">
                    <h6 class="text-center text-primary">Informations sur la demande</h6>
                    <div class="form-group col-md-6">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="infos_demande[]"
                                value="Certificat de résidence"> Certificat de résidence
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="infos_demande[]"
                                value="Certificat de domicile"> Certificat de domicile
                        </label>
                    </div>
                    @error('infos_demande')
                        <div class="text-danger text-center mt-4">{{ $message }}</div>
                    @enderror
                </div>


               

                <div class="row mb-4">

                    <div class="form-group col-md-6">
                        <label for="nombre_copies">Nombre de copies</label>
                        <input type="number" name="nombre_copies" id="nombre_copies" class="form-control"
                            value="{{ old('nombre_copies') }}">
                        @error('nombre_copies')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="fichier">Joindre le certificat résidence</label>
                        <input type="file" name="fichier" id="fichier" class="form-control"
                            value="{{ old('fichier') }}">
                        @error('fichier')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                 <div style=" color:red; "> <u>NB</u><br> 150F CFA (FRAIS DE SERVICE)+ (NOMBRE EXEMPLAIRE X PRIX DU TIMBRE ) <br><br> </div>


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
