@extends('layouts.master')

@section('title', 'Campaign')

@section('css_header')
@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
            </div>
            
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                </figure>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
            </div>
            <div class="col col-sm-auto translated_text"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Créer une campagne") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">

        
        {{-- form create --}}
        <form action=" {{ route('api.personalityTest.campaign.create') }} " method="get">
            @csrf

            <div class="row mb-4 justify-content-center">
                <div class="col-10">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <h6 class="title custom-title mb-4 ">{{ __("generated.Détail de la campagne") }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input name="label" type="text" placeholder="{{ __("generated.Nom de la campagne") }}" value="{{ old('label') }}" required class="form-control border-start-0 translated_text">
                                                                <label>Nom de la campagne</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <select name="predictive_model_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                                    <option selected disabled >{{ __("generated.Modèle prédictif") }}</option>
                                                                    @foreach ($predictiveModels as $predictiveModel)
                                                                        <option 
                                                                            value="{{ __($predictiveModel->id) }}"
                                                                            {{ old('predictive_model_id') == $predictiveModel->id ? 'selected' : '' }}
                                                                        >
                                                                            {{ __($predictiveModel->label) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="floatingSelect" >{{ __("generated.Modèle prédictif") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input name="location" type="text" placeholder="{{ __("generated.Localisation") }}" value="{{ old('location') }}" required class="form-control border-start-0 translated_text">
                                                                <label>Localisation</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mt-4 mb-1">
                                                <div class="col-12 ms-auto" style="width: 36%">
                                                    <div class="form-check form-switch" style="margin-top: 4px;">
                                                        <button  type="submit" class="btn btn-theme mnw-100 bg-blue " style="float: right;font-size: 14px;margin-left: 10px" >{{ __("generated.Enregistrer") }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            
        </form>
        {{-- end form create --}}    
    </div>

</main>
@endsection


@section('js_footer')

@endsection