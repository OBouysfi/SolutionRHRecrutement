<div class="modal fade" id="taux_acceptation_offre" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content bg-gradient-theme-light">
            <div class="modal-header" style="border-bottom: 0;">
                <div class="row align-items-center" style="width: 100%">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px;margin-top: -3px;"
                                    class="bi bi-table avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Taux d'acceptation d'offre") }}</h6>
                    </div>
                    <div class="col-auto ms-auto" style="width: 180px">
                        <div class="input-group input-group-md">
                            <div
                                style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="btn-detail-taux_acceptation_offre-year"
                                        name="btn-detail-taux_acceptation_offre-year" style="float: left">
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for ($year = $currentYear; $year >= $currentYear - 5; $year--)
                                            <option class=" translated_text" value="{{ __($year) }}"
                                                {{ $year == $currentYear ? 'selected' : '' }}>{{ __($year) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-right: -20px;">
                        <a id="fullscreenToggle" class="btn btn-link btn-square fullscreen-toggle translated_text" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" title="{{ __("generated.Go Fullscreen") }}">
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
                        <table class="table" id="taux_acceptation_offre_table" style="width: 100%">
                            <thead style="font-size: 14px">
                                <tr>
                                    <th  style="width: 123px;">{{ __("generated.Mois") }}</th>
                                    <th  style="text-align: right;">{{ __("generated.Offres émises") }}</th>
                                    <th  style="text-align: right;">{{ __("generated.Offres acceptées") }}</th>
                                    <th  style="text-align: right;">{{ __("generated.Taux d'acceptation") }}</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                                @foreach ($monthlyData as $row)
                                    <tr>
                                        <td class=" translated_text">{{ ucfirst($row['month']) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($row['offers_emitted']) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($row['offers_accepted']) }}</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($row['acceptance_rate']) }}</td>
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
    function loadChart_taux_acceptation_offre(chartType, selectedYear) {

        $.ajax({
            url: $chartDetailRoute,
            data: {
                chart_type: chartType,
                year: selectedYear,
                // month: selectedMonth,
                country: $('#filter-pays').val(),
                city: $('#filter-ville').val(),
                client: $('#filter-client').val(),
                activity_area: $('#activity_area_id').val(),
                job_offre: $('#job_offre').val()
            },

            success: function(response) {
                let tableBody = $('#taux_acceptation_offre_table tbody');
                tableBody.empty();

                if (Array.isArray(response.taux_acceptation_offre) && response.taux_acceptation_offre
                    .length > 0) {
                    response.taux_acceptation_offre.forEach(function(item) {
                        tableBody.append(`
                        <tr>
                            <td class=" translated_text">${item.month}</td>
                            <td class=" translated_text" style="text-align: right;">${item.offers_emitted}</td>
                            <td class=" translated_text" style="text-align: right;">${item.offers_accepted}</td>
                            <td class=" translated_text" style="text-align: right;">${item.acceptance_rate}</td>
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
            error: function(xhr) {
                console.error('Erreur lors de la récupération des données', xhr);
            }
        });
    }

    // Recharge les données quand on change l’année
    $('#btn-detail-taux_acceptation_offre-year').on('change', function() {
        let selectedYear = $('#btn-detail-taux_acceptation_offre-year').val();
        loadChart_taux_acceptation_offre('taux_acceptation_offre', selectedYear);
    });
</script>
