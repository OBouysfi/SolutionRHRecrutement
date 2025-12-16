@extends('errors.minimal')

@section('title', __('Payment Required'))

@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-402.png') }}" alt="402 Payment Required" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Paiement requis</h2>
                        <p class="lead">
                            Cette page nécessite un paiement pour accéder au contenu. Veuillez effectuer un paiement pour continuer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
