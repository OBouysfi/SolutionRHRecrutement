@extends('layouts.master')

@section('title', 'Gestion des tests')


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

        #tableTests td,
        #tableTests th {
            text-align: center;
            vertical-align: middle;
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
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ __("generated.contact") }}">
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
                    <li class="breadcrumb-item active  text-primary" aria-current="page">{{ __("generated.Tests manuels") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row mb-4">
                <div style="width: 23%" class="col-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="row align-items-center">

                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme custom-avatar">
                                                        <i class="bi bi-play h5 custom-icon"></i>
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
                                                    @can('test-technique-create-gestion-tests')
                                                        <li class="list-group-item text-secondary"
                                                            style="border-top: 1px solid #00000016;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <i class="bi bi-plus-square"
                                                                        style="color: #2473cf !important;"></i>
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    <a href="{{ route('technicalTest.create.test') }}"
                                                                        style="color: #6f7880"><span
                                                                            >{{ __("generated.Créer un test") }}</span> </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endcan
                                                    <li class="list-group-item text-secondary"
                                                        style="border-bottom: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-people"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0 ">{{ __("generated.Exporter vers Excel") }}</div>
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
                    @can('test-technique-listing-gestion-tests')
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-header">
                                                <div class="row align-items-center">

                                                    <div class="col-auto">
                                                        <div class="avatar avatar-40 rounded bg-light-theme custom-avatar">
                                                            <i class="bi bi-funnel h5 custom-icon"></i>
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
                                                            <span class="input-group-text text-theme"><i
                                                                    class="bi bi-search"></i></span>
                                                            <input type="text" class="form-control translated_text"
                                                                placeholder="{{ __("generated.Search...") }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        style="padding-top: 24px;">
                                                                        <option value="-1" >{{ __("generated.Toutes les langues") }}</option>
                                                                        @foreach (App\Enums\Candidate\LanguageEnum::getAll() as $key => $category)
                                                                            <option value="{{ __($category) }}">{{ __($category) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label class="hidlab ">{{ __("generated.Langue") }}</label>
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
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        style="padding-top: 24px;">
                                                                        <option value="-1" data-select2-id="2">
                                                                            ----------------</option>
                                                                        <option value="325" data-select2-id="13">Access
                                                                            2019</option>
                                                                        <option value="335" data-select2-id="14">Adobe
                                                                            Premiere Pro</option>
                                                                        <option value="232" data-select2-id="15">Angular
                                                                        </option>
                                                                        <option value="230" data-select2-id="16">AutoCAD
                                                                            (FR)</option>
                                                                        <option value="283" data-select2-id="17">Autodesk
                                                                            AutoCAD® (EN)</option>
                                                                        <option value="108" data-select2-id="18">C#
                                                                        </option>
                                                                        <option value="339" data-select2-id="19">Cobol
                                                                        </option>
                                                                        <option value="298" data-select2-id="20">
                                                                            Cybersécurité</option>
                                                                        <option value="217" data-select2-id="21">DigComp
                                                                        </option>
                                                                        <option value="30" data-select2-id="22">Excel 2013
                                                                            (EN)</option>
                                                                        <option value="10" data-select2-id="23">Excel 2013
                                                                            (FR)</option>
                                                                        <option value="51" data-select2-id="24">Excel 2013
                                                                            (NL)</option>
                                                                        <option value="28" data-select2-id="25">Excel 2016
                                                                            (EN)</option>
                                                                        <option value="43" data-select2-id="26">Excel 2016
                                                                            (ES)</option>
                                                                        <option value="16" data-select2-id="27">Excel 2016
                                                                            (FR)</option>
                                                                        <option value="44" data-select2-id="28">Excel 2016
                                                                            (IT)</option>
                                                                        <option value="20" data-select2-id="29">Excel 2016
                                                                            (NL)</option>
                                                                        <option value="282" data-select2-id="30">Excel 2019
                                                                            (DE)</option>
                                                                        <option value="48" data-select2-id="31">Excel 2019
                                                                            (EN)</option>
                                                                        <option value="306" data-select2-id="32">Excel 2019
                                                                            (ES)</option>
                                                                        <option value="57" data-select2-id="33">Excel 2019
                                                                            (FR)</option>
                                                                        <option value="318" data-select2-id="34">Excel 2021
                                                                            (NL)</option>
                                                                        <option value="334" data-select2-id="35">Excel
                                                                            Microsoft 365 (FR)</option>
                                                                        <option value="336" data-select2-id="36">Gestion de
                                                                            l'environnement Windows</option>
                                                                        <option value="279" data-select2-id="37">Google
                                                                            Docs</option>
                                                                        <option value="277" data-select2-id="38">Google
                                                                            Sheets</option>
                                                                        <option value="305" data-select2-id="39">Google
                                                                            Slides</option>
                                                                        <option value="229" data-select2-id="40">Grammaire
                                                                            et orthographe anglaises</option>
                                                                        <option value="228" data-select2-id="41">Grammaire
                                                                            et orthographe françaises</option>
                                                                        <option value="246" data-select2-id="42">
                                                                            Illustrator (EN)</option>
                                                                        <option value="231" data-select2-id="43">
                                                                            Illustrator (FR)</option>
                                                                        <option value="317" data-select2-id="44">
                                                                            Illustrator 2022</option>
                                                                        <option value="360" data-select2-id="45">
                                                                            Illustrator 2024</option>
                                                                        <option value="60" data-select2-id="46">InDesign
                                                                            (EN)</option>
                                                                        <option value="227" data-select2-id="47">InDesign
                                                                            (FR)</option>
                                                                        <option value="361" data-select2-id="48">InDesign
                                                                            2024</option>
                                                                        <option value="104" data-select2-id="49">Java
                                                                        </option>
                                                                        <option value="319" data-select2-id="50">JavaScript
                                                                        </option>
                                                                        <option value="288" data-select2-id="51">
                                                                            LibreOffice Writer (FR) 7.0</option>
                                                                        <option value="281" data-select2-id="52">
                                                                            LibreOffice Calc 7.0 (FR)</option>
                                                                        <option value="287" data-select2-id="53">
                                                                            LibreOffice Impress (FR) 7.0</option>
                                                                        <option value="327" data-select2-id="54">
                                                                            Mathématiques</option>
                                                                        <option value="304" data-select2-id="55">Outlook
                                                                            2016 (DE)</option>
                                                                        <option value="39" data-select2-id="56">Outlook
                                                                            2016 (EN)</option>
                                                                        <option value="56" data-select2-id="57">Outlook
                                                                            2016 (ES)</option>
                                                                        <option value="36" data-select2-id="58">Outlook
                                                                            2016 (FR)</option>
                                                                        <option value="247" data-select2-id="59">Outlook
                                                                            2016 (IT)</option>
                                                                        <option value="40" data-select2-id="60">Outlook
                                                                            2016 (NL)</option>
                                                                        <option value="103" data-select2-id="61">PHP
                                                                        </option>
                                                                        <option value="47" data-select2-id="62">Photoshop
                                                                            (EN)</option>
                                                                        <option value="301" data-select2-id="63">Photoshop
                                                                            2021 (EN)</option>
                                                                        <option value="294" data-select2-id="64">Photoshop
                                                                            2021 (FR)</option>
                                                                        <option value="362" data-select2-id="65">Photoshop
                                                                            2024</option>
                                                                        <option value="295" data-select2-id="66">Plateforme
                                                                            Collaborative Microsoft 365</option>
                                                                        <option value="32" data-select2-id="67">PowerPoint
                                                                            2013 (EN)</option>
                                                                        <option value="12" data-select2-id="68">PowerPoint
                                                                            2013 (FR)</option>
                                                                        <option value="54" data-select2-id="69">PowerPoint
                                                                            2013 (NL)</option>
                                                                        <option value="41" data-select2-id="70">PowerPoint
                                                                            2016 (EN)</option>
                                                                        <option value="49" data-select2-id="71">PowerPoint
                                                                            2016 (ES)</option>
                                                                        <option value="18" data-select2-id="72">PowerPoint
                                                                            2016 (FR)</option>
                                                                        <option value="55" data-select2-id="73">PowerPoint
                                                                            2016 (IT)</option>
                                                                        <option value="21" data-select2-id="74">PowerPoint
                                                                            2016 (NL)</option>
                                                                        <option value="289" data-select2-id="75">PowerPoint
                                                                            2019 (DE)</option>
                                                                        <option value="268" data-select2-id="76">PowerPoint
                                                                            2019 (EN)</option>
                                                                        <option value="308" data-select2-id="77">PowerPoint
                                                                            2019 (ES)</option>
                                                                        <option value="58" data-select2-id="78">PowerPoint
                                                                            2019 (FR)</option>
                                                                        <option value="323" data-select2-id="79">PowerPoint
                                                                            2021 (NL)</option>
                                                                        <option value="101" data-select2-id="80">Python 3
                                                                        </option>
                                                                        <option value="299" data-select2-id="81">Revit
                                                                            Architecture</option>
                                                                        <option value="297" data-select2-id="82">SQL
                                                                        </option>
                                                                        <option value="50" data-select2-id="83">Sujets
                                                                            multiples</option>
                                                                        <option value="328" data-select2-id="84">Sécurité,
                                                                            hygiène et postures</option>
                                                                        <option value="272" data-select2-id="85">VBA Excel
                                                                            2019 (EN)</option>
                                                                        <option value="270" data-select2-id="86">VBA Excel
                                                                            2019 (FR)</option>
                                                                        <option value="31" data-select2-id="87">Word 2013
                                                                            (EN)</option>
                                                                        <option value="11" data-select2-id="88">Word 2013
                                                                            (FR)</option>
                                                                        <option value="38" data-select2-id="89">Word 2013
                                                                            (NL)</option>
                                                                        <option value="33" data-select2-id="90">Word 2016
                                                                            (EN)</option>
                                                                        <option value="45" data-select2-id="91">Word 2016
                                                                            (ES)</option>
                                                                        <option value="17" data-select2-id="92">Word 2016
                                                                            (FR)</option>
                                                                        <option value="46" data-select2-id="93">Word 2016
                                                                            (IT)</option>
                                                                        <option value="22" data-select2-id="94">Word 2016
                                                                            (NL)</option>
                                                                        <option value="286" data-select2-id="95">Word 2019
                                                                            (DE)</option>
                                                                        <option value="62" data-select2-id="96">Word 2019
                                                                            (EN)</option>
                                                                        <option value="307" data-select2-id="97">Word 2019
                                                                            (ES)</option>
                                                                        <option value="59" data-select2-id="98">Word 2019
                                                                            (FR)</option>
                                                                        <option value="320" data-select2-id="99">Word 2021
                                                                            (NL)</option>
                                                                        <option value="61" data-select2-id="100">WordPress
                                                                        </option>
                                                                    </select>
                                                                    <label class="hidlab ">{{ __("generated.Sujet") }}</label>
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
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        style="padding-top: 24px;">
                                                                        <option value="-1">----------------</option>
                                                                        <option value="32" >{{ __("generated.Séquentiel au hasard") }}</option>
                                                                        <option value="3" >{{ __("generated.Séquentiel ordonné") }}</option>
                                                                    </select>
                                                                    <label class="hidlab ">{{ __("generated.Type d'algorithme") }}</label>
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
                                                                            <input class="form-check-input" type="checkbox"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9 ps-0">
                                                                        <p style="color: #6e777f;" >{{ __("generated.Inclure les tests inactifs") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-left: 13px;">
                                                    <div class="col-12 mb-3">
                                                        <label style="margin-bottom: 10px;color: #6e777f"
                                                            >{{ __("generated.Période du :") }}</label>
                                                        <div class="input-group " style="width: 50%;">
                                                            <input type="date" class="form-control"
                                                                style="color: #6e777f">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label style="margin-bottom: 10px;color: #6e777f"
                                                            >{{ __("generated.au :") }}</label>
                                                        <div class="input-group " style="width: 50%;">
                                                            <input type="date" class="form-control"
                                                                style="color: #6e777f">
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
                @can('test-technique-listing-gestion-tests')
                    <div style="width: 77%" class="col-9">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table align-middle " id="tableTests" style="width: 100%;"
                                                            data-show-toggle="true">
                                                            <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                <tr style="vertical-align: middle;">
                                                                    <th style="font-weight: 600;text-align: left;width: 32px;"
                                                                        class=" text-center">{{ __("ID") }}</th>
                                                                    <th style="font-weight: 600;text-align: left;width: 339px;"
                                                                        class=" text-center">{{ __("generated.Test") }}</th>
                                                                    <th style="font-weight: 600;width: 120px;"
                                                                        class=" text-center">{{ __("generated.Sujet") }}</th>
                                                                    <th style="font-weight: 600;width: 124px;"
                                                                        class=" text-center">{{ __("generated.Langue") }}</th>
                                                                    <th style="font-weight: 600;width: 147px;"
                                                                        class=" text-center">{{ __("generated.Type") }}</th>
                                                                    <th style="font-weight: 600;width: 142px;"
                                                                        class=" text-center">{{ __("generated.Algorithme") }}</th>
                                                                    <th style="font-weight: 600;text-align: right;width: 120px;"
                                                                        class=" text-center">{{ __("generated.Action") }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="font-size: 13px">
                                                                <!-- <tr>
                                                                        <td style="vertical-align: middle">
                                                                            3679
                                                                        </td>
                                                                        <td style="text-align: left;vertical-align: middle">
                                                                            C# Débutant : Bases de la programmation
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            C#
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Français
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Codage
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            Séquentiel ordonné
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: right">
                                                                            <i class="bi bi-pencil-square" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
                                                                            <i class="bi bi-copy" style="font-size: 19px;color: #2473cf;margin-right: 9px;"></i>
                                                                            <i class="bi bi-trash" style="font-size: 19px;color: #2473cf;"></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            3680
                                                                        </td>
                                                                        <td style="text-align: left;vertical-align: middle">
                                                                            C# Intermédiaire : Gestion des données et classes
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            C#
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Français
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Codage
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            Séquentiel ordonné
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: right">
                                                                            <i class="bi bi-pencil-square" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
                                                                            <i class="bi bi-copy" style="font-size: 19px;color: #2473cf;margin-right: 9px;"></i>
                                                                            <i class="bi bi-trash" style="font-size: 19px;color: #2473cf;"></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            3681
                                                                        </td>
                                                                        <td style="text-align: left;vertical-align: middle">
                                                                            Java Avancé : Optimisation, Streams et design patterns
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Java
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Anglais
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Codage
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            Séquentiel ordonné
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: right">
                                                                            <i class="bi bi-pencil-square" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
                                                                            <i class="bi bi-copy" style="font-size: 19px;color: #2473cf;margin-right: 9px;"></i>
                                                                            <i class="bi bi-trash" style="font-size: 19px;color: #2473cf;"></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            3682
                                                                        </td>
                                                                        <td style="text-align: left;vertical-align: middle">
                                                                            Python Intermédiaire : Modules, fichiers et objets
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Python
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Anglais
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            Codage
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            Séquentiel ordonné
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: right">
                                                                            <i class="bi bi-pencil-square" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
                                                                            <i class="bi bi-copy" style="font-size: 19px;color: #2473cf;margin-right: 9px;"></i>
                                                                            <i class="bi bi-trash" style="font-size: 19px;color: #2473cf;"></i>
                                                                        </td>
                                                                    </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center mx-0 mb-3">
                                                    <div class="col-6 ">

                                                    </div>
                                                    <div class="col-6 footable-paging-external footable-paging-right"
                                                        id="footable-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination">
                                                                <li class="footable-page-nav disabled" data-page="first"><a
                                                                        class="footable-page-link" href="#">«</a></li>
                                                                <li class="footable-page-nav disabled" data-page="prev"><a
                                                                        class="footable-page-link" href="#">‹</a></li>
                                                                <li class="footable-page visible active" data-page="1"><a
                                                                        class="footable-page-link" href="#">1</a></li>
                                                                <li class="footable-page visible" data-page="2"><a
                                                                        class="footable-page-link" href="#">2</a></li>
                                                                <li class="footable-page-nav" data-page="next"><a
                                                                        class="footable-page-link" href="#">›</a></li>
                                                                <li class="footable-page-nav" data-page="last"><a
                                                                        class="footable-page-link" href="#">»</a></li>
                                                            </ul>
                                                            <div class="divider"></div><span class="label label-default">1
                                                                <span >{{ __("generated.sur") }}</span>2</span>
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
                @endcan
            </div>
        </div>

    </main>
@endsection


@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>


    <script>
        var ApiTechnicalTestsListingeData = "{{ route('api.testsTechniques.listing.data') }}";
        var ApiTestDelete = "{{ route('api.testsTechniques.destroy') }}";


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
    @vite(['resources/js/technicalTest/listing.js'])

@endsection
