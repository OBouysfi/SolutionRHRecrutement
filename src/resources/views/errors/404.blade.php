@extends('errors::minimal')
@section('title', __('Not Found'))
@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/404-3.png') }}" alt="404 not found" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! Page non trouvée</h2>
                        <p class="lead">
                            Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
                        </p>
                    </div>
                    {{-- <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-info" style="color: #26b6ea">Retour au tableau de bord</a>
                        
                    </div> --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
