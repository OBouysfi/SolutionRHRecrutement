@extends('layouts.master')

@section('title', 'Curriculum Vitae')

@section('css_header')

@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0">Curriculum Vitae</h5>
            </div>
            <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar1" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div>
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Guide vidéo">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Chatbot">
                <figure class="avatar avatar-40 coverimg  shadow custom-chatbox" style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                    <img src="assets/img/icon/HJ_icon_green_black.png" alt="" style="display: none;">
                </figure>
            </div>
            <div class="col col-sm-auto"  data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="assets/img/icon/faciliti.png" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Curriculum Vitae : Nouhaila SAOUD</li>
            </ol>
        </nav>
    </div>

    <!-- content -->
    <div class="container mt-4">
        <div class="row">
            <div class="card border-0"  >
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="card border-0" style="width: 657px;margin-right: 44px;">
                            <div class="card-body">
                                <div class="col-12">
                                    <img src="assets/img/icon/CV-Nouhaila-SAOUD.jpg">
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