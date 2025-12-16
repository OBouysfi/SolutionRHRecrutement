<div class="row mb-5 justify-content-center">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body" style="background-color: #e4e8ee54">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="tab-content py-3" id="myTabContent"
                                    style="background-color: #fff">
                                    <!-- personal info tab-->
                                    <div class="tab-pane fade active show" id="personalB" role="tabpanel"
                                        aria-labelledby="personalB-tab" style="padding: 0px 17px">
                                        <div class="row mb-4">
                                           
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <table class="table table-mission table-responsive tous mission-history-table" data-show-toggle="true" style="width: 100%;">
                                                    <thead
                                                        style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                        <tr>
                                                            <th  style="width: 78px;padding: 12px 8px;">{{ __("generated.N°") }}</th>
                                                            <th  style="width: 186px;padding: 12px 8px;">{{ __("generated.Client") }}</th>
                                                            <th  style="width: 111px;padding: 12px 8px;">{{ __("generated.Date début") }}</th>
                                                            <th  style="width: 111px;padding: 12px 8px;">{{ __("generated.Date fin") }}</th>
                                                            <th  style="padding: 12px 8px;width: 200px;">{{ __("generated.Poste") }}</th>
                                                            <th  style="width: 83px;padding: 12px 8px;">{{ __("generated.Durée") }}</th>
                                                            <th 
                                                                style="text-align: center;width: 165px;padding: 12px 8px;">{{ __("generated.Présélectionnés") }}</th>
                                                            <th 
                                                                style="text-align: center;width: 133px;padding: 12px 8px;">{{ __("generated.En entretien") }}</th>
                                                            <th 
                                                                style="text-align: center;width: 128px;padding: 12px 8px;">{{ __("generated.Retenus") }}</th>
                                                            <th 
                                                                style="text-align: center;width: 136px;padding: 12px 8px;">{{ __("generated.Embauchés") }}</th>
                                                            <th 
                                                                style="text-align: center;width: 127px;padding: 12px 8px;">{{ __("generated.Rejetés") }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px; text-align: center;">
                                                       
                                                    </tbody>
                                                </table>

                                                
                                            </div>
                                            {{-- <div class="row align-items-center mx-0 m-2">
                                                <div class="col-12 col-md-6"></div>
                                                <div class="col-12 col-md-6 footable-paging-external footable-paging-right text-center text-md-end"
                                                    id="footable-pagination">
                                                    <div
                                                        class="footable-pagination-wrapper d-inline-block d-md-flex justify-content-md-end overflow-auto">
                                                        <ul class="pagination mb-2 mb-md-0">
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
                                                        <div class="divider d-none d-md-block mx-2"></div>
                                                        <span class="label label-default d-block d-md-inline">1 sur
                                                            2</span>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="personalB2" role="tabpanel"
                                        aria-labelledby="personalB2-tab" style="padding: 0px 17px">
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h5 class="title custom-title">Résultats des recrutements
                                                    précédents</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <table class="table">
                                                    <thead
                                                        style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr>
                                                            <th style="width: 78px;padding: 12px 8px;">N°</th>
                                                            <th style="width: 186px;padding: 12px 8px;">Client
                                                            </th>
                                                            <th style="width: 186px;padding: 12px 8px;">Poste
                                                            </th>
                                                            <th style="width: 83px;padding: 12px 8px;">Durée
                                                            </th>
                                                            <th
                                                                style="text-align: center;width: 111px;padding: 12px 8px;">
                                                                Taux de placement</th>
                                                            <th style="width: 111px;padding: 12px 8px;">
                                                                Candidats placés</th>
                                                            <th
                                                                style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                Performances des candidats</th>
                                                            <th
                                                                style="text-align: center;padding: 12px 8px;width: 200px;">
                                                                Satisfaction client</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27034</td>
                                                            <td style="vertical-align: middle">AAT</td>
                                                            <td style="vertical-align: middle">Développeur Full
                                                                Stack</td>
                                                            <td style="vertical-align: middle">2 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                2</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 82%;">85%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 85%"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27106</td>
                                                            <td style="vertical-align: middle">Agricultura
                                                                España</td>
                                                            <td style="vertical-align: middle">Chef de projet
                                                                IT</td>
                                                            <td style="vertical-align: middle">3 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                1</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 64%;">75%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 75%"
                                                                        aria-valuenow="75" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27442</td>
                                                            <td style="vertical-align: middle">Arthur Benson
                                                            </td>
                                                            <td style="vertical-align: middle">Responsable
                                                                Marketing</td>
                                                            <td style="vertical-align: middle">1 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                1</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 43%;">65%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 65%"
                                                                        aria-valuenow="65" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27056</td>
                                                            <td style="vertical-align: middle">Consortium Delta
                                                            </td>
                                                            <td style="vertical-align: middle">Analyste
                                                                financier</td>
                                                            <td style="vertical-align: middle">3 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                2</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 97%;">92%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 92%"
                                                                        aria-valuenow="92" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27100</td>
                                                            <td style="vertical-align: middle">VECTORIA LLC
                                                            </td>
                                                            <td style="vertical-align: middle">Commercial B2B
                                                            </td>
                                                            <td style="vertical-align: middle">2 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                2</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 53%;">70%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuenow="70" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="text-align: left;vertical-align: middle">
                                                                27089</td>
                                                            <td style="vertical-align: middle">Agricultura
                                                                España</td>
                                                            <td style="vertical-align: middle">Designer UX/UI
                                                            </td>
                                                            <td style="vertical-align: middle">1 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenM6">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                1</td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenSM6">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                style="text-align: center;vertical-align: middle">
                                                                <label
                                                                    style="text-align: right;width: 102%;">95%</label>
                                                                <div class="progress mb-3">
                                                                    <div class="progress-bar progress-bar-striped bg-teal"
                                                                        role="progressbar" style="width: 95%"
                                                                        aria-valuenow="95" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="personalB3" role="tabpanel"
                                        aria-labelledby="personalB3-tab" style="padding: 0px 17px">
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h5 class="title custom-title">Candidats précédemment recrutés
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <table class="table table-mission tous">
                                                    <thead
                                                        style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr>
                                                            <th style="width: 218px;padding: 12px 8px;">Prénom
                                                                et Nom du candidat</th>
                                                            <th style="width: 78px;padding: 12px 8px;">
                                                                Référence</th>
                                                            <th style="width: 135px;padding: 12px 8px;">Client
                                                            </th>
                                                            <th style="padding: 12px 8px;width: 200px;">Poste
                                                            </th>
                                                            <th
                                                                style="width: 134px;padding: 12px 8px;text-align: center">
                                                                Date de placement</th>
                                                            <th
                                                                style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                Durée dans le poste</th>
                                                            <th style="width: 174px;padding: 12px 8px;">
                                                                Évaluation de performance</th>
                                                            <th
                                                                style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                Objectifs atteints</th>
                                                            <th
                                                                style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                    <img src="assets/img/icon/59902.jpg"
                                                                        alt="" style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Nouhaila
                                                                    SAOUD</span>
                                                            </td>
                                                            <td style="vertical-align: middle">19872</td>
                                                            <td style="vertical-align: middle">AAT</td>
                                                            <td style="vertical-align: middle">Chef de projet
                                                                senior</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                01/03/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                6 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZM1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenTM1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv19.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv19.jpg"
                                                                        alt="" style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Yassine EL
                                                                    ALAMI</span>
                                                            </td>
                                                            <td style="vertical-align: middle">12759</td>
                                                            <td style="vertical-align: middle">Agricultura
                                                                España</td>
                                                            <td style="vertical-align: middle">Consultant Cloud
                                                                Computing</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                15/04/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                3 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZM2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenTM2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv20.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv20.jpg"
                                                                        alt="" style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Hicham
                                                                    KABBAJ</span>
                                                            </td>
                                                            <td style="vertical-align: middle">10659</td>
                                                            <td style="vertical-align: middle">Arthur Benson
                                                            </td>
                                                            <td style="vertical-align: middle">Ingénieur
                                                                BigData</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                10/05/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                4 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZM3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenTM3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv21.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv21.jpg"
                                                                        alt="" style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Fatima Zahra
                                                                    BENSOUDA</span>
                                                            </td>
                                                            <td style="vertical-align: middle">10959</td>
                                                            <td style="vertical-align: middle">Consortium Delta
                                                            </td>
                                                            <td style="vertical-align: middle">Gestion de
                                                                projets IT</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                01/06/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                12 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZM4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenTM4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv22.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv22.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Karim
                                                                    BENKIRAN</span>
                                                            </td>
                                                            <td style="vertical-align: middle">11752</td>
                                                            <td style="vertical-align: middle">VECTORIA LLC
                                                            </td>
                                                            <td style="vertical-align: middle">Consultant
                                                                Cloud</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                20/06/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                2 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZM5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-5" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenTM5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <table class="table table-mission client-1 hidden">
                                                    <thead
                                                        style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr>
                                                            <th style="width: 180px;padding: 12px 8px;">Prénom
                                                                et Nom du candidat</th>
                                                            <th style="padding: 12px 8px;width: 122px;">Poste
                                                            </th>
                                                            <th
                                                                style="width: 134px;padding: 12px 8px;text-align: center">
                                                                Date de placement</th>
                                                            <th
                                                                style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                Durée dans le poste</th>
                                                            <th
                                                                style="width: 155px;padding: 12px 8px;text-align: center;">
                                                                Évaluation de performance</th>
                                                            <th
                                                                style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                Objectifs atteints</th>
                                                            <th
                                                                style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv1.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv1.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Ahmed EL
                                                                    MANSOURI</span>
                                                            </td>
                                                            <td style="vertical-align: middle">Analyste
                                                                financier</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                01/03/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                6 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZ2M1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenT2M1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv4.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv4.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Fatima
                                                                    BENYAHIA</span>
                                                            </td>
                                                            <td style="vertical-align: middle">Architecte
                                                                Cloud</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                15/04/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                3 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZ2M2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenT2M2">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv2.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv2.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Youssef
                                                                    AMRANI</span>
                                                            </td>
                                                            <td style="vertical-align: middle">Comptable</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                10/05/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                4 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZ2M3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenT2M3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv5.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv5.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Hind
                                                                    TAZI</span>
                                                            </td>
                                                            <td style="vertical-align: middle">Chef comptable
                                                            </td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                01/06/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                12 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZ2M4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenT2M4">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle">
                                                                <figure
                                                                    class="avatar avatar-50 mb-0 coverimg "
                                                                    style="background-image: url(&quot;assets/img/cvtheque/cv3.jpg&quot;);">
                                                                    <img src="assets/img/cvtheque/cv3.jpg"
                                                                        alt=""
                                                                        style="display: none;">
                                                                </figure>
                                                                <span style="margin-left: 8px">Khalid
                                                                    OULHAJ</span>
                                                            </td>
                                                            <td style="vertical-align: middle">Technicien
                                                                junior</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                20/06/2023</td>
                                                            <td
                                                                style="vertical-align: middle;text-align: center">
                                                                2 mois</td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenZ2M5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                <div class="col-2" style="margin: 0 auto;">
                                                                    <div class="circle-small">
                                                                        <div id="circleprogressgreenT2M5">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-3" style="margin: 0 auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            data-bs-popper="static"
                                                                            style="padding: 0;min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-row1"
                                                                                    href="matching-detail.html">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
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