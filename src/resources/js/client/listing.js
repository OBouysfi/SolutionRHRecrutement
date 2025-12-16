
$(document).ready(function () {
    var start_date = null;
    var end_date = null;
    var table = null;
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

        // Map locale to DataTables language file
        const dataTablesLangUrl = {
            fr: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "//cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
        }[locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    $(document).on('click', '#refresh-date-fillter', function () {
        start_date = null;
        end_date = null;
        refreshTables(start_date, end_date);
    });

    function refreshTables() {
        if ($.fn.DataTable.isDataTable('#clientTable')) {
            $('#clientTable').DataTable().destroy();
        }
        getData();
    }

    $('#titlecalendar, #titlecalendar1').on('apply.daterangepicker', function (ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        refreshTables();
    });

        function getData() {
        // Detect current locale (Laravel usually sets this in a meta tag or JS variable)


         table = $('#clientTable').DataTable({
            processing: false,
            serverSide: true,
            lengthChange: false,
            searching: false,
            order: [],
            pagingType: "simple_numbers",
            language: {
                url: dataTablesLangUrl,

            },
            ajax: {
                url: clientListingData,
                data: function (d) {
                    d.ville = $('#filter-ville').val();
                    d.pays = $('#filter-pays').val();
                    d.name = $('#filter-name').val();
                    d.site_name = $('#filter-site_web').val();
                    d.label = $('#filter-activity_area').val();
                    d.status_job_offer = $('#filter-status_job_offer').val();
                    d.start_date = start_date;
                    d.end_date = end_date
                    d.search = $('#customSearchBox').val();
                },
            },
            columns: [

                // 1) # (logo)
                { data: 'logo', name: 'logo', orderable: false },
                // 2) N° client
                { data: 'client_nbr', name: 'client_nbr', orderable: false },
                // 3) Raison sociale
                { data: 'name', name: 'name', orderable: false },
                // 4) Forme juridique
                { data: 'juridical_form', name: 'juridical_form', orderable: false },
                // 5) Régime fiscal
                { data: 'tax_regime', name: 'tax_regime', orderable: false, className: 'td-left-align' },
                // 6) Secteur
                { data: 'activity_area', name: 'activity_area', orderable: false, className: 'td-left-align' },
                // 7) Activité
                { data: 'activity', name: 'activity', orderable: false, className: 'td-left-align' },
                // 8) Adresse
                { data: 'adresse', name: 'adresse', orderable: false, className: 'td-left-align' },
                // 9) Code postal
                { data: 'code_postal', name: 'code_postal', orderable: false },
                // 10) Ville
                { data: 'city_name', name: 'city_name', orderable: false },
                // 11) RC Numéro
                { data: 'rc_number', name: 'rc_number', orderable: false },
                // 12) RC Ville
                { data: 'rc_city', name: 'rc_city', orderable: false },
                // 13) RC Pays
                { data: 'rc_country', name: 'rc_country', orderable: false },
                // 14) ICE
                { data: 'ice', name: 'ice', orderable: false },
                // 15) Identifiant Fiscal
                { data: 'ident_fiscal', name: 'ident_fiscal', orderable: false },
                // 16) Taxe Pro
                { data: 'taxe_prof', name: 'taxe_prof', orderable: false },
                // 17) Téléphone
                { data: 'telephone', name: 'telephone', orderable: false },
                // 18) Email
                { data: 'email', name: 'email', orderable: false },
                // 19) Site Web
                { data: 'site_web', name: 'site_web', orderable: false },
                // 0) # (Action)
                { data: 'action', name: 'action', orderable: false },
            ],
            drawCallback: function (settings) {
                updateCustomPagination(settings);
            },
        });
    }

    getData();

    $(document).on('change', '#filter-client', function () {
        var clientId = $(this).val();

        $.ajax({
            url: jobOfferFilterUrl,
            method: 'GET',
            data: { client_id: clientId },
            success: function (response) {
                var jobOfferSelect = $('#filter-job-offer');
                jobOfferSelect.empty();
                jobOfferSelect.append('<option value="">Tous</option>');

                $.each(response, function (index, jobOffer) {
                    jobOfferSelect.append('<option value="' + jobOffer.id + '">' + jobOffer.title + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching job offers:", error);
            }
        });
    });


    $('.filter-block select').on('change', function () {
        table.ajax.reload();
    });

    // Ex. recharger le tableau lors d’un changement de filtre
    $('.filter-block select').on('change', function () {
        table.ajax.reload();
    });

    // Pagination custom
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // Sécurité
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1;

        const paginationWrapper = $('#footable-pagination .pagination');
        paginationWrapper.empty();

        // Limiter le nombre de pages visibles autour de la page actuelle
        const maxVisiblePages = 5; // Nombre maximal de pages affichées
        const startPage = Math.max(currentPage - Math.floor(maxVisiblePages / 2), 1);
        const endPage = Math.min(startPage + maxVisiblePages - 1, totalPages);

        // Boutons First & Previous
        paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
            <a class="footable-page-link" href="#">«</a>
        </li>
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
            <a class="footable-page-link" href="#">‹</a>
        </li>
    `);

        // Affichage des numéros de page
        for (let i = startPage; i <= endPage; i++) {
            paginationWrapper.append(`
            <li class="footable-page visible ${i === currentPage ? 'active' : ''}" data-page="${i}">
                <a class="footable-page-link" href="#">${i}</a>
            </li>
        `);
        }

        // Boutons Next & Last
        paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
            <a class="footable-page-link" href="#">›</a>
        </li>
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
            <a class="footable-page-link" href="#">»</a>
        </li>
    `);

        // Texte d'information sur la page actuelle
        $('#footable-pagination .label').text(`Page ${currentPage} sur ${totalPages}`);

        // Ajouter les gestionnaires d'événements
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        // Navigation avec les boutons First, Previous, Next, Last
        $('#footable-pagination .footable-page-nav').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        // Navigation directe via les numéros de page
        $('#footable-pagination .footable-page').on('click', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1; // Basé sur 0
            table.page(page).draw('page');
        });
    }

// Changer le nombre de lignes affichées par page
    $('#customLength').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });



    $('#filter-pays').on('change', function () {
        const selectedCountry = $(this).val();
        if (selectedCountry === "Tous") {
            $('#filter-ville option').removeClass('d-none');
        } else {
            $('#filter-ville option').each(function () {
                const cityCountry = $(this).data('country');
                if (cityCountry == selectedCountry) {
                    $(this).removeClass('d-none');
                } else {
                    $(this).addClass('d-none');
                }
            });
        }
    });



    $(document).on('click', '.delete-client', function () {
        var $button = $(this);
        var clientId = $button.data('client-id');
        var row = table.row($button.parents('tr'));

        Swal.fire({
            title: window.translations.Êtes_vous,
            text: window.translations.arrière,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5C6798',
            cancelButtonColor: '#F88DA5',
            confirmButtonText: window.translations.supprimez_le
        }).then((result) => {
            if (result.isConfirmed) {
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: apiClientDelete.replace('id', clientId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        console.log('res', response)
                        // OB : Supprime la ligne pour table
                        row.remove().draw();
                        // Affiche un SweetAlert de succès
                        Swal.fire(
                            window.translations.Supprimé,
                            window.translations.client_été_supprimée,
                            window.translations.success
                        );
                    },
                    error: function (xhr, status, error) {
                        // OB : Affiche un SweetAlert d'erreur
                        Swal.fire(
                             window.translations.title_erreur,
                            window.translations.la_suppression,
                            window.translations.error
                        );
                    }
                });
            }
        });
    });

    $("#customSearchBox").on("input", function () {
        const value = this.value;
        table.ajax.reload();
    });
});
