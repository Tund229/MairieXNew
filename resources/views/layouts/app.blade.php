<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <title>SAMA ETAT CIVIL</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">
    <style>
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .footer-text {
            margin-bottom: 10px;
        }

        .slick-slide {
            margin: 0 20px;
        }

        .slick-slide img {
            width: 50%;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar bg-secondary fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" width="120px">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi-list text-white bi-2x"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0 ">
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white"
                            href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white" href="#about">A propos</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white" href="#faq">FAQ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-lg-3 text-white" href="#"
                            id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Faire une demande
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('guichet-naissance.index') }}">Guichet
                                    Naissance</a></li>
                            <li><a class="dropdown-item" href="{{ route('guichet-certificats.index') }}">Guichet
                                    Certifiats </a></li>
                            <li><a class="dropdown-item" href="{{ route('guichet-deces.index') }}">Guichet Décès</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('guichet-divorce.index') }}">Guichet Divorce
                                </a></li>
                            <li><a class="dropdown-item" href="{{ route('guichet-mariage.index') }}">Guichet Mariage
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white"
                            href="{{ route('login') }}">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>




    @yield('content')





    <!-- FAQ Section -->
    <section id="faq" class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">
                        FAQ</h2>
                    <p class="text-secondary mb-5 text-center lead fs-4">Réponses à vos questions fréquentes sur les
                        demandes via une plateforme sécurisée.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>
        <div class="container px-5">
            <div class="row">
                <!-- Première colonne -->
                <div class="col-lg-6 mb-4">
                    <div class="accordion" id="faqAccordion1">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Comment demander un acte de naissance ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">
                                    Pour demander un acte de naissance, vous devez remplir un formulaire de demande
                                    disponible sur notre site web et fournir les documents nécessaires. Suivez les
                                    instructions sur la page de demande pour soumettre votre demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Comment vérifier l'état de sa demande ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">
                                    Vous pouvez vérifier l'état de votre demande en vous connectant à votre compte sur
                                    notre
                                    site web. Une fois connecté, allez à la section "Suivi des demandes" où vous
                                    trouverez toutes les informations mises à jour concernant votre demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Comment obtenir un acte de mariage ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">
                                    Pour obtenir un acte de mariage, vous devez fournir une copie de votre certificat de
                                    mariage ou tout autre document prouvant le mariage. Remplissez le formulaire de
                                    demande
                                    disponible sur notre site web et suivez les instructions pour soumettre votre
                                    demande.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième colonne -->
                <div class="col-lg-6 mb-4">
                    <div class="accordion" id="faqAccordion2">
                        <!-- Question 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Combien de temps prend le traitement d'une demande ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    Le temps de traitement des demandes varie en fonction du type de document demandé
                                    et du volume de demandes reçues. Nous nous efforçons de traiter les demandes dans
                                    les délais les plus courts possibles et vous tiendrons informé de l'état de votre
                                    demande via notre plateforme en ligne.
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Quels documents sont nécessaires pour demander un certificat de résidence ?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    Pour demander un certificat de résidence, vous devez fournir une preuve de résidence
                                    (par exemple, un bail ou une facture de services publics) et une pièce d'identité.
                                    Suivez les instructions sur notre site web pour soumettre votre demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Où puis-je trouver le formulaire de demande ?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    Vous pouvez télécharger le formulaire de demande directement depuis notre site web,
                                    dans
                                    la section dédiée aux formulaires. Assurez-vous de remplir toutes les sections
                                    requises avant de soumettre votre demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 7 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    Comment modifier une demande déjà soumise ?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="headingSeven" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    Pour modifier une demande déjà soumise, veuillez contacter notre service clientèle
                                    directement. Nous vous guiderons sur la procédure à suivre pour mettre à jour votre
                                    demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 8 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                    Quelle est la durée de validité des certificats délivrés ?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="headingEight" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    La durée de validité des certificats délivrés peut varier en fonction du type de
                                    document. Veuillez vérifier sur le certificat lui-même ou sur notre site web pour
                                    les
                                    détails spécifiques sur la validité de chaque type de certificat.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2> Partenaires</h2>
                <section class="customer-logos slider">
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_1.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_2.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_3.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_1.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_1.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_1.png/') }}">
                    </div>
                    <div class="slide"><img src="{{ asset('assets/carrousels/carrousel_1.png/') }}">
                    </div>
                </section>
            </div>
        </div>
    </div>

    <footer class="bg-secondary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-white small footer-text">
                        <div class="mb-2">&copy; <span id="currentYear"></span> SAMA ETAT CIVIL. Tous droits
                            réservés.</div>
                        <p class="text-white">SAMA ETAT CIVIL, le guichet état CIVIL virtuel.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentYearElement = document.getElementById('currentYear');
            var currentYear = new Date().getFullYear();
            currentYearElement.textContent = currentYear;
        });
    </script>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 520,
                        settings: {
                            slidesToShow: 3
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
