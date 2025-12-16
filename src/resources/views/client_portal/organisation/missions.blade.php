<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0"  >
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 p-0">
                                <div class="card-body filter-block">
                                    <div class="row">

                                        <!-- Countries -->
                                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                                            <div id="country-selector" class="custom-multiple-select rounded border poste-chosen"
                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <label><span >{{ __("generated.Pays") }}</span></label>
                                                <select class="chosenoptgroup w-100" id="filter-pays">
                                                    <option>Tous</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ __($country->id) }}"
                                                                data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                            {{ __($country->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Cities -->
                                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                                            <div id="city-selector" class="custom-multiple-select rounded border poste-chosen"
                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <label><span >{{ __("generated.Ville") }}</span></label>
                                                <select class="chosenoptgroup w-100" id="filter-ville">
                                                    <option value="Tous" selected>Tous</option>
                                                    @if (isset($cities))
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id ?? '' }}"
                                                                    data-country="{{ $city->country?->id ?? '' }}">
                                                                {{ __($city->name ?? '_' )}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
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

    <div class="row mb-5 justify-content-center">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">
                                        <h5 class="fw-medium mb-0 ">{{ __("generated.Offres d'emploi") }}</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Ajout de la classe table-responsive pour permettre le défilement horizontal -->
                                    <div class="table-responsive">
                                        <table class="table offres-table" data-show-toggle="true" id="missionTable" style="width: 100%;">
                                            <thead
                                                style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                            <tr style="vertical-align: middle;">
                                                <th rowspan="2">#</th>
                                                <th rowspan="2">N° client</th>
                                                <th rowspan="2">Client</th>
                                                <th rowspan="2">Intitulé du poste</th>
                                                <th rowspan="2">Type de contrat</th>
                                                <th rowspan="2">Localisation</th>
                                                <th rowspan="2">Formation</th>
                                                <th rowspan="2">Expérience</th>
                                                <th rowspan="2">Nombre de Profils</th>
                                                <th colspan="2">Période de l'offre</th>
                                                <th rowspan="2">Statut</th>
                                                <th rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600">Date de début</th>
                                                <th style="font-weight: 600">Date de fin</th>
                                            </tr>
                                            </thead>
                                            <tbody
                                                style="font-size: 13px;vertical-align: middle;text-align: center;">
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row align-items-center mx-0 m-2">
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
