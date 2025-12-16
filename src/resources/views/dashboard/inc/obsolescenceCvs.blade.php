<div class="modal fade" id="obsolescencemodal" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable"id="obsolescenceDialog"
        style="margin-top: 70px;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <div class="row align-items-center" style="width: 100%">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded">
                            <a href="#" type="button">
                                <i style="font-size: 20px;margin-top: -3px;"
                                    class="bi bi-table avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Taux d’obsolescence des CVs") }}</h6>
                    </div>
                    <div class="col-auto ms-auto" style="width: 180px;">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100"
                                        id="filter-obsolescence-year" style="float: left">
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for ($year = $currentYear; $year >= $currentYear - 5; $year--)
                                            <option value="{{ __($year) }}"
                                                {{ $year == $currentYear ? 'selected' : '' }}>{{ __($year) }}
                                            </option>
                                        @endfor
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-right: -20px;">
                        <a style="margin-right: -10px;" type="button" class="btn btn-link btn-square fullscreen-toggle"
                            data-bs-target="#obsolescencemodal" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            aria-label="Fullscreen" data-bs-original-title="Go Fullscreen">
                            <i class="bi bi-fullscreen" style="font-size: 20px;"></i>
                        </a>
                        <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal"
                            aria-label="Close" data-bs-target="#obsolescencemodal">
                            <i class="bi bi-x-square" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block">

                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <table class="table" id="obsolescence-table" width="100%">
                            <thead style="font-size: 14px">
                                <tr>
                                    <th>{{ __("generated.Mois") }}</th>
                                    <th style="width: 202px;text-align: right" >{{ __("generated.CVs") }}</th>
                                    <th style="width: 263px;text-align: right" >{{ __("generated.CVs obsolètes") }}</th>
                                    <th style="width: 269px;text-align: right" >{{ __("generated.Taux obsolescence") }}</th>
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
    var obsolescenceData = "{{ route('dashboard.obsolescence') }}";

    $(document).ready(function() {
        let obsolescenceTable;

        function getObsolescenceData(year) {

            obsolescenceTable = $('#obsolescence-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                searching: false,
                paging: false,
                ordering: false,
                info: false,
                ajax: {
                    url: obsolescenceData,
                    type: 'GET',
                    data: function(d) {
                        d.year = $('#filter-obsolescence-year').val();
                    }
                },
                columns: [{
                        data: 'mois',
                        name: 'mois'
                    },
                    {
                        data: 'total_cvs',
                        name: 'total_cvs',
                        className: 'text-end translated_text'
                    },
                    {
                        data: 'obsolete_cvs',
                        name: 'obsolete_cvs',
                        className: 'text-end translated_text'
                    },
                    {
                        data: 'obsolete_rate',
                        name: 'obsolete_rate',
                        className: 'text-end',
                        render: function(data) {
                            return data + ' %';
                        }
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    processing: "Traitement en cours...",
                },
            });
        }

        getObsolescenceData();

        $('#filter-obsolescence-year').change(function() {
            obsolescenceTable.ajax.reload();
        });
    });
</script>
