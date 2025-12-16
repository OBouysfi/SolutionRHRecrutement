@extends('layouts.master')

@section('title', 'Ajouter candidat test')

@section('css_header')
<style>
      .custom-file-input {
            display: none;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #005dc7;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-align: center;
            cursor: pointer;
        }

        .btn i:first-child {
            margin-right: 0 !important;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }
    </style>
@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Test technique") }}</h5>
            </div>
            {{-- <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div> --}}
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ __("generated.contact") }}">
            <a href="{{ route('support.index') }}" class="text-decoration-none">
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                        <span class="input-group-text text-secondary bg-none" style="border: 0;">
                            <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                        </span>
                    </figure>
                </div>
            </a>
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
            <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active text-primary" aria-current="page">
                    {{ isset($candidate) ? __("generated.Modifier le candidat") : __("generated.Ajouter un candidat")}}
                </li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">
        <form action="#" method="post" id="addDataCandidate" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 mb-3 bg-none shadow-none">
                        <input type="file" id="demofile" class="hidden">


                        <figure class="cover-figure coverimg w-100 h-300 mb-0 position-relative rounded">
                    <div class="position-absolute top-0 end-0 m-3">
                        <label class="btn btn-light">
                            <i class="bi bi-camera"></i> <span >{{ __("generated.Modifier la couverture") }}</span> 
                            <input type="file" name="cover_photo"
                                class="custom-file-input profilecoverlightinput" id="profilecoverlightinput"
                                accept="image/*" />
                        </label>
                    </div>
                    <img src="{{isset($candidate) ? $candidate->getCoverUrl() : asset('assets/img/icon/auth-bg-cover.jpg') }}"
                        class="mw-100 profile-cover" alt="" />
                </figure>



                        <div class="row align-items-start justify-content-center mb-3">
                            <div class="col-auto position-relative">
                                <figure class="avatar-figure avatar avatar-160 coverimg rounded-circle top-80 shadow-md border-3 border-light" style="background-size: 118px; background-image: url(&quot;assets/img/icon/photo-empty.png&quot;);">
                                    <img src="{{ isset($candidate) ? $candidate->getAvatarUrl() : asset('assets/img/icon/photo-empty.png')}}" alt="" class="profile-avatar custom-file-input">
                                </figure>
                                <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                    <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                        <i class="bi bi-camera"></i>
                                        <input type="file" name="path_picture"
                                            class="custom-file-input profileavatarlightinput" id="profileavatarlightinput"
                                            accept="image/*" />
                                    </label>
                                </div>
                            </div>
                            <div class="row align-items-start justify-content-center mt-4">
                                <div class="col-auto">
                                    <div class="form-check form-check-circle">
                                        <input class="form-check-input" type="radio" name="sexe" value="Homme" style="margin-top: 3px">
                                        <label class="form-check-label" for="priceupgrade1">
                                            <span class="h6 " style="font-size: 15px;font-weight: 100;">{{ __("generated.Homme") }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-check-circle">
                                        <input class="form-check-input" type="radio"  name="sexe" value="Femme" style="margin-top: 3px">
                                        <label class="form-check-label" for="priceupgrade2">
                                            <span class="h6 " style="font-size: 15px;font-weight: 100;">{{ __("generated.Femme") }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0" >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row" style="padding-left: 15px">
                                                <div class="col-12">
                                                    <h4 class="pt-4 pb-4 mb-3  bg-gradient-theme-light">{{ __("generated.Informations personnelles") }}</h4>
                                                    <div class="row justify-content-center">
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div
                                                                                class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Civilité") }}</span></label>
                                                                                    <select required name="civility" id="country1" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($civilities as $key=>$value)
                                                                                            <option value="{{ $key }}"
                                                                                            {{ isset($candidate) && $candidate->civility == $key ? 'selected' : '' }}>{{ __($value) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="first_name"

                                                                                        placeholder="Prénom" value="{{ isset($candidate) ? $candidate->first_name : '' }}" required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Prénom") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="last_name" placeholder="Nom"
                                                                                        value="{{ isset($candidate) ? $candidate->last_name : '' }}"
                                                                                        required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Nom") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Situation familiale") }}</span></label>
                                                                                    <select required name="family_situation" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($situations as $key=>$value)
                                                                                            <option value="{{ __($value) }}"
                                                                                            {{ isset($candidate) && $candidate->family_situation == $value ? 'selected' : '' }}>{{ __($value) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="date" name="birth_date" placeholder="Date de naissance"
                                                                                        value="{{ isset($candidate) && $candidate->birth_date ? $candidate->birth_date->format('Y-m-d') : '' }}" required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Date de naissance") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="birth_place" placeholder="Lieu de naissance"
                                                                                        value="{{ isset($candidate) ? $candidate->birth_place : '' }}"
                                                                                        required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Lieu de naissance") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 ms-auto">
                                                                    <div class="row">

                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="nationality" placeholder="Nationalité"
                                                                                        value="{{ isset($candidate) ? $candidate->nationality : '' }}"
                                                                                        required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Nationalité") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="address" placeholder="Adresse"
                                                                                        value="{{ isset($candidate) ? $candidate->address : '' }}"
                                                                                        required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Adresse") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="postal_code" placeholder="Code postal"
                                                                                        value="{{ isset($candidate) ? $candidate->postal_code : '' }}"
                                                                                        required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Code postal") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            
                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Ville") }}</span></label>
                                                                                    <select required name="city_id" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($cities as $city)
                                                                                            <option value="{{ __($city->id) }}"
                                                                                            {{ isset($candidate) && $candidate->city_id == $city->id ? 'selected' : '' }}
                                                                                            >{{ __($city->name) }}</option>

                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Pays") }}</span></label>
                                                                                    <select required name="country_id" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($countries as $country)
                                                                                            <option value="{{ __($country->id) }}" data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png"
                                                                                            {{ isset($candidate) && optional($candidate->city)->country_id == $country->id ? 'selected' : '' }}>{{ __($country->name) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="phone_primary" placeholder="Téléphone" value="{{ isset($candidate) ? $candidate->phone_primary  : '' }}" required="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Téléphone") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="email" placeholder="E-mail" value="{{ isset($candidate) ? $candidate->email : '' }}" required  class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.E-mail") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="password" placeholder="{{ __("generated.Mot de passe") }}" value="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Mot de passe") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="confirm_password" placeholder="{{ __("generated.Téléphone 2") }}" value="" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Confirmer le mot de passe") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 ms-auto">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Langue") }}</span></label>
                                                                                    <select required name="language" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($languages as $key=>$value)
                                                                                            <option value="{{ __($value) }}"
                                                                                            {{ isset($candidate) && $candidate->language == $value ? 'selected' : '' }}>{{ __($value) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>



                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Groupe") }}</span></label>
                                                                                    <select required name="group" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($groups as $key=>$value)
                                                                                            <option value="{{ $key }}">{{ __($value) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-12 col-md-12 mb-2">

                                                                            <div class="form-group check-valid is-valid mb-3">
                                                                                <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                    style="border-radius: 8px !important;  ">
                                                                                    <label><span >{{ __("generated.Statut") }}</span></label>
                                                                                    <select required name="status" class="chosenoptgroup w-100 select-search-chosen">
                                                                                        @foreach($status as $key=>$value)
                                                                                            <option value="{{ __($value) }}"
                                                                                            {{ isset($candidate) && $candidate->status == $value ? 'selected' : '' }}>{{ __($value) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        {{-- <div class="col-12 col-md-12 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" name="overtime" placeholder="Temps supplémentaire"
                                                                                        value="{{ isset($candidate) ? $candidate->overtime : '' }}" class="form-control border-start-0 translated_text">
                                                                                        <label >{{ __("generated.Temps supplémentaire") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="padding: 0px 17px;" class="row mb-5 mt-2">
                                                                <div class="col-12 ms-auto" style="width: 36%;margin-right: -16px !important;">
                                                                    <div class="form-check form-switch" style="margin-top: 15px;">
                                                                        <button class="btn btn-theme mnw-100 bg-blue " style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                                                                        <button type="submit" class="btn btn-theme mnw-100 bg-green" style="float: right;font-size: 14px">
                                                                            {{  isset($candidate) ? __("generated.Modifier") : __("generated.Enregistrer") }}</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</main>
@endsection


@section('js_footer')
<script>
    var candidate = @json($candidate ?? null);
    var ApiCandidateCreateEditData = @json(isset($candidate) ? route('api.candidate.update', $candidate->id) : route('api.candidate.store'));

</script>
@vite([
    'resources/js/candidate/create-edit.js',
    ])
@endsection
