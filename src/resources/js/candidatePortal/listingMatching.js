$(document).ready(function () {
    var start_date = null;
    var end_date = null;
    var table = null;
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'
    // Map locale to DataTables language file
    const dataTablesLangUrl = {
        fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
        es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
        zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
        pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
        ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
    }[locale] || "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";


    $(document).on('click', '#refresh-date-fillter', function () {
        start_date = null;
        end_date = null;
        refreshTables(start_date, end_date);
    });


    function refreshTables() {
        if ($.fn.DataTable.isDataTable('#candidateMatching')) {
            $('#candidateMatching').DataTable().destroy();
        }
        getData();
    }

    $('#titlecalendar, #titlecalendar1').on('apply.daterangepicker', function (ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        refreshTables();
    });

    getData();
    function getData() {
        table = $('#candidateMatching').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            searching: false,
            language: {
                url: dataTablesLangUrl,
            },
            ajax: {
                url: MatchingcandidateData,
                type: "GET",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                data: function (d) {
                    d.pays = $('#filter-pays').val();
                    d.ville = $('#filter-ville').val();
                    d.poste = $('#filter-poste').val();
                    d.activityarea = $('#filter-activityarea').val();
                    d.start_date = start_date;
                    d.end_date = end_date
                    console.log("Sent Data:", d);
                    d.search = $('#customSearchBox-matching').val();
                },
                error: function (xhr, error, thrown) {
                    console.error("DataTables Ajax Error:", error, thrown);
                    console.log(xhr.responseText);
                }
            },
            columns: [
                { data: 'logo', name: 'logo', orderable: false, searchable: false },
                { data: 'client_number', name: 'client_number' , orderable: false, },
                { data: 'client_name', name: 'client_name', orderable: false, },
                { data: 'title', name: 'title' , orderable: false, },
                { data: 'contract_type', name: 'contract_type' , orderable: false, },
                { data: 'city_name', name: 'city_name' , orderable: false, },
                {
                    data: 'diploma_label',
                    name: 'diploma_label',
                    orderable: false,
                    render: function(data) {
                        if (typeof data === 'string') {
                            const words = data.trim().split(/\s+/);
                            let result = '';
                            for (let i = 0; i < words.length; i += 1) {
                                const chunk = words.slice(i, i + 1).join(' ');
                                result += chunk + '<br>';
                            }
                            return result.trim();
                        }
                        return '';
                    }
                },
                {
                    data: 'diploma_option',
                    name: 'diploma_option',
                    orderable: false,
                    render: function(data) {
                        if (typeof data === 'string') {
                            const words = data.trim().split(/\s+/);
                            let result = '';
                            for (let i = 0; i < words.length; i += 3) {
                                const chunk = words.slice(i, i + 3).join(' ');
                                result += chunk + '<br>';
                            }
                            return result.trim();
                        }
                        return '';
                    }
                },
                { data: 'experience_count', name: 'experience_count' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'score', name: 'score' },

            ],
            drawCallback: function (settings) {
                $('.circle-progress').each(function () {
                    var $this = $(this);
                    if (!$this.hasClass('initialized')) {
                        // var ratio = parseFloat($this.data('ratio')) / 100;
                        var ratio = parseFloat($this.data('ratio'));
                        var color = $this.data('color') || '#2e9c65';

                        var circle = new ProgressBar.Circle(this, {
                            color: color,
                            strokeWidth: 10,
                            trailWidth: 10,
                            easing: 'easeInOut',
                            trailColor: '#dcecf0',
                            duration: 1400,
                            text: {
                                autoStyleContainer: false
                            },
                            from: { color: color, width: 10 },
                            to: { color: color, width: 10 },
                            step: function (state, circle) {
                                circle.path.setAttribute('stroke', state.color);
                                circle.path.setAttribute('stroke-width', state.width);

                                var rawValue = circle.value() * 100;
                                var value = Math.round(rawValue);

                                // Afficher au moins 1% pour les valeurs non nulles mais très petites
                                if (rawValue > 0 && value === 0) {
                                    value = 1; // Score minimum affiché
                                }

                                if (value === 0) {
                                    circle.setText('');
                                } else {
                                    circle.setText(value + "<small>%</small>");
                                }
                            }
                        });

                        circle.animate(ratio);

                        $this.addClass('initialized');
                    }
                });

                updateCustomPagination(settings);

                  $('#candidateMatching thead th').each(function () {
                    const $th = $(this);

                    // Save and reuse the original title
                    if (!$th.data('original-title')) {
                        const originalTitle = $th.text().trim();
                        $th.data('original-title', originalTitle);
                    }
                    const columnTitle = $th.data('original-title');

                    // Determine the icon
                    // let icon = '⇅';
                    // if ($th.hasClass('sorting_asc')) icon = '▲';
                    // else if ($th.hasClass('sorting_desc')) icon = '▼';

                    let back = 'https://cdn.datatables.net/1.11.5/images/sort_both.png';
                    if ($th.hasClass('sorting_asc')) back = 'https://cdn.datatables.net/1.11.5/images/sort_asc.png';
                    else if ($th.hasClass('sorting_desc')) back = '	https://cdn.datatables.net/1.11.5/images/sort_desc.png';

                    // Inject the new structure
                    if ($th.hasClass("sorting") || $th.hasClass("sorting_asc") || $th.hasClass("sorting_desc")) {
                        $th.css("background-image", "none");
                        $th.html(`
                            <div class="th-wrapper" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 4px;
                                white-space: nowrap;
                                cursor: pointer;
                                text-align: left;
                                margin-left: -9px;
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important;display:none"></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass('sorting sorting_asc sorting_desc');
                });

            },
        });

        // Reload table when any filter value changes
        $('#filter-pays, #filter-ville, #filter-poste , #filter-activityarea').on('change', function () {
            table.ajax.reload();
        });
    }

    /**
     * Js For pagination
     */
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // Safety check
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; // 1-based index

        const paginationWrapper = $('#validated-matching-candidate-pagination .pagination');
        paginationWrapper.empty(); // Clear old pagination

        // First & Prev buttons
        paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
            <a class="footable-page-link" href="#">«</a>
        </li>
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
            <a class="footable-page-link" href="#">‹</a>
        </li>
    `);

        // Page Numbers
        let startPage = Math.max(1, currentPage - 4);
        let endPage = Math.min(totalPages, startPage + 9);

        if (endPage - startPage < 9) {
            startPage = Math.max(1, endPage - 9);
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationWrapper.append(`
            <li class="footable-page visible ${i === currentPage ? 'active' : ''}" data-page="${i}">
                <a class="footable-page-link" href="#">${i}</a>
            </li>
        `);
        }

        // Next & Last buttons
        paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
            <a class="footable-page-link" href="#">›</a>
        </li>
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
            <a class="footable-page-link" href="#">»</a>
        </li>
    `);

        $('#validated-matching-candidate-pagination .label').text(`${currentPage} sur ${totalPages}`);

        // Rebind pagination events
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $('#validated-matching-candidate-pagination .footable-page-nav').off('click').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        $('#validated-matching-candidate-pagination .footable-page').off('click').on('click', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1; // 0-based index
            table.page(page).draw('page');
        });
    }

    $('#customSearchBox-matching').on('input', function () {
    table.ajax.reload(); 
    });

    // Change number of records per page
    $('#customLength2').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });
});




/**
 *  Js For ville and Pays
 */
$('#filter-pays').on('change', function () {
    var selectedCountryId = $(this).val();

    $('#filter-ville option').each(function () {
        var cityRegionId = $(this).data('region-id');

        if (selectedCountryId === 'Tous') {
            $(this).show();
        } else {
            if (cityRegionId == selectedCountryId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        }
    });

    $('#filter-ville').val('Tous').trigger("chosen:updated");
});