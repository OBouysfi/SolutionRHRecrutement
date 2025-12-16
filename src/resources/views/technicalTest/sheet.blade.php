@extends('layouts.master')

@section('title', 'Fiche du candidat')

@section('css_header')
    <style>
        .custom-avatar {
            background-color: #dde9f7 !important;
        }

        .dark-mode .custom-avatar {
            background-color: transparent !important;
        }

        .custom-icon {
            color: #0a63c9;
        }

        /* Optionnel : changer la couleur de l’icône en dark mode */
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
                <li class="breadcrumb-item active  text-primary" aria-current="page">{{ __("generated.Fiche du candidat") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">
        @can('test-technique-listing-fiche-candidat')
            <div class="row mb-4">
                <div class="col-6" style="width: 41%;">
                    <div class="card border-0 h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5" style="width: 44%;">
                                    <ul class="list-group list-group-flush bg-none">
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto ">{{ __("generated.ID :") }}</div>
                                                <div class="col-auto ps-0">
                                                    {{ $candidate->id ?? ' '}}
                                                </div>
                                                <input type="hidden" id="candidate_id" value="{{ $candidate->id ?? ' ' }}">
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    {{ $candidate->first_name ??' ' }} {{ $candidate->last_name ??' ' }}
                                                </div>
                                                <div class="col-auto ps-0 translated_text">
                                                    Créé le {{ $candidate->created_at ??' ' }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto ">{{ __("generated.Groupe :") }}</div>
                                                <div class="col-auto ps-0">
                                                    {{ $candidate->group ??' ' }}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 ms-auto">
                                    <ul class="list-group list-group-flush bg-none">
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto ">{{ __("generated.Langue :") }}</div>
                                                <div class="col-auto ps-0">
                                                    {{ $candidate->language ??' ' }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto ">{{ __("generated.E-mail :") }}</div>
                                                <div class="col-auto ps-0">
                                                    {{ $candidate->email ?? ' ' }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                            <div class="row">
                                                <div class="col-auto ">{{ __("generated.Invitation envoyée") }}</div>
                                                <div class="col-auto" style="font-size: 12px">
                                                    Python - <span >{{ __("generated.Avancé") }}</span> (09/07/24)<br>React - <span >{{ __("generated.Intermédiaire") }}</span> (09/07/24)
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="width: 59%;">
                    <div class="card border-0 h-100">
                        <div class="card-body" style="min-height: 175px;">
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-6" style="width: 54%;">
                                    <ul class="list-group list-group-flush bg-none" style="">
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0" style="font-size: 13px;color: #6c757d;">
                                                    <span >{{ __("generated.Permettre au candidat de répondre") }}</span> &nbsp;<strong >{{ __("generated.Je ne sais pas") }}</strong>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 " style="font-size: 14px;color: #6c757d;">{{ __("generated.Interrompre et reprendre le test") }}</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 " style="font-size: 13px;color: #6c757d;">{{ __("generated.Permettre au candidat de commenter les questions") }}</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 ms-auto" style="width: 46%;">
                                    <ul class="list-group list-group-flush bg-none">
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 " style="font-size: 13px;color: #6c757d;">{{ __("generated.Permettre d'afficher le résultat à la fin du test") }}</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 " style="font-size: 13px;color: #6c757d;">{{ __("generated.Envoi rapport par e-mail") }}</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary" style="color: #000 !important;padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input checked class="form-check-input" type="checkbox" role="switch" id="rememeberme" style="margin-top: 2px;">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 " style="font-size: 13px;color: #6c757d;">{{ __("generated.Rapport dans l'espace candidat") }}</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="row">
            <div style="width: 23%" class="col-3">
                <div class="card border-0 mb-4">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            {{-- <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme" style="background-color: #dde9f7 !important">
                                                    <i class="bi bi-play h4" style="color: #0a63c9"></i>
                                                </div>
                                            </div> --}}
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme custom-avatar">
                                                    <i class="bi bi-play h4 custom-icon"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Actions") }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="min-height: 126px;">
                                        <div class="row">
                                            <ul class="list-group list-group-flush bg-none">
                                                @can('test-technique-create-test-fiche-candidat')
                                                    <li class="list-group-item text-secondary" style="border-top: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-plus-square" style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modal-affect-test-to-candidate" style="color: #6f7880"><span >{{ __("generated.Inscrire à un test") }}</span> </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endcan
                                                @can('test-technique-create-test-fiche-candidat')
                                                    <li class="list-group-item text-secondary" style="border-top: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-plus-square" style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modal-affect-test-manuel-to-candidate" style="color: #6f7880"><span >{{ __("generated.Inscrire à un test manuel") }}</span> </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endcan
                                                @can('test-technique-create-tests-Métier-fiche-candidat')
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-ui-checks-grid" style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#emailcompose3" style="color: #6f7880"><span >{{ __("generated.Tests par métier") }}</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endcan
                                                @can('test-technique-edit-details-candidat-fiche-candidat')
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-pencil-square" style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                            <a href="{{route('technicalTest.edit.candidate', $candidate->id )}}" style="color: #6f7880"><span >{{ __("generated.Modifier les détails du candidat") }}</span> </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endcan
                                                <li class="list-group-item text-secondary">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <i class="bi bi-sliders" style="color: #2473cf !important;"></i>
                                                        </div>
                                                        <div class="col-auto ps-0">
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#emailcompose" style="color: #6f7880"> <span >{{ __("generated.Paramètres pour l'évaluation") }}</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                @can('test-technique-envoyer-test-candidat-fiche-candidat')
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-send" style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#send-mail-test" style="color: #6f7880"><span >{{ __("generated.Envoyer les tests au candidat") }}</span> </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endcan
{{--                                                <li class="list-group-item text-secondary" style="border-bottom: 1px solid #00000016;">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-auto">--}}
{{--                                                            <i class="bi bi-lock" style="color: #2473cf !important;"></i>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-auto ps-0">--}}
{{--                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#emailcompose5" style="color: #6f7880">Mot de passe temporaire</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('test-technique-listing-fiche-candidat')
                <div style="width: 77%" class="col-9">
                    <div class="card border-0" >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table " data-show-toggle="true" id="testResultTable" style="width: 100%">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                            <tr style="vertical-align: middle;">
                                                                <th  style="font-weight: 600;text-align: left;width: 328px;" >{{ __("generated.Test") }}</th>
                                                                <th  style="font-weight: 600;text-align: left;width: 130px;">{{ __("generated.Langue") }}</th>
                                                                <th  style="font-weight: 600;width: 134px;">{{ __("generated.Statut") }}</th>
                                                                <th  style="font-weight: 600;width: 183px;">{{ __("generated.Date de passage") }}</th>
                                                                <th  style="font-weight: 600;width: 120px;">{{ __("generated.Résultat") }}</th>
                                                                <th  style="font-weight: 600;text-align: right;width: 71px;">{{ __("generated.Action") }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">
    {{--                                                        <tr>--}}
    {{--                                                            <td style="vertical-align: middle">--}}
    {{--                                                                <img src="{{asset('assets/img/icon/quiz/226051.webp')}}" style="width: 23px;">--}}
    {{--                                                                &nbsp;&nbsp;Python - Avancé--}}
    {{--                                                            </td>--}}
    {{--                                                            <td style="vertical-align: middle">Anglais</td>--}}
    {{--                                                            <td style="vertical-align: middle">Terminé</td>--}}
    {{--                                                            <td style="vertical-align: middle">09-07-2024</td>--}}
    {{--                                                            <td style="vertical-align: middle">95/100</td>--}}
    {{--                                                            <td style="text-align: right;vertical-align: middle">--}}
    {{--                                                                <a href="fiche-candidat-test-detail.html"><i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Détail" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i></a>--}}
    {{--                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#emailcompose6"><i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifer" style="font-size: 19px;color: #2473cf;"></i></a>--}}
    {{--                                                            </td>--}}
    {{--                                                        </tr>--}}
    {{--                                                        <tr>--}}
    {{--                                                            <td style="vertical-align: middle">--}}
    {{--                                                                <img src="{{asset('assets/img/icon/quiz/React.webp')}}" style="width: 23px;">--}}
    {{--                                                                &nbsp;&nbsp;React - Intermédiaire--}}
    {{--                                                            </td>--}}
    {{--                                                            <td style="vertical-align: middle">Français</td>--}}
    {{--                                                            <td style="vertical-align: middle">Terminé</td>--}}
    {{--                                                            <td style="vertical-align: middle">09-07-2024</td>--}}
    {{--                                                            <td style="vertical-align: middle">26/26</td>--}}
    {{--                                                            <td style="text-align: right;vertical-align: middle">--}}
    {{--                                                                <a href="fiche-candidat-test.html"><i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" title="Détail" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i></a>--}}
    {{--                                                                <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifer" style="font-size: 19px;color: #2473cf;"></i>--}}
    {{--                                                            </td>--}}
    {{--                                                        </tr>--}}
    {{--                                                        <tr>--}}
    {{--                                                            <td style="vertical-align: middle">--}}
    {{--                                                                <img src="{{asset('assets/img/icon/quiz/javascript.png')}}" style="width: 23px;">--}}
    {{--                                                                &nbsp;&nbsp;JavaScript - Intermédiaire--}}
    {{--                                                            </td>--}}
    {{--                                                            <td style="vertical-align: middle">Français</td>--}}
    {{--                                                            <td style="vertical-align: middle">A passer</td>--}}
    {{--                                                            <td style="vertical-align: middle"></td>--}}
    {{--                                                            <td style="vertical-align: middle">Résultat en cours</td>--}}
    {{--                                                            <td style="text-align: right;vertical-align: middle">--}}
    {{--                                                                <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifer" style="font-size: 19px;color: #2473cf;"></i>--}}
    {{--                                                            </td>--}}
    {{--                                                        </tr>--}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

</main>


<div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content theme-blue bg-gradient-theme-light" style="width: 1799px;">
            <div class="modal-header d-block" style="width: 1048px;border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                                <i class="bi bi-sliders h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Paramètres pour l'évaluation") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" style="width: 1048px;">
                <div class="row mb-3 mt-3">
                    <div style="padding-left: 24px;" class="col-6">
                        <ul class="list-group list-group-flush bg-none">
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-9 ps-0">
                                      <span >{{ __("generated.Permettre au candidat de répondre") }}</span> &nbsp;<strong >{{ __("generated.Je ne sais pas") }}</strong>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-9 ps-0 ">{{ __("generated.Interrompre et reprendre le test") }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-10 ps-0 ">{{ __("generated.Permettre au candidat de commenter les questions") }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-9 ps-0 ">{{ __("generated.Permettre d'afficher le résultat à la fin du test") }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-12 ps-0 " style="font-weight: 700">{{ __("generated.Modalité d'envoi des rapports aux candidats") }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-9 ps-0 ">{{ __("generated.Rapport par e-mail") }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                        </div>
                                    </div>
                                    <div class="col-9 ps-0 ">{{ __("generated.Rapport dans l'espace candidat") }}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 ms-auto" style="margin-left: 67px !important;margin-top: 8px;">
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="country1" required="">
                                            <option selected="" value="" >{{ __("generated.Personne") }}</option>
                                            <option >{{ __("generated.Farida EL WAFA") }}</option>
                                            <option >{{ __("generated.Omar BENKIRANE") }}</option>
                                            <option >{{ __("generated.Jaouad FATHALLAH") }}</option>
                                        </select>
                                        <label for="country1" >{{ __("generated.Envoyer le rapport de passage à") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="country1" required="">
                                            <option value="1" selected="selected" >{{ __("generated.Jamais") }}</option>
                                            <option value="5" >{{ __("generated.Le candidat a demandé à ne pas recevoir de message de rappel") }}</option>
                                            <option value="3"> <span >{{ __("generated.Tous les") }}</span> 3 <span >{{ __("generated.jours") }}</span> </option>
                                            <option value="2" >{{ __("generated.Tous les jours") }}</option>
                                            <option value="4" >{{ __("generated.Toutes les semaines") }}</option>
                                        </select>
                                        <label for="country1" >{{ __("generated.Envoyer un mail de relance au candidat") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="country1" required="">
                                            <option value="-1" >{{ __("generated.Pas de fonction attribuée") }}</option>
                                            <option value="3159" >{{ __("generated.Responsable Ressource Humaine") }}</option>
                                            <option value="3159" >{{ __("generated.Chef de projet") }}</option>
                                        </select>
                                        <label for="country1" >{{ __("generated.Fonction") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch">
                            <button class="btn btn-theme mnw-100 bg-blue" style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button data-bs-toggle="modal" data-bs-target="#emailcompose" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-affect-test-to-candidate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 702px">
        <div class="modal-content theme-blue bg-gradient-theme-light" style="width: 1799px;">
            <div class="modal-header d-block" style="width: 1048px;border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                                <i  class="bi bi-plus-square h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Inscrire à un test") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" style="width: 1048px;">
                <div class="row mb-3 mt-3">
                    <div style="padding-left: 24px;padding-top: 20px;" class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="language-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez une langue") }}</option>
                                            @foreach ($languages as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach
                                            </select>
                                            <label class="hidlab ">{{ __("generated.Langue") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="group-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez une catégorie") }}</option>
                                            @foreach($groups as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach
                                            </select>
                                            <label class="hidlab ">{{ __("generated.Catégorie") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="category-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez un sujet") }}</option>
                                                @foreach($categories as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach


                                            </select>
                                            <label class="hidlab ">{{ __("generated.Sujet") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="test-select" style="padding-top: 24px;">

                                            </select>
                                            <label class="hidlab ">{{ __("generated.Test") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-flush bg-none">
                                    <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="nee_ful_scr">
                                                </div>
                                            </div>
                                            <div class="col-9 ps-0 ">{{ __("generated.Avec e-surveillance") }}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="add_pro">
                                                </div>
                                            </div>
                                            <div class="col-9 ps-0 ">{{ __("generated.Plein écran") }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 ms-auto" style="margin-left: 67px !important;">
                        <div class="form-group mb-3 position-relative check-valid" >
                            <div class="input-group input-group-lg" style="">
                                <div class="form-floating" style="">
                                    <div id="test-details"
                                          class="form-control border-start-0 h-auto" rows="6" style="text-align: justify;padding: 37px 18px 30px;!i;!;">
                                        <b class="description-test">

                                        </b>


                                        <br><br>

                                        <b >{{ __("generated.Nombre de questions :") }}</b>  <span class="question-count"> </span><br><br>

                                        <b >{{ __("generated.Temps maximal (en minutes) :") }}</b> <span class="max-time"> </span>
                                    </div>
                                    <label class="hidlab ">{{ __("generated.Description") }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button id="save-draft" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer Brouillon") }}</button>
                            <button id="invite-test-candidate" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-affect-test-manuel-to-candidate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 702px">
        <div class="modal-content theme-blue bg-gradient-theme-light" style="width: 1799px;">
            <div class="modal-header d-block" style="width: 1048px;border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                                <i  class="bi bi-plus-square h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Inscrire à un test manuel") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" style="width: 1048px;">
                <div class="row mb-3 mt-3">
                    <div style="padding-left: 24px;padding-top: 20px;" class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="manual-client-select" style="padding-top: 24px;">
                                                <option value="" class="translated_text">Sélectionnez un client</option>
                                            @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                                @endforeach
                                            </select>
                                            <label class="hidlab translated_text">Client</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" name="job_offer_id" id="manual-missions-select" style="padding-top: 24px;">
                                                <option value="" class="translated_text">Sélectionnez une mission</option>

                                            </select>
                                            <label class="hidlab translated_text">Mission</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="manual-language-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez une langue") }}</option>
                                            @foreach ($languages as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach
                                            </select>
                                            <label class="hidlab ">{{ __("generated.Langue") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="manual-group-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez une catégorie") }}</option>
                                            @foreach($groups as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach
                                            </select>
                                            <label class="hidlab ">{{ __("generated.Catégorie") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="manual-category-select" style="padding-top: 24px;">
                                                <option value="" >{{ __("generated.Sélectionnez un sujet") }}</option>
                                                @foreach($categories as $key=>$value)
                                                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                                                @endforeach


                                            </select>
                                            <label class="hidlab ">{{ __("generated.Sujet") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="manual-test-select" style="padding-top: 24px;">

                                            </select>
                                            <label class="hidlab ">{{ __("generated.Test") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-flush bg-none">
                                    <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="nee_ful_scr">
                                                </div>
                                            </div>
                                            <div class="col-9 ps-0 ">{{ __("generated.Avec e-surveillance") }}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item text-secondary" style="padding: 0.22rem 0.75rem;border: 0;">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="add_pro">
                                                </div>
                                            </div>
                                            <div class="col-9 ps-0 ">{{ __("generated.Plein écran") }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 ms-auto" style="margin-left: 67px !important;">
                        <div class="form-group mb-3 position-relative check-valid" >
                            <div class="input-group input-group-lg" style="">
                                <div class="form-floating" style="">
                                    <div id="manual-test-details"
                                          class="form-control border-start-0 h-auto" rows="6" style="text-align: justify;padding: 37px 18px 30px;!i;!;">
                                        <b class="manual-description-test">

                                        </b>


                                        <br><br>

                                        <b >{{ __("generated.Nombre de questions :") }}</b>  <span class="manual-question-count"> </span><br><br>

                                        <b >{{ __("generated.Temps maximal (en minutes) :") }}</b> <span class="manual-max-time"> </span>
                                    </div>
                                    <label class="hidlab ">{{ __("generated.Description") }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button id="save-manual-draft" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer Brouillon") }}</button>
                            <button id="invite-test-manual-candidate" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailcompose3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 525px;">
        <div class="modal-content theme-blue bg-gradient-theme-light">
            <div class="modal-header d-block" style="border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <i  class="bi bi-ui-checks-grid h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Tests par métier") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" >
                <div class="row mb-3 mt-3">
                    <div style="padding-left: 12px;padding-top: 20px;" class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                    <div class="form-floating">
                                        <textarea style="padding-top: 11px;color: #0000008f !important;" placeholder="" class="form-control border-start-0 h-auto " rows="4">{{ __("generated.Entrez un intitulé ou une description de poste, plus la description est précise, plus la recommandation sera pertinente.") }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch" style="margin-right: -15px">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button data-bs-toggle="modal" data-bs-target="#emailcompose" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Enregistrer") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="send-mail-test"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 525px;">
        <div class="modal-content theme-blue bg-gradient-theme-light">
            <div class="modal-header d-block" >
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <i  class="bi bi-send h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Envoyer les tests au candidat") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" >
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <div class="input-box">
                            <label class="input-label ">{{ __("generated.Destinataires") }}</label>
                            <input type="text" class="input-1 destinataires" onfocus="setFocus(true)" onblur="setFocus(false)">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <div class="input-box">
                            <label class="input-label ">{{ __("generated.CC") }}</label>
                            <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                        </div>
                    </div>
                </div>

                <p class="text-secondary ">{{ __("generated.Votre message") }}</p>
                <div class="form-control border" id="ckeditor" style="display: none;"></div>
                <div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr" lang="en" aria-labelledby="ck-editor__label_e889a9a16225ce53ddb0fa9c6ac9a28ad"><label class="ck ck-label ck-voice-label " id="ck-editor__label_e889a9a16225ce53ddb0fa9c6ac9a28ad">{{ __("generated.Rich Text Editor") }}</label><div class="ck ck-editor__top ck-reset_all" role="presentation"><div class="ck ck-sticky-panel"><div class="ck ck-sticky-panel__placeholder" style="display: none;"></div><div class="ck ck-sticky-panel__content"><div class="ck ck-toolbar ck-toolbar_grouping" role="toolbar" aria-label="Editor toolbar"><div class="ck ck-toolbar__items"><div class="ck ck-dropdown ck-heading-dropdown"><button class="ck ck-button ck-off ck-button_with-text ck-dropdown__button" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_ea4a25b6a0d3ac1be0e498453311cd9f5" aria-haspopup="true"><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Heading</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_ea4a25b6a0d3ac1be0e498453311cd9f5">Paragraph</span><svg class="ck ck-icon ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se"><ul class="ck ck-reset ck-list"><li class="ck ck-list__item"><button class="ck ck-button ck-heading_paragraph ck-on ck-button_with-text" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e87d34668dd2a26a9a8b3711512b93c35"><span class="ck ck-tooltip ck-tooltip_s ck-hidden"><span class="ck ck-tooltip__text"></span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e87d34668dd2a26a9a8b3711512b93c35">Paragraph</span></button></li><li class="ck ck-list__item"><button class="ck ck-button ck-heading_heading1 ck-off ck-button_with-text" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e85cc2fb791f304f1404e3a66c0b0797a"><span class="ck ck-tooltip ck-tooltip_s ck-hidden"><span class="ck ck-tooltip__text"></span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e85cc2fb791f304f1404e3a66c0b0797a">Heading 1</span></button></li><li class="ck ck-list__item"><button class="ck ck-button ck-heading_heading2 ck-off ck-button_with-text" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e2fdca9896a3d870a3f0ccf9c1f3fe019"><span class="ck ck-tooltip ck-tooltip_s ck-hidden"><span class="ck ck-tooltip__text"></span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e2fdca9896a3d870a3f0ccf9c1f3fe019">Heading 2</span></button></li><li class="ck ck-list__item"><button class="ck ck-button ck-heading_heading3 ck-off ck-button_with-text" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e6fcd885e0bfc205091a143c6fa1c02eb"><span class="ck ck-tooltip ck-tooltip_s ck-hidden"><span class="ck ck-tooltip__text"></span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e6fcd885e0bfc205091a143c6fa1c02eb">Heading 3</span></button></li></ul></div></div><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e0bb186f4744098d5ce2775c67de42f2d" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M10.187 17H5.773c-.637 0-1.092-.138-1.364-.415-.273-.277-.409-.718-.409-1.323V4.738c0-.617.14-1.062.419-1.332.279-.27.73-.406 1.354-.406h4.68c.69 0 1.288.041 1.793.124.506.083.96.242 1.36.478.341.197.644.447.906.75a3.262 3.262 0 0 1 .808 2.162c0 1.401-.722 2.426-2.167 3.075C15.05 10.175 16 11.315 16 13.01a3.756 3.756 0 0 1-2.296 3.504 6.1 6.1 0 0 1-1.517.377c-.571.073-1.238.11-2 .11zm-.217-6.217H7v4.087h3.069c1.977 0 2.965-.69 2.965-2.072 0-.707-.256-1.22-.768-1.537-.512-.319-1.277-.478-2.296-.478zM7 5.13v3.619h2.606c.729 0 1.292-.067 1.69-.2a1.6 1.6 0 0 0 .91-.765c.165-.267.247-.566.247-.897 0-.707-.26-1.176-.778-1.409-.519-.232-1.31-.348-2.375-.348H7z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Bold (Ctrl+B)</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e0bb186f4744098d5ce2775c67de42f2d">Bold</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_ec206dbb0f021437acffb0f2d70f716ef" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="m9.586 14.633.021.004c-.036.335.095.655.393.962.082.083.173.15.274.201h1.474a.6.6 0 1 1 0 1.2H5.304a.6.6 0 0 1 0-1.2h1.15c.474-.07.809-.182 1.005-.334.157-.122.291-.32.404-.597l2.416-9.55a1.053 1.053 0 0 0-.281-.823 1.12 1.12 0 0 0-.442-.296H8.15a.6.6 0 0 1 0-1.2h6.443a.6.6 0 1 1 0 1.2h-1.195c-.376.056-.65.155-.823.296-.215.175-.423.439-.623.79l-2.366 9.347z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Italic (Ctrl+I)</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_ec206dbb0f021437acffb0f2d70f716ef">Italic</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_ea2b6566baa0566d7b919f5601dfe6eb9" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="m11.077 15 .991-1.416a.75.75 0 1 1 1.229.86l-1.148 1.64a.748.748 0 0 1-.217.206 5.251 5.251 0 0 1-8.503-5.955.741.741 0 0 1 .12-.274l1.147-1.639a.75.75 0 1 1 1.228.86L4.933 10.7l.006.003a3.75 3.75 0 0 0 6.132 4.294l.006.004zm5.494-5.335a.748.748 0 0 1-.12.274l-1.147 1.639a.75.75 0 1 1-1.228-.86l.86-1.23a3.75 3.75 0 0 0-6.144-4.301l-.86 1.229a.75.75 0 0 1-1.229-.86l1.148-1.64a.748.748 0 0 1 .217-.206 5.251 5.251 0 0 1 8.503 5.955zm-4.563-2.532a.75.75 0 0 1 .184 1.045l-3.155 4.505a.75.75 0 1 1-1.229-.86l3.155-4.506a.75.75 0 0 1 1.045-.184z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Link (Ctrl+K)</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_ea2b6566baa0566d7b919f5601dfe6eb9">Link</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e897f33c6be0929e6947f05ea2980e318" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0C1 4.784 1.777 4 2.75 4c.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75C1.784 7.5 1 6.723 1 5.75zm6 9c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0c0-.966.777-1.75 1.75-1.75.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75-.966 0-1.75-.777-1.75-1.75z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Bulleted List</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e897f33c6be0929e6947f05ea2980e318">Bulleted List</span></button><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_eae079b970f0bba3e2baed7bcfe2015fd" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM3.5 3v5H2V3.7H1v-1h2.5V3zM.343 17.857l2.59-3.257H2.92a.6.6 0 1 0-1.04 0H.302a2 2 0 1 1 3.995 0h-.001c-.048.405-.16.734-.333.988-.175.254-.59.692-1.244 1.312H4.3v1h-4l.043-.043zM7 14.75a.75.75 0 0 1 .75-.75h9.5a.75.75 0 1 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Numbered List</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_eae079b970f0bba3e2baed7bcfe2015fd">Numbered List</span></button><span class="ck ck-toolbar__separator"></span><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e9063bd47baa5146e80e78be9e54454f5" aria-disabled="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zm1.618-9.55L.98 9.358a.4.4 0 0 0 .013.661l3.39 2.207A.4.4 0 0 0 5 11.892V7.275a.4.4 0 0 0-.632-.326z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Decrease indent</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e9063bd47baa5146e80e78be9e54454f5">Decrease indent</span></button><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_eac7855c958f202cdd0ea466c2950ecb5" aria-disabled="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M2 3.75c0 .414.336.75.75.75h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 0 0-.75.75zm5 6c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM2.75 16.5h14.5a.75.75 0 1 0 0-1.5H2.75a.75.75 0 1 0 0 1.5zM1.632 6.95 5.02 9.358a.4.4 0 0 1-.013.661l-3.39 2.207A.4.4 0 0 1 1 11.892V7.275a.4.4 0 0 1 .632-.326z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Increase indent</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_eac7855c958f202cdd0ea466c2950ecb5">Increase indent</span></button><span class="ck ck-toolbar__separator"></span></div><span class="ck ck-toolbar__separator"></span><div class="ck ck-dropdown ck-toolbar__grouped-dropdown ck-toolbar-dropdown"><button class="ck ck-button ck-off ck-dropdown__button" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e8e59b6a3b80ca934596684bbb598c8d5" aria-haspopup="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><circle cx="9.5" cy="4.5" r="1.5"></circle><circle cx="9.5" cy="10.5" r="1.5"></circle><circle cx="9.5" cy="16.5" r="1.5"></circle></svg><span class="ck ck-tooltip ck-tooltip_sw"><span class="ck ck-tooltip__text">Show more items</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e8e59b6a3b80ca934596684bbb598c8d5">Show more items</span><svg class="ck ck-icon ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se"><div class="ck ck-toolbar" role="toolbar" aria-label="Dropdown toolbar"><div class="ck ck-toolbar__items"><span class="ck-file-dialog-button"><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e5a40dfadf62da2f90a5565d19a0ce565"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M6.91 10.54c.26-.23.64-.21.88.03l3.36 3.14 2.23-2.06a.64.64 0 0 1 .87 0l2.52 2.97V4.5H3.2v10.12l3.71-4.08zm10.27-7.51c.6 0 1.09.47 1.09 1.05v11.84c0 .59-.49 1.06-1.09 1.06H2.79c-.6 0-1.09-.47-1.09-1.06V4.08c0-.58.49-1.05 1.1-1.05h14.38zm-5.22 5.56a1.96 1.96 0 1 1 3.4-1.96 1.96 1.96 0 0 1-3.4 1.96z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Insert image</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e5a40dfadf62da2f90a5565d19a0ce565">Insert image</span></button><input class="ck-hidden" type="file" tabindex="-1" accept="image/jpeg,image/png,image/gif,image/bmp,image/webp,image/tiff" multiple="true"></span><button class="ck ck-button ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_eff719357dfb34732e66cb116ef751ad3" aria-pressed="false"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M3 10.423a6.5 6.5 0 0 1 6.056-6.408l.038.67C6.448 5.423 5.354 7.663 5.22 10H9c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574zm8 0a6.5 6.5 0 0 1 6.056-6.408l.038.67c-2.646.739-3.74 2.979-3.873 5.315H17c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Block quote</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_eff719357dfb34732e66cb116ef751ad3">Block quote</span></button><div class="ck ck-dropdown"><button class="ck ck-button ck-off ck-dropdown__button" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e472a2afdd07174e0e83a2869dfa9da66" aria-haspopup="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M3 6v3h4V6H3zm0 4v3h4v-3H3zm0 4v3h4v-3H3zm5 3h4v-3H8v3zm5 0h4v-3h-4v3zm4-4v-3h-4v3h4zm0-4V6h-4v3h4zm1.5 8a1.5 1.5 0 0 1-1.5 1.5H3A1.5 1.5 0 0 1 1.5 17V4c.222-.863 1.068-1.5 2-1.5h13c.932 0 1.778.637 2 1.5v13zM12 13v-3H8v3h4zm0-4V6H8v3h4z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Insert table</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e472a2afdd07174e0e83a2869dfa9da66">Insert table</span><svg class="ck ck-icon ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se"></div></div><div class="ck ck-dropdown"><button class="ck ck-button ck-off ck-dropdown__button" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e440d6ee9f25341c12aee363d010be07c" aria-haspopup="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M18.68 3.03c.6 0 .59-.03.59.55v12.84c0 .59.01.56-.59.56H1.29c-.6 0-.59.03-.59-.56V3.58c0-.58-.01-.55.6-.55h17.38zM15.77 15V5H4.2v10h11.57zM2 4v1h1V4H2zm0 2v1h1V6H2zm0 2v1h1V8H2zm0 2v1h1v-1H2zm0 2v1h1v-1H2zm0 2v1h1v-1H2zM17 4v1h1V4h-1zm0 2v1h1V6h-1zm0 2v1h1V8h-1zm0 2v1h1v-1h-1zm0 2v1h1v-1h-1zm0 2v1h1v-1h-1zM7.5 7.177a.4.4 0 0 1 .593-.351l5.133 2.824a.4.4 0 0 1 0 .7l-5.133 2.824a.4.4 0 0 1-.593-.35V7.176v.001z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Insert media</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e440d6ee9f25341c12aee363d010be07c">Insert media</span><svg class="ck ck-icon ck-dropdown__arrow" viewBox="0 0 10 10"><path d="M.941 4.523a.75.75 0 1 1 1.06-1.06l3.006 3.005 3.005-3.005a.75.75 0 1 1 1.06 1.06l-3.549 3.55a.75.75 0 0 1-1.168-.136L.941 4.523z"></path></svg></button><div class="ck ck-reset ck-dropdown__panel ck-dropdown__panel_se"><form class="ck ck-media-form ck-responsive-form" tabindex="-1"><div class="ck ck-labeled-field-view ck-labeled-field-view_empty"><div class="ck ck-labeled-field-view__input-wrapper"><input class="ck ck-input ck-input-text_empty ck-input-text" id="ck-labeled-field-view-ea842220962a283b059f71b156c9aa793" inputmode="text" aria-describedby="ck-labeled-field-view-status-e0e18e281a17bb0c274c61e79400b841b" type="text"><label class="ck ck-label" id="ck-editor__label_e9c741bec93e7bd2f0259fb4299f7a7a1" for="ck-labeled-field-view-ea842220962a283b059f71b156c9aa793">Media URL</label></div><div class="ck ck-labeled-field-view__status" id="ck-labeled-field-view-status-e0e18e281a17bb0c274c61e79400b841b">Paste the media URL in the input.</div></div><button class="ck ck-button ck-disabled ck-off ck-button-save" type="submit" tabindex="-1" aria-labelledby="ck-editor__aria-label_edcae5985874232494b57d069c9423144" aria-disabled="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="M6.972 16.615a.997.997 0 0 1-.744-.292l-4.596-4.596a1 1 0 1 1 1.414-1.414l3.926 3.926 9.937-9.937a1 1 0 0 1 1.414 1.415L7.717 16.323a.997.997 0 0 1-.745.292z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Save</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_edcae5985874232494b57d069c9423144">Save</span></button><button class="ck ck-button ck-off ck-button-cancel" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e68d261fb615ce118cd312105251d368f"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="m11.591 10.177 4.243 4.242a1 1 0 0 1-1.415 1.415l-4.242-4.243-4.243 4.243a1 1 0 0 1-1.414-1.415l4.243-4.242L4.52 5.934A1 1 0 0 1 5.934 4.52l4.243 4.243 4.242-4.243a1 1 0 1 1 1.415 1.414l-4.243 4.243z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Cancel</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e68d261fb615ce118cd312105251d368f">Cancel</span></button></form></div></div><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e69fb046315bdef44219308b747203fd0" aria-disabled="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="m5.042 9.367 2.189 1.837a.75.75 0 0 1-.965 1.149l-3.788-3.18a.747.747 0 0 1-.21-.284.75.75 0 0 1 .17-.945L6.23 4.762a.75.75 0 1 1 .964 1.15L4.863 7.866h8.917A.75.75 0 0 1 14 7.9a4 4 0 1 1-1.477 7.718l.344-1.489a2.5 2.5 0 1 0 1.094-4.73l.008-.032H5.042z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Undo (Ctrl+Z)</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e69fb046315bdef44219308b747203fd0">Undo</span></button><button class="ck ck-button ck-disabled ck-off" type="button" tabindex="-1" aria-labelledby="ck-editor__aria-label_e5bb39616df42b9e5ad1cf0a541e3a3e0" aria-disabled="true"><svg class="ck ck-icon ck-button__icon" viewBox="0 0 20 20"><path d="m14.958 9.367-2.189 1.837a.75.75 0 0 0 .965 1.149l3.788-3.18a.747.747 0 0 0 .21-.284.75.75 0 0 0-.17-.945L13.77 4.762a.75.75 0 1 0-.964 1.15l2.331 1.955H6.22A.75.75 0 0 0 6 7.9a4 4 0 1 0 1.477 7.718l-.344-1.489A2.5 2.5 0 1 1 6.039 9.4l-.008-.032h8.927z"></path></svg><span class="ck ck-tooltip ck-tooltip_s"><span class="ck ck-tooltip__text">Redo (Ctrl+Y)</span></span><span class="ck ck-button__label" id="ck-editor__aria-label_e5bb39616df42b9e5ad1cf0a541e3a3e0">Redo</span></button></div></div></div></div></div></div></div></div><div class="ck ck-editor__main" role="presentation" style="width: 498px;">
                    <div class="ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred" lang="en" dir="ltr" role="textbox" aria-label="Rich Text Editor, main" contenteditable="true" style="width: 492px;height: 198px;"><p><br data-cke-filler="true"></p></div></div></div>

            </div>
            <div class="modal-footer" style="padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch" style="margin-right: -15px">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button data-bs-toggle="modal" data-bs-target="#emailcompose" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Envoyer") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailcompose5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 525px;">
        <div class="modal-content theme-blue bg-gradient-theme-light">
            <div class="modal-header d-block" style="background-color: #fff;border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <i  class="bi bi-lock h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Mot de passe temporaire") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" >
                <div class="row">
                    <div class="col-12 col-md-12 mb-2">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __("generated.Mot de passe") }}" value="" required="" class="form-control border-start-0 translated_text">
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
                                    <input type="text" placeholder="{{ __("generated.Confirmer le mot de passe") }}" value="" required="" class="form-control border-start-0 translated_text">
                                    <label >{{ __("generated.Confirmer le mot de passe") }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #d2e3f6;padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch" style="margin-right: -15px">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                            <button data-bs-toggle="modal" data-bs-target="#emailcompose" class="btn btn-theme mnw-100 bg-green " style="float: right;font-size: 14px;margin-left: 10px;">{{ __("generated.Valider") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailcompose6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 525px;">
        <div class="modal-content theme-blue bg-gradient-theme-light">
            <div class="modal-header d-block" style="background-color: #fff;border-bottom: 0;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <i  class="bi bi-pencil-square h5 avatar   rounded"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Modifier le test") }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" >
                <div class="row justify-content-center">
                    <div class="col-6 mb-2 mt-2">
                        <button class="btn btn-theme modal-btn btn-modal1 " style="font-size: 14px;padding: 10px 29px;background-color: transparent;border: 1px solid #005dc7;color: #005dc7;width: 100%">{{ __("generated.Désactiver le test") }}</button>
                    </div>
                    <div class="col-6 mb-2 mt-2" style="width: 48%">
                        <button class="btn btn-theme modal-btn btn-modal2 " style="font-size: 14px;padding: 10px 29px;background-color: transparent;border: 1px solid #005dc7;color: #005dc7;width: 100%">{{ __("generated.Relancer le test") }}</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #d2e3f6;padding: 16px;border: 0">
                <div class="row">
                    <div class="col-12 ms-auto">
                        <div class="form-check form-switch" style="margin-right: -15px">
                            <button class="btn btn-theme mnw-100 bg-blue " style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __("generated.Annuler") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js_footer')

    @include('profile.inc.translation')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script>
        var apiFetchingTests = "{{ route('api.testsTechniques.fetch') }}"
        var apiFetchingTestsManual = "{{ route('api.testsTechniques.manual.fetch') }}"

        var ApiTestGetDetails = "{{ route('api.testsTechniques.getDetails') }}"

        var ApiTestResult = "{{ route('api.testsTechniques.createTestResult') }}"
        var ApiAssignTestToCandidate = "{{ route('api.testsTechniques.assignTestToCandidate') }}"

        var ApiListingTestsResults = "{{ route('api.testsTechniques.listing.results') }}"

        var ApiInviteCandidateToTest = "{{ route('api.testsTechniques.inviteTestToCandidate') }}"

        var ApiSendInvitationTest = "{{ route('api.testsTechniques.sendInvitation') }}"


        var ApiDeleteTestResult = "{{ route('api.testsTechniques.deleteTestResult', ['id' => 'id']) }}"

        var jobOffers = @json($jobOffers);


        // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
        const locale = document.documentElement.lang || 'fr'; // fallback to 'fr'

        // Map locale to DataTables language file
        const dataTablesLangUrl = {
            fr: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "//cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
        }[locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    </script>

    @vite([
    'resources/js/technicalTest/fiche-candidate-test.js',
    ])



@endsection
