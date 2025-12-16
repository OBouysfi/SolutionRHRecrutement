var table; 
$(document).ready(function () {
    table = $('#filialesTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        language: {
            info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
              emptyTable: "Aucune donnée disponible dans le tableau",
              infoEmpty: "Affichage de 0 à 0 sur 0 entrée"
        },
        ajax: {
            url: filialeData,
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
            { data: "filiale", name: "filiale" },
            { data: "ville", name: "ville" },
            { data: 'action', name: 'action' }
        ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
        },
    });
});

// Custom Pagination
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // Safety check
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; // 1-based index

        const paginationWrapper = $('#validated-filialesTable-pagination .pagination');
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

        $('#validated-filialesTable-pagination .label').text(`${currentPage} sur ${totalPages}`);

        // Rebind pagination events
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $('#validated-filialesTable-pagination .footable-page-nav').off('click').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        $('#validated-filialesTable-pagination .footable-page').off('click').on('click', function (e) {
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




/**
 * js For show Filiale
 */
    window.viewDetails = function (filialeId) {
        var viewUrl = filialesView.replace("__ID__", filialeId);

        $.ajax({
            url: viewUrl,
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                $('#filialeViewModal').modal('show');
                $('#name').empty();
                $('#name_city').empty();

                if (response) {
                    $('#name').text(response.name);
                    $('#name_city').text(response.city_name);
                } else {
                    $('#name').text('Invalid response format');
                    $('#name_city').text('Invalid response format');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
                $('#name').text('Failed to load data. Please try again later.');
                $('#name_city').text('Failed to load data. Please try again later.');
            }
        });
    };




/**
 * Js For Delete Profession
*/
    window.deletefiliale = function (id) {
        console.log("Tentative de suppression de l'ID :", id);

        if (!filialesDestroy) {
            console.error("L'URL de suppression n'est pas définie !");
            return;
        }

        var urlToDelete = filialesDestroy.replace('__ID__', id);

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
                        $('#filialesTable').DataTable().ajax.reload(null, false);
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
 * Js For Update Filaile
 */
    $(document).ready(function () {
        $("body").on("click", ".edit-btn", function () {
            var filialeId = $(this).data("id");

            $.get("filiales/" + filialeId + "/edit", function (data) {
                $("#editmodal").modal("show");
                $("#filialeId").val(data.id);
                $("#name_filiale").val(data.name);
                $("#edit_city_id").val(data.city_id);
                $("#edit_city_id").trigger("chosen:updated");

            }).fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Impossible de charger les données de la filiale.',
                    showConfirmButton: true
                });
            });
        });

        $("#save_edit").click(function (e) {
            e.preventDefault();

            var filialeId = $("#filialeId").val();
            var updateUrl = filialesUpdateUrl.replace('__ID__', filialeId);

            var formData = {
                name: $("#name_filiale").val(),
                city_id: $("#edit_city_id").val(), 
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
                        title: "Filiale mise à jour avec succès",
                        text: response.message || "Les modifications ont été enregistrées.",
                        showConfirmButton: true,
                    });

                    $("#editmodal").modal("hide");
                    $("#filialesTable").DataTable().ajax.reload(); 
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
    $('#edit_city_id').chosen({
        dropdownParent: $('#editmodal'),
    disable_search_threshold: 10, 
    no_results_text: "Oops, nothing found!"
     });
});

