<!DOCTYPE html>
<html lang="en">

<head>
    <title>SAMA ETAT CIVIL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords"
        content=" ">
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/favicon.png') }}" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/bootstrap/css/bootstrap.min.css/') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/icon/themify-icons/themify-icons.css/') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/icon/icofont/css/icofont.css/') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/jquery.mCustomScrollbar.css/') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        #dataTable_paginate {

            margin: 0 auto;
            text-align: center;
            margin-bottom: 20px;
        }

        #dataTable {
            padding: 20px 0;
        }

        #dataTable thead th {
            background-color: #f5f5f5;
            font-weight: bold;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }

        #dataTable tbody td {
            border-bottom: 1px solid #17a589;
            padding: 8px;
        }

        #dataTable_paginate .paginate_button {
            background-color: transparent;
            color: #17a589;
            border: 1px solid #17a589;
            padding: 3px 8px;
            margin-right: 2px;
            transition: background-color 0.3s;
            cursor: pointer;

        }

        #dataTable_paginate .paginate_button.current {
            background-color: #17a589;
            color: #17a589;
            border: 1px solid #17a589;
            padding: 3px 8px;
            margin-right: 2px;
        }

        #dataTable_filter {
            text-align: center;
            margin: 0 auto;
        }

        #dataTable_filter>label>input[type="search"] {


            padding: 0.4375rem 0.875rem;
            font-size: 0.9375rem;
            font-weight: 400;
            line-height: 1.53;
            color: #697a8d;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d9dee3;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        #dataTable_filter>label>input[type="search"]:focus {
            outline: 1px solid #17a589;
            padding: 0.4375rem 0.875rem;
            font-size: 0.9375rem;
            font-weight: 400;
            line-height: 1.53;
            color: #697a8d;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d9dee3;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
</head>

<body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{route('home')}}">
                            <img class="img-fluid" src="{{ asset('../assets/logo.png') }}" alt="Theme-Logo"
                                width="150px" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">

                        <ul class="nav-right">
                            @if (Auth::user()->role == "agent")

                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink">{{  $demandeEnCours}}</span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Agent {{Auth::user()->name}}</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">

                                            <div class="media-body">
                                                <p class="notification-msg">Vous avez {{$demandeEnCours}} nouvelles demandes en attente de traitement</p>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </li>
                            @endif
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{ asset('dash/assets/images/avatar.jpg') }}" class="img-radius"
                                        alt="User-Profile-Image">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i>
                                           {{ Auth::user()->mairies->name ?? "Aucune mairie"}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile')}}">
                                            <i class="ti-user"></i>
                                            Profile
                                            @if ( Auth::user()->role == "agent")
                                                (Agent)
                                            @elseif(Auth::user()->role == "admin")
                                                (Administrateur)
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="ti-layout-sidebar-left"></i> DECONNEXION
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @if (Auth::user()->role == 'admin')
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ $title === 'Tableau de bord' ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">
                                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de
                                                bord</span>
                                        </a>
                                    </li>



                                    <li class="{{ $title === 'Mairies' ? 'active' : '' }}">
                                        <a href="{{ route('admin.mairies.index') }}">
                                            <span class="pcoded-micon"><i class="ti-location-pin"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Mairies</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Ressources humaines
                                </div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ $title === 'Agents' ? 'active' : '' }}">
                                        <a href="{{ route('admin.agents.index') }}">
                                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">
                                                Agents
                                            </span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('admin.delete_all_guichets') }}">
                                            <span class="pcoded-micon"><i class="ti-trash"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">
                                              Supprimer données
                                            </span>
                                        </a>
                                    </li>

                                    <li class="{{ $title === 'Restauration Agent' ? 'active' : '' }}">
                                        <a href="{{ route('admin.restore_account') }}">
                                            <span class="pcoded-micon"><i class="ti-reload"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">
                                                Restaurer des comptes
                                            </span>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </nav>
                    @elseif (Auth::user()->role == 'agent')
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="{{ $title === 'Tableau de bord' ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">
                                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de
                                                bord</span>
                                        </a>
                                    </li>

                                    <li class="{{ $title === 'Guichet Naissance' ? 'active' : '' }}">
                                        <a href="{{ route('agent.guichet-naissance.index') }}">
                                            <span class="pcoded-micon"><i class="ti-files"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guichet
                                                Naissance</span>
                                        </a>
                                    </li>

                                    <li class="{{ $title === 'Guichet Décès' ? 'active' : '' }}">
                                        <a href="{{ route('agent.guichet-deces.index') }}">
                                            <span class="pcoded-micon"><i class="ti-files"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guichet Décès</span>
                                        </a>
                                    </li>


                                    <li class="{{ $title === 'Guichet Mariage' ? 'active' : '' }}">
                                        <a href="{{ route('agent.guichet-mariage.index') }}">
                                            <span class="pcoded-micon"><i class="ti-files"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guichet
                                                Mariage</span>
                                        </a>
                                    </li>


                                    <li class="{{ $title === 'Guichet Divorce' ? 'active' : '' }}">
                                        <a href="{{ route('agent.guichet-divorce.index') }}">
                                            <span class="pcoded-micon"><i class="ti-files"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guichet
                                                Divorce</span>
                                        </a>
                                    </li>

                                    <li class="{{ $title === 'Guichet Certificats' ? 'active' : '' }}">
                                        <a href="{{route('agent.guichet-certificats.index')}}">
                                            <span class="pcoded-micon"><i class="ti-files"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Guichet
                                                Certificats</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('agent.delete_all_guichets') }}">
                                            <span class="pcoded-micon"><i class="ti-trash"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">
                                              Supprimer données
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    @endif

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @yield('content')
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('dash/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('dash/assets/pages/widget/amchart/serial.min.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('dash/assets/pages/todo/todo.js') }} "></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('dash/assets/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('dash/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('dash/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('dash/assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('dash/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        $('#dataTable' ).DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": " 0 à 0 sur 0 élément",
                "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing": "Traitement...",
                "sSearch": "Rechercher :",
                "sZeroRecords": "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast": "Dernier",
                    "sNext": "Suiv.",
                    "sPrevious": "Préc."
                },
            }
        });


    </script>


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
                            ' <option value="" disabled selected style="color: #17a589;">--Sélectionnez une mairie--</option>'
                        ));
                        $.each(data, function(mairieId, mairieNom) {
                            $('#mairie').append($('<option value="' + mairieId + '">' +
                                mairieNom + '</option>'));
                        });
                    });
                } else {
                    $('#mairie').empty().append($('<option value="">Sélectionnez une mairie</option>'));
                }
            });
        });
    </script>
</body>

</html>
