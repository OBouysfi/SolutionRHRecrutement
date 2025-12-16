var table;
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
    table = $('#foldersTable').DataTable({
        processing: false,
        serverSide: true,
        lengthChange: false,
        searching: false,
        language: {
             url: dataTablesLangUrl,
        },
        ajax: {
            url: foldersData,
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            data: function (d) {
                console.log("Sent Data:", d);
                 d.search = $('#customSearchBox-folder').val();
            },
            error: function (xhr, error, thrown) {
                console.error("DataTables Ajax Error:", error, thrown);
                console.log(xhr.responseText);
            }
        },
        columns: [
            { data: "name", name: "name",orderable: false, },
            { data: "parent", name: "parent" ,orderable: false, },
            { data: 'action', name: 'action' ,orderable: false, }
        ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
             $('#foldersTable thead th').each(function () {
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
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important; display:none !important"></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass('sorting sorting_asc sorting_desc');
                });
        },
    });

    // Custom Pagination
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // Safety check
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; // 1-based index

        const paginationWrapper = $('#validated-techniquesTable-pagination .pagination');
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

        $('#validated-techniquesTable-pagination .label').text(`${currentPage} sur ${totalPages}`);

        // Rebind pagination events
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $('#validated-techniquesTable-pagination .footable-page-nav').off('click').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        $('#validated-techniquesTable-pagination .footable-page').off('click').on('click', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1; // 0-based index
            table.page(page).draw('page');
        });
    }

    // Change number of records per page
    $('#customLength').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });

       $('#customSearchBox-folder').on('input', function () {
    table.ajax.reload(); 
    });
});



/**
 * Js For Show
 */
window.viewtech = function (id) {
    var viewUrl = techView.replace("__ID__", id);

    $.ajax({
        url: viewUrl,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#techViewModal').modal('show');
            if (response && response.label && response.view_skill_type_id) {
                $('#label').text(response.label);
                $('#view_skill_type_id').text(response.view_skill_type_id);
            } else {
                $('#label').text(window.translations.data_not_available);
                $('#view_skill_type_id').text(window.translations.data_not_available);
            }
        },
        error: function (xhr, status, error) {
            console.error('Erreur AJAX:', status, error);
            $('#label').text(window.translations.failed_to_load_data);
            $('#view_skill_type_id').text(window.translations.failed_to_load_data);
        }
    });
};



/**
 * Js For Delete 
*/
window.deletefolder = function (id) {
    console.log("Tentative de suppression de l'ID :", id);

    if (!folderDestroy) {
        console.error("L'URL de suppression n'est pas définie !");
        return;
    }

    var urlToDelete = folderDestroy.replace('__ID__', id);

    Swal.fire({
        title: window.translations.confirm_delete,
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
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    Swal.fire({
                        title: window.translations.Supprimé,
                        text: response.message,
                        icon: "success",
                        confirmButtonText: window.translations.confirm
                    });
                    $('#foldersTable').DataTable().ajax.reload(null, false);
                },
                error: function (xhr) {
                    console.error("Erreur AJAX :", xhr);
                    Swal.fire(window.translations.error_ex, xhr.responseJSON?.message || window.translations.error_occurred, "error");
                }
            });
        }


    });
};


/**
 * Js For Update 
 */
$(document).ready(function () {
    $("body").on("click", ".edit-btn", function () {
        var id = $(this).data("id");

        $.get("profile-folders/" + id + "/edit", function (data) {
            $("#foldereditmodal").modal("show");
            $("#id").val(data.id);
            $("#edit_name").val(data.name);
            $("#edit_parent_id").val(data.parent_id);
            $("#edit_parent_id").trigger("chosen:updated");


        }).fail(function () {
            Swal.fire({
                icon: 'error',
                title: window.translations.error,
                text: window.translations.lang_error_text,
                confirmButtonText: window.translations.confirm
            });
        });
    });

    $("#save_edit").click(function (e) {
        e.preventDefault();

        var id = $("#id").val();
        var updateUrl = folderUpdateUrl.replace('__ID__', id);

        var formData = {
            name: $("#edit_name").val(),
            parent_id: $("#edit_parent_id").val(),
        };

        console.log("Données envoyées :", formData);

        $.ajax({
            url: updateUrl,
            type: "PUT",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("Réponse du serveur :", response);
                Swal.fire({
                    icon: "success",
                    title: window.translations.folder_mis,
                    text: window.translations.folder_mis,
                    confirmButtonText: window.translations.confirm
                });

                $("#foldereditmodal").modal("hide");
                $("#foldersTable").DataTable().ajax.reload(null, false);
            },
            error: function (xhr) {
                console.error("Erreur AJAX :", xhr);
                Swal.fire({
                    icon: 'error',
                    title: window.translations.confirm.error,
                    text: xhr.responseJSON?.message || window.translations.update_error,
                    confirmButtonText: window.translations.confirm
                });
            },
        });
    });


});


/**
 * Js For Select Search
 */ $(document).ready(function() {
    $('#edit_parent_id').chosen({
        dropdownParent: $('#foldereditmodal'),
    disable_search_threshold: 10, 
    no_results_text: window.translations.no_results
    });
});