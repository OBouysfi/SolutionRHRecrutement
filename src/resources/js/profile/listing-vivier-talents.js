$(document).ready(function () {
    var start_date = null;
    var end_date = null;
    var table = null;
    var folderId = 'Tous';
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

    getData();

    $(document).on('click', '#refresh-date-fillter', function () {
        start_date = null;
        end_date = null;
        refreshTables(start_date, end_date);
    });

    function refreshTables(start_date, end_date) {
        if ($.fn.DataTable.isDataTable('#vivierTalent-listing-table')) {
            $('#vivierTalent-listing-table').DataTable().destroy();
        }
        getData();
    }

    $('#titlecalendar, #titlecalendar1').on('apply.daterangepicker', function (ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        refreshTables(start_date, end_date);
    });

    // $("#clearFoldersFillter").on("click", function () {
    //     // if ($.fn.DataTable.isDataTable('#vivierTalent-listing-table')) {
    //     //     $('#vivierTalent-listing-table').DataTable().destroy();
    //     // }
    //     // getData();
    //     var folderId = 'Tous';
    //     table.ajax.reload();
    // });
    $("#clearFoldersFillter").on("click", function () {
        start_date = null;
        end_date = null;
        table = null;
        folderId = 'Tous';
        if ($.fn.DataTable.isDataTable('#vivierTalent-listing-table')) {
            $('#vivierTalent-listing-table').DataTable().destroy();
        }
        getData();
    });


    function getData() {
        table = $('#vivierTalent-listing-table').DataTable({
            processing: false,
            serverSide: true,
            lengthChange: false,
            searching: false,
            ajax: {
                url: vivierTalentListingData,
                data: function (d) {
                    d.niveau = $('#filter-niveau').val();
                    d.diplome = $('#filter-diplome').val();
                    d.experience = $('#filter-experience').val();
                    d.poste = $('#filter-poste').val();
                    d.contract_type = $('#filter-contrat-type').val();
                    d.pays = $('#filter-pays').val();
                    d.ville = $('#filter-ville').val();
                    d.folder = folderId;
                    d.start_date = start_date,
                    d.end_date = end_date,
                     // For input search 
                    d.search = $("#customSearchBoxVivier").val();
                },
            },


            dom: '<"d-none"B>frtip',
            autoWidth: true,
            responsive: true,
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Exporter en Excel',
                    exportOptions: {
                        columns: ':not(:last-child)',
                        format: {
                            body: function (data, row, column, node) {
                                return data.replace(/<[^>]*>/g, '').trim();
                            }
                        }
                    },
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        $('row:first c', sheet).attr('s', '2');

                        $('row c', sheet).attr('s', '25');
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Vivier des Talents',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 11,
                            color: 'white',
                            fillColor: '#4CAF50',
                            alignment: 'center',
                        };
                        doc.defaultStyle.fontSize = 10;
                    }
                }
            ],

            language: {
                // url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
                // info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                // emptyTable: "Aucune donnée disponible dans le tableau",
                // infoEmpty: "Affichage de 0 à 0 sur 0 entrée",
                
                url: dataTablesLangUrl,
               
            },
            columns: [
            { data: 'picture', name: 'picture', orderable: false, searchable: false },
            { data: 'matricule', name: 'matricule', orderable: true },
            { data: 'first_name', name: 'first_name', orderable: true },
            { data: 'last_name', name: 'last_name', orderable: true },
            { data: 'diploma_label', name: 'diploma_label', searchable: false, orderable: true },
            { data: 'option', name: 'option', orderable: true },
            { data: 'total_experience', name: 'total_experience', orderable: true },
            {
                data: 'current_profession',
                name: 'current_profession',
                orderable: true,
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
            {
                data: 'desired_profession',
                name: 'desired_profession',
                orderable: true,
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
            { data: 'created_at', name: 'created_at', orderable: true },
            { data: 'updated_at', name: 'updated_at', orderable: true },
        ],

            drawCallback: function (settings) {
                updateCustomPagination(settings);

                $('#vivierTalent-listing-table thead th').each(function () {
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
                                margin-left: -10px;
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
    }
    $('.folder-item').on('click', function (e) {
        e.preventDefault();
        folderId = $(this).data('folder-id');
        if ($.fn.DataTable.isDataTable('#vivierTalent-listing-table')) {
            $('#vivierTalent-listing-table').DataTable().destroy();
        }
        getData();
        // table.column(0).search(folderId).draw();
    });

        $("#customSearchBoxVivier").on("input", function () {
        const value = this.value;
        table.ajax.reload();
    });

    $('#storeTalentFolderForm').on('submit', function (event) {
        event.preventDefault();

        let form = $(this);
        let url = storeTalentFolderRoute;
        let formData = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: window.translations.success_client,
                    text: window.translations.succes_dossier,
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
                $("#emailcompose").hide();
                // form[0].reset();
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = window.translations.erreur_dossier;

                if (errors) {
                    errorMessage = Object.values(errors).flat().join('\n');
                }

                Swal.fire({
                    icon: 'error',
                    title: window.translations.title_erreur,
                    text: errorMessage,
                });
            }
        });
    });
    //Pour Button  telechargement Excel & Csv 
    $('#download-excel').on('click', function (e) {
        e.preventDefault();
        table.button('.buttons-excel').trigger();
    });

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

$('#customLength').on('change', function () {
    const selectedValue = $(this).val();
    table.page.len(selectedValue).draw();
});
    /**
     * Js For pays and ville
     */
    $('#filter-pays').on('change', function () {
        var selectedCountryId = $(this).val();
        $('#filter-ville').val('Tous');

        if (selectedCountryId === 'Tous') {
            $('#filter-ville option').show();
        } else {

            $('#filter-ville option').hide();
            $('#filter-ville option[value="Tous"]').show();
            $('#filter-ville option[data-country="' + selectedCountryId + '"]').show();
        }
        $('#filter-ville').trigger("chosen:updated");
    });

   

    $('#folderSearch').on('keyup', function () {
        var searchText = $(this).val().toLowerCase();
        $('.nav-folder').each(function () {
            var folderName = $(this).text().toLowerCase();
            if (folderName.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


    /**
     *  Fonction pour afficher le drapeau dans l'élément sélectionné
     */

    $(window).on('load', function () {
        $(".chosenoptgroup").chosen({
            width: "100%",
            disable_search_threshold: 10 
        });
    
        // Fonction pour ajouter les drapeaux dans la liste déroulante
        function updateDropdownImages() {
            setTimeout(function () {
                $('.chosen-results li').each(function () {
                    const $li = $(this);
                    const index = $li.data('option-array-index');
                    const $option = $('#filter-pays option').eq(index);
                    const imageSrc = $option.data('image');
                    const text = $option.text();
    
                    if (imageSrc && !$li.find('img').length) {
                        $li.html(`
                            <span style="display: inline-flex; align-items: center;">
                                <img src="${imageSrc}" height="14" style="margin-right: 6px;" />
                                <span>${text}</span>
                            </span>
                        `);
                    }
                });
            }, 10); 
        }

        $('#filter-pays').on('chosen:showing_dropdown', updateDropdownImages);
    
        function updateSelectedImage() {
            const selectedOption = $('#filter-pays option:selected');
            const imageSrc = selectedOption.data('image');
            const text = selectedOption.text();
    
            const chosenSingle = $('#filter-pays').next('.chosen-container').find('.chosen-single');
            chosenSingle.find('img').remove();
            chosenSingle.find('span').css('display', 'inline');
            if (imageSrc) {
                chosenSingle.prepend(`<img src="${imageSrc}" height="14" style="margin-right: 6px;" />`);
            }
        }

        $('#filter-pays').on('change', updateSelectedImage);
        updateDropdownImages();
        updateSelectedImage();
    });
    
    
    

});


