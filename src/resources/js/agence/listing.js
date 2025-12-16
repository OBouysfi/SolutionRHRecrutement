$(document).ready(function () {
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
    var table = $('#agencesTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: agenceData, 
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token') 
            },
            data: function (d) {
                console.log("Sent Data:", d); 
            },
            error: function (xhr, error, thrown) {
                console.error("DataTables Ajax Error:", error, thrown);
                console.log(xhr.responseText); 
            }
        },
        columns: [
            { data: "agence", name: "agence" },
            { data: "filiale", name: "filiale" },
            { data: 'action', name: 'action' }
        ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
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

    const paginationWrapper = $('#validated-agencesTable-pagination .pagination');
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

    $('#validated-agencesTable-pagination .label').text(`${currentPage} sur ${totalPages}`);

    // Rebind pagination events
    addPaginationEventListeners();
}

function addPaginationEventListeners() {
    $('#validated-agencesTable-pagination .footable-page-nav').off('click').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;

        const action = $(this).data('page');
        if (action === 'first') table.page('first').draw('page');
        if (action === 'prev') table.page('previous').draw('page');
        if (action === 'next') table.page('next').draw('page');
        if (action === 'last') table.page('last').draw('page');
    });

    $('#validated-agencesTable-pagination .footable-page').off('click').on('click', function (e) {
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

});



/**
 * Js For Delete Agence
*/
window.deleteAgence = function (id) {
    console.log("Tentative de suppression de l'ID :", id);

    if (!agencesDestroy) {
        console.error("L'URL de suppression n'est pas définie !");
        return;
    }

    var urlToDelete = agencesDestroy.replace('__ID__', id);

    Swal.fire({
        title: "Vous êtes sûr ?",
        text: "Suppression définitive. Continuer ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Oui, supprimer !",
        cancelButtonText: "Annuler"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: urlToDelete,
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    Swal.fire("Supprimé !", response.message, "success");
                    $('#agencesTable').DataTable().ajax.reload(null, false);
                },
                error: function (xhr) {
                    console.error("Erreur AJAX :", xhr);
                    Swal.fire("Erreur !", xhr.responseJSON?.message || "Une erreur est survenue.", "error");
                }
            });
        }
   

    });
};

/**
 * JS For showing Filiale details in modal
 */
window.viewDetails = function (agenceId) {
    var viewUrl = agencesView.replace("__ID__", agenceId);

    $.ajax({
        url: viewUrl,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#agenceViewModal').modal('show');

            // Vérifier si la réponse contient des données valides
            if (response && response.name && response.show_name_filiale) {
                $('#name').text(response.name);  
                $('#show_name_filiale').text(response.show_name_filiale);  
            } else {
                $('#name').text('Données non disponibles');
                $('#show_name_filiale').text('Données non disponibles');
            }
        },
        error: function (xhr, status, error) {
            console.error('Erreur AJAX:', status, error);
            $('#name').text('Impossible de charger les données.');
            $('#show_name_filiale').text('Impossible de charger les données.');
        }
    });
};


/**
 * Js For Update Agence
 */
$(document).ready(function () {
    $("body").on("click", ".edit-btn", function () {
        var agenceId = $(this).data("id");

        $.get("agences/" + agenceId + "/edit", function (data) {
            $("#editmodal").modal("show");
            $("#agenceId").val(data.id);
            $("#name_agence").val(data.name);
            $("#edit_filiale_id").val(data.filiale_id);
            $("#edit_filiale_id").trigger("chosen:updated");

        }).fail(function () {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Impossible de charger les données de la Agences.',
                showConfirmButton: true
            });
        });
    });

    $("#save_edit").click(function (e) {
        e.preventDefault();

        var agenceId = $("#agenceId").val();
        var updateUrl = agencesUpdateUrl.replace('__ID__', agenceId);

        var formData = {
            name: $("#name_agence").val(),
            filiale_id: $("#edit_filiale_id").val(), 
        };

        $.ajax({
            url: updateUrl,
            type: "PUT",
            data: JSON.stringify(formData),
            contentType: "application/json",
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Agence mise à jour avec succès",
                    text: response.message || "Les modifications ont été enregistrées.",
                    showConfirmButton: true,
                });

                $("#editmodal").modal("hide");
                $("#agencesTable").DataTable().ajax.reload(); 
            },
            error: function (xhr) {
                var errorMessage = xhr.responseJSON?.message || "Une erreur est survenue lors de la mise à jour.";
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorMessage,
                    showConfirmButton: true
                });
            },
        });
    });

});

/**
 * Js For Select Search
 */ $(document).ready(function() {
    $('#edit_filiale_id').chosen({
        dropdownParent: $('#exampleModal'),
    disable_search_threshold: 10, 
    no_results_text: "Oops, nothing found!"
     });
});
