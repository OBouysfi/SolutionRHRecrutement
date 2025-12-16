<div class="modal fade" id="performanceSourcingmodal" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable" id="performanceSourcingDialog"  style="margin-top: 70px;">
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
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Performance des canaux de sourcing") }}</h6>
                    </div>
                     <div class="col-auto ms-auto" style="width: 180px;">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="filter-sourceData-year" style="float: left">
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
                        <a style="margin-right: -10px;" type="button" class="btn btn-link btn-square fullscreen-toggle translated_text" data-bs-target="#performanceSourcingmodal" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" data-bs-original-title="{{ __("generated.Go Fullscreen") }}">
                            <i class="bi bi-fullscreen" style="font-size: 20px;"></i>
                        </a>
                        <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#performanceSourcingmodal">
                            <i class="bi bi-x-square" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block">

                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <table class="table" id="sourceData-table" width="100%">
                            <thead style="font-size: 14px">
                            <tr>
                                <th style="width: 247px" >{{ __("generated.Canal") }}</th>
                                <th style="width: 292px;text-align: center" >{{ __("generated.Recrutements") }}</th>
                                <th style="width: 292px;text-align: right" >{{ __("generated.Pourcentage") }}</th>
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

    var sourceData = "{{ route('dashboard.sourceData') }}";
    
    $(document).ready(function() {
        let sourceDataTable;

        function getSourceData(year) {

            sourceDataTable = $('#sourceData-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                searching: false,
                paging: false,
                ordering: false,
                info: false,
                ajax: {
                    url: sourceData,
                    type: 'GET',
                    data: function (d) {
                        d.year = $('#filter-sourceData-year').val();
                    }
                },
                columns: [
                    { data: 'source', name: 'source', className: 'translated_text'  },
                    { data: 'hiredApplication', name: 'hiredApplication', className: 'text-center translated_text' },
                    { data: 'conversion_rate', 
                        name: 'conversion_rate', 
                        className: 'text-end',
                        render: function (data) {
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

        getSourceData();

        $('#filter-sourceData-year').change(function () {
            sourceDataTable.ajax.reload();
        });
    });

</script>
