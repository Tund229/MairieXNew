@extends('layouts.dash')

@section('content')
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




    @if (Auth::user()->role == 'admin')
        <div class="page-body">
            <div class="row">
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-users bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Nombre d'agent</span>
                            <h4>{{ $agent }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-hour-glass bg-c-yellow card1-icon"></i>
                            <span class="text-c-yellow f-w-600">Demande en cours</span>
                            <h4>{{ $demandeEnCours }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-check-circled bg-c-green card1-icon"></i>
                            <span class="text-c-green f-w-600">Demande terminée</span>
                            <h4>{{ $demandeTerminee }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-close-circled bg-c-pink  card1-icon"></i>
                            <span class="text-c-pink f-w-600">Demande rejetée</span>
                            <h4>{{ $demandeRejetee }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
            </div>
        </div>
        <div class="page-body">
            <div class="page-header-title  mb-4">
                <div class="d-inline mx-auto">
                    <h4>Statistiques par guichet</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('admin.guichet_naissance') }}">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Naissance</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $naissance->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $naissance->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $naissance->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('admin.guichet_deces') }}">
                        <div class="card dribble-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Décès</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $deces->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $deces->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $deces->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('admin.guichet_mariage') }}">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Mariage</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $mariage->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $mariage->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $mariage->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('admin.guichet_certificat') }}">
                        <div class="card dribble-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Certificats</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $certificat->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $certificat->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $certificat->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('admin.guichet_divorce') }}">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Divorce</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $divorce->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $divorce->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $divorce->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @elseif (Auth::user()->role == 'agent')
        <div class="page-body">
            <div class="row">
                <!-- card1 start -->
                <div class="col-md-6 col-xl-4">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-hour-glass bg-c-yellow card1-icon"></i>
                            <span class="text-c-yellow f-w-600">Demande en cours</span>
                            <h4>{{ $demandeEnCours }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-4">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-check-circled bg-c-green card1-icon"></i>
                            <span class="text-c-green f-w-600">Demande terminée</span>
                            <h4>{{ $demandeTerminee }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-4">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-close-circled bg-c-pink  card1-icon"></i>
                            <span class="text-c-pink f-w-600">Demande rejetée</span>
                            <h4>{{ $demandeRejetee }}</h4>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
            </div>
        </div>

        <div class="page-body">
            <div class="page-header-title  mb-4">
                <div class="d-inline mx-auto">
                    <h4>Statistiques par guichet</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <a href="#">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Naissance</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $naissance->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $naissance->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $naissance->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="#">
                        <div class="card dribble-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Décès</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $deces->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $deces->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $deces->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="#">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Mariage</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $mariage->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $mariage->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $mariage->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <a href="#">
                        <div class="card dribble-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Certificats</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $certificat->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $certificat->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $certificat->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="#">
                        <div class="card fb-card">
                            <div class="card-header">
                                <div class="d-inline-block">
                                    <h5>Guichet Divorce</h5>
                                </div>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-4 b-r-default">
                                        <h6>{{ $divorce->where('state', 'terminé')->count() }}</h6>
                                        <p class="text-muted">Terminée</p>
                                    </div>

                                    <div class="col-4 b-r-default">
                                        <h6>{{ $divorce->where('state', 'en_traitement')->count() }}</h6>
                                        <p class="text-muted">En cours</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $divorce->where('state', 'rejeté')->count() }}</h6>
                                        <p class="text-muted">Rejetée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endif



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Graphique des demandes par jour
                    </div>
                    <div class="card-body">
                        <canvas id="dailyChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Graphique des demandes par mois
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Graphique des demandes par année
                    </div>
                    <div class="card-body">
                        <canvas id="yearlyChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        // Graphique des demandes par jour (Agent)
        var dailyData = @json($dailyData);

        var ctxDaily = document.getElementById('dailyChart').getContext('2d');
        var dailyChart = new Chart(ctxDaily, {
            type: 'bar',
            data: {
                labels: dailyData.labels,
                datasets: dailyData.datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des demandes par mois (Agent)
        var monthlyData = @json($monthlyData);

        var ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
        var monthlyChart = new Chart(ctxMonthly, {
            type: 'line',
            data: {
                labels: monthlyData.labels,
                datasets: monthlyData.datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des demandes par année (Agent)
        var yearlyData = @json($yearlyData);

        var ctxYearly = document.getElementById('yearlyChart').getContext('2d');
        var yearlyChart = new Chart(ctxYearly, {
            type: 'bar',
            data: {
                labels: yearlyData.labels,
                datasets: yearlyData.datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
