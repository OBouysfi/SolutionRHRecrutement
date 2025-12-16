@extends('layouts.master')
@section('title', 'Gestion des clients')

@section('css_header')
@endsection

@section('content')
    <main class="main mainheight">

        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 48px">
                            <div class="row mb-5">
                                <div class="col-auto"><span><img src="assets/img/icon/Recruitment.png" alt=""
                                            style="width: 35%;"></span></div>
                                <div class="col-auto ms-auto" style="padding-top: 15px;">
                                    <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Rapports financiers") }}</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-11 " style="text-align: center;">
                                    <span>Du 30/11/2024 au 25/12/2024</span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <span>Devis : MAD </span>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-12 mb-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0" style="box-shadow: none;">
                                                <div class="card-body" style="padding: 10px 34px;">
                                                    <div class="row justify-content-center ">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 224px;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Dépense</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Budget</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="3"
                                                                            style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Réel</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Ecart</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th
                                                                            style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-top: 1px solid #000;border-bottom: 1px solid #000;text-align: left;width: 118px;">
                                                                            Facture</th>
                                                                        <th
                                                                            style="text-align: right;width: 170px;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                            Montant</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/linkedin.png"
                                                                                style="width: 24px;"> <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Linkedin</span>
                                                                        </td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            45 000,00</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            01/12/2024</td>
                                                                        <td style="vertical-align: middle;text-align: left">
                                                                            CRE9821/2024</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            48 000,00</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">3 000,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/Sigle%20rekrute.jpg"
                                                                                style="width: 24px;"> <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Rekrute</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            60 000,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            02/12/2024</td>
                                                                        <td style="vertical-align: middle;text-align: left">
                                                                            00823/12</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            60 000,00</td>
                                                                        <td style="text-align: right;">0,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/Sigle%20indeed.png"
                                                                                style="width: 24px;background-color: #cccccc8a;">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Indeed</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            7 000,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            03/12/2024</td>
                                                                        <td style="vertical-align: middle;text-align: left">
                                                                            24/6523</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            8 300,00</td>
                                                                        <td style="text-align: right;">1 300,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/Monster%20sigle.png"
                                                                                style="width: 24px;background-color: var(--adminux-theme-bg);padding: 5px;">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Monster</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            8 900,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            04/12/2024</td>
                                                                        <td style="vertical-align: middle;text-align: left">
                                                                            ALM/6512/24</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            7 200,00</td>
                                                                        <td style="text-align: right;">-1 700,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/Dreamjob%20sigle.png"
                                                                                style="width: 24px;background-color: var(--adminux-theme-bg);">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Dreamjob</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle"></td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                        </td>
                                                                        <td style="vertical-align: middle"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/emploi.ma%20sigle.png"
                                                                                style="width: 24px;background-color: var(--adminux-theme-bg);padding: 3px;">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Emploi.ma</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            2 500,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            06/12/2024</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: left">
                                                                            7623/AZ/2024</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            2 500,00</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            0,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/M-Job-sigle.png"
                                                                                style="width: 24px;"> <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">M-Job</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle"></td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                        </td>
                                                                        <td style="vertical-align: middle"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle"><img
                                                                                src="assets/img/logo-entreprise/HJ_icon_green_black.png"
                                                                                alt="" style="width: 24px"> <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Human
                                                                                Jobs</span></td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            65 000,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            08/12/2024</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: left">
                                                                            ACE7623/2024</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            65 000,00</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            0,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <img src="assets/img/logo-entreprise/HJ_icon%20black%20background%201.png"
                                                                                alt="" style="width: 24px">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Test
                                                                                technique</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            10 000,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            10/12/2024</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: left">
                                                                            ACE8763/2024</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            8 000,00</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            -2 000,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <img src="assets/img/logo-entreprise/HJ_icon%20black%20background%201.png"
                                                                                alt="" style="width: 25px">
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Test
                                                                                personnalité</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            15 000,00</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            10/12/2024</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: left">
                                                                            ACE9009/2024</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            9 500,00</td>
                                                                        <td
                                                                            style="text-align: right;vertical-align: middle">
                                                                            -5 500,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 1px solid #000;vertical-align: middle">
                                                                            <div class="avatar avatar-30 rounded bg-light-blue"
                                                                                style="background-color: #000 !important;width: 24px !important;height: 24px !important;">
                                                                                <i class="bi bi-megaphone-fill avatar   rounded h5"
                                                                                    style="color: #fff;font-size: 13px;"></i>
                                                                            </div>
                                                                            <span
                                                                                style="font-size: 14px;margin-left: 6px;font-weight: 700">Frais
                                                                                de communication</span>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                            1 500,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                            08/12/2024</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #000;vertical-align: middle;text-align: left">
                                                                            8723/ER/24</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                            1 200,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                            -300,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                            Total</td>
                                                                        <td
                                                                            style="border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle;text-align: right">
                                                                            214 900,00</td>
                                                                        <td
                                                                            style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                            209 700,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                            -5 200,00</td>
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
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="card border-0">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <i
                                                                class="bi bi-bar-chart h5 avatar avatar-40 bg-light-theme rounded"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0">Performances</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-body" style="padding: 20px 34px;height: 263px;">

                                                    <div class="row justify-content-center ">
                                                        <div class="col-4">
                                                            <div class="row justify-content-center">
                                                                <div class="col-auto" style="text-align: center">
                                                                    <div class="doughnutchart mb-2">
                                                                        <canvas id="doughnutchart"></canvas>
                                                                        <div class="countvalue shadow">
                                                                            <div class="w-100">
                                                                                <h5 class="mb-1">300</h5>
                                                                                <p>CVs</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span style="font-weight: 700">CVs générés</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row justify-content-center">
                                                                <div class="col-auto" style="text-align: center">
                                                                    <div class="doughnutchart mb-2">
                                                                        <canvas id="doughnutchart2"></canvas>
                                                                        <div class="countvalue shadow">
                                                                            <div class="w-100">
                                                                                <h5 class="mb-1">170</h5>
                                                                                <p>CVs</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span style="font-weight: 700">CVs qualifiés</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row justify-content-center">
                                                                <div class="col-auto" style="text-align: center">
                                                                    <div class="doughnutchart mb-2">
                                                                        <canvas id="doughnutchart3"></canvas>
                                                                        <div class="countvalue shadow">
                                                                            <div class="w-100">
                                                                                <h5 class="mb-1">33%</h5>
                                                                                <p>CVs Retenus</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span style="font-weight: 700">Taux de
                                                                        conversion</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <i
                                                                class="bi bi-bar-chart h5 avatar avatar-40 bg-light-theme rounded"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0">Évaluation des dépenses</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-body" style="padding: 33px 34px;height: 278px;">

                                                    <div class="row justify-content-center ">
                                                        <div class="col-12">
                                                            <div class="bigchart200 mt-2">
                                                                <canvas id="areachart1"></canvas>
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
            </div>
        </div>
    </main>
@endsection

@section('js_footer')
    <script type="text/javascript">
        $(window).on('load', function() {
            /* doughnut chart js */
            var doughnutchart = document.getElementById('doughnutchart').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [100, 20, 80, 60, 40],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
                    tooltips: {
                        position: 'nearest',
                        yAlign: 'bottom'
                    },
                    plugins: {
                        legend: {
                            display: false,
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart = new Chart(doughnutchart, mydoughnutchartCofig);

            /* doughnut chart js */
            var doughnutchart2 = document.getElementById('doughnutchart2').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [70, 15, 40, 45, 35],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig2 = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
                    tooltips: {
                        position: 'nearest',
                        yAlign: 'bottom'
                    },
                    plugins: {
                        legend: {
                            display: false,
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart2 = new Chart(doughnutchart2, mydoughnutchartCofig2);

            /* doughnut chart js */
            var doughnutchart3 = document.getElementById('doughnutchart3').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [58, 8, 33, 35, 31],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig3 = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
                    tooltips: {
                        position: 'nearest',
                        yAlign: 'bottom'
                    },
                    plugins: {
                        legend: {
                            display: false,
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart3 = new Chart(doughnutchart3, mydoughnutchartCofig3);
            /* chart js areachart */
            window.randomScalingFactor = function() {
                return Math.round(Math.random() * 20);
            }

            window.randomScalingFactor2 = function() {
                return Math.round(Math.random() * 10);
            }

            /* bar chart */
            var areachart = document.getElementById('areachart1').getContext('2d');
            var areachart1 = areachart.createLinearGradient(0, 0, 0, 195);
            areachart1.addColorStop(0, 'rgba(1, 94, 194, 0.4)');
            areachart1.addColorStop(1, 'rgba(0, 197, 221, 0)');
            var areachart2 = areachart.createLinearGradient(0, 0, 0, 190);
            areachart2.addColorStop(0, 'rgba(240, 61, 79, 0.4)');
            areachart2.addColorStop(1, 'rgba(255, 223, 220, 0)');
            var areachart3 = areachart.createLinearGradient(0, 0, 0, 195);
            areachart3.addColorStop(0, 'rgba(145, 195, 0, 0.85)');
            areachart3.addColorStop(1, 'rgba(176, 197, 0, 0)');
            var myareachart = {
                type: 'bar',
                data: {
                    labels: ['Jan-2025', 'Fév-2025', 'Mar-2025', 'Avr-2025', 'Mai-2025', 'Jun-2025', 'Jul-2025',
                        'Aoû-2025', 'Sep-2025', 'Oct-2025', 'Nov-2025', 'Déc-2025'
                    ],
                    datasets: [{
                        label: '# income',
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart3,
                        borderColor: '#91C300',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }, {
                        label: '# of Expense',
                        data: [
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart2,
                        borderColor: 'rgba(240, 61, 79, 0.65)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }, {
                        label: '# of Investments',
                        data: [
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart1,
                        borderColor: 'rgba(1, 94, 194, 0.4)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }]
                },
                options: {
                    layout: {
                        padding: 0,
                    },
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            display: true,
                            grid: {
                                display: false
                            },
                            beginAtZero: true,
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            display: true,
                            beginAtZero: false,
                        }
                    }
                }
            }
            var myareachartexecu = new Chart(areachart, myareachart);
        })
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
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
