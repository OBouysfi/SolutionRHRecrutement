$(document).ready(function () {
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
    getData();

    function getData() {
        table = $('#preview_vivier').DataTable({
            processing: false,
            serverSide: true,
            lengthChange: false,
            searching: false,
            ajax: {
                url: vivierTalentListingData,
                data: function (d) {
                   
                },
            },
            language: {
                url: dataTablesLangUrl,
            },
            columns: [
                { data: 'picture', name: 'picture', orderable: false, searchable: false },
                // { data: 'folder', name: 'folder', orderable: true },
                { data: 'matricule', name: 'matricule', orderable: true },
                { data: 'first_name', name: 'first_name', orderable: true },
                { data: 'last_name', name: 'last_name', orderable: true },
                { data: 'diploma_label', name: 'diploma_label', searchable: false, orderable: true },
                { data: 'option', name: 'option', orderable: true },
                { data: 'total_experience', name: 'total_experience', orderable: true },
                { data: 'current_profession', name: 'current_profession', orderable: true },
                { data: 'desired_profession', name: 'desired_profession', orderable: true },
                // { data: 'tab', name: 'tab' },
                { data: 'created_at', name: 'created_at', orderable: true },
                { data: 'updated_at', name: 'updated_at', orderable: true },
                // { data: 'action', name: 'action', orderable: false, searchable: false },
            ],

            drawCallback: function (settings) {
                updateCustomPagination(settings);

              
            },
        });
    }
   



    $('.filter-block select').on('change', function () {
        table.ajax.reload();
    });

    

   // Pagination custom
   function updateCustomPagination(settings) {
    const pageInfo = settings.json;
    if (!pageInfo) return; // sécurité
    const recordsTotal = pageInfo.recordsTotal;
    const pageLength   = settings._iDisplayLength;
    const totalPages   = Math.ceil(recordsTotal / pageLength);
    const currentPage  = Math.floor(settings._iDisplayStart / pageLength) + 1;

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
        if (action === 'first')  table.page('first').draw('page');
        if (action === 'prev')   table.page('previous').draw('page');
        if (action === 'next')   table.page('next').draw('page');
        if (action === 'last')   table.page('last').draw('page');
    });

    $('#footable-pagination .footable-page').on('click', function (e) {
        e.preventDefault();
        const page = $(this).data('page') - 1; // 0-based
        table.page(page).draw('page');
    });
}


});


