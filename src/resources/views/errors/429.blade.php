@extends('errors.minimal')

@section('title', __('Too Many Requests'))

@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-429.png') }}" alt="429 Too Many Requests" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Trop de requêtes</h2>
                        <p class="lead">
                            Vous avez envoyé trop de requêtes en peu de temps. Veuillez patienter un moment avant de réessayer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
