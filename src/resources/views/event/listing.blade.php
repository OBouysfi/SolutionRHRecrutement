@extends('layouts.master')

@section('title', 'Calendrier')

@section('css_header')
    <style>
        .fc-toolbar-title {
            text-transform: capitalize;
        }

        .fc-more-popover {
            top: 400px !important;
        }

        .fc .fc-toolbar-title {
            font-size: 1.2em !important;
        }

        .file-upload {
            position: relative;
            width: 100%;
            /* max-width: 600px; */
            height: 150px;
            border: 2px dashed #cccccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--adminux-theme-bg-2) !important;
            cursor: pointer;
            transition: border-color 0.3s ease;
            flex-direction: column;
        }

        .file-upload:hover {
            border-color: #2e9c65ba;
        }

        .file-upload input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload label {
            font-size: 16px;
            color: #6c757d;
            pointer-events: none;
            margin-bottom: 10px;
            padding: 15px;
            text-align: center;
        }

        .file-preview {
            margin-top: 10px;
            width: 100px;
            height: 100px;
            display: none;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            border: 1px solid #cccccc;
        }


        .fc-event {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            border-radius: 5px;
            font-size: 14px;
            white-space: nowrap;
            /* Empêche le texte de sauter à la ligne */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 768px) {

            /* Pour les écrans mobiles */
            .fc-event {
                flex-direction: column;
                align-items: flex-start;
                font-size: 12px;
                padding: 5px;
            }

            .fc-event img {
                width: 30px;
                /* Réduire la taille des images */
                height: 30px;
            }

            .fc-event .div-time {
                font-size: 12px;
                padding-left: 5px;
            }

            .fc-event .dropdown-container {
                position: absolute;
                top: 5px;
                right: 5px;
            }
        }

        .fc-daygrid-day-bottom {
            width: 100%;
            text-align: center;
        }

        .fc-daygrid-day-bottom .fc-daygrid-more-link {
            font-size: 16px !important;
            color: #111 !important;
            background-color: #fff;
            border-radius: 4px;
            margin: 0;
            text-align: center;
            padding: 5px;
            width: 100% !important;

        }

        .fc .fc-h-event.regular-event:before,
        .fc .fc-event.regular-event:before {
            background-color: #fff;
        }

        .fc .fc-list-event:hover {
            background-color: #f5f5f5;
            transition: 0s ease-in-out;
        }

        .fc-list-event-graphic,
        .fc-list-event-time {
            display: none;
        }

        .fc-event {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        /* Make the cards responsive */
        @media (max-width: 768px) {
            .fc-event {
                padding: 10px;
            }

            .fc-event img {
                width: 30px;
                /* Adjust image size */
            }

            .fc-event .fc-event-title {
                font-size: 1rem;
            }

            .fc-event .fc-event-time {
                font-size: 0.8rem;
            }
        }

        /* Larger screen styles */
        @media (min-width: 768px) {
            .fc-event {
                flex-direction: row;
                align-items: center;
            }

            .fc-event img {
                width: 50px;
            }

            .fc-event .fc-event-title {
                font-size: 1.2rem;
            }

            .fc-event .fc-event-time {
                font-size: 1rem;
            }
        }

        /* Style the dropdown */
        .fc-event .dropdown-container {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 999;
            font-size: 1rem;
        }

        /* Responsive dropdown */
        @media (max-width: 768px) {
            .fc-event .dropdown-container {
                top: 5px;
                right: 5px;
                font-size: 0.9rem;
            }

            .fc-event .dropdown-container button {
                font-size: 16px;
            }

            .fc-event .dropdown-menu {
                width: 150px;
            }
        }

        /* Event content styles */
        .fc-event .fc-event-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Time part */
        .fc-event .fc-event-time {
            font-size: 0.9rem;
            color: #555;
        }

        /* Important and favorite icons */
        .fc-event .status-icons {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
        }

        .fc-event .status-icons span {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .fc-event .fc-event-title {
                font-size: 0.9rem;
            }

            .fc-event .fc-event-time {
                font-size: 0.8rem;
            }

            .fc-event .status-icons span {
                font-size: 1rem;
            }
        }

        /* Style images in event cards */
        .fc-event img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .fc-event img {
                width: 30px;
                /* Adjust the image size for smaller screens */
            }
        }

        /* Button inside card */
        .fc-event button {
            font-size: 18px;
            padding: 5px;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        /* Responsive button */
        @media (max-width: 768px) {
            .fc-event button {
                font-size: 16px;
                padding: 3px;
            }
        }

        /* Default Flex Layout */
        .fc-event {
            display: flex;
            flex-direction: column;
        }

        /* On larger screens, you can use a row layout */
        @media (min-width: 768px) {
            .fc-event {
                flex-direction: row;
                justify-content: space-between;
            }
        }
    </style>
    <style>
        .action-check {
            border: 1px solid #ccc;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
            border-radius: 10px;
        }

        /* input[type="radio"]:checked+.action-check {
            background-color: #005dc7;
            color: white;
            border-color: #005dc7;
            border-radius: 10px;
        } */

        .chosen-container .chosen-choices li.search-choice {
            background: #005dc7 !important;
            border-color: #005dc7 !important;
        }

        .activated {
            background-color: #005dc7 !important;
            color: white !important;
            border-color: #005dc7 !important;
            border-radius: 10px !important;
        }

        #resultsList {
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #resultsList li {
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #resultsList li:hover {
            background-color: #f8f9fa;
        }

        .attachment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .attachment-preview img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .attachment-item button {
            margin-left: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fullCalendar/lib/main.min.css') }}">
    <script src="{{ asset('assets/vendor/fullCalendar/lib/main.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullCalendar/lib/locales/fr.js') }}"></script>
    <style>
        .fc .fc-event.regular-ch {
            border-color: #005dc7;
        }

        .card .card-footer.footer-1 {
            background-color: #2e9c65ba;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
        }

        .card .card-footer.footer-2 {
            background-color: #b7131bad;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p {
            text-align: justify;
        }

        .custom-color-icon i {
            color: #005dc7 !important;
        }

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        .btn-ajouter {
            background-color: #005dc7;
        }

        .btn-ajouter:hover {
            background-color: #2e9c65 !important;
        }

        .dz-default.dz-message {
            margin-top: 2%;
        }

        .lettre-3 .dz-default.dz-message {
            margin-top: 4%;
        }

        .filter-block .col-3 {
            margin-right: -5px
        }

        .filter-empty {
            padding-top: 11px !important;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 9px;
            background-color: var(--adminux-theme-bg);
            border-radius: 7px;
        }

        .poste-chosen .chosen-container-single .chosen-single div b {
            display: block;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 12px;
            margin-top: 3px;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 7px 9px;
            background-color: #f1f3f6;
            border-radius: 7px;
            margin-top: -4px;
        }

        .poste-chosen .chosen-single {
            background-color: #f1f3f6 !important;
        }

        .poste-chosen .chosen-container.chosen-container-single a.chosen-single {
            padding: 3px 10px;
        }

        .poste-chosen .chosen-container.chosen-container-single div.chosen-drop {
            margin-left: -10px;
        }

        .poste-chosen .chosen-container-single .chosen-single div b {
            display: block;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 12px;
            margin-top: 3px;
        }

        .dropdown-toggle.btn-link.show {
            background-color: transparent;
            color: var(--adminux-theme) !important;
        }

        .div-came {
            margin-top: 10px
        }

        .div-came i {
            color: #1f3289f0 !important;
        }

        .div-came span {
            font-size: 11px;
            color: #1f3289f0 !important;
        }

        .div-time span {
            font-size: 11px;
            margin-left: 21px;
            color: #1f3289f0 !important;
        }

        /*#name{width: 100%;
                                                                                                                                                                                                                                                                                                                                             transition: transform 0.3s ease-in-out;
                                                                                                                                                                                                                                                                                                                                                                }*/
        /********************************/
        input {
            background: #fff;
        }

        .input-box.active-grey .input-1 {
            border: 1px solid #dadce0;
        }

        .input-box.active-grey .input-label {
            color: #80868b;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.active-grey .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box {
            position: relative;
            margin: 10px 0;
        }

        .input-box .input-label {
            position: absolute;
            color: #80868b;
            font-size: 16px;
            font-weight: 400;
            max-width: calc(100% - (2 * 8px));
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            left: 8px;
            top: 13px;
            padding: 0 8px;
            transition: 250ms;
            user-select: none;
            pointer-events: none;
        }

        .input-box .input-label svg {
            position: relative;
            width: 15px;
            height: 15px;
            top: 2px;
            transition: 250ms;
        }

        .input-box .input-1 {
            box-sizing: border-box;
            height: 50px;
            width: 100%;
            border-radius: 4px;
            color: #202124;
            border: 1px solid #dadce0;
            padding: 13px 15px;
            transition: 250ms;
        }

        .input-box .input-1:focus {
            outline: none;
            border: 2px solid #005dc7;
            transition: 250ms;
        }

        .input-box.error .input-label {
            color: #f44336;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.error .input-1 {
            border: 2px solid #f44336;
        }

        .input-box.focus .input-label,
        .input-box.active .input-label {
            color: #005dc7;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        [type=time]::-webkit-calendar-picker-indicator {
            color: #005dc7 !important;
        }

        .input-box.focus .input-label svg,
        .input-box.active .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box.active .input-1 {
            border: 2px solid #005dc7;
        }

        /* .action-check:hover,
        .action-check.action-clicked {
            background: var(--adminux-bg);
            border: 0;
            border-radius: 0;
            color: #fff;
        } */

        .ck-editor__editable_inline {
            min-height: 209px;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1372px;
            }
        }
    </style>

    <style>
        .custom-select {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            background: #fff;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
        }

        .custom-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .custom-select:hover {
            border-color: #667eea;
        }

        .select-wrapper::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 8px solid #667eea;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .select-wrapper:hover::after {
            border-top-color: #5a67d8;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            margin-top: -10px;
            background-color: transparent;
        }
        .form-group .poste-chosen .chosen-single{
            background-color: transparent !important;
        }
        .rappel .poste-chosen .chosen-container.chosen-container-single{
            margin-top: -18px
        }
    </style>
@endsection


@section('content')
    <!-- Begin page content -->
    <main class="main mainheight">

        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }} (Event ID: {{ session('meet_link') }})
            </div>
        @endif


        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Calendrier") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
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
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt="" style="display: none;">
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
                    <li class="breadcrumb-item " aria-current="page">{{ __("generated.Vue d'ensemble") }}</li>
                </ol>
            </nav>
        </div>

        <!-- content -->
        <div class="container-fluid border-bottom">
            <ul class="nav nav-iconbar py-2">
                <li class="nav-item">
                    <button class="btn btn-link border-0 innersidebar-btn"><i
                            class="bi bi-layout-sidebar h5 vm"></i></button>
                </li>

                <li class="nav-item d-none d-lg-block position-relative">
                    <div class="input-group input-group-md w-100">
                        <input type="text" id="searchInput" class="form-control"
                            placeholder="{{ __("generated.Chercher destinataire") }}...">
                        <div class="input-group-text rounded px-0">
                            <button class="btn   btn-link" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Conteneur pour les résultats -->
                    <ul id="resultsList" class="list-group position-absolute w-100 mt-1 shadow-sm" style="z-index: 1000;">
                    </ul>
                </li>
            </ul>
        </div>

        <div class="inner-sidebar-wrap border-bottom">
            <div class="inner-sidebar">
                @can('event-create')
                    <div class="row mx-0 my-3">
                        <div class="col d-grid">
                            <button class="btn btn-theme border" type="button" data-bs-toggle="modal"
                                data-bs-target="#createEventModal"><i
                                    class="bi bi-envelope-plus me-2 vm translated_text"></i>{{ __("generated.Créer un événement") }}</button>
                        </div>
                    </div>
                @endcan
                <ul class="nav nav-pills mb-4">
                    <li class="nav-item" id="showAll">
                        <a class="nav-link active" aria-current="page" href="#">
                            <div class="avatar avatar-40 icon"><i class="bi bi-calendar-week"></i></div>
                            <div class="col ">{{ __("generated.Calendrier") }}</div>
                            <div class="col-auto align-self-center">
                                {{--<figure class="avatar avatar-24 coverimg rounded-circle">
                                    <img src="{{ asset('/assets/img/user-2.jpg')}}" alt="">
                                </figure>
                                --}}
                                <!-- <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                        <small class="fs-10 vm" id="totalNumber">+2</small>
                                    </figure> -->
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                            data-bs-display="static" href="#" role="button" aria-expanded="false">
                            <div class="avatar avatar-40 icon"><i class="bi bi-calendar-event"></i></div>
                            <div class="col ">{{ __("generated.Entretiens") }}</div>
                            <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                    class="bi bi-chevron-up minus"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="type-nav-item" data-event-type="presentiel">
                                <a class="dropdown-item nav-link" href="#">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="col align-self-center ">{{ __("generated.Présentiel") }}</div>
                                    <!-- <div class="col-auto align-items-center">
                                            <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                                <small class="fs-10 vm" id="presNumber">+5</small>
                                            </figure>
                                        </div> -->
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="type-nav-item" data-event-type="telephonique">
                                <a class="dropdown-item nav-link" href="#">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="col align-self-center ">{{ __("generated.Téléphonique") }}</div>
                                    <!-- <div class="col-auto align-items-center">
                                            <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                                <small class="fs-10 vm" id="teleNumber">+3</small>
                                            </figure>
                                        </div> -->
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="type-nav-item" data-event-type="visioconference">
                                <a class="dropdown-item nav-link" href="#">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-camera-video"></i>
                                    </div>
                                    <div class="col align-self-center ">{{ __("generated.Visioconférence") }}</div>
                                    <!-- <div class="col-auto align-items-center">
                                            <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                                <small class="fs-10 vm" id="visioNumber">+2</small>
                                            </figure>
                                        </div> -->
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" id="favoritesFilter">
                        <a class="nav-link" aria-current="page" href="#">
                            <div class="avatar avatar-40 icon"><i class="bi bi-star"></i></div>
                            <div class="col ">{{ __("generated.Favoris") }}</div>
                        </a>
                    </li>
                    <li class="nav-item" id="draftsFilter">
                        <a class="nav-link" aria-current="page" href="#">
                            <div class="avatar avatar-40 icon"><i class="bi bi-save"></i></div>
                            <div class="col ">{{ __("generated.Brouillons") }}</div>
                        </a>
                    </li>
                </ul>
                <div class="card shadow-none bg-none border-0">
                    <div class="input-group input-group-md w-100 input-group-text "
                        style="background-color: var(--adminux-theme-bg-2)!important;">
                        <span class="text-theme input-group-text"
                            style="background-color: var(--adminux-theme-bg-2)!important;"><i
                                class="bi bi-person-plus"></i></span>
                        <span class="text-theme input-group-text "
                            style="background-color: var(--adminux-theme-bg-2)!important;">{{ __("generated.Equipe entretien") }}</span>
                        {{-- <input type="text" class="form-control" placeholder="Equipe entretien... " value=""> --}}

                    </div>
                    <div class="card-body mh-300 overflow-y-auto p-0">
                        <ul class="list-group list-group-flush bg-none rounded-0 border-top">
                            @foreach ($evaluators as $evaluator)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-3">
                                            <figure class="avatar avatar-40 coverimg rounded-circle"
                                                style="background-size: cover;">
                                                <img src="{{ __($evaluator['avatar']) }}" alt="" />
                                            </figure>
                                        </div>
                                        @php
                                            $profession = $evaluator['profession'];
                                            $decoded = json_decode($profession, true);
                                            $role = '';
                                            if (is_array($decoded) && isset($decoded['name'])) {
                                                $role = $decoded['name'];
                                            } else {
                                                $role = $profession;
                                            }
                                        @endphp
                                        <div class="col-9 align-self-center ps-0">
                                            <p class="text-truncate mb-0">{{ __($evaluator['name']) }}</p>
                                            <p class="text-secondary small text-truncate">
                                                {{ __($role) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="inner-sidebar-content">
                <div id="calendar"></div>
            </div>
        </div>
    </main>
    @include('event.inc.addEvent')
    @include('event.inc.editEvent')
    @include('event.inc.detailEvent')
    @include('event.inc.translation')
@endsection

@section('js_footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>
    <script>
        var storeEventRoute = "{{ route('events.store') }}";
        var updateEventRoute = "{{ route('events.update') }}";
        var selectedMembers = @json($selectedMembers ?? null);
        var meetLink = @json(session('meet_link') ?? null);
        var title = @json(session('meeting_topic') ?? null);
        var startTime = @json(session('meeting_start_time') ?? null);
        var endTime = @json(session('meeting_end_time') ?? null);
        var meetingDuration = @json(session('meeting_duration') ?? null);

        // console.log(meetLink, title, startTime, endTime, meetingDuration);

        $(document).ready(function () {
            $('select').chosen({
                width: '100%',
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_single: "Sélectionnez un choix",
                placeholder_text_multiple: "Sélectionnez certaines options",
            });
        });
    </script>
    <script>
        'use strict';

        // $(window).on('load', function () {
        //     // Get all elements with class 'description'
        //     const descriptionElements = document.querySelectorAll('.description');

        //     // Create editor for each element
        //     descriptionElements.forEach(element => {
        //         ClassicEditor
        //             .create(element, {
        //                 language: 'fr',
        //                 toolbar: {
        //                     items: [
        //                         'bold',
        //                         'italic',
        //                         'link',
        //                         'undo',
        //                         'redo',
        //                         'bulletedList',
        //                         'numberedList',
        //                         'blockQuote'
        //                     ]
        //                 },
        //             })
        //             .then(editor => {
        //                 // Store editor with element ID as key
        //                 const elementId = element.id || 'editor_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        //                 if (!element.id) {
        //                     element.id = elementId;
        //                 }
        //                 descriptionEditors[element.id] = editor;
        //             })
        //             .catch(error => {
        //                 console.error('Error creating CKEditor:', error);
        //             });
        //     });
        // });

        function updateCKEditorAndSave(editorId, endpoint, id) {
            const editor = descriptionEditors[editorId];
            if (editor) {
                const targetElement = document.querySelector('#' + editorId);
                if (targetElement) {
                    targetElement.value = editor.getData();

                }
            } else {
                console.error('Editor not found for ID:', editorId);
            }
        }

        // Optional: Function to get data from a specific editor
        function getEditorData(editorId) {
            const editor = descriptionEditors[editorId];
            return editor ? editor.getData() : null;
        }

        // Optional: Function to set data in a specific editor
        function setEditorData(editorId, data) {
            const editor = descriptionEditors[editorId];
            if (editor) {
                editor.setData(data);
            }
        }

        // Optional: Cleanup function to destroy all editors
        function destroyAllEditors() {
            Object.values(descriptionEditors).forEach(editor => {
                editor.destroy();
            });
            descriptionEditors = {};
        }
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/event/listing.js') }}"></script>
    @vite(['resources/js/event/listing.js'])
@endsection