<div class="container mt-4">

    <div class="row mb-5 justify-content-center">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 " style="padding: 10px 20px;">
                                <div class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">

                                        <h5 class="fw-medium mb-0 ">{{ __("generated.Liste des clients") }}</h5>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12" style="overflow: hidden;overflow-x: scroll;">
                                            <table style="width: 3105px;border-collapse:collapse"
                                                class="table offres-table" data-show-toggle="true" id="clientTable">
                                                <thead
                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9 !important;">

                                                    <tr>
                                                        <th  colspan="10"
                                                            style="text-align:center;">{{ __("generated.Coordonnées") }}</th>
                                                        <th  colspan="6"
                                                            style="text-align:center;">{{ __("generated.Infos fiscales") }}</th>
                                                        <th  colspan="3"
                                                            style="text-align:center;">{{ __("generated.Contacts") }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th  style="font-weight: 600;">{{ __("generated.N° client") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Raison sociale") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Forme juridique") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Régime fiscal") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Secteur") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Activité") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Adresse") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Code postal") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Ville") }}</th>
                                                        <!-- 3 pour le Registre du Commerce -->
                                                        <th  style="font-weight: 600;">{{ __("generated.RC Numéro") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.RC Ville") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.RC Pays") }}</th>
                                                        <!-- ICE, IF, Taxe Pro -->
                                                        <th  style="font-weight: 600;">{{ __("generated.ICE") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.identifiant Fiscal") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Taxe Pro") }}</th>
                                                        <!-- 3 pour contacts -->
                                                        <th  style="font-weight: 600;">{{ __("generated.Téléphone") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Email") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Site Web") }}</th>
                                                        <th  style="font-weight: 600;">{{ __("generated.Action") }}</th>

                                                    </tr>
                                                </thead>
                                                <tbody
                                                    style="font-size: 13px; vertical-align: middle;text-align:center;">

                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td class=" translated_text">{{ __($client->id) }}</td>
                                                            <td class=" translated_text">{{ __($client->name) }}</td>
                                                            <td class=" translated_text">
                                                                {{ App\Enums\Client\JuridicalFormEnum::getValue($client->juridical_form) }}
                                                            </td>
                                                            <td class=" translated_text">{{ __($client->tax_regime) }}</td>
                                                            <td class=" translated_text">{{ __($client->activity_area_id) }}
                                                            </td>
                                                            <td class=" translated_text">{{ __($client->activite) }}</td>
                                                            <td class=" translated_text">{{ __($client->adresse) }}</td>
                                                            <td class=" translated_text">{{ __($client->code_postal) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mx-0 mb-3">
                                        <div class="col-6 ">

                                        </div>
                                        <div class="col-6 footable-paging-external footable-paging-right"
                                            id="footable-pagination">
                                            <div class="footable-pagination-wrapper">
                                                <ul class="pagination">
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
                                                <div class="divider"></div><span class="label label-default">{{ __("generated.1 sur 2") }}</span>
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
