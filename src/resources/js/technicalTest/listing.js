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

    var table = $('#tableTests').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ordering: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: ApiTechnicalTestsListingeData,
        },
        columns: [

            { data: 'ID', name: 'ID', orderable: false },
            { data: 'test_name', name: 'test_name', orderable: false },
            { data: 'subject', name: 'subject', orderable: false },
            { data: 'language', name: 'language', orderable: false },
            { data: 'type', name: 'type', orderable: false },
            { data: 'algorithm', name: 'algorithm', orderable: false },
            { data: 'action', name: 'action', orderable: false },

        ],

        drawCallback: function (settings) {
            updateCustomPagination(settings);
        },
    });



    // Pagination custom
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return;

        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = (settings._iDisplayStart / pageLength) + 1;

        const paginationWrapper = $('#footable-pagination .pagination');
        paginationWrapper.empty();

        // First & Prev buttons
        paginationWrapper.append(`
            <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>
            <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
                <a class="footable-page-link" href="#">‹</a>
            </li>
        `);

        const maxVisiblePages = 5; // Adjust as needed
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

        if (startPage > 1) {
            paginationWrapper.append(`<li class="footable-page" data-page="1"><a class="footable-page-link" href="#">1</a></li>`);
            if (startPage > 2) paginationWrapper.append(`<li class="ellipsis">...</li>`);
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationWrapper.append(`
                <li class="footable-page ${i === currentPage ? 'active' : ''}" data-page="${i}">
                    <a class="footable-page-link" href="#">${i}</a>
                </li>
            `);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) paginationWrapper.append(`<li class="ellipsis">...</li>`);
            paginationWrapper.append(`<li class="footable-page" data-page="${totalPages}"><a class="footable-page-link" href="#">${totalPages}</a></li>`);
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




    // Delete a single candidate
    $(document).on('click', '.delete-test', function () {
        let testId = $(this).data('test-id');
        Swal.fire({
            title: window.translations.confirm_delete,
            text: window.translations.cannot_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5C6798',
            cancelButtonColor: '#F88DA5',
            confirmButtonText: window.translations.yes_delete
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: ApiTestDelete, // Update with your route
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: { ids: testId },
                    success: function (response) {
                        Swal.fire(window.translations.deleted, response.message, 'success');

                        // Reload DataTable after deletion
                        table.ajax.reload();

                    },
                    error: function (xhr) {
                        Swal.fire(window.translations.error, window.translations.error_occurred, 'error');
                    }
                });
            }
        });
    });

});
