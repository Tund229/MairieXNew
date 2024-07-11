@extends('layouts.dash')


@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Guichet Mariage (Demande N° {{ $guichetMariage->code }})</h4>
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
                            <h5>Informations de la demande @if ($guichetMariage->state == 'en_traitement')
                                    <span class="badge bg-warning text-white">En
                                        traitement</span>
                                @elseif($guichetMariage->state == 'rejeté')
                                    <span class="badge bg-danger text-white">Rejetée</span>
                                @elseif ($guichetMariage->state == 'terminé')
                                    <span class="badge bg-success text-white">Terminé</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="card-block p-b-10">
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Nom époux
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->nom_epoux }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Prénoms époux
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->prenom_epoux }}</p>
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Nom épouse
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->nom_epouse }}</p>
                            </div>


                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Prénoms épouse
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->prenom_epouse }}</p>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Numéro du registre
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->numero_registre_bulletin }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Année du registre
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->annee_registre }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Nombre de copies
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->nombre_copies }}</p>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Téléphone du demandeur
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->telephone }}</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Nature de la demande</label>
                                <ul class="list-group">
                                    @php
                                        $infosDemande = json_decode($guichetMariage->infos_demande, true);
                                    @endphp
                                    @foreach ($infosDemande as $info)
                                        <li class="list-group-item"> &rarr; {{ $info }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">
                                    Date de la demande
                                </label>
                                <p class="list-group-item">{{ $guichetMariage->created_at }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">
                                    Date de rejet/validation
                                </label>
                                <p class="list-group-item">
                                    {{ $guichetMariage->date_validation_rejet ?? 'En traitement' }}</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @if ($guichetMariage->state == 'en_traitement')
                            <a href="#" id="validerBtn" class="btn btn-primary">Valider</a>
                            <a href="#" id="rejeterBtn" class="btn btn-danger">Rejeter</a>
                            @endif
                        </div>



                        @error('motif')
                            <div class="text-danger mt-4">{{ $message }}</div>
                        @enderror
                        @error('fichiers')
                            <div class="text-danger mt-4">{{ $message }}</div>
                        @enderror
                        <div class="form-group row mt-4" id="uploadFilesForm" style="display: none;">
                            <div class="col-12">
                                <form action="{{ route('agent.mariage_valide', $guichetMariage->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="fichiers" class="block text-sm font-medium text-gray-700 mb-2">Possibilité
                                        d'importer plusieurs fichiers traités ici (Appuyez sur Ctrl pour sélectionner
                                        plusieurs fichiers)</label>
                                    <input type="file" name="fichiers[]" id="fichiers" multiple class="form-control">
                                    <button type="submit" class="btn btn-primary mt-4">Envoyer</button>
                                </form>

                            </div>
                        </div>



                        <div id="commentForm" style="display: none;">
                            <form action="{{ route('agent.mariage_rejete', $guichetMariage->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="motif">Motif du rejet :</label>
                                    <textarea class="form-control" id="motif" name="motif" rows="3" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                        <div class="form-group row mt-4" id="selectedFilesList" style="display: none;">
                            <div class="col-12">
                                <h5>Fichiers sélectionnés :</h5>
                                <ul id="filesList" class="list-group">
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Fichiers</h5>
                    </div>
                    <div class="card-body">
                        @if (pathinfo($guichetMariage->fichier, PATHINFO_EXTENSION) === 'pdf')
                            <div class="d-flex flex-column align-items-center">
                                <svg class="mb-3" width="100" height="100" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z"
                                        stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14 2V8H20" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M16 13H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M16 17H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M10 9H9H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <a href="{{ route('telecharger_fichier', ['nom_fichier' => $guichetMariage->fichier]) }}"
                                    class="btn btn-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="me-2">
                                        <path
                                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Télécharger le PDF
                                </a>
                            </div>
                        @else
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ route('afficher_fichier', ['nom_fichier' => $guichetMariage->fichier]) }}"
                                    alt="Image" class="img-fluid mb-3"
                                    style="max-height: 300px; object-fit: contain;">
                                <a href="{{ route('telecharger_fichier', ['nom_fichier' => $guichetMariage->fichier]) }}"
                                    class="btn btn-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="me-2">
                                        <path
                                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Télécharger
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Data widget End -->

        </div>
    </div>


    @if (count($fichiers) > 0)
        <h3 class="mb-3">Fichiers joints :</h3>
        <ul class="list-group">
            @foreach ($fichiers as $fichier)
                @php
                    $extension = pathinfo($fichier, PATHINFO_EXTENSION);
                    $nom = basename($fichier);
                @endphp
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ route('afficher_fichier', ['nom_fichier' => $fichier]) }}"
                                alt="{{ $nom }}" class="mr-3" style="max-width: 50px; max-height: 50px;">
                        @elseif($extension == 'pdf')
                            <svg class="mr-3" width="50" height="50" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z"
                                    stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14 2V8H20" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 13H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 17H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10 9H9H8" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        @else
                            <svg class="mr-3" width="50" height="50" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14 2V8H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 13H8" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16 17H8" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10 9H9H8" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        @endif
                        <span class="mr-3">{{ $nom }}</span>
                        <a href="{{ route('telecharger_fichier', ['nom_fichier' => $fichier]) }}"
                            class="btn btn-primary btn-sm" title="Télécharger {{ $nom }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="alert alert-info">Aucun fichier joint.</p>
    @endif

    <style>
        .fichiers-list {
            list-style-type: none;
            padding: 0;
        }

        .fichier-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .fichier-preview {
            max-width: 10px;
            max-height: 10px;
            margin-right: 10px;
        }

        .fichier-icon {
            margin-right: 10px;
        }
    </style>

    <script>
        document.getElementById('rejeterBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le lien de suivre

            var commentForm = document.getElementById('commentForm');
            commentForm.style.display = (commentForm.style.display === 'none') ? 'block' : 'none';
            document.getElementById('uploadFilesForm').style.display = 'none';
        });

        document.getElementById('validerBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le lien de suivre
            toggleUploadFilesForm();

            // Ferme le champ de motif s'il est ouvert
            document.getElementById('commentForm').style.display = 'none';
        });

        function toggleUploadFilesForm() {
            var uploadForm = document.getElementById('uploadFilesForm');
            if (uploadForm.style.display === 'none') {
                uploadForm.style.display = 'block';
            } else {
                uploadForm.style.display = 'none';
            }
        }

        document.getElementById('fichiers').addEventListener('change', function() {
            var files = Array.from(this.files);
            var filesList = document.getElementById('filesList');
            filesList.innerHTML = '';

            files.forEach(function(file) {
                var li = document.createElement('li');
                li.textContent = file.name;
                li.className = 'list-group-item d-flex justify-content-between align-items-center';

                var span = document.createElement('span');
                span.className = 'badge bg-danger rounded-pill remove-file-btn';
                span.textContent = 'x';
                span.style.cursor = 'pointer';
                span.addEventListener('click', function() {
                    removeFile(file);
                });

                li.appendChild(span);
                filesList.appendChild(li);
            });

            // Affiche la liste des fichiers sélectionnés
            document.getElementById('selectedFilesList').style.display = 'block';
        });

        function removeFile(file) {
            var files = Array.from(document.getElementById('fichiers').files);
            var updatedFiles = files.filter(function(f) {
                return f !== file;
            });

            // Mise à jour des fichiers sélectionnés
            document.getElementById('fichiers').files = updatedFiles;

            // Met à jour l'affichage de la liste
            var filesList = document.getElementById('filesList');
            filesList.innerHTML = '';
            updatedFiles.forEach(function(f) {
                var li = document.createElement('li');
                li.textContent = f.name;
                li.className = 'list-group-item d-flex justify-content-between align-items-center';

                var span = document.createElement('span');
                span.className = 'badge bg-danger rounded-pill remove-file-btn';
                span.textContent = 'x';
                span.style.cursor = 'pointer';
                span.addEventListener('click', function() {
                    removeFile(f);
                });

                li.appendChild(span);
                filesList.appendChild(li);
            });

            // Si tous les fichiers sont supprimés, cache la liste
            if (updatedFiles.length === 0) {
                document.getElementById('selectedFilesList').style.display = 'none';
            }
        }
    </script>
@endsection
