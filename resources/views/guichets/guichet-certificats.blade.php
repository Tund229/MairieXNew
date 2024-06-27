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

            <form class="" method="POST" action="{{ route('guichet-certificats.store') }}"
                enctype="multipart/form-data">
                @csrf
            

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

                <div style=" color:red; "> <u>NB</u><br> 150F CFA (FRAIS DE SERVICE)+ (NOMBRE EXEMPLAIRE X PRIX DU TIMBRE )
                    <br><br> </div>


                <div class="col-md-4 float-right">
                    <button type="submit" class="btn btn-primary ">Envoyer</button>
                    <a href="{{ route('welcome') }}" class="btn btn-secondary " style="margin-right: 10px;">Annuler</a>

                </div>
            </form>
        </div>
    </section>




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
