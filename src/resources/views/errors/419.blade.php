@extends('errors.minimal')

@section('title', __('Page Expired'))


@section('message')
<div class="container text-center" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <div>
                        <img class="img-fluid w-50" src="{{ asset('assets/img/error-419.png') }}" alt="419 Page Expired" style="width: 100%; height: auto;">
                    </div>
                    <div>
                        <h2 class="mb-4">Oups ! La page a expiré</h2>
                        <p class="lead">
                            Votre session a expiré. Veuillez actualiser la page et réessayer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
