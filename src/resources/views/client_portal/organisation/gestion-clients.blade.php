@extends('client_portal.layouts.portal')

@section('title', 'Organisation')

@section('css_header')
    {{-- <style>
        .disabled {
            pointer-events: none;
            opacity: 0.4;
        }

        .squered-pill {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            text-align: center;
            line-height: 2px;
            background-color: rgba(38, 182, 234, .3);
            border: none;
            color: #005dc7;
            padding: 8px !important;
        }

        .squered-pill i {
            color: #005dc7;
            padding: 5px
        }

        .squered-pill:hover,
        .squered-pill:active,
        .squered-pill:focus {
            background-color: rgba(38, 182, 234, 1);
            outline: none;
            border: none;
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

        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
            height: 312px !important;
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
            margin-top: 8%;
        }

        .lettre-3 .dz-default.dz-message {
            margin-top: 4%;
        }


        .title.custom-title {
            border-bottom: 0 !important;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1470px;
            }
        }
    </style> --}}
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

    {{--     <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Clients") }}</h5>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="contact">
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
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Guide vidéo") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
                    style="margin-right: 40px;">
                    <button class="btn show-video custom-chatbox" style="background-color: #e2003b;padding: 2px 6px;"
                        type="button" id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{ asset('assets/img/icon/faciliti.png') }}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-5 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a style="font-size: 14px" class="nav-link active  " id="general-info-tab"
                                onclick="openTab('general-info')">{{ __("generated.Informations générales") }}</a>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <a style="font-size: 14px" id="tax-info-tab" onclick="openTab('tax-info')"
                                class="nav-link ">{{ __("generated.identifiant fiscal") }}</a>
                        </li>
                        <li class="nav-item" role="presentation4">
                            <a style="font-size: 14px" id="sites-tab" onclick="openTab('sites')"
                                class="nav-link ">{{ __("generated.Sites") }}</a>
                        </li>
                        <li class="nav-item" role="presentation4">
                            <a style="font-size: 14px" id="evaluateurs-tab" onclick="openTab('evaluateurs')"
                                class="nav-link ">{{ __("generated.Evaluateurs") }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="tab-content py-3" id="myTabContent">
                    @include('client_portal.inc.generalInformation', ['client' => $client])
                    @include('client_portal.inc.finance', [
                        'client' => $client,
                        'clientFinance' => $clientFinance,
                    ])
                    @include('client_portal.inc.site')
                    @include('client_portal.inc.evaluator')
                </div>
            </div>
        </div>
    </main>

@endsection
@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        var client = @json($client);
        var clientFinance = @json($clientFinance);
        var clientFiliale = @json($clientFiliales);
        var clientSite = @json($clientSites);
        var evaluators = @json($evaluators);

        var cities = @json($cities);
        var professions = @json($professions);
        var types_evaluations = @json($types_evaluations);
        var countries = @json($countries);


    </script>

    {{-- @vite(['resources/js/client/create-edit-client.js',
        'resources/js/client/create-edit-client-finance.js',
        'resources/js/client/create-edit-client-filiale.js',
        'resources/js/client/create-edit-client-site.js',
        'resources/js/client/create-edit-client-evaluator.js']) --}}

    {{-- <script>
        $(document).ready(function() {

            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('.Flag_Country option').eq(index).data('image');

                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                            $('.chosen-results li img').width(30).css('margin-right', '10px');

                        }
                    }
                });
            }
            $('.Flag_Country').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function() {

            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var code = $('.Flag_Country2 option').eq(index).data('image');

                    if (code) {
                        // Build flag image URLs with w160 & w320 sizes
                        var imgTag =
                            `<img src="https://flagcdn.com/w160/${code}.png" srcset="https://flagcdn.com/w320/${code}.png 2x" width="40"
                        alt="${code.toUpperCase()}" style="margin-right: 10px; vertical-align: middle; border-radius: 4px;" />`;

                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend(imgTag);
                        }
                    }
                });
            }

            $('.Flag_Country2').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script> --}}

@endsection

<script>
    function openTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');
        document.querySelector(`a[onclick="openTab('${tabId}')"]`).classList.add('active');
    }
</script>

{{-- <script>
    $(document).ready(function() {
        $('select').chosen({
            width: '100%',
            no_results_text: "Aucun résultat trouvé",
            placeholder_text_single: "Sélectionnez un choix",
        });
    });
</script> --}}
