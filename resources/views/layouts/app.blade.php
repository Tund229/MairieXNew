<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <title>MairieX</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
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
                    <li class="nav-item"><a class="nav-link me-lg-3 text-white"
                            href="{{ route('login') }}">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <section class="py-5" id="about">
        <div class="container">
            <div class="row gx-4 align-items-center justify-content-between">
                <div class="col-md-5 order-2 order-md-1">
                    <div class="mt-5 mt-md-0">
                        <h2 class="display-5 fw-bold">About Us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .</p>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                    </div>
                </div>
                <div class="col-md-6 offset-md-1 order-1 order-md-2">
                    <div class="row gx-2 gx-lg-3">
                        <div class="col-6">
                            <div class="mb-2"><img class="img-fluid rounded-3" src="https://freefrontend.dev/assets/square.png"></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2"><img class="img-fluid rounded-3" src="https://freefrontend.dev/assets/square.png"></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2"><img class="img-fluid rounded-3" src="https://freefrontend.dev/assets/square.png"></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2"><img class="img-fluid rounded-3" src="https://freefrontend.dev/assets/square.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-light py-3 py-md-5 py-xl-8" id="services">
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-xl-11">
                            <h3 class="fs-6 text-secondary mb-3 mb-xl-4 text-uppercase">What We Do?</h3>
                            <h2 class="display-5 mb-3 mb-xl-4">We are giving you perfect solutions with our proficient
                                services.</h2>
                            <p class="mb-3 mb-xl-4">Our comprehensive suite of services is designed to meet your every
                                need and help you thrive in today's dynamic business landscape. Contact us today to
                                embark on a journey of growth, innovation, and unparalleled support. Your success is our
                                priority.</p>
                            <a href="#!" class="btn bsb-btn-2xl btn-primary rounded-pill">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                        fill="currentColor" class="bi bi-textarea-resize text-primary mb-4"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 4.5A2.5 2.5 0 0 1 2.5 2h11A2.5 2.5 0 0 1 16 4.5v7a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 0 11.5v-7zM2.5 3A1.5 1.5 0 0 0 1 4.5v7A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 13.5 3h-11zm10.854 4.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708l3-3a.5.5 0 0 1 .708 0zm0 2.5a.5.5 0 0 1 0 .708l-.5.5a.5.5 0 0 1-.708-.708l.5-.5a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                    <h4 class="mb-4">Market Research</h4>
                                    <p class="mb-4 text-secondary">We can help you to understand your target market and
                                        identify new opportunities for growth. We offer a variety of research services.
                                    </p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                        fill="currentColor" class="bi bi-tablet text-primary mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                    <h4 class="mb-4">Web Design</h4>
                                    <p class="mb-4 text-secondary">We can help you to create a visually appealing and
                                        user-friendly website. We take into account your brand identity and target
                                        audience.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                        fill="currentColor" class="bi bi-repeat text-primary mb-4"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                    </svg>
                                    <h4 class="mb-4">Daily Updates</h4>
                                    <p class="mb-4 text-secondary">We provide our clients with daily updates on their
                                        business performance. This includes data on website traffic and sales.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                        fill="currentColor" class="bi bi-shield-check text-primary mb-4"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                        <path
                                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                    <h4 class="mb-4">Free Support</h4>
                                    <p class="mb-4 text-secondary">We offer free support to all of our clients. This
                                        means that you can always get help when you need it, no matter what time it is.
                                    </p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
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
            </div>
        </div>
    </section>





    <!-- FAQ Section -->
    <section id="faq" class="py-5">
        <div class="container px-5">
            <h2 class="text-center mb-4">FAQ</h2>
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
                                    Vous pouvez vérifier l'état de votre demande en vous connectant à votre compte sur notre
                                    site web. Une fois connecté, allez à la section "Suivi des demandes" où vous trouverez
                                    toutes les informations mises à jour concernant votre demande.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième colonne -->
                <div class="col-lg-6 mb-4">
                    <div class="accordion" id="faqAccordion2">
                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Comment obtenir un acte de mariage ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    Pour obtenir un acte de mariage, vous devez fournir une copie de votre certificat de mariage
                                    ou tout autre document prouvant le mariage. Remplissez le formulaire de demande disponible
                                    sur notre site web et suivez les instructions pour soumettre votre demande.
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
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
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer-->
    <footer class="bg-secondary text-center py-2">
        <div class="container px-5">
            <div class="text-white small">
                <div class="mb-2">&copy;MairieX.com. Tous droits réservés.</div>
                <p class="text-white">MairieX, le guichet état civil virtuel.</p>
            </div>
        </div>
    </footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
