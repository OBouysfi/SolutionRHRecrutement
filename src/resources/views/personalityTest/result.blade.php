@extends('layouts.master')

@section('title', 'Résultats des tests')

@section('css_header')
@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
            </div>
            
            <div class="col col-sm-auton translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                 title="{{ __("generated.contact") }}">
                <a href="{{ route('support.index') }}" class="text-decoration-none">
                    <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="contact">
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
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Résultats des tests") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">

        <div class="row mb-4">
            <div style="width: 23%" class="col-3">
                <div class="card border-0 mb-4"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme" style="background-color: #dde9f7 !important">
                                                    <i class="bi bi-play h5" style="color: #0a63c9"></i>
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
                                                <li class="list-group-item text-secondary" style="border-top: 1px solid #00000016;">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <i class="bi bi-plus-square" style="color: #2473cf !important;"></i>
                                                        </div>
                                                        <div class="col-auto ps-0">
                                                            <a href="ajouter-candidat-test.html" style="color: #6f7880" >{{ __("generated.Rapports de groupe") }}</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item text-secondary" style="border-bottom: 1px solid #00000016;">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <i class="bi bi-people" style="color: #2473cf !important;"></i>
                                                        </div>
                                                        <div class="col-auto ps-0 ">{{ __("generated.Actions sur le groupe") }}</div>
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
                <div class="card border-0"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme" style="background-color: #dde9f7 !important">
                                                    <i class="bi bi-funnel h5" style="color: #0a63c9"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Filtres") }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="min-height: 126px;">
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="input-group ">
                                                    <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                                                    <input type="text" class="form-control translated_text" placeholder="{{ __("generated.Search...") }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" id="click2e3" style="padding-top: 24px;">
                                                                <option selected >{{ __("generated.Tous les groupes") }}</option>
                                                                <option >{{ __("generated.Bureautique") }}</option>
                                                                <option >{{ __("generated.CAO / DAO") }}</option>
                                                                <option >{{ __("generated.Multimédia") }}</option>
                                                                <option >{{ __("generated.Codage") }}</option>
                                                                <option >{{ __("generated.Langues") }}</option>
                                                                <option >{{ __("generated.Communication") }}</option>
                                                                <option >{{ __("generated.Finance") }}</option>
                                                                <option >{{ __("generated.Transversalité") }}</option>
                                                                <option >{{ __("generated.Secrétariat") }}</option>
                                                                <option >{{ __("generated.Adaptativité") }}</option>
                                                            </select>
                                                            <label class="hidlab ">{{ __("generated.Groupe") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" id="click2e3" style="padding-top: 24px;">
                                                                <option selected >{{ __("generated.Tous les status") }}</option>
                                                                <option value="1"  >{{ __("generated.Candidat à l'embauche") }}</option>
                                                                <option value="13"  >{{ __("generated.Chef d'entreprise") }}</option>
                                                                <option value="11"  >{{ __("generated.Demandeur d'emploi") }}</option>
                                                                <option value="15"  >{{ __("generated.Etudiant") }}</option>
                                                                <option value="14"  >{{ __("generated.Indépendant") }}</option>
                                                                <option value="12">Militaire</option>
                                                                <option value="10"  >{{ __("generated.Salarié") }}</option>
                                                                <option value="9"  >{{ __("generated.Stagiaire en formation") }}</option>
                                                            </select>
                                                            <label class="hidlab ">{{ __("generated.Statut") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" id="click2e3" style="padding-top: 24px;">
                                                                <option value="-1" >{{ __("generated.Tous les types de test") }}</option>
                                                                <option value="10" >{{ __("generated.Evaluation") }}</option>
                                                                <option value="70" >{{ __("generated.Evaluation propriétaire") }}</option>
                                                                <option value="94" >{{ __("generated.Test de configuration") }}</option>
                                                            </select>
                                                            <label class="hidlab ">{{ __("generated.Type de test") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <ul class="list-group list-group-flush bg-none">
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                                                </div>
                                                            </div>
                                                            <div class="col-9 ps-0">
                                                                <p style="color: #6e777f;" >{{ __("generated.Surveiller à distance") }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="form-check form-switch" >
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                                                </div>
                                                            </div>
                                                            <div class="col-9 ps-0">
                                                                <p style="color: #6e777f;" >{{ __("generated.Archiver les résultats") }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-left: 13px;">
                                            <div class="col-12 mb-3">
                                                <label style="margin-bottom: 10px;color: #6e777f" >{{ __("generated.Période du :") }}</label>
                                                <div class="input-group " style="width: 50%;">
                                                    <input type="date" class="form-control" style="color: #6e777f">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label style="margin-bottom: 10px;color: #6e777f" >{{ __("generated.au :") }}</label>
                                                <div class="input-group " style="width: 50%;">
                                                    <input type="date" class="form-control" style="color: #6e777f">
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
            <div style="width: 77%" class="col-9">
                <div class="card border-0"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table " data-show-toggle="true">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr style="vertical-align: middle;">
                                                            <th rowspan="2" style="font-weight: 600;/* text-align: center; */width: 12px;">
                                                                <input type="checkbox">
                                                            </th>
                                                            <th rowspan="2" style="font-weight: 600;text-align: left;width: 142px;" >{{ __("generated.Groupe") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;text-align: center;width: 12px;">#</th>
                                                            <th rowspan="2" style="font-weight: 600;width: 120px;" >{{ __("generated.Matricule") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;width: 134px;" >{{ __("generated.Prénom") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;width: 147px;" >{{ __("generated.Nom") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;width: 196px;" >{{ __("generated.Test") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;width: 114px;" >{{ __("generated.Date de passage") }}</th>
                                                            <th rowspan="2" style="font-weight: 600;text-align: right;width: 71px;" >{{ __("generated.Action") }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Codage") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv7.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv7.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                12759
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Ahmed
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                BENAISSA
                                                            </td>
                                                            <td style="vertical-align: middle">Python - Avancé</td>
                                                            <td style="vertical-align: middle">09-07-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Codage") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv21.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv21.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                14532
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Fatima
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                LAGHMOUCH
                                                            </td>
                                                            <td style="vertical-align: middle">React - <span >{{ __("generated.Intermédiaire") }}</span></td>
                                                            <td style="vertical-align: middle">09-07-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle"  >{{ __("generated.Codage") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv13.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv13.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                16489
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Ali
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                BENKIRAN
                                                            </td>
                                                            <td style="vertical-align: middle">JavaScript - <span >{{ __("generated.Intermédiaire") }}</span></td>
                                                            <td style="vertical-align: middle">09-07-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                Codage
                                                            </td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv23.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv23.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                17892
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Khadija
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                EL FADILI
                                                            </td>
                                                            <td style="vertical-align: middle">AutoCAD - <span >{{ __("generated.Avancé") }}</span></td>
                                                            <td style="vertical-align: middle">10-08-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Codage") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv14.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv14.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                21745
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Meryem
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                AIT LAHCEN
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Évaluation Angular (QCM)") }}</td>
                                                            <td style="vertical-align: middle">12-08-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Codage") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv20.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv20.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                1001
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Hassan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                BENNANI
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.SQL - Intermédiaire (EN)") }}</td>
                                                            <td style="vertical-align: middle">12-08-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="vertical-align: middle" >{{ __("generated.Bureautique") }}</td>
                                                            <td style="text-align: center">
                                                                <figure class="avatar avatar-50 mb-0 coverimg " style="margin: 0 auto;background-image: url(&quot;assets/img/cvtheque/cv31.jpg&quot;);">
                                                                    <img src="{{asset('assets/img/cvtheque/cv31.jpg')}}" alt="" style="display: none;">
                                                                </figure>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                1004
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Rachid
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                EL OUAADI
                                                            </td>
                                                            <td style="vertical-align: middle">VBA 2019 - <span >{{ __("generated.Avancé") }}</span> </td>
                                                            <td style="vertical-align: middle">12-08-2024</td>
                                                            <td style="vertical-align: middle;text-align: right">
                                                                <a href="fiche-candidat-test-detail.html">
                                                                    <i class="bi bi-file-earmark-text" data-bs-toggle="tooltip" data-bs-placement="top" style="font-size: 19px;margin-right: 9px;color: #2473cf;" aria-label="Détail"></i>
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


<div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="width: 458px !important;">
            <div class="modal-body d-block">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-person-add avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Ajouter un évaluateur") }}</h6>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Matricule") }}" value="" class="form-control border-start-0 translated_text">
                                <label>Matricule</label>
                            </div>
                        </div>
                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-11">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Prénom") }}" value="" class="form-control border-start-0 translated_text">
                                <label >{{ __("generated.Prénom") }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-11">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Nom") }}" value="" class="form-control border-start-0 translated_text">
                                <label >{{ __("generated.Nom") }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Poste") }}" value="" class="form-control border-start-0 translated_text">
                                <label >{{ __("generated.Poste") }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square me-2"></i> <span >{{ __("generated.Annuler") }}</span></button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i> <span >{{ __("generated.Enregistrer") }}</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailcompose2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 702px">
        <div class="modal-content">
            <div class="modal-body d-block">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-pen avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Modifier") }}</h6>
                    </div>
                </div>
                <div class="row  mb-3">
                    <div class="col-8">
                        <div class="card border-0"  >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 mb-4">
                                                        <h6 class="title custom-title ">{{ __("generated.Types d'évaluation") }}</h6>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Compétences techniques">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Compétences personnelles">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Adaptabilité">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Leadership">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Résolution de problèmes">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Communication">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Innovation">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Motivation">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group ">
                                                            <input style="border-bottom: 1px solid #2e9c65" type="text" class="form-control translated_text" placeholder="" value="Référence professionnelle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-12">
                                                        <div class="input-box ">
                                                            <label class="input-label ">{{ __("generated.Ajouter") }}</label>
                                                            <input type="text" value="" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
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
                    <div class="col-4">
                        <div class="card border-0"  >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 mb-4">
                                                        <h6 class="title custom-title ">{{ __("generated.Coefficients") }}</h6>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="3">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="4">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="5">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="6">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="7">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="8">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="input-group " style="width: 50%;margin: 0 auto">
                                                            <input style="border-bottom: 1px solid #2e9c65;text-align: center" type="text" class="form-control translated_text" placeholder="" value="9">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-12">
                                                        <div class="input-box ">
                                                            <label class="input-label ">{{ __("generated.Ajouter") }}</label>
                                                            <input type="text" value="" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
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

                <div class="row mt-4">
                    <div class="col">
                        <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square me-2"></i> <span >{{ __("generated.Annuler") }}</span></button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i> <span >{{ __("generated.Enregistrer") }}</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailcompose3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-block">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-trash avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Supprimer un Rôle") }}</h6>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <div class="input-box focus">
                            <label class="input-label ">{{ __("generated.Catégorie") }}</label>
                            <input type="text" value="Utilisateurs recrutement" class="input-1 destinataires" onfocus="setFocus(true)" onblur="setFocus(false)">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <div class="input-box focus">
                            <label class="input-label ">{{ __("generated.Rôle") }}</label>
                            <input type="text" value="Chargé de recrutement" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <button class="btn btn-link text-secondary" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square h4 me-2"></i> <span >{{ __("generated.Annuler") }}</span></button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-theme" type="button"><i class="bi bi-trash me-2"></i> <span >{{ __("generated.Supprimer") }}</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js_footer')

@endsection