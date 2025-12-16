<div class="row mb-2 justify-content-center">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentationB">
                                                <button style="font-size: 14px" class="nav-link active" id="personalB-tab" data-bs-toggle="tab" data-bs-target="#personalB" type="button" role="tab" aria-controls="personalB" aria-selected="true">Missions précédentes</button>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="col-4 ms-auto" style="height: 50px !important;margin-top: auto;margin-bottom: auto;display: flex;justify-content: flex-end;">
                                        <div class="row">
                                            @can('profile-preview')
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme"
                                                         data-bs-toggle="tooltip" data-bs-placement="top"
                                                         title="Aperçu">
                                                        <a href="{{ route('jobOffer.previewHistory') }}"
                                                           target="_blank">
                                                            <i
                                                                class="bi bi-binoculars avatar   rounded h5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endcan






                                                @can('profile-export')
                                                    <!-- Icône Télécharger -->
                                                    <div class="col-auto">
                                                        <div class="avatar avatar-50 rounded bg-light-theme"
                                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                                             title="Télécharger" id="downloadExcel">
                                                            <a href="{{ route('export.job.offers') }}" type="button">
                                                                <i
                                                                    class="bi bi-cloud-download avatar   rounded h5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endcan

                                                @can('profile-print')
                                                    <div class="col-auto">
                                                        <div class="avatar avatar-50 rounded bg-light-theme"
                                                             data-bs-toggle="tooltip" data-bs-placement="top"
                                                             title="Imprimer">
                                                            <a href="#" onclick="printSection()"
                                                               data-format="A4">
                                                                <i
                                                                    class="bi bi-printer avatar   rounded h5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endcan



                                            <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                <div class="select-avatar avatar-50 rounded bg-light-theme translated_text" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <select id="customLength"  style="border: 0;background-color: transparent;width: 49px;color: #005dc7;">
                                                        <option selected>10</option>
                                                        <option>25</option>
                                                        <option>50</option>
                                                        <option>100</option>
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
                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Missions précédentes") }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                    <!-- personal info tab-->
                                    <div role="tabpanel" style="padding: 0px 17px">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <table class="table table-mission table-responsive tous mission-history-table" data-show-toggle="true" style="width: 100%;">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                    <tr>
                                                        <th style="width: 78px;padding: 12px 8px;">N°</th>
                                                        <th style="width: 186px;padding: 12px 8px;">Client
                                                        </th>
                                                        <th style="width: 111px;padding: 12px 8px;">Date
                                                            début</th>
                                                        <th style="width: 111px;padding: 12px 8px;">Date
                                                            fin</th>
                                                        <th style="padding: 12px 8px;width: 200px;">Poste
                                                        </th>
                                                        <th style="width: 83px;padding: 12px 8px;">Durée
                                                        </th>
                                                        <th
                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                            Présélectionnés</th>
                                                        <th
                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                            En entretien</th>
                                                        <th
                                                            style="text-align: center;width: 128px;padding: 12px 8px;">
                                                            Retenus</th>
                                                        <th
                                                            style="text-align: center;width: 136px;padding: 12px 8px;">
                                                            Embauchés</th>
                                                        <th
                                                            style="text-align: center;width: 127px;padding: 12px 8px;">
                                                            Rejetés</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px">

                                                    </tbody>
                                                </table>
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
