@extends('layouts.master')

@section('title', 'Lettre de motivation')

@section('css_header')
<style>
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
    .ck.ck-editor__main{
        height: 219px;
        overflow: hidden;
        overflow-y: scroll;
    }
    
    .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p{
        text-align: justify;
    }

    .custom-color-icon i{color: #005dc7 !important;}

    .btn-annuler:hover{
        background-color: #e4e5e7;
        color: #686767;
    }
    .btn-ajouter{
        background-color: #005dc7;
    }
    .btn-ajouter:hover{
        background-color: #2e9c65 !important;
    }
    /******************Custom Video control ***********************/

    .custom-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }
    .custom-controls i{
        color: #025ec7 !important;
    }
    .custom-controls.controls2 i{
        color: #04448d !important;
    }

    button, input[type="range"] {
        cursor: pointer;
    }

    input[type="range"] {
        width: 150px;
    }

    .controls1 input[type="range"] {
        width: 80%;
    }

    #timeDisplay {
        font-family: monospace;
    }
    #seekBar,#volumeBar {
        appearance: none;
        height: 3px;
        background: linear-gradient(to right, #025ec7 0%, #025ec7 0%, #a7a0a05c 0%, #a7a0a05c 100%);
        border-radius: 5px;
        outline: none;
        cursor: pointer;
    }
    #seekBar {

        width: 100%;
    }

    #seekBar::-webkit-slider-runnable-track,#volumeBar::-webkit-slider-runnable-track {
        height: 8px;
        border-radius: 5px;
    }

    #seekBar::-webkit-slider-thumb,#volumeBar::-webkit-slider-thumb {
        -webkit-appearance: none;
        background-color: #025ec7; /* Color of the thumb */
        height: 12px;
        width: 12px;
        border-radius: 50%;
        margin-top: -1px;
        cursor: pointer;
    }

    #seekBar::-moz-range-track,#volumeBar::-moz-range-track {
        height: 8px;
        border-radius: 5px;
    }

    #seekBar::-moz-range-thumb,#volumeBar::-moz-range-thumb {
        background-color: #025ec7; /* Color of the thumb */
        height: 16px;
        width: 16px;
        border-radius: 50%;
        cursor: pointer;
    }

    #seekBar::-ms-track,#volumeBar::-ms-track {
        background: transparent;
        border-color: transparent;
        color: transparent;
        height: 8px;
    }

    #seekBar::-ms-thumb,#volumeBar::-ms-thumb {
        background-color: #0b0f1f; /* Color of the thumb */
        height: 16px;
        width: 16px;
        border-radius: 50%;
        cursor: pointer;
    }

    #seekBar:focus,#volumeBar:focus {
        outline: none;
    }
    video {
        width: 100%;
        height: auto;
    }

    :fullscreen video {
        width: 100vw;
        height: 100vh;
    }
    video::-webkit-media-controls {
        display: none !important;
    }

    video::-moz-media-controls {
        display: none !important;
    }
    /****************************************/

.cover-cusomer figure {width: 64px !important;height: 64px !important;}


    @media (min-width: 1400px) {
        .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
            max-width: 1470px;
        }
    }
</style>
@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Lettre de motivation") }}</h5>
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
                <figure class="avatar avatar-40 coverimg  shadow custom-chatbox" style="background-image: url('{{asset('assets/img//icon/HJ_icon_green_black.png')}}');background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                    <img src="{{asset('assets/img/icon/HJ_icon_green_black.png')}}" alt="" style="display: none;">
                </figure>
            </div>
            <div class="col col-sm-auto"  data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Lettre de motivation : Nouhaila SAOUD") }}</li>
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
                                    <img src="{{asset('assets/img/icon/LTP1.png')}}">
                                </div>
                            </div>
                        </div>
                        <div class="card border-0" style="width: 657px;">
                            <div class="card-body">
                                <div class="col-12">
                                    <img src="{{asset('assets/img/icon/LTP2.png')}}">
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