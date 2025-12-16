 <div class="modal fade" id="reussiteCvthequemodal" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
        <div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable" id="reussiteCvthequegDialog"  style="margin-top: 70px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0;">
                    <div class="row align-items-center" style="width: 100%">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded">
                                <a href="#" type="button">
                                    <i style="font-size: 20px;margin-top: -3px;" class="bi bi-table avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __("generated.Taux de réussite CVthèque vs. sourcing externe") }}</h6>
                        </div>
                         <div class="col-auto ms-auto" style="width: 180px;">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="filter-reussite-year" style="float: left">
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for($year = $currentYear; $year >= $currentYear - 5; $year--)
                                            <option value="{{ __($year) }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ __($year) }}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-auto" style="margin-right: -20px;">
                            <a style="margin-right: -10px;" type="button" class="btn btn-link btn-square fullscreen-toggle translated_text" data-bs-target="#reussiteCvthequemodal" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" data-bs-original-title="{{ __("generated.Go Fullscreen") }}">
                                <i class="bi bi-fullscreen" style="font-size: 20px;"></i>
                            </a>
                            <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#reussiteCvthequemodal">
                                <i class="bi bi-x-square" style="font-size: 20px;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <table class="table" id="reussiteTable" width="100%">
                                <thead style="font-size: 14px">
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle" >{{ __("generated.Mois") }}</th>
                                        <th colspan="3" style="text-align: center" >{{ __("generated.CVthèque") }}</th>
                                        <th colspan="2" style="text-align: center" >{{ __("generated.Sourcing externe") }}</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 161px; text-align: right" >{{ __("generated.Total") }}</th>
                                        <th style="width: 292px; text-align: right" >{{ __("generated.Recrutements") }}</th>
                                        <th style="width: 323px; text-align: right" >{{ __("generated.Taux de réussite") }}</th>
                                        <th style="width: 323px; text-align: right" >{{ __("generated.Recrutements") }}</th>
                                        <th style="width: 323px; text-align: right" >{{ __("generated.Taux de réussite") }}</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 14px">
                                   
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        var reussiteDataUrl = "{{ route('dashboard.reussite') }}";
        
        $(document).ready(function() {
            let reussiteTable;
        
            function getReussiteData(year) {
                reussiteTable = $('#reussiteTable').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthChange: false,
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    ajax: {
                        url: reussiteDataUrl,
                        type: 'GET',
                        data: function (d) {
                            d.year = $('#filter-reussite-year').val();
                        }
                    },
                    columns: [
                        { data: 'month', name: 'month' },
                        { 
                            data: 'total', 
                            name: 'total',
                            className: 'text-end translated_text'
                        },
                        { 
                            data: 'internal', 
                            name: 'internal',
                            className: 'text-end translated_text'
                        },
                        { 
                            data: 'internalRate',
                            name: 'internalRate',
                            className: 'text-end',
                            render: function (data) {
                                return data + ' %';
                            }
                        },
                        { 
                            data: 'external', 
                            name: 'external',
                            className: 'text-end translated_text'
                        },
                        { 
                            data: 'externalRate',
                            name: 'externalRate',
                            className: 'text-end',
                            render: function (data) {
                                return data + ' %';
                            }
                        },
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json",
                        emptyTable: "Aucune donnée disponible dans le tableau",
                        processing: "Traitement en cours...",
                    },
                });
            }
        
            getReussiteData();
        
            $('#filter-reussite-year').change(function () {
                reussiteTable.ajax.reload();
            });
        });
    </script>

   
    