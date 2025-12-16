<div class="modal fade" id="completudeCvsmodal" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable" id="completudeCvsDialog"
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
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Taux de complétude des CVs") }}</h6>
                    </div>
                    <div class="col-auto ms-auto" style="width: 180px;">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100"
                                        id="filter-year" style="float: left">
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
                        <a href="#" type="button"
                            class="btn btn-link btn-square fullscreen-toggle translated_text" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" aria-label="Fullscreen" title="{{ __("generated.Go Fullscreen") }}"> <i
                                class="bi bi-fullscreen" style="font-size: 20px;"></i> </a>
                        <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal"
                            aria-label="Close" data-bs-target="#completudeCvsmodal">
                            <i class="bi bi-x-square" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block" style="padding: 14px 23px;">
                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <table class="table" id="completudeCvs-table" width="100%">
                            <thead style="font-size: 14px">
                                <tr>
                                    <th style="width: 182px;" >{{ __("generated.Catégorie") }}</th>
                                    <th style="width: 161px;text-align: right" >{{ __("generated.Total de CVs") }}</th>
                                    <th style="width: 292px;text-align: right" >{{ __("generated.Total CVs complétés") }}</th>
                                    <th style="width: 323px;text-align: right" >{{ __("generated.Taux de complétude") }}</th>
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
    var completudeCvsData = "{{ route('dashboard.completudeCvs') }}";

    $(document).ready(function() {
        let dataTable;

        function getData(year) {

            dataTable = $('#completudeCvs-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                searching: false,
                paging: false,
                ordering: false,
                info: false,
                ajax: {
                    url: completudeCvsData,
                    type: 'GET',
                    data: function(d) {
                        d.year = $('#filter-year').val();
                    }
                },
                columns: [{
                        data: 'categorie_socio_professionnelle',
                        name: 'categorie_socio_professionnelle',
                        className: ' translated_text'
                    },
                    {
                        data: 'total_cvs',
                        name: 'total_cvs',
                        className: 'text-center translated_text',
                    },
                    {
                        data: 'total_cvs_complets',
                        name: 'total_cvs_complets',
                        className: 'text-center translated_text',
                    },
                    {
                        data: 'taux_completude',
                        name: 'taux_completude',
                        className: 'text-end translated_text',
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    processing: "Traitement en cours...",
                },
            });
        }

        getData();

        $('#filter-year').change(function() {
            dataTable.ajax.reload();
        });
    });
</script>
