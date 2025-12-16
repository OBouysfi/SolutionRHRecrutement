@extends('errors.minimal')

@section('title', __('Service Unavailable'))

@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-503.png') }}" alt="503 Service Unavailable" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Service Indisponible</h2>
                        <p class="lead">
                            Le service est temporairement indisponible. Veuillez réessayer plus tard.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection