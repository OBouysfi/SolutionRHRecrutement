@extends('layouts.app')

@section('title', __('Server Error'))

@section('content')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-500.png') }}" alt="500 Server Error" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Erreur du serveur</h2>
                        <p class="lead">
                            Une erreur s'est produite sur le serveur. Veuillez réessayer plus tard.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
