@extends('candidate_portal.layouts.second')

@section('title', __('candidate-portal.Résultats complets'))

@section('css_header')

@endsection

@section('content')

    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('candidate-portal.Test personnalité') }}</h5>
                </div>

                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.Guide vidéo') }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.Chatbot') }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.Confort utilisateur') }}" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('candidate-portal.Résultats complets') }}
                    </li>
                </ol>
            </nav>
        </div>

        <div class="container mt-4">

            <div class="row mb-4">
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.ID') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($candidate['candidate_id']) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __($candidate['first_name']) }}
                                                                    {{ __($candidate['last_name']) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Groupe') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Groupe principal
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Langue') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Français
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.E-mail') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($candidate['email']) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Invitation envoyée le') }}
                                                                    {{ __($candidate['invited_at']) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-emoji-smile"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">SWIPE</p>
                                                    <p>{{ __('candidate-portal.Révélez la personnalité') }}</p>
                                                </div>
                                                @isset($candidate['reports']['swipe'])
                                                    @foreach ($candidate['reports']['swipe'] as $item)
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
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-lightning-charge"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">DRIVE</p>
                                                    <p>{{ __('candidate-portal.Explorez la motivations') }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-lightbulb"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">BRAIN</p>
                                                    <p>{{ __('candidate-portal.Explorez la façon de raisonner') }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                {{--  matching with predictive model : card at the left and select predictive model at the right     --}}
                <div class="col-12">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 m-auto">
                                                    <b>{{ __('candidate-portal.Matching avec le modèle de personnalité') }}</b>
                                                </div>
                                                <div class="col-6">
                                                    <select class="form-select" id="predictive-model-select" disabled>
                                                        <option value="" selected>
                                                            {{ __('candidate-portal.Chargement des modèles...') }}</option>
                                                    </select>
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
            <div class="row mb-4">
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-lightbulb"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">Global</p>
                                                    <p>{{ __('candidate-portal.Matching global') }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-emoji-smile"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">SWIPE</p>
                                                    <p>{{ __('candidate-portal.Révélez la personnalité') }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-lightning-charge"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">DRIVE</p>
                                                    <p>{{ __('candidate-portal.Explorez la motivations') }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex mb-2">
                    <div class="card border-0" style="flex-grow: 1; background-color: #f5f6f8;">
                        <div class="card-body">
                            <div class="row" style="height: 100%;">
                                <div class="col-12 d-flex">
                                    <div class="card border-0" style="flex-grow: 1;">
                                        <div class="card-body" style="    min-height: 282px;">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mb-3 mt-3" style="text-align: center;">
                                                    <div>
                                                        <i class="bi bi-lightbulb"
                                                            style="font-size: 34px;background-color: #5a9bf6;padding: 10px 16px;border-radius: 50%;height: 40px;width: 40px;color: #fff;text-align: center;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3" style="text-align: center;">
                                                    <p style="font-weight: 700">BRAIN</p>
                                                    <p>{{ __('candidate-portal.Explorez la façon de raisonner') }}</p>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection


@section('js_footer')

    <script>
        let candidate_token = "{{ __($candidate['token']) }}";
        var ApiGetCondidatMatchingWithPredictiveModel =
            "{{ route('api.personalityTest.candidats.matching_with_predictive_models') }}";
    </script>
    <script src="{{ asset('assets/js/candidate_portal/personalityTest/candidate-portal.js') }}"></script>

@endsection
