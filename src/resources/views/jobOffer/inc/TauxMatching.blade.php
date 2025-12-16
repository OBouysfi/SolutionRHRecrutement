<div class="modal fade" id="total_taux_matching" tabindex="-1" aria-hidden="true">
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
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Taux de matching (Profil / Offre)") }}</h6>
                    </div>
                    <div class="col-auto ms-auto" style="width: 180px">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="btn-detail-taux_matching-year" name="btn-detail-taux_matching-year" style="float: left">
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
                    <div class="col-auto ms-auto" style="width: 180px">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="btn-detail-taux_matching-month" name="btn-detail-taux_matching-month" style="">
                                        <option value="">{{ __("generated.Mois") }}</option>
                                        @php
                                            $months = [
                                                '01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril',
                                                '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août',
                                                '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre'
                                            ];
                                        @endphp
                                        @foreach($months as $num => $name)
                                            <option class=" translated_text" value="{{ __($num) }}">{{ __($name) }}</option>
                                        @endforeach
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
                        <table class="table" id="taux_matching" style="width: 100%">
                            <thead style="font-size: 14px">
                            <tr>
                                <th  style="width: 123px;">{{ __("generated.Pourcentage") }}</th>
                                <th  style="text-align: right;">{{ __("generated.Compter") }}</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                                @foreach($CountDistinctPercentages as $CountDistinctPercentage)
                                    <tr>
                                        <td class=" translated_text">{{ __($CountDistinctPercentage->percentage) }}%</td>
                                        <td class=" translated_text" style="text-align: right;">{{ __($CountDistinctPercentage->count) }}</td>
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
    function loadChart_taux_matching(chartType, selectedYear, selectedMonth) {
        $.ajax({
            url: $chartDetailRoute,
            data: {
                chart_type: chartType,
                year: selectedYear,
                month: selectedMonth,
                country: $('#filter-pays').val(),
                city: $('#filter-ville').val(),
                client: $('#filter-client').val(),
                activity_area: $('#activity_area_id').val(),
                job_offre: $('#job_offre').val()
            },

            success: function (response) {
            let tableBody = $('#taux_matching tbody');
            tableBody.empty();

            if (Array.isArray(response.taux_matching) && response.taux_matching.length > 0) {
                response.taux_matching.forEach(function (item) {
                    tableBody.append(`
                        <tr>
                            <td class=" translated_text">${item.percentage}%</td>
                            <td class=" translated_text" style="text-align: right;">${item.count}</td>
                        </tr>
                    `);
                });
            } else {
                tableBody.append(`
                    <tr>
                        <td  colspan="2" style="text-align: center;">{{ __("generated.Aucune donnée disponible.") }}</td>
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
    $('#btn-detail-taux_matching-year, #btn-detail-taux_matching-month').on('change', function () {
        let selectedYear = $('#btn-detail-taux_matching-year').val();
        let selectedMonth = $('#btn-detail-taux_matching-month').val();
        loadChart_taux_matching('taux_matching', selectedYear, selectedMonth);
    });
</script>