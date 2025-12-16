@extends('layouts.master')

@section('title', __('generated.Sécurité'))

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Paramètre") }}</h5>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #005DC7;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Sécurité") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-5 mt-5">
                <div class="col text-center">
                    <!-- <span class="text-gradient">mix up things &amp; choose</span> -->
                    <h3 class="">{{ __("generated.Assurez la sécurité de vos sessions avec")}} <span
                            class="text-gradient ">{{ __("generated.une authentification renforcée.") }}</span></h3>
                    <p class="lead ">{{ __("generated.La clé pour protéger vos données sensibles !") }}</p>
                    <p class="lead text-secondary"></p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-9">
                    <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                        style="width: 80%">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " id="tab1-tab" data-bs-toggle="tab"
                                data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1"
                                aria-selected="true">{{ __("generated.Authentification") }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="tab2-tab" data-bs-toggle="tab"
                                data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2"
                                aria-selected="true">{{ __("generated.Sessions") }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="tab3-tab" data-bs-toggle="tab"
                                data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3"
                                aria-selected="true">{{ __("generated.Mot de passe") }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="tab4-tab" data-bs-toggle="tab"
                                data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4"
                                aria-selected="true">{{ __("generated.Fichiers") }}</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link " id="tab5-tab" data-bs-toggle="tab"
                                data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5"
                                aria-selected="true">{{ __("generated.Traçabilité et Audit") }}</button>
                        </li> --}}
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue card-1" style="padding: 0px;">
                                        <div class="card-body" style="padding: 20px">
                                            <div class="tab-content" id="nav-navtabscard40">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                                    aria-labelledby="tab1-tab">
                                                    <div class="row mt-2 mb-4 justify-content-center">
                                                        <!-- Colonne de gauche -->
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px; line-height: 1;">
                                                                <!-- En-tête -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <!-- Utilisation du CAPTCHA -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Utilisation du CAPTCHA") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input setting-toggle"
                                                                                    name="captcha" id="captcha"
                                                                                    data-setting="captcha"
                                                                                    {{ $settings['captcha'] ? 'checked' : '' }}>

                                                                                <label class="form-check-label"
                                                                                    for="captcha"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Authentification à deux facteurs (2FA) -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Authentification à deux facteurs (2FA)") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7;"
                                                                                    class="form-check-input setting-toggle"
                                                                                    type="checkbox" role="switch"
                                                                                    name="two_factor_auth"
                                                                                    id="two_factor_auth"
                                                                                    data-setting="two_factor_auth"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Activer/Désactiver') }}"
                                                                                    {{ $settings['two_factor_auth'] ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="two_factor_auth"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Type de 2FA (affichage conditionnel, ici exemple d'un toggle général) -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Type de 2FA") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch action-2FA"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7;"
                                                                                    class="form-check-input setting-toggle"
                                                                                    type="checkbox" role="switch"
                                                                                    name="two_factor_type[authenticator]"
                                                                                    id="two_factor_authenticator"
                                                                                    data-setting="two_factor_type.authenticator"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Activer/Désactiver') }}"
                                                                                    {{ $settings['two_factor_type']['authenticator'] ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="two_factor_authenticator"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Ajoute ici d'autres éléments pour les autres types de 2FA, par exemple SMS, Email, etc. -->
                                                                <!-- (Tu peux faire une boucle sur $settings['two_factor_type'] si tu as beaucoup de types à afficher) -->
                                                                <!-- Par exemple : -->
                                                                @foreach ($settings['two_factor_type'] as $type => $enabled)
                                                                    @if ($type !== 'authenticator')
                                                                        {{-- on a déjà affiché l'authenticator --}}
                                                                        <li class="list-group-item hidden show-2fA"
                                                                            style="border: 0">
                                                                            <div class="row">
                                                                                <div class="col-1" style="width: 5%;">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input setting-toggle"
                                                                                        data-setting="two_factor_type.{{ __($type) }}"
                                                                                        id="2fa_{{ __($type) }}"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="{{ __('generated.Activer/Désactiver') }}"
                                                                                        {{ $enabled ? 'checked' : '' }}>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    {{ ucfirst($type) }}
                                                                                </div>
                                                                                <div class="col-6" style="width: 45%;">
                                                                                    <!-- Si nécessaire, ajoute ici un champ complémentaire -->
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                                <!-- Utilisation du SSO -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Utilisation du SSO (Single Sign-On)") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7;"
                                                                                    class="form-check-input setting-toggle"
                                                                                    type="checkbox" role="switch"
                                                                                    name="sso" id="sso"
                                                                                    data-setting="sso"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Activer/Désactiver') }}"
                                                                                    {{ $settings['sso'] ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="sso"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <!-- Colonne de droite -->
                                                        <div class="col-1"></div>
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px; line-height: 1;">
                                                                <!-- En-tête -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <!-- Stockage des identifiants via blockchain -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Stockage des identifiants via blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7;"
                                                                                    class="form-check-input setting-toggle"
                                                                                    type="checkbox" role="switch"
                                                                                    name="blockchain_storage"
                                                                                    id="blockchain_storage"
                                                                                    data-setting="blockchain_storage"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Activer/Désactiver') }}"
                                                                                    {{ $settings['blockchain_storage'] ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="blockchain_storage"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Hashage des identifiants -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Hashage des identifiants") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group">
                                                                                <select
                                                                                    style=" border-bottom: 1px solid var(--adminux-theme) !important;"
                                                                                    class="form-select setting-select"
                                                                                    name="hash_algorithm"
                                                                                    data-setting="hash_algorithm" required>
                                                                                    @foreach (['SHA-256', 'SHA-3', 'bcrypt', 'Argon2', 'PBKDF2', 'Scrypt'] as $algo)
                                                                                        <option
                                                                                            value="{{ __($algo) }}"
                                                                                            {{ $settings['hash_algorithm'] == $algo ? 'selected' : '' }}>
                                                                                            {{ __($algo) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Vérification d'identité sur blockchain -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Vérification d'identité sur blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7;"
                                                                                    class="form-check-input setting-toggle"
                                                                                    type="checkbox" role="switch"
                                                                                    name="blockchain_verification"
                                                                                    id="blockchain_verification"
                                                                                    data-setting="blockchain_verification"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Activer/Désactiver') }}"
                                                                                    {{ $settings['blockchain_verification'] ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="blockchain_verification"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Algorithme de vérification d'identité -->
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Algorithme de vérification d'identité") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group">
                                                                                <select
                                                                                    style=" border-bottom: 1px solid var(--adminux-theme) !important;"
                                                                                    class="form-select setting-select"
                                                                                    name="verification_algorithm"
                                                                                    data-setting="verification_algorithm"
                                                                                    required>
                                                                                    @foreach (['ECDSA', 'RSA', 'HMAC', 'DSA', 'EdDSA', 'AES'] as $algo)
                                                                                        <option
                                                                                            value="{{ __($algo) }}"
                                                                                            {{ $settings['verification_algorithm'] == $algo ? 'selected' : '' }}>
                                                                                            {{ __($algo) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                       <div class="card-footer" style="padding: 10px">
                                                            <div class="form-check form-switch mt-2 mb-3">
                                                              
                                                            </div>
                                                        </div>
                                                </div>
                                                {{-- Tab Session --}}
                                                @php
                                                    $sessionSettings = $settings['session'] ?? [
                                                        'expiration_time' => '',
                                                        'auto_lock' => false,
                                                        'ip_limit' => '',
                                                        'country_limit' => ''
                                                    ];
                                                @endphp
                                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                                    <form action="{{ route('settings.session.update') }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row mt-2 mb-4 justify-content-center">
                                                            <div class="col-5">
                                                                <ul class="list-group list-group-flush bg-none mb-4" style="font-size: 15px;line-height: 1;">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col " style="font-weight: 700">{{ __("generated.Éléments") }}</div>
                                                                            <div class="col-auto " style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-9 " style="padding: 10px">{{ __("generated.Temps d'expiration de session") }}</div>
                                                                            <div class="col-3">
                                                                                <input name="session[expiration_time]" type="number" min="1" max="720"
                                                                                    class="form-control text-center"
                                                                                    value="{{ __($sessionSettings['expiration_time']) }}" style="text-align: center;border-bottom: 1px solid #005dc7;">
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col " style="padding: 10px">{{ __("generated.Verrouillage automatique de session") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="form-check form-switch mt-2">
                                                                                    <input type="hidden" name="session[auto_lock]" value="0">
                                                                                    <input name="session[auto_lock]" type="checkbox" class="form-check-input"
                                                                                        id="autoLockSwitch" value="1"
                                                                                        {{ $sessionSettings['auto_lock'] ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="autoLockSwitch"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="col-1"></div>

                                                            <div class="col-5">
                                                                <ul class="list-group list-group-flush bg-none mb-4" style="font-size: 15px;line-height: 1;">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col " style="font-weight: 700">{{ __("generated.Éléments") }}</div>
                                                                            <div class="col-auto " style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col " style="padding: 10px">{{ __("generated.Limitation d’accès par adresse IP") }}</div>
                                                                            <div class="col-6">
                                                                                <input name="session[ip_limit]" type="text" class="form-control"
                                                                                    value="{{ __($sessionSettings['ip_limit']) }}" style="border-bottom: 1px solid #005dc7;">
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col " style="padding: 10px">{{ __("generated.Limitation d’accès par pays") }}</div>
                                                                            <div class="col-6">
                                                                                <input name="session[country_limit]" type="text" class="form-control"
                                                                                    value="{{ __($sessionSettings['country_limit']) }}" style="border-bottom: 1px solid #005dc7;">
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-footer" style="padding: 10px">
                                                                <div class="form-check form-switch mt-2 mb-3">
                                                                    <button type="submit" class="btn btn-theme mnw-100 "
                                                                        style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Enregistrer") }}</button>
                                                                </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- End Tab Session --}}
                                                {{-- Tab Mot de passe --}}
                                                @php
                                                    $passwordSettings = $settings['password'];
                                                    
                                                @endphp
                                                {{-- <pre>@json($passwordSettings)</pre> --}}
                                                <div class="tab-pane fade" id="tab3" role="tabpanel"
                                                    titleledby="tab3-tab">
                                                    <form action="{{ route('settings.password.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mt-2 mb-4 justify-content-center">
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px;line-height: 1;">
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col " style="padding: 10px">{{ __("generated.Longueur minimale du mot de passe") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group ">
                                                                                <input name="password[min_length]" value="{{ __($passwordSettings['min_length']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col " style="padding: 10px">{{ __("generated.Nombre minimum de majuscules") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group">
                                                                                <input name="password[min_uppercase]" value="{{ __($passwordSettings['min_uppercase']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item" style=" ">
                                                                    <div class="row">
                                                                        <div class="col " style="padding: 10px">{{ __("generated.Nombre minimum de chiffres") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group ">
                                                                                <input name="password[min_numbers]" value="{{ __($passwordSettings['min_numbers']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px;line-height: 1;">
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col " style="padding: 10px">{{ __("generated.Nombre minimum de caractères spéciaux") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group">
                                                                                <input name="password[min_special]" value="{{ __($passwordSettings['min_special']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col " style="padding: 10px">{{ __("generated.Forcer le changement de mot de passe") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group">
                                                                                <input name="password[force_reset_days]" value="{{ __($passwordSettings['force_reset_days']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer" style="padding: 10px">
                                                        <div class="form-check form-switch mt-2 mb-3">
                                                            <button type="submit" class="btn btn-theme mnw-100 "
                                                                style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Enregistrer") }}</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    @if(session('success'))
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                Swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Succès',
                                                                    text: '{{ session('success') }}',
                                                                    timer: 2500,
                                                                    showConfirmButton: false
                                                                });
                                                            });
                                                        </script>
                                                    @endif
                                                </div>
                                                {{-- End Tab Mot de passe --}}

                                                {{-- Tab Fichiers --}}
                                                @php
                                                    $fileSettings = $settings['files'];
                                                @endphp
                                                {{-- <pre>@json($fileSettings)</pre> --}}
                                                <div class="tab-pane fade" id="tab4" role="tabpanel"
                                                    titleledby="tab4-tab">
                                                    <form action="{{ route('settings.files.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                        <div class="row mt-2 mb-4 justify-content-center">
                                                            <div class="col-5">
                                                                <ul class="list-group list-group-flush bg-none mb-4"
                                                                    style="font-size: 15px;line-height: 1;">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                            <div class="col-auto "
                                                                                style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="padding: 10px">{{ __("generated.Taille maximale des fichiers téléversés") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="input-group ">
                                                                                    <input name="files[max_size_mb]" value="{{ __($fileSettings['max_size_mb']) }}" type="number" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="padding: 10px">{{ __("generated.Extensions autorisées") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="input-group ">
                                                                                    <input name="files[allowed_extensions]" value="{{ __($fileSettings['allowed_extensions']) }}" type="text" class="form-control" style="text-align: center;border-bottom: 1px solid #005DC7">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="padding: 10px">{{ __("generated.QR Code ajouté lors du téléchargement") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="form-check form-switch"
                                                                                    style="margin-top: 8px;">
                                                                                   <div class="form-check form-switch mt-1">
                                                                                        <input type="hidden" name="files[qr_on_download]" value="0">
                                                                                        <input class="form-check-input" type="checkbox" name="files[qr_on_download]" value="1"
                                                                                            {{ $fileSettings['qr_on_download'] ? 'checked' : '' }}>
                                                                                    </div>
                                                                                    <label class="form-check-label"
                                                                                        for="userlist1"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col-5">
                                                                <ul class="list-group list-group-flush bg-none mb-4"
                                                                    style="font-size: 15px;line-height: 1;">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                            <div class="col-auto "
                                                                                style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="padding: 10px">{{ __("generated.Signature électronique / numérique") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="form-check form-switch"
                                                                                    style="margin-top: 8px;">
                                                                                    <div class="form-check form-switch mt-1">
                                                                                        <input type="hidden" name="files[digital_signature_enabled]" value="0">
                                                                                        <input class="form-check-input" type="checkbox" name="files[digital_signature_enabled]" value="1"
                                                                                            {{ $fileSettings['digital_signature_enabled'] ? 'checked' : '' }}>
                                                                                    </div>
                                                                                    <label class="form-check-label"
                                                                                        for="userlist1"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item" style=" ">
                                                                        <div class="row">
                                                                            <div class="col "
                                                                                style="padding: 10px">{{ __("generated.Traçabilité des fichiers via blockchain") }}</div>
                                                                            <div class="col-auto">
                                                                                <div class="form-check form-switch"
                                                                                    style="margin-top: 8px;">
                                                                                    <div class="form-check form-switch mt-1">
                                                                                        <input type="hidden" name="files[blockchain_traceability_enabled]" value="0">
                                                                                        <input class="form-check-input" type="checkbox" name="files[blockchain_traceability_enabled]" value="1"
                                                                                            {{ $fileSettings['blockchain_traceability_enabled'] ? 'checked' : '' }}>
                                                                                    </div>
                                                                                    <label class="form-check-label"
                                                                                        for="userlist1"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer" style="padding: 10px">
                                                            <div class="form-check form-switch mt-2 mb-3">
                                                                <button type="submit" class="btn btn-theme mnw-100 "
                                                                    style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Enregistrer") }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    @if(session('success'))
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                Swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Succès',
                                                                    text: @json(session('success')),
                                                                    timer: 2500,
                                                                    showConfirmButton: false
                                                                });
                                                            });
                                                        </script>
                                                    @endif
                                                </div>
                                                {{-- End Tab Fichiers --}}

                                                {{-- <div class="tab-pane fade" id="tab5" role="tabpanel"
                                                    titleledby="tab5-tab">
                                                    <div class="row mt-2 mb-4 justify-content-center">
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px;line-height: 1;">
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Journalisation des accès via blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7"
                                                                                    class="form-check-input translated_text"
                                                                                    type="checkbox" role="switch"
                                                                                    name="rt1" data-target="#v1"
                                                                                    id="userlist1"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    aria-label="{{ __('generated.Activer/Désactiver') }}">
                                                                                <label class="form-check-label"
                                                                                    for="userlist1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Stockage des logs sur blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7"
                                                                                    class="form-check-input translated_text"
                                                                                    type="checkbox" role="switch"
                                                                                    name="rt1" data-target="#v1"
                                                                                    id="userlist1"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    aria-label="{{ __('generated.Activer/Désactiver') }}">
                                                                                <label class="form-check-label"
                                                                                    for="userlist1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item" style=" ">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Algorithme de hashage des logs") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="input-group ">
                                                                                <select
                                                                                    style=" border-bottom: 1px solid var(--adminux-theme) !important;"
                                                                                    class="form-select border-0"
                                                                                    id="country8" required="">
                                                                                    <option selected="">SHA-256</option>
                                                                                    <option>SHA-3</option>
                                                                                    <option>bcrypt</option>
                                                                                    <option>Argon2</option>
                                                                                    <option>PBKDF2</option>
                                                                                    <option>Scrypt</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col-5">
                                                            <ul class="list-group list-group-flush bg-none mb-4"
                                                                style="font-size: 15px;line-height: 1;">
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="font-weight: 700">{{ __("generated.Eléments") }}</div>
                                                                        <div class="col-auto "
                                                                            style="font-weight: 700">{{ __("generated.Action") }}</div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Historique des modifications sur blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7"
                                                                                    class="form-check-input "
                                                                                    type="checkbox" role="switch"
                                                                                    name="rt1" data-target="#v1"
                                                                                    id="userlist1"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    aria-label="{{ __('generated.Activer/Désactiver') }}">
                                                                                <label class="form-check-label"
                                                                                    for="userlist1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col "
                                                                            style="padding: 10px">{{ __("generated.Contrôle des accès sur blockchain") }}</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 8px;">
                                                                                <input
                                                                                    style="border-bottom: 1px solid #005DC7"
                                                                                    class="form-check-input "
                                                                                    type="checkbox" role="switch"
                                                                                    name="rt1" data-target="#v1"
                                                                                    id="userlist1"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    aria-label="{{ __('generated.Activer/Désactiver') }}">
                                                                                <label class="form-check-label"
                                                                                    for="userlist1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
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

    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            // Pour les checkboxes
            document.querySelectorAll('.setting-toggle').forEach(input => {
                input.addEventListener('change', (event) => {
                    const key = event.target.getAttribute('data-setting');
                    const value = event.target.checked ? true : false;

                    // Afficher une confirmation SweetAlert
                    Swal.fire({
                        title: "{{ __('generated.Êtes-vous sûr ?') }}",
                        text: "{{ __('generated.Voulez-vous vraiment mettre à jour ce paramètre ?') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "{{ __('generated.Oui, mettre à jour !') }}",
                        cancelButtonText: "{{ __('generated.Annuler') }}"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            updateSetting(key, value);
                        } else {
                            event.target.checked = !value;
                        }
                    });
                });
            });

            // Pour les selects
            document.querySelectorAll('.setting-select').forEach(select => {
                select.addEventListener('change', (event) => {
                    const key = event.target.getAttribute('data-setting');
                    const value = event.target.value;

                    // Afficher une confirmation SweetAlert
                    Swal.fire({
                        title: "{{ __('generated.Êtes-vous sûr ?') }}",
                        text: "{{ __('generated.Voulez-vous vraiment mettre à jour ce paramètre ?') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "{{ __('generated.Oui, mettre à jour !') }}",
                        cancelButtonText: "{{ __('generated.Annuler') }}"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            updateSetting(key, value);
                        } else {
                            event.target.value = event.target.getAttribute(
                                'data-previous-value');
                        }
                    });

                    event.target.setAttribute('data-previous-value', event.target.value);
                });
            });

            function updateSetting(key, value) {
                fetch("{{ route('api.security-settings.update') }}", {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({
                            [key]: value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Mise à jour réussie', data);
                        // Afficher un message de succès
                        Swal.fire({
                            icon: 'success',
                            title: "{{ __('generated.Succès !') }}",
                            text: "{{ __('generated.Le paramètre a été mis à jour avec succès.') }}",
                             confirmButtonText: "{{ __('generated.OK') }}"
                        });
                    })
                    .catch(error => {
                        console.error('Erreur lors de la mise à jour', error);
                        // Afficher un message d'erreur
                        Swal.fire({
                            icon: 'error',
                            title:  "{{ __('generated.Erreur !') }}",
                            text: "{{ __('generated.Une erreur est survenue lors de la mise à jour du paramètre.') }}",
                             confirmButtonText: "{{ __('generated.OK') }}"
                        });
                    });
            }
        });
    </script>

    {{-- Script Update session --}}
    <script>
        document.querySelector('form[action="{{ route('settings.session.update') }}"]').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: {{ __('generated.Confirmer la modification ?') }},
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: {{ __('generated.Oui, enregistrer') }},
                cancelButtonText: "{{ __('generated.Annuler') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
    {{-- End Script Update session --}}

@endsection
