@extends('candidate_portal.layouts.second')

@section('title', 'Fiche du candidat')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('candidate-portal.Test technique') }}</h5>
                </div>
                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
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
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
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
                    <li class="breadcrumb-item active" aria-current="page">Liste des questions</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-3">
                    <div class="card border-0 mb-4"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="col-12">
                                                <h6 class="fw-medium mb-0" style="text-align: center">Score</h6>
                                            </div>
                                        </div>
                                        <div class="card-body" style="padding-top: 0px">
                                            <div class="row justify-content-center">
                                                <div class="col-auto">
                                                    <div class="doughnutchart mb-3 mt-3"
                                                        style="width: 120px !important;height: 120px !important;margin-bottom: 12px !important">
                                                        <canvas id="doughnutchart30"></canvas>
                                                        <div class="countvalue shadow">
                                                            <div class="w-100">
                                                                <h5 class="mb-1" style="font-size: 15px">90/100</h5>
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
                <div class="col-6" style="width: 32%;margin-left: 5.5%;">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none" style="line-height: 1;">
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;padding-bottom: 17px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    ID :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    12759
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Ahmed BENAISSA
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Créé le 09/07/24
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Langue :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Français
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Groupe :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Groupe principal
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    E-mail :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    ah.benaissa@gmail.com
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

                <div class="col-6 ms-auto" style="width: 32%;">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none" style="line-height: 1;">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <img src="{{asset('assets/img/icon/quiz/226051.webp')}}"
                                                                        style="width: 23px;margin-top: -4px;">
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Python - Avancé
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Identifiant du test :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    6474314
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Langue :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    Français
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Date de passage :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    09-07-2024
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Durée du test :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    45 minutes
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
            </div>
            <div class="row">
                <div style="width: 23%" class="col-3">
                    <div class="card border-0 mb-4"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                        style="background-color: #dde9f7 !important">
                                                        <i class="bi bi-play h4" style="color: #0a63c9"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0">Actions</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <ul class="list-group list-group-flush bg-none">
                                                    <li class="list-group-item text-secondary"
                                                        style="border-top: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-person"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a href="fiche-candidat-test.html"
                                                                    style="color: #6f7880">Fiche du candidat</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-filetype-pdf"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a target="_blank"
                                                                    href="{{asset('assets/img/cvtheque/rapport_test/abdelkhalek_haddany_11a79ed0589a14632052051dc4ab6fb5_modified.pdf')}}"
                                                                    style="color: #6f7880">Rapport du test</a>
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
                <div style="width: 77%" class="col-9">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12" style="padding: 10px 23px;">
                                                    <table class="table " data-show-toggle="true">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                            <tr style="vertical-align: middle;">
                                                                <th rowspan="2" style="font-weight: 600;text-align: left;">
                                                                    Numéro</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: left;">
                                                                    Identifiant</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: left;">
                                                                    Titre</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: center">
                                                                    Correct</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: center">
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    1
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0107
                                                                </td>
                                                                <td style="vertical-align: middle">Transformer un graphe
                                                                    représenté par une matrice d'adjacence en un graphe
                                                                    représenté
                                                                    par une liste d'adjacence&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q1.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    2
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0088
                                                                </td>
                                                                <td style="vertical-align: middle">Redéfinir une méthode
                                                                    héritée&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q2.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    3
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0181
                                                                </td>
                                                                <td style="vertical-align: middle">Trouver la date d'arrivée
                                                                    d'un paquet décrit dans un objet Json&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q3.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    4
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0134
                                                                </td>
                                                                <td style="vertical-align: middle">Additionner un
                                                                    sous-ensemble d'une liste d'entiers&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q4.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    5
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0083
                                                                </td>
                                                                <td style="vertical-align: middle">Implémenter une recherche
                                                                    dichotomique&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q5.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    6
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0183
                                                                </td>
                                                                <td style="vertical-align: middle">Créer un décorateur qui
                                                                    normalise le temps d'exécution des fonctions&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q6.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    7
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0182
                                                                </td>
                                                                <td style="vertical-align: middle">Trouver des dates à
                                                                    l'aide d'une regex&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q7.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    8
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0006
                                                                </td>
                                                                <td style="vertical-align: middle">Créer des constructeurs
                                                                    aux arguments hétérogènes&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q8.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    9
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0184
                                                                </td>
                                                                <td style="vertical-align: middle">Définir
                                                                    __new__&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-check h4 text-green"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q9.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: middle">
                                                                    10
                                                                </td>
                                                                <td style="vertical-align: middle">
                                                                    PYFR0087
                                                                </td>
                                                                <td style="vertical-align: middle">Créer une méthode pour un
                                                                    opérateur arithmétique&nbsp;<span
                                                                        class="btn   btn-link bg-light-green text-green">Code</span>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center">
                                                                    <i class="bi bi-x h4 text-red"></i>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: right">
                                                                    <a href="Q10.html">
                                                                        <i class="bi bi-file-earmark-text"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Voir la question et la réponse du candidat"
                                                                            style="font-size: 19px;margin-right: 9px;color: #2473cf;"
                                                                            aria-label="Détail"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
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
            </div>
        </div>

    </main>
@endsection


@section('js_footer')

@endsection