@extends('layouts.app')

@section('content')
    <section class="cta">
        <div class="cta-content">
            <div class="container">
                {{-- <div class="text-center">
                    <img src="{{ asset('assets/img/pse.png') }}" class="img-fluid" style="margin-top: -70px; margin-bottom:50px;">
                </div> --}}

                <div class="row">
                    <div class="col-lg-12 order-lg-1 col-12">
                        <h6 style="font-size: 42px;" class="text-primary  mb-4 ">
                            MairieX le guichet unique d'etat civil virtuel au Sénégal
                            <br />
                            <span style="font-size: 30px;" class="text-white ">Vos demandes d'etat civil avec vous,
                                partout !</span>
                        </h6>

                        <div class="d-flex flex-column flex-md-row ">
                            <a class="btn btn-secondary py-2 px-4 rounded-pill mx-2 mb-2 mb-md-0"
                                href="#features">Commencer</a>
                            <button class="btn btn-primary py-2 px-4 rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@fat">
                                Suivre sa demande
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- App features section-->
    <section id="features" class="container">
        <h2 class="text-center text-black font-alt" style="margin-bottom: 50px;">Guichets Ouverts</h2>
        <div class=" px-4 mt-4 ">
            <div class="row gx-4 align-items-center justify-content-around">
                <div class="col-6">
                    <div class="card mb-3 p-2 shadow border border-primary border-dotted"
                        style="max-width: 540px; border: 2px dashed var(--bs-primary-rgb); transition: transform 0.3s 0.3s;">
                        <a href="{{ route('guichet-naissance.index') }}" class="stretched-link"></a>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('assets/img/guichet/NAISSANCE.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                                <div class="card-body">
                                    <h5 class="card-title fs-md-4 fs-lg-5">Guichet naissance</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="card mb-3 p-2 shadow border border-primary border-dotted"
                        style="max-width: 540px; border: 2px dashed var(--bs-primary-rgb); transition: transform 0.3s 0.3s;">
                        <a href="{{ route('guichet-mariage.index') }}" class="stretched-link"></a>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('assets/img/guichet/MARIAGE.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                                <div class="card-body ">
                                    <h5 class="card-title fs-md-4 fs-lg-5">Guichet mariage</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row gx-4 align-items-center mt-4 justify-content-around">
                <div class="col-6">
                    <div class="card mb-3 p-2 shadow border border-primary border-dotted"
                        style="max-width: 540px; border: 2px dashed var(--bs-primary-rgb); transition: transform 0.3s 0.3s;">
                        <a href="{{ route('guichet-deces.index') }}" class="stretched-link"></a>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('assets/img/guichet/deces.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="ccol-12 col-md-4 d-flex justify-content-center align-items-center">
                                <div class="card-body ">
                                    <h5 class="card-title fs-md-4 fs-lg-5">Guichet Décès</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-6">
                    <div class="card mb-3 p-2 shadow border border-primary border-dotted"
                        style="max-width: 540px; border: 2px dashed var(--bs-primary-rgb); transition: transform 0.3s 0.3s;">
                        <a href="{{ route('guichet-certificats.index') }}" class="stretched-link"></a>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('assets/img/guichet/GUICHET CERTIFICAT.png') }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="ccol-12 col-md-4 d-flex justify-content-center align-items-center">
                                <div class="card-body ">
                                    <h5 class="card-title fs-md-4 fs-lg-5">Guichet Certificats</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row gx-4 align-items-center mt-4 justify-content-around">
                <div class="col-6">
                    <div class="card mb-3 p-2 shadow border border-primary border-dotted"
                        style="max-width: 540px; border: 2px dashed var(--bs-primary-rgb); transition: transform 0.3s 0.3s;">
                        <a href="{{ route('guichet-divorce.index') }}" class="stretched-link"></a>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('assets/img/guichet/DIVORCE.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="ccol-12 col-md-4 d-flex justify-content-center align-items-center">
                                <div class="card-body ">
                                    <h5 class="card-title fs-md-4 fs-lg-5">Guichet Divorce</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Suivre ma demande</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <p class="text-secondary text-center">Sélectionner un guichet et entrer le code suivi pour voir si
                        votre
                        document est prêt ou a été rejeté.
                    </p>

                    <form method="POST" action="{{ route('suivi-demande') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="guichet" class="col-form-label">Guichet</label>
                            <select name="guichet" id="guichet" class="form-control">
                                <option value="" disabled selected style="color: #17a589;">--Sélectionnez un
                                    guichet--
                                </option>
                                <option value="naissance">Guichet Naissance</option>
                                <option value="deces">Guichet Décès</option>
                                <option value="certificat">Guichet Certificat</option>
                                <option value="mariage">Guichet Mariage</option>
                                <option value="divorce">Guichet Divorce</option>
                            </select>
                            @error('guichet')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code_suivi" class="col-form-label">Votre code suivi</label>
                            <input type="text" name="code_suivi" class="form-control" id="code_suivi">
                            @error('code_suivi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Vérifier</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
