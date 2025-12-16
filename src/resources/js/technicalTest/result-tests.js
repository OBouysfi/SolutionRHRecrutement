$(document).ready(function () {

    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

    const dataTablesLangUrl =
        {
            fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
        }[locale] ||
        "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    var table = $('#allTestResultTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ordering: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: ApiListingTestsResults,
            data: function (d) {
                d.search = $('input[name="search"]').val();
                d.group = $('#filter-group').val();
                d.status = $('#filter-status').val();
                d.only_pending_tests = $('#onlyPendingTests').prop('checked');
                d.include_archived_groups = $('#includeArchivedGroups').prop('checked');
            }
        },
        columns: [
            {data: 'test', name: 'test'},
            {data: 'language', name: 'language'},
            {data: 'status', name: 'status'},
            {data: 'date_test', name: 'date_test'},
            {data: 'score', name: 'result'},
            {data: 'action', name: 'action'},
        ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
        },
    });


    // Pagination custom
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // sécurité
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = (settings._iDisplayStart / pageLength) + 1;

        const paginationWrapper = $('#footable-pagination .pagination');
        paginationWrapper.empty();

        // First & Prev
        paginationWrapper.append(`
            <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>
            <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
                <a class="footable-page-link" href="#">‹</a>
            </li>
        `);

        // Numéros de pages
        for (let i = 1; i <= totalPages; i++) {
            paginationWrapper.append(`
                <li class="footable-page visible ${i === currentPage ? 'active' : ''}" data-page="${i}">
                    <a class="footable-page-link" href="#">${i}</a>
                </li>
            `);
        }

        // Next & Last
        paginationWrapper.append(`
            <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
                <a class="footable-page-link" href="#">›</a>
            </li>
            <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
                <a class="footable-page-link" href="#">»</a>
            </li>
        `);

        $('#footable-pagination .label').text(`${currentPage} sur ${totalPages}`);

        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $('#footable-pagination .footable-page-nav').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        $('#footable-pagination .footable-page').on('click', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1; // 0-based
            table.page(page).draw('page');
        });
    }

    $('#customLength').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });





});

