@extends('layouts.master')

@section('title', 'Rapport Matching')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">

        <!-- content -->
        <div class="container mt-4" style="max-width: 1060px !important;">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 48px">
                            <div class="row mb-5" style="margin-bottom: 75px !important;">
                                <div class="col-auto" style="width: 50%;"><span><img
                                            src="{{ asset('assets/img/icon/Recruitment.png') }}" alt=""
                                            style="width: 62%;"></span></div>
                                <div class="col-auto ms-auto" style="padding-top: 15px;">
                                    <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Rapport Matching kkk") }}</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-2" style="width: 14%">
                                    <div class="card border-0" style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">

                                                                <div class="col">
                                                                    <p class="text-secondary small mb-1 "
                                                                        style="margin-bottom: 2px !important;font-size: 11px;">{{ __("generated.Référence") }}</p>
                                                                    <h5 class="fw-medium"
                                                                        style="margin-bottom: 6px !important;font-size: 14px;">
                                                                        19872</h5>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3" style="width: 31%;margin-left: -14px;">
                                    <div class="card border-0" style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <figure class="avatar avatar-40 mb-0 coverimg "
                                                                        style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                        <img src="{{ asset('assets/img/icon/59902.jpg') }}"
                                                                            alt="" style="display: none;">
                                                                    </figure>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <p class="text-secondary small mb-1 "
                                                                        style="margin-bottom: 2px !important;font-size: 11px;">{{ __("generated.Prénom et Nom") }}</p>
                                                                    <h6 class="fw-medium "
                                                                        style="margin-bottom: 6px !important;font-size: 14px;">{{ __("generated.Nouhaila SAOUD") }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2" style="width: 27%;margin-left: -14px;">
                                    <div class="card border-0" style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">

                                                                <div class="col">
                                                                    <p class="text-secondary small mb-1 "
                                                                        style="margin-bottom: 2px !important;font-size: 11px;">{{ __("generated.Offre d'emploi") }}</p>
                                                                    <h5 class="fw-medium "
                                                                        style="margin-bottom: 6px !important;font-size: 14px;">{{ __("generated.Chef de projet IT") }}</h5>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2" style="width: 32%;margin-left: -14px;">
                                    <div class="card border-0" style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">

                                                                <div class="col">
                                                                    <p class="text-secondary small mb-1 "
                                                                        style="margin-bottom: 2px !important;font-size: 11px;">{{ __("generated.Client") }}</p>
                                                                    <h5 class="fw-medium "
                                                                        style="margin-bottom: 6px !important;font-size: 14px;">{{ __("generated.Consortium Delta") }}</h5>
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
                            <div class="row justify-content-center mb-3">
                                <div class="col-12">
                                    <input type="file" id="demo-file" class="hidden">
                                    <table class="table">
                                        <thead style="font-size: 14px">
                                            <tr>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;width: 200px;" >{{ __("generated.Intitulé") }}</th>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                </th>
                                                <th colspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center;width: 111px;" >{{ __("generated.Candidat") }}</th>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                </th>
                                                <th colspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center" >{{ __("generated.Recruteur") }}</th>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                </th>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 87px;" >{{ __("generated.Ecart") }}</th>
                                                <th rowspan="2"
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 90px;" >{{ __("generated.Score") }}</th>
                                            </tr>
                                            <tr>
                                                <th
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                <th
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                                <th
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                <th
                                                    style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 14px">
                                            <tr>
                                                <td colspan="10"
                                                    style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Profil") }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Formation") }}</td>
                                                <td rowspan="3" style="width: 2px;border-bottom: 0"></td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span >{{ __("generated.Bac") }}</span>+4</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right"></td>
                                                <td rowspan="3" style="border-bottom: 0;width: 2px"></td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span >{{ __("generated.Bac") }}</span>+5</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td rowspan="3" style="border-bottom: 0;width: 2px"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM1"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Expérience") }}</td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 <span >{{ __("generated.ans") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right"></td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 <span >{{ __("generated.ans") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">2
                                                    ans&nbsp;<i class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM2"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Type de contrat") }}</td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CDI</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right"></td>
                                                <td
                                                    style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CDI</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM3"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;">
                                                    Mobilité</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Mobilité géographique") }}</td>
                                                <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i>
                                                    <span>Locale</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM4"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Régionale") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM5"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Nationale") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM6"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Internationale") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">40%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM7"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Mode de travail") }}</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Présentiel") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM8"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Distanciel") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">5%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM9"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Hybride") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">40%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM10"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Temps de travail") }}</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Plein") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM11"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Partiel") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                    Disponibilité</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Immédiate") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM12"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Préavis") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences techniques") }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;">
                                                    Développement Informatique</td>
                                                <td rowspan="8" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="8" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="8" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Python</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">75%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM13"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Java</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">51%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">49%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM14"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>C++</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM15"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>JavaScript</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">75%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM16"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>PHP</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">40%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM17"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Ruby</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM18"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Swift</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">75%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM19"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;">
                                                    Compétences personnelles</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                    Personnalité</td>
                                                <td rowspan="13" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="13" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="13" style="width: 2px;border-bottom: 0;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Management") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM20"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Créativité") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">50%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM21"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Empathie") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM22"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Rigueur") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM23"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                    Motivations</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Stabilité") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM24"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Dynamisme") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">50%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM25"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                    Raisonnement</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Innover") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">65%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM26"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expérimenter") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">73%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">15%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">76%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">3%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM27"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Appliquer") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">63%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">35%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">96%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">30%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">33%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM28"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Approfondir") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">75%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM29"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"
                                                    style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences linguistiques") }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 0;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Français") }}</td>
                                                <td rowspan="23" style="width: 2px;border-bottom: 0"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="23" style="width: 2px;border-bottom: 0"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td rowspan="23" style="width: 2px;border-bottom: 0"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM30"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM31"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM32"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM33"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">85%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">15%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM34"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">75%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">25%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM35"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">Anglais
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">85%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">5%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM36"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM37"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM38"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM39"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">60%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">20%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM40"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">70%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM41"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">Espagnole
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM42"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM43"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%&nbsp;<i
                                                        class="bi bi-arrow-right"
                                                        style="color: #005dc7;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM44"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">100%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM45"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">90%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">10%&nbsp;<i
                                                        class="bi bi-arrow-up-right"
                                                        style="color: #2e9c65;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM46"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <td style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;"><i
                                                        class="bi bi-square-fill"
                                                        style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                </td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">73%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">80%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">0%</td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">7%&nbsp;<i
                                                        class="bi bi-arrow-down-left"
                                                        style="color: #dd2255;font-size: 15px"></i></td>
                                                <td style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                    <div class="circle-small" style="float: right">
                                                        <div id="circleprogressgreenRM47"></div>
                                                    </div>
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
    </main>
@endsection

@section('js_footer')
    <script type="text/javascript">
        $(window).on('load', function() {
            var progressCirclesredRM1 = new ProgressBar.Circle(circleprogressgreenRM1, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM1.animate(0.89); // Number from 0.0 to 1.0

            var progressCirclesredRM2 = new ProgressBar.Circle(circleprogressgreenRM2, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM2.animate(0.78); // Number from 0.0 to 1.0


            var progressCirclesredRM3 = new ProgressBar.Circle(circleprogressgreenRM3, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM3.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM4 = new ProgressBar.Circle(circleprogressgreenRM4, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM4.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM5 = new ProgressBar.Circle(circleprogressgreenRM5, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM5.animate(0.30); // Number from 0.0 to 1.0


            var progressCirclesredRM6 = new ProgressBar.Circle(circleprogressgreenRM6, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM6.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM7 = new ProgressBar.Circle(circleprogressgreenRM7, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM7.animate(0.20); // Number from 0.0 to 1.0


            var progressCirclesredRM8 = new ProgressBar.Circle(circleprogressgreenRM8, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM8.animate(0.80); // Number from 0.0 to 1.0



            var progressCirclesredRM9 = new ProgressBar.Circle(circleprogressgreenRM9, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#fdba00',
                    width: 10
                },
                to: {
                    color: '#fdba00',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM9.animate(0.50); // Number from 0.0 to 1.0


            var progressCirclesredRM10 = new ProgressBar.Circle(circleprogressgreenRM10, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM10.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM11 = new ProgressBar.Circle(circleprogressgreenRM11, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM11.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM12 = new ProgressBar.Circle(circleprogressgreenRM12, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM12.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM13 = new ProgressBar.Circle(circleprogressgreenRM13, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM13.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM14 = new ProgressBar.Circle(circleprogressgreenRM14, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#fdba00',
                    width: 10
                },
                to: {
                    color: '#fdba00',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM14.animate(0.51); // Number from 0.0 to 1.0


            var progressCirclesredRM15 = new ProgressBar.Circle(circleprogressgreenRM15, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM15.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM16 = new ProgressBar.Circle(circleprogressgreenRM16, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM16.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM17 = new ProgressBar.Circle(circleprogressgreenRM17, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM17.animate(0.10); // Number from 0.0 to 1.0

            var progressCirclesredRM18 = new ProgressBar.Circle(circleprogressgreenRM18, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM18.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM19 = new ProgressBar.Circle(circleprogressgreenRM19, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM19.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM20 = new ProgressBar.Circle(circleprogressgreenRM20, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM20.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM21 = new ProgressBar.Circle(circleprogressgreenRM21, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM21.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM22 = new ProgressBar.Circle(circleprogressgreenRM22, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM22.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM23 = new ProgressBar.Circle(circleprogressgreenRM23, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM23.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM24 = new ProgressBar.Circle(circleprogressgreenRM24, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM24.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM25 = new ProgressBar.Circle(circleprogressgreenRM25, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM25.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM26 = new ProgressBar.Circle(circleprogressgreenRM26, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM26.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM27 = new ProgressBar.Circle(circleprogressgreenRM27, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM27.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM28 = new ProgressBar.Circle(circleprogressgreenRM28, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#fdba00',
                    width: 10
                },
                to: {
                    color: '#fdba00',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM28.animate(0.65); // Number from 0.0 to 1.0

            var progressCirclesredRM29 = new ProgressBar.Circle(circleprogressgreenRM29, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM29.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM30 = new ProgressBar.Circle(circleprogressgreenRM30, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM30.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM31 = new ProgressBar.Circle(circleprogressgreenRM31, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM31.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM32 = new ProgressBar.Circle(circleprogressgreenRM32, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM32.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM33 = new ProgressBar.Circle(circleprogressgreenRM33, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM33.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM34 = new ProgressBar.Circle(circleprogressgreenRM34, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM34.animate(0.85); // Number from 0.0 to 1.0

            var progressCirclesredRM35 = new ProgressBar.Circle(circleprogressgreenRM35, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM35.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM36 = new ProgressBar.Circle(circleprogressgreenRM36, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM36.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM37 = new ProgressBar.Circle(circleprogressgreenRM37, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM37.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM38 = new ProgressBar.Circle(circleprogressgreenRM38, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM38.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM39 = new ProgressBar.Circle(circleprogressgreenRM39, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM39.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM40 = new ProgressBar.Circle(circleprogressgreenRM40, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM40.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM41 = new ProgressBar.Circle(circleprogressgreenRM41, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM41.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM42 = new ProgressBar.Circle(circleprogressgreenRM42, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM42.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM43 = new ProgressBar.Circle(circleprogressgreenRM43, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM43.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM44 = new ProgressBar.Circle(circleprogressgreenRM44, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM44.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM45 = new ProgressBar.Circle(circleprogressgreenRM45, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM45.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM46 = new ProgressBar.Circle(circleprogressgreenRM46, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM46.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM47 = new ProgressBar.Circle(circleprogressgreenRM47, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM47.animate(0.93); // Number from 0.0 to 1.0

            const video = document.getElementById("myVideo");
            const playPauseButton = document.getElementById("playPause");
            //const stopButton = document.getElementById("stop");
            const rewindButton = document.getElementById("rewind");
            //const fastForwardButton = document.getElementById("fastForward");
            const seekBar = document.getElementById("seekBar");
            const timeDisplay = document.getElementById("timeDisplay");
            const muteButton = document.getElementById("mute");
            const volumeBar = document.getElementById("volumeBar");
            const videoContainer = document.getElementById("myVideo")
            .parentElement; // Fullscreen on the video container
            const fullscreenButton = document.getElementById("fullscreen");

            // Fullscreen toggle function
            fullscreenButton.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    if (videoContainer.requestFullscreen) {
                        videoContainer.requestFullscreen();
                    } else if (videoContainer.mozRequestFullScreen) { // Firefox
                        videoContainer.mozRequestFullScreen();
                    } else if (videoContainer.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                        videoContainer.webkitRequestFullscreen();
                    } else if (videoContainer.msRequestFullscreen) { // IE/Edge
                        videoContainer.msRequestFullscreen();
                    }
                    //fullscreenButton.textContent = "Exit Fullscreen";
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) { // Firefox
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { // IE/Edge
                        document.msExitFullscreen();
                    }
                    //fullscreenButton.textContent = "Fullscreen";
                }
            });

            // Play/Pause toggle
            playPauseButton.addEventListener("click", function() {
                if (video.paused) {
                    video.play();
                    playPauseButton.innerHTML = '<i class="bi bi-pause-fill h2"></i>';
                } else {
                    video.pause();
                    playPauseButton.innerHTML = '<i class="bi bi-play-fill h2"></i>';
                }
            });

            // Stop the video
            /*stopButton.addEventListener("click", function() {
                video.pause();
                video.currentTime = 0;
                playPauseButton.textContent = "Play";
            });*/

            // Rewind 10 seconds
            rewindButton.addEventListener("click", function() {
                video.currentTime -= 10;
            });

            // Fast forward 10 seconds
            /* fastForwardButton.addEventListener("click", function() {
                 video.currentTime += 10;
             });*/

            // Update the seek bar as the video plays
            video.addEventListener("timeupdate", function() {
                const value = (100 / video.duration) * video.currentTime;
                seekBar.value = value;
                updateDisplayTime(video.currentTime);
                seekBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Seek video when user changes the seek bar
            seekBar.addEventListener("input", function() {
                const time = (seekBar.value * video.duration) / 100;
                video.currentTime = time;

            });

            // Mute/Unmute toggle
            muteButton.addEventListener("click", function() {
                video.muted = !video.muted;
                muteButton.innerHTML = video.muted ? '<i class="bi bi-volume-mute h4"></i>' :
                    '<i class="bi bi-volume-up h4"></i>';
                if (video.muted) {
                    volumeBar.value = 0;
                } else {
                    volumeBar.value = video.volume;
                }
            });
            volumeBar.style.background = `linear-gradient(to right, #025ec7 100%, #a7a0a05c 100%)`;
            // Adjust the volume
            volumeBar.addEventListener("input", function() {
                const value = volumeBar.value * 100
                video.volume = volumeBar.value;
                volumeBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Update time display
            function updateDisplayTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                timeDisplay.textContent = `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
            }

            $(".volume-show").mouseenter(function() {
                $('#volumeBar').removeClass('hidden');
            });
            $(".volume-show").mouseleave(function() {
                $('#volumeBar').addClass('hidden');
            });
        })
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#communication').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#communicationD').val("Communiquer efficacement.");
                } else if (value == "Débutant") {
                    $('#communicationD').val("Communication concise.");
                } else if (value == "Avancé") {
                    $('#communicationD').val("Communication adaptative et persuasive.");
                } else if (value == "Expert") {
                    $('#communicationD').val("Communication  stratégique.");
                }
            });
            $('#collaboration').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#collaborationD').val("Résolution de conflits.");
                } else if (value == "Débutant") {
                    $('#collaborationD').val("Collaboration efficace.");
                } else if (value == "Avancé") {
                    $('#collaborationD').val("Leadership et gestion d’équipe.");
                } else if (value == "Expert") {
                    $('#collaborationD').val("Gestion de groupes.");
                }
            });
            $('#adaptabilit').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#adaptabilitD').val("Apprentissage autonome.");
                } else if (value == "Débutant") {
                    $('#adaptabilitD').val("Adaptabilité et gestion du changement.");
                } else if (value == "Avancé") {
                    $('#adaptabilitD').val("Capacité à anticiper.");
                } else if (value == "Expert") {
                    $('#adaptabilitD').val("Gestion du changement.");
                }
            });
            $('#prise').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#priseD').val("Prise de décisions autonome.");
                } else if (value == "Débutant") {
                    $('#priseD').val("Prise de décision simple.");
                } else if (value == "Avancé") {
                    $('#priseD').val("Prise de décisions stratégiques.");
                } else if (value == "Expert") {
                    $('#priseD').val("Décision sous pression et stratégie.");
                }
            });
            $('#temps').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#tempsD').val("Gestion multitâches.");
                } else if (value == "Débutant") {
                    $('#tempsD').val("Respect des délais.");
                } else if (value == "Avancé") {
                    $('#tempsD').val("Gestion de projets et priorités.");
                } else if (value == "Expert") {
                    $('#tempsD').val("Planification stratégique.");
                }
            });
            $('#leadership').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#leadershipD').val("Prise d'initiatives et leadership.");
                } else if (value == "Débutant") {
                    $('#leadershipD').val("Atteinte des objectifs.");
                } else if (value == "Avancé") {
                    $('#leadershipD').val("Leadership  et innovation.");
                } else if (value == "Expert") {
                    $('#leadershipD').val("Leadership global.");
                }
            });
            $('#problemes').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#problemesD').val("Résolution de problèmes complexes.");
                } else if (value == "Débutant") {
                    $('#problemesD').val("Identification des problèmes.");
                } else if (value == "Avancé") {
                    $('#problemesD').val("Résolution analytique et créative.");
                } else if (value == "Expert") {
                    $('#problemesD').val("Gestion de crises.");
                }
            });
            $('#analyse').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#analyseD').val("Évaluation complexe et prise de décision.");
                } else if (value == "Débutant") {
                    $('#analyseD').val("Analyse réfléchie.");
                } else if (value == "Avancé") {
                    $('#analyseD').val("Stratégie data-driven.");
                } else if (value == "Expert") {
                    $('#analyseD').val("Prise de  décision impactante.");
                }
            });
            $('#innovation').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#innovationD').val("Innovation et résolution créative.");
                } else if (value == "Débutant") {
                    $('#innovationD').val("Proposition d'idées simples.");
                } else if (value == "Avancé") {
                    $('#innovationD').val("Créativité pour transformation.");
                } else if (value == "Expert") {
                    $('#innovationD').val("Leadership innovant.");
                }
            });
            $('#ethique').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#ethiqueD').val("Respect des valeurs et standards.");
                } else if (value == "Débutant") {
                    $('#ethiqueD').val("Respect des normes.");
                } else if (value == "Avancé") {
                    $('#ethiqueD').val("Gestion éthique sous pression.");
                } else if (value == "Expert") {
                    $('#ethiqueD').val("Intégrité et influence éthique.");
                }
            });
            $('#interculturelles').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#interculturellesD').val("Communication interculturelle.");
                } else if (value == "Débutant") {
                    $('#interculturellesD').val("Interaction interculturels.");
                } else if (value == "Avancé") {
                    $('#interculturellesD').val("Gestion d’équipes interculturelles.");
                } else if (value == "Expert") {
                    $('#interculturellesD').val("Gestion de projets internationaux.");
                }
            });
        });
        $(window).on('load', function() {
            $('taginput').tagsinput();

            /* ck editor */
            ClassicEditor
                .create(document.querySelector('#ckeditor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
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

        .ck.ck-editor__main {
            height: 219px;
            overflow: hidden;
            overflow-y: scroll;
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

        /******************Custom Video control ***********************/

        .custom-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .custom-controls i {
            color: #025ec7 !important;
        }

        .custom-controls.controls2 i {
            color: #04448d !important;
        }

        button,
        input[type="range"] {
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

        #seekBar,
        #volumeBar {
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

        #seekBar::-webkit-slider-runnable-track,
        #volumeBar::-webkit-slider-runnable-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-webkit-slider-thumb,
        #volumeBar::-webkit-slider-thumb {
            -webkit-appearance: none;
            background-color: #025ec7;
            /* Color of the thumb */
            height: 12px;
            width: 12px;
            border-radius: 50%;
            margin-top: -1px;
            cursor: pointer;
        }

        #seekBar::-moz-range-track,
        #volumeBar::-moz-range-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-moz-range-thumb,
        #volumeBar::-moz-range-thumb {
            background-color: #025ec7;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar::-ms-track,
        #volumeBar::-ms-track {
            background: transparent;
            border-color: transparent;
            color: transparent;
            height: 8px;
        }

        #seekBar::-ms-thumb,
        #volumeBar::-ms-thumb {
            background-color: #0b0f1f;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar:focus,
        #volumeBar:focus {
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

        .cover-cusomer figure {
            width: 64px !important;
            height: 64px !important;
        }

        table thead tr th,
        table tbody tr td {
            border-color: rgb(0 0 0 / 22%);
        }

        .title.custom-title {
            border-bottom: 0 !important;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        input[type="checkbox"] {
            display: none;
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
    </style>
@endsection
