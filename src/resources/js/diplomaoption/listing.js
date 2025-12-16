
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

    var table = $('#diplomaOptionsTable').DataTable({
        processing: false,
        serverSide: true,
        lengthChange: false,
        searching: false,
        language: {
             url: dataTablesLangUrl,
        },
        ajax: {
            url: diplomaoptionsData,
            data: function (d) {
                 d.search = $('#customSearchBox-diploma').val();
                
            },
        },
        columns: [
            { data: "label", name: "label" ,orderable: false, },
            { data: 'action', name: 'action' ,orderable: false,},
          
          ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
             $('#diplomaOptionsTable thead th').each(function () {
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
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important; display:none  !important"></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass('sorting sorting_asc sorting_desc');
                });
        },
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

    $('#customSearchBox-diploma').on('input', function () {
    table.ajax.reload(); 
    });

    $('#customLength').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });


      /**
     * Js Pour Delete Diploma Option
     */
        window.deletediplomaOption = function(diplomaoption) {
            console.log("Tentative de suppression de l'ID :", diplomaoption);
            var urlToDelete = diplomaoptionDestroy.replace('__ID__', diplomaoption);
            Swal.fire({
                title:  window.translations.confirm_delete,
                text: window.translations.confirm_delete_text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: window.translations.yes_delete,
                cancelButtonText: window.translations.cancel
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlToDelete,
                        type: "DELETE",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr("content") 
                        },
                       success: function(response) {
                            Swal.fire({
                                title: window.translations.deleted,
                                text: window.translations.deleted_success,
                                icon: "success",
                                confirmButtonText: window.translations.confirm
                            });
                            $('#diplomaOption-' + diplomaoption).remove();
                            location.reload();
                        },
                        error: function(xhr) {
                            console.error("Erreur AJAX :", xhr);
                            Swal.fire(window.translations.error, xhr.responseJSON?.message || window.translations.error_occurred, "error");
                        }
                    });
                }
            });
        };

        /**
         * Js for Show  diploma option 
         */
            window.viewDiplomaOption = function(diplomaoption) {
                if (!diplomaoption) {
                    console.error("ID du diplôme manquant !");
                    return;
                }
        
                var url = diplomaoptionView.replace('__ID__', diplomaoption);  
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#diplomaoptionViewModal').modal('show');  
                        $('#diplomaoptionDetails').empty();  
        
                        if (typeof response === 'object' && response !== null) {
                            $.each(response, function(label, value) {
                                $('#diplomaoptionDetails').append(
                                    `<p><strong>${label}:</strong> ${value}</p>`
                                );
                            });
                        } else {
                            $('#diplomaoptionDetails').text('Invalid response format');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching diploma option details:', error);
                        $('#diplomaoptionDetails').text(window.translations.tech_failed);
                    }
                });
            };
        
                 
              
    
    
   
});
