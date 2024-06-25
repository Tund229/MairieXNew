<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mairi SN</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/favicon.png') }}" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/style.css') }}">
</head>

<body class="fix-menu">

    </div>
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <div class="text-center">
                            <img src="{{ asset('assets/logo.png') }}" alt="logo.png" width="200px">
                        </div>
                        <form class="md-float-material" action="{{ route('restore_account') }}" method="POST">
                            @csrf
                            <div class="auth-box">

                                @if (session('error_message'))
                                    <div
                                        class="alert alert-danger text-center d-flex justify-content-between align-items-center">
                                        {{ session('error_message') }}
                                    </div>
                                @endif

                                @if (session('success_message'))
                                    <div
                                        class="alert alert-success text-center d-flex justify-content-between align-items-center">
                                        {{ session('success_message') }}
                                    </div>
                                @endif
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left text-center">Restauration de compte</h3>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Votre Adresse E-mail">
                                </div>
                                @error('email')
                                    <div class="text-danger text-center  f-w-400">{{ $message }}</div>
                                @enderror

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block  text-center m-b-20">Restaurer</button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-inverse text-center m-b-0">Cliquez ici pour revenir à la page
                                            d'accueil</p>
                                        <a href="{{ route('welcome') }}"
                                            class="text-primary text-center f-w-600 ">Accueil</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('dash/assets/js/modernizr/modernizr.js/') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/modernizr/css-scrollbars.js/') }}"></script>
    <script type="text/javascript" src="{{ asset('dash/assets/js/common-pages.js/') }}"></script>


</body>

</html>
