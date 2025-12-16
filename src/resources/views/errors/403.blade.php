@extends('errors.minimal')

@section('title', __('Forbidden'))

@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-403.png') }}" alt="403 Forbidden" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Accès interdit</h2>
                        <p class="lead">
                            Vous n'êtes pas autorisé à accéder à cette page. Veuillez contacter l'administrateur si vous pensez que c'est une erreur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
