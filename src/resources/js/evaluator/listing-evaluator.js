$(document).ready(function () {
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
    var table = $('#Table-listing-evaluator').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: evaluatorData,
        },
        columns: [
            { data: 'logo', name: 'logo', orderable: false },
            { data: 'last_name', name: 'last_name', orderable: false },
            { data: 'first_name', name: 'first_name', orderable: false },
            { data: 'email', name: 'email', orderable: false },
            { data: 'evaluation_types', name: 'evaluation_types', orderable: false },
            { data: 'profession', name: 'profession', orderable: false },
            { data: 'coefficient', name: 'coefficient', orderable: false },
            { data: 'action', name: 'action', orderable: false },
        ],
        drawCallback: function (settings) {
            var api = this.api(); 
            updateCustomPagination(api);
              $('#Table-listing-evaluator thead th').each(function () {
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
                               
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important;display: none !important"></span>
                            </div>
                        `);
                }
                // Remove default DataTables sorting classes to kill default icons
                $th.removeClass('sorting sorting_asc sorting_desc');
            });
        },
    });

    //Custom Pagination update function
    function updateCustomPagination(api) {
        const pageInfo = api.page.info();
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = pageInfo.length;
        const totalPages = pageInfo.pages;
        const currentPage = pageInfo.page + 1;

        const paginationWrapper = $('#footable .pagination');
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

        // Page numbers
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

        $('#footable .label').text(`${currentPage} of ${totalPages}`);

        addPaginationEventListeners(api);
    }

    // Event listeners for pagination
    function addPaginationEventListeners(api) {
        const paginationWrapper = $('#footable');

        paginationWrapper.off('click', '.footable-page-nav, .footable-page');

        paginationWrapper.on('click', '.footable-page-nav', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') api.page('first').draw('page');
            if (action === 'prev') api.page('previous').draw('page');
            if (action === 'next') api.page('next').draw('page');
            if (action === 'last') api.page('last').draw('page');
        });

        paginationWrapper.on('click', '.footable-page', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1;
            api.page(page).draw('page');
        });
    }
});
