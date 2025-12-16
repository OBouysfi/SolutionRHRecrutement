<div class="modal fade" id="ModalConversionShortlist" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content bg-gradient-theme-light">
            <div class="modal-header">
                <div class="row align-items-center" style="width: 100%">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px;margin-top: -3px;" class="bi bi-table avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Taux de conversion Candidatures vers shortlist") }}</h6>
                    </div>
                    <div class="col-auto ms-auto" style="width: 180px">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="btn-detail-conversion_shortlist-year" name="btn-detail-conversion_shortlist-year" style="float: left">
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for($year = $currentYear; $year >= $currentYear - 5; $year--)
                                            <option class=" translated_text" value="{{ __($year) }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ __($year) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-right: -20px;">
                        <a style="margin-right: -10px;" type="button" class="btn btn-link btn-square fullscreen-toggle translated_text" data-target="#exampleModal2" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" data-bs-original-title="{{ __("generated.Go Fullscreen") }}">
                            <i class="bi bi-fullscreen" style="font-size: 20px;"></i>
                        </a>
                        <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal" aria-label="Close" data-target="#exampleModal2">
                            <i class="bi bi-x-square" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block">
                <div class="row  mb-3">
                    <div class="col-12">
                        <table class="table" id="conversion_shortlist" style="width: 100%">
                            <thead style="font-size: 14px">
                            <tr>
                                <th  style="width: 123px;">{{ __("generated.Mois") }}</th>
                                <th  style="text-align: right;">{{ __("generated.Candidatures reçues") }}</th>
                                <th  style="text-align: right;width: 188px;">{{ __("generated.Shortlist") }}</th>
                                <th  style="text-align: right;">{{ __("generated.Taux de conversion") }}</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                                @foreach($monthlyConversionRates as $index => $conversionRate)
                                    <tr>
                                        <td class=" translated_text">{{ __($monthlyLabels[$index]) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($monthlyTotalApplications[$index]) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($monthlyShortlistedApplications[$index]) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($conversionRate) }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadChart_conversion_shortlist(chartType, selectedYear) {
        $.ajax({
            url: $chartDetailRoute,
            data: {
                chart_type: chartType,
                year: selectedYear,
                country: $('#filter-pays').val(),
                city: $('#filter-ville').val(),
                client: $('#filter-client').val(),
                activity_area: $('#activity_area_id').val(),
                job_offre: $('#job_offre').val()
            },

            success: function (response) {
            let tableBody = $('#conversion_shortlist tbody');
            tableBody.empty();

            let data = response.conversion_shortlist;

            if (Array.isArray(data.monthlyLabels) && data.monthlyLabels.length > 0) {
                data.monthlyLabels.forEach(function (month, index) {
                    tableBody.append(`
                        <tr>
                            <td class=" translated_text">${month}</td>
                            <td class=" translated_text" style="text-align: right;">${data.monthlyTotalApplications[index]}</td>
                            <td class=" translated_text" style="text-align: right;">${data.monthlyShortlistedApplications[index]}</td>
                            <td class=" translated_text" style="text-align: right;">${data.monthlyConversionRates[index]}%</td>
                        </tr>
                    `);
                });
            } else {
                tableBody.append(`
                    <tr>
                        <td  colspan="4" style="text-align: center;">{{ __("generated.Aucune donnée disponible.") }}</td>
                    </tr>
                `);
            }
        },
        error: function (xhr) {
            console.error('Erreur lors de la récupération des données', xhr);
        }
        });
    }

    // Recharge les données quand on change l’année ou le mois
    $('#btn-detail-conversion_shortlist-year').on('change', function () {
        let selectedYear = $('#btn-detail-conversion_shortlist-year').val();
        loadChart_conversion_shortlist('conversion_shortlist', selectedYear);
    });
</script>