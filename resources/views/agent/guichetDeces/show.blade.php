@extends('layouts.dash')

@section('content')
    <div class="page-header-title  mb-4">
        <div class="d-inline mx-auto">
            <h4>Guichet Décès (Demande N° {{ $guichetDeces->code }})</h4>
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
                            <h5>Informations de la demande
                                @if ($guichetDeces->state == 'en_traitement')
                                    <span class="badge bg-warning text-white">En traitement</span>
                                @elseif($guichetDeces->state == 'rejeté')
                                    <span class="badge bg-danger text-white">Rejetée</span>
                                @elseif ($guichetDeces->state == 'terminé')
                                    <span class="badge bg-success text-white">Terminé</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="card-block p-b-10">
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Nom défunt</label>
                                <p class="list-group-item">{{ $guichetDeces->nom_defunt }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">Prénoms défunt</label>
                                <p class="list-group-item">{{ $guichetDeces->prenom_defunt }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Numéro acte de décès</label>
                                <p class="list-group-item">{{ $guichetDeces->numero_acte_deces }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">Année de décès</label>
                                <p class="list-group-item">{{ $guichetDeces->annee_deces }}</p>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">Téléphone du demandeur</label>
                                <p class="list-group-item">{{ $guichetDeces->telephone }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Nombre de copies</label>
                                <p class="list-group-item">{{ $guichetDeces->nombre_copies }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Nature de la demande</label>
                                <ul class="list-group">
                                    @php
                                        $infosDemande = json_decode($guichetDeces->infos_demande, true);
                                    @endphp
                                    @foreach ($infosDemande as $info)
                                        <li class="list-group-item"> &rarr; {{ $info }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="region" class="col-form-label">Date de la demande</label>
                                <p class="list-group-item">{{ $guichetDeces->created_at }}</p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="departement" class="col-form-label">Date de rejet/validation</label>
                                <p class="list-group-item">
                                    {{ $guichetDeces->date_validation_rejet ?? 'En traitement' }}</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @if ($guichetDeces->state == 'en_traitement')
                                <a href="#" id="validerBtn" class="btn btn-primary">Valider</a>
                                <a href="#" id="rejeterBtn" class="btn btn-danger">Rejeter</a>
                            @endif
                        </div>

                        @error('motif')
                            <div class="text-danger mt-4">{{ $message }}</div>
                        @enderror
                        <div class="form-group row mt-4" id="uploadFilesForm" style="display: none;">
                            <div class="col-12">
                                <form action="{{ route('agent.deces_valide', $guichetDeces->id) }}" method="post"
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

                        <div class="form-group row mt-4" id="selectedFilesList" style="display: none;">
                            <div class="col-12">
                                <h5>Fichiers sélectionnés :</h5>
                                <ul id="filesList" class="list-group">
                                </ul>
                            </div>
                        </div>

                        <div id="commentForm" style="display: none;">
                            <form action="{{ route('agent.deces_rejete', $guichetDeces->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="motif">Motif du rejet :</label>
                                    <textarea class="form-control" id="motif" name="motif" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <div class="card add-task-card">
                    <div class="card-header">
                        <div class="card-header-left">
                            <h5>Fichiers</h5>
                        </div>
                        <div class="card-block p-b-10">
                            @if (pathinfo($guichetDeces->fichier, PATHINFO_EXTENSION) === 'pdf')
                                <a href="{{ route('telecharger_fichier', ['nom_fichier' => $guichetDeces->fichier]) }}"
                                    class="btn btn-primary">Télécharger le pdf</a>
                            @else
                                <img src="{{ route('afficher_fichier', ['nom_fichier' => $guichetDeces->fichier]) }}"
                                    alt="Image" style="max-width: 100%; max-height: 500px;">
                                <a href="{{ route('telecharger_fichier', ['nom_fichier' => $guichetDeces->fichier]) }}"
                                    class="btn btn-primary">Télécharger</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('rejeterBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le lien de suivre

            var commentForm = document.getElementById('commentForm');
            commentForm.style.display = (commentForm.style.display === 'none') ? 'block' : 'none';

            // Ferme le champ des fichiers s'il est ouvert
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
