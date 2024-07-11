@extends('layouts.app')

@section('content')
    <section class="cta">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center cta-content">
                    <h1 id="typing-title" class="text-primary mb-4">SAMA ETAT CIVIL</h1>
                    <h3 id="typing-text" class="text-white mb-4"></h3>
                    <div class="d-flex flex-column flex-md-row justify-content-center">
                        <a class="btn btn-secondary py-2 px-4 rounded-pill mx-2 mb-2 mb-md-0" href="#services">Commencer</a>
                        <button class="btn btn-primary py-2 px-4 rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@fat">
                            Suivre sa demande
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="py-3 py-md-5 py-xl-8" id="about">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">
                        A propos</h2>
                    <p class="text-secondary mb-5 text-center lead fs-4">Notre plateforme facilite vos demandes d'actes
                        d'état civil de manière efficace et sécurisée.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-4 gy-lg-0 align-items-lg-center mb-4">
                <div class="col-12 col-lg-6">
                    <img class="img-fluid rounded" loading="lazy"
                        src="https://emova-monceaufleurs-fr-storage.omn.proximis.com/Imagestorage/images/2560/1600/5f4754e392f8f_P1190087_copie.jpg"
                        alt="About Us" style="max-width: 70%; height: 80%;">
                </div>
                <div class="col-12 col-lg-6 col-xxl-6">
                    <div class="row justify-content-lg-end">
                        <div class="col-12 col-lg-11">
                            <div class="about-wrapper">
                                <p class="lead mb-4 mb-md-5">Sama Etat Civil est dédié à simplifier vos démarches
                                    administratives, offrant un accès facile et sécurisé aux services d'état civil. Nous
                                    nous engageons à améliorer votre expérience et à répondre efficacement à vos besoins
                                    administratifs.</p>
                                <div class="row gy-4 mb-4 mb-md-5">
                                    <div class="col-12 col-md-6">
                                        <div class="card border border-dark">
                                            <div class="card-body p-4">
                                                <h3 class="display-5 fw-bold text-primary text-center mb-2">300+</h3>
                                                <p class="fw-bold text-center m-0">Clients Satisfaits</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card border border-dark">
                                            <div class="card-body p-4">
                                                <h3 class="display-5 fw-bold text-primary text-center mb-2">10+</h3>
                                                <p class="fw-bold text-center m-0">Agents actifs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gy-lg-0 align-items-lg-center mt-4">
                <div class="col-12 col-lg-6 order-lg-1">
                    <div class="row justify-content-lg-end">
                        <div class="col-12 col-lg-11">
                            <div class="about-wrapper">
                                <p class="lead mb-4 mb-md-5">Sama Etat Civil est votre guichet unique pour toutes vos
                                    démarches administratives liées à l'état civil au Sénégal. Nous facilitons l'accès à vos
                                    documents officiels avec une plateforme sécurisée et accessible à tout moment.</p>
                                <div class="row gy-4 mb-4 mb-md-5">
                                    <div class="col-12 col-md-6">
                                        <div class="card border border-dark">
                                            <div class="card-body p-4">
                                                <h3 class="display-5 fw-bold text-primary text-center mb-2">370+</h3>
                                                <p class="fw-bold text-center m-0">Demandes traitées</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card border border-dark">
                                            <div class="card-body p-4">
                                                <h3 class="display-5 fw-bold text-primary text-center mb-2">24/7</h3>
                                                <p class="fw-bold text-center m-0">Services Accessibles</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-lg-2">
                    <div class="row justify-content-lg-end">

                        <img class="img-fluid rounded" loading="lazy"
                            src="https://emova-monceaufleurs-fr-storage.omn.proximis.com/Imagestorage/images/2560/1600/5f4754e392f8f_P1190087_copie.jpg"
                            alt="About Us" style="max-width: 70%; height: 80%;">
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Services Section -->
    <section class="bg-light py-3 py-md-5 py-xl-8" id="services">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">
                        Services</h2>
                    <p class="text-secondary mb-5 text-center lead fs-4">Nous facilitons l'accès à vos
                        documents officiels avec une plateforme sécurisée et accessible à tout moment.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>


        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center mb-5"> <!-- Ajout de mb-5 ici -->
                <!-- Première colonne avec 3 cartes -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body text-center p-4 p-xxl-5">
                            <img src="{{ asset('assets/baby-svgrepo-com.svg') }}" alt="Guichet naissance"
                                class="lucide lucide-baby text-primary mb-4" width="50%">
                            <h4 class="mb-4">Guichet naissance</h4>
                            <p class="mb-4 text-secondary">
                                Obtenez vos documents officiels comme la copie littérale d'acte de naissance et plus encore
                                avec notre service dédié.
                            </p>
                            <a href="{{ route('guichet-naissance.index') }}"
                                class="fw-bold text-decoration-none link-primary">
                                Obtenir
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>

                    </div>



                </div>
                <!-- Deuxième colonne avec 3 cartes -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body text-center p-4 p-xxl-5">
                            <img src="{{ asset('assets/bride-and-groom-svgrepo-com.svg') }}" alt="Guichet naissance"
                                class="lucide lucide-baby text-primary mb-4" width="50%">
                            <h4 class="mb-4">Guichet mariage</h4>
                            <p class="mb-4 text-secondary">
                                Obtenez une copie littérale d'acte de mariage et un certificat de mariage avec notre service
                                dédié.
                            </p>
                            <a href="{{ route('guichet-mariage.index') }}"
                                class="fw-bold text-decoration-none link-primary">
                                Obtenir
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Troisième colonne avec 3 cartes -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body text-center p-4 p-xxl-5">
                            <img src="{{ asset('assets/death-alt2-svgrepo-com.svg') }}" alt="Guichet naissance"
                                class="lucide lucide-baby text-primary mb-4" width="50%">

                            <h4 class="mb-4">Guichet Décès</h4>
                            <p class="mb-4 text-secondary">Obtenez un extrait de décès et un certificat de décès facilement
                                et rapidement avec notre service.
                            </p>
                            <a href="{{ route('guichet-deces.index') }}"
                                class="fw-bold text-decoration-none link-primary">
                                Obtenir
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Deuxième rangée de cartes avec 2 colonnes -->
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
                <!-- Quatrième colonne avec 2 cartes -->
                <div class="col-12 col-md-6">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body text-center p-4 p-xxl-5">
                            <img src="{{ asset('assets/certificate-svgrepo-com.svg') }}" alt="Guichet naissance"
                                class="lucide lucide-baby text-primary mb-4" width="20%">

                            <h4 class="mb-4">Guichet Certificats</h4>
                            <p class="mb-4 text-secondary"> Obtenez un certificat de résidence et un certificat de domicile
                                rapidement et facilement.
                            </p>
                            <a href="{{ route('guichet-certificats.index') }}"
                                class="fw-bold text-decoration-none link-primary">
                                Obtenir
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Cinquième colonne avec 2 cartes -->
                <div class="col-12 col-md-6">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body text-center p-4 p-xxl-5">
                            <img src="{{ asset('assets/divorce-harem-svgrepo-com.svg') }}" alt="Guichet naissance"
                                class="lucide lucide-baby text-primary mb-4" width="20%">

                            <h4 class="mb-4">Guichet Divorce</h4>
                            <p class="mb-4 text-secondary"> Obtenez un certificat de divorce et d'autres documents
                                importants liés à votre situation familiale.
                            </p>
                            <a href="{{ route('guichet-divorce.index') }}"
                                class="fw-bold text-decoration-none link-primary">
                                Obtenir
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var title = "SAMA ETAT CIVIL";
            var texts = [
                "Votre plateforme pour les demandes d'état civil, accessible partout.",
                "Support 24/7 pour une assistance rapide et efficace.",
                "Des solutions innovantes pour simplifier vos démarches administratives."
            ];
            var textIndex = 0;
            var charIndex = 0;

            function typeWriterText() {
                var typingText = setInterval(function() {
                    if (charIndex < texts[textIndex].length) {
                        $('#typing-text').text($('#typing-text').text() + texts[textIndex].charAt(
                            charIndex));
                        charIndex++;
                    } else {
                        clearInterval(typingText);
                        setTimeout(function() {
                            eraseText();
                        }, 1000);
                    }
                }, 50);
            }

            function eraseText() {
                var erasingText = setInterval(function() {
                    var currentText = $('#typing-text').text();
                    if (currentText.length > 0) {
                        $('#typing-text').text(currentText.slice(0, -1));
                    } else {
                        clearInterval(erasingText);
                        textIndex++;
                        if (textIndex >= texts.length) {
                            textIndex = 0;
                        }
                        charIndex = 0;
                        typeWriterText();
                    }
                }, 50);
            }

            typeWriterText();
        });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Suivre ma demande</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted text-center mb-4">Sélectionnez un guichet et entrez le code de suivi pour vérifier
                        l'état de votre document.</p>

                    <form method="POST" action="{{ route('suivi-demande') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="guichet" class="form-label">Guichet</label>
                            <select name="guichet" id="guichet"
                                class="form-select @error('guichet') is-invalid @enderror">
                                <option value="" disabled selected>Sélectionnez un guichet</option>
                                <option value="naissance">Guichet Naissance</option>
                                <option value="deces">Guichet Décès</option>
                                <option value="certificat">Guichet Certificat</option>
                                <option value="mariage">Guichet Mariage</option>
                                <option value="divorce">Guichet Divorce</option>
                            </select>
                            @error('guichet')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="code_suivi" class="form-label">Code de suivi</label>
                            <input type="text" name="code_suivi"
                                class="form-control @error('code_suivi') is-invalid @enderror" id="code_suivi"
                                placeholder="Entrez votre code de suivi">
                            @error('code_suivi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Vérifier l'état de ma demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
