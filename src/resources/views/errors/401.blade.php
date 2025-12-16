@extends('errors.minimal')

@section('title', __('Unauthorized'))

@section('message')
    <div class="container text-center" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 text-center">
                    <div class="card-body text-center">
                        <div>
                            <img class="img-fluid w-50" src="{{ asset('assets/img/error-401.png') }}" alt="401 Unauthorized"
                                style="width: 100%; height: auto;">
                        </div>
                        <div>
                            <h2 class="mb-4">Accès non autorisé</h2>
                            <p class="lead">
                                Vous n'avez pas la permission d'accéder à cette page. Veuillez vous connecter ou contacter
                                l'administrateur.
                            </p>
                            <a href="{{ route('dashboard') }}" class="btn btn-theme" style="color: #26b6ea">Retour à Tableau
                                de bord</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
