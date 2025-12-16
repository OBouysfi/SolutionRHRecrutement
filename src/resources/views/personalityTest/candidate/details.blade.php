@extends('layouts.master')

@section('title', 'fiche candidat test personnalite')

@section('css_header')
@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
                </div>

                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{ asset('assets/img/icon/faciliti.png') }}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><span >{{ __("generated.Résultats complets") }}</span></li>
                </ol>
            </nav>
        </div>

        <div class="container mt-4">

            {{-- check is candidate null --}}

            @if ($candidate != null)
                {{--  candidate data available --}}

                <div class="row mb-4">
                    <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                        <div class="card border-0" style="flex-grow: 1;height: 100%;">
                            <div class="card-body" style="    min-height: 282px;">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-group list-group-flush bg-none">
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto ">id :") }}</div>
                                                    <div class="col-auto ps-0">
                                                        {{ __($candidate['candidate_id']) }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        {{ __($candidate['first_name']) }}
                                                        {{ __($candidate['last_name']) }}
                                                    </div>
                                                    {{-- <div class="col-auto ps-0">
                                                    Créé le 09/07/24
                                                </div> --}}
                                                </div>
                                            </li>
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto ">{{ __("generated.Groupe :") }}</div>
                                                    <div class="col-auto ps-0 ">{{ __("generated.Groupe principal") }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto ">{{ __("generated.Langue :") }}</div>
                                                    <div class="col-auto ps-0 ">{{ __("generated.Français") }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto ">{{ __("generated.E-mail :") }}</div>
                                                    <div class="col-auto ps-0">
                                                        {{ __($candidate['email']) }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-secondary"
                                                style="font-size: 13px;">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <span >{{ __("generated.Invitation envoyée le") }}</span> {{ __($candidate['invited_at']) }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                        <div class="card border-0" style="flex-grow: 1;height: 100%;">
                            <div class="card-body" style="    min-height: 282px;">
                                <div class="row justify-content-center">
                                    <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                        <div>
                                            <i class="bi bi-emoji-smile"
                                                style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3" style="text-align: center;">
                                        <p style="font-weight: 700" >{{ __("generated.SWIPE") }}</p>
                                        <p >{{ __("generated.Révélez la personnalité") }}</p>
                                    </div>
                                    @isset($candidate['reports']['swipe'])
                                        @foreach ($candidate['reports']['swipe'] as $item)
                                            <div class="col-12 mb-3" style="text-align: center;">
                                                <a href="{{ __($item['web_link']) }}" target="_blanck"
                                                    class="btn btn-theme w-75 mx-1"
                                                    style="border-radius: 20px; border: 1px solid #5a9bf6; background-color: transparent;color: #000000a6;font-size: 15px;">
                                                    <i class="bi bi-filetype-pdf"></i>&nbsp;{{ __($item['name']) }}
                                                </a>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                        <div class="card border-0" style="flex-grow: 1;height: 100%;">
                            <div class="card-body" style="    min-height: 282px;">
                                <div class="row justify-content-center">
                                    <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                        <div>
                                            <i class="bi bi-lightning-charge"
                                                style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3" style="text-align: center;">
                                        <p style="font-weight: 700" >{{ __("generated.DRIVE") }}</p>
                                        <p >{{ __("generated.Explorez la motivations") }}</p>
                                    </div>
                                    @isset($candidate['reports']['drive'])
                                        @foreach ($candidate['reports']['drive'] as $item)
                                            <div class="col-12 mb-3" style="text-align: center;">
                                                <a href="{{ __($item['web_link']) }}" target="_blanck"
                                                    class="btn btn-theme w-75 mx-1"
                                                    style="border-radius: 20px; border: 1px solid #5a9bf6; background-color: transparent;color: #000000a6;font-size: 15px;">
                                                    <i
                                                        class="bi bi-filetype-pdf"></i>&nbsp;{{ __($item['name']) }}
                                                </a>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                        <div class="card border-0" style="flex-grow: 1;height: 100%;">
                            <div class="card-body" style="    min-height: 282px;">
                                <div class="row justify-content-center">
                                    <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                        <div>
                                            <i class="bi bi-lightbulb"
                                                style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3" style="text-align: center;">
                                        <p style="font-weight: 700" >{{ __("generated.BRAIN") }}</p>
                                        <p >{{ __("generated.Explorez la façon de raisonner") }}</p>
                                    </div>
                                    @isset($candidate['reports']['brain'])
                                        @foreach ($candidate['reports']['brain'] as $item)
                                            <div class="col-12 mb-3" style="text-align: center;">
                                                <a href="{{ __($item['web_link']) }}" target="_blanck"
                                                    class="btn btn-theme w-75 mx-1"
                                                    style="border-radius: 20px; border: 1px solid #5a9bf6; background-color: transparent;color: #000000a6;font-size: 15px;">
                                                    <i
                                                        class="bi bi-filetype-pdf"></i>&nbsp;{{ __($item['name']) }}
                                                </a>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($candidate != null && $response['success'] == true)
                    <div class="row mb-4">
                        {{--  matching with predictive model : card at the left and select predictive model at the right     --}}
                        <div class="col-12">
                            
                            <div class="card border-0" style="flex-grow: 1;height: 100%;">

                                <div class="card-body bg-gradient-theme-light">
                                    <div class="row">
                                        <div class="col-6 m-auto">

                                            <b >{{ __("generated.Matching avec les Modèles prédictifs") }}</b>

                                        </div>
                                        <div class="col-6">
                                                        
                                            <div
                                                class="form-group check-valid is-valid">
                                                <div id="profession-selector"
                                                    class="custom-multiple-select rounded border poste-chosen select-search"
                                                    style="border-radius: 8px !important;  ">
                                                    <label><span >{{ __("generated.Modèle prédictif") }}</span></label>
                                                    <select required name="predictive-model-select" id="predictive-model-select" class="chosenoptgroup w-100 select-search-chosen">
                                                        <option value="" selected >{{ __("generated.Chargement des modèles...") }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                            <div class="card border-0" style="flex-grow: 1;height: 100%;">
                                <div class="card-body" style="    min-height: 282px;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <i class="bi bi-lightbulb"
                                                    style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3" style="text-align: center;">
                                            <p style="font-weight: 700" >{{ __("generated.Global") }}</p>
                                            <p >{{ __("generated.Matching global") }}</p>
                                        </div>


                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <span class="global-matching-value"
                                                    style="font-size: 34px;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #000000;text-align: center; font-weight: bold;"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                            <div class="card border-0" style="flex-grow: 1;height: 100%;">
                                <div class="card-body" style="    min-height: 282px;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <i class="bi bi-emoji-smile"
                                                    style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3" style="text-align: center;">
                                            <p style="font-weight: 700" >{{ __("generated.SWIPE") }}</p>
                                            <p >{{ __("generated.Révélez la personnalité") }}</p>
                                        </div>

                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <span class="swipe-matching-value"
                                                    style="font-size: 34px;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #000000;text-align: center; font-weight: bold;"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                            <div class="card border-0" style="flex-grow: 1;height: 100%;">
                                <div class="card-body" style="    min-height: 282px;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <i class="bi bi-lightning-charge"
                                                    style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3" style="text-align: center;">
                                            <p style="font-weight: 700" >{{ __("generated.DRIVE") }}</p>
                                            <p >{{ __("generated.Explorez la motivations") }}</p>
                                        </div>


                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <span class="drive-matching-value"
                                                    style="font-size: 34px;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #000000;text-align: center; font-weight: bold;"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                            <div class="card border-0" style="flex-grow: 1;height: 100%;">
                                <div class="card-body" style="    min-height: 282px;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <i class="bi bi-lightbulb"
                                                    style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3" style="text-align: center;">
                                            <p style="font-weight: 700" >{{ __("generated.BRAIN") }}</p>
                                            <p >{{ __("generated.Explorez la façon de raisonner") }}</p>
                                        </div>


                                        <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                            <div>
                                                <span class="brain-matching-value"
                                                    style="font-size: 34px;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #000000;text-align: center; font-weight: bold;"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger translated_text" role="alert">
                            {{ __($candidate['message']) }}
                        </div>
                    </div>
                </div>
            @endif


        </div>

    </main>
@endsection


@section('js_footer')

    <script>
        let candidate_token = "{{ array_key_exists('token', $candidate) ? $candidate['token'] : '' }}";
        var ApiGetCondidatMatchingWithPredictiveModel =
            "{{ route('api.personalityTest.candidats.matching_with_predictive_models') }}";
    </script>
    <script src="{{ asset('assets/js/personalityTest/condidatDetails.js') }}"></script>

@endsection
