
$(document).ready(function () {

    $(document).ready(function () {
        var table = $('#candidatesTable').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            pagingType: "simple_numbers",

            language: {
                url: dataTablesLangUrl,
            },
            ajax: {
                url: ApiCandidatesListingeData,
                data: function (d) {
                    d.search = $('input[name="search"]').val();
                    d.group = $('#filter-group').val();
                    d.status = $('#filter-status').val();
                    d.only_pending_tests = $('#onlyPendingTests').prop('checked');
                    d.include_archived_groups = $('#includeArchivedGroups').prop('checked');
                }
            },
            columns: [
                { data: 'select_check', name: 'select_check' ,orderable: false},
                { data: 'picture', name: 'picture' ,orderable: false},
                { data: 'group', name: 'group',orderable: false },
                { data: 'first_name', name: 'first_name',orderable: false },
                { data: 'last_name', name: 'last_name',orderable: false },
                { data: 'email', name: 'email' ,orderable: false},
                { data: 'action', name: 'action' ,orderable: false},
            ],
            drawCallback: function (settings) {
                updateCustomPagination(settings);
            },
        });

        // Trigger filter on search input change
        $('input[name="search"]').on('keyup', function () {
            table.ajax.reload();
        });

        // Trigger filter on dropdown change
        $('#filter-group, #filter-status').on('change', function () {
            table.ajax.reload();
        });

        // Trigger filter on checkbox change
        $('#onlyPendingTests, #includeArchivedGroups').on('change', function () {
            table.ajax.reload();
        });
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
        if (selectedCountry === window.translations.tous) {
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

    //  // Track selected candidates
    //  let selectedCandidates = [];

    //  // When a checkbox is checked/unchecked
    //  $(document).on('change', '.checkbox_candidate', function() {
    //      let candidateId = $(this).val();
    //      if ($(this).is(':checked')) {
    //          selectedCandidates.push(candidateId);
    //      } else {
    //          selectedCandidates = selectedCandidates.filter(id => id !== candidateId);
    //      }
    //  });

    //  $(document).on('click', '#delete-selected-candidates', function() {
    //     console.log('selectedCandidates', selectedCandidates);
    //      if (selectedCandidates.length > 0) {
    //          Swal.fire({
    //              title: 'Êtes-vous sûr?',
    //              text: "Vous ne pourrez pas revenir en arrière!",
    //              icon: 'warning',
    //              showCancelButton: true,
    //              confirmButtonColor: '#5C6798',
    //              cancelButtonColor: '#F88DA5',
    //              confirmButtonText: 'Oui, supprimez-le!'
    //          }).then((result) => {
    //              if (result.isConfirmed) {
    //                  $.ajax({
    //                      url: ApiCandidateDelete,
    //                      type: 'DELETE',
    //                      data: { candidate_ids: selectedCandidates },
    //                      headers: {
    //                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //                      },
    //                      success: function (response) {
    //                          console.log('res', response);
    //                          table.rows().remove().draw();
    //                          Swal.fire(
    //                              'Supprimé!',
    //                              'Les candidats ont BEEN supprimée.',
    //                              'success'
    //                          );
    //                      },
    //                      error: function (xhr, status, error) {
    //                          console.error(error);
    //                      }
    //          })}})
    //  }
    //  });

    // $(document).on('click', '.delete-candidate', function () {
    //     var $button = $(this);
    //     var candidateId = $button.data('candidate-id');
    //     var row = table.row($button.closest('tr'));

    //     var deleteUrl = .replace('__ID__', candidateId);
    //     console.log("Candidate ID:", candidateId);
    //     console.log("Generated URL:", deleteUrl);

    //     Swal.fire({
    //         title: 'Êtes-vous sûr?',
    //         text: "Vous ne pourrez pas revenir en arrière!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#5C6798',
    //         cancelButtonColor: '#F88DA5',
    //         confirmButtonText: 'Oui, supprimez-le!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: deleteUrl,
    //                 type: 'DApiCandidateDeleteELETE',
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //                 },
    //                 success: function (response) {
    //                     console.log('res', response);
    //                     row.remove().draw();
    //                     Swal.fire(
    //                         'Supprimé!',
    //                         'Le candidat a été supprimée.',
    //                         'success'
    //                     );
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.error(xhr.responseText); // Log the error details
    //                     Swal.fire(
    //                         'Erreur!',
    //                         'Une erreur est survenue lors de la suppression.',
    //                         'error'
    //                     );
    //                 }
    //             });
    //         }
    //     });
    // });


    $(document).ready(function () {
        let selectedCandidates = [];

        // Track selected checkboxes
        $(document).on('change', '.checkbox_candidate', function () {
            let candidateId = $(this).val();
            if ($(this).is(':checked')) {
                selectedCandidates.push(candidateId);
            } else {
                selectedCandidates = selectedCandidates.filter(id => id !== candidateId);
            }
        });

        // Delete a single candidate
        $(document).on('click', '.delete-candidate', function () {
            let candidateId = $(this).data('candidate-id');
            deleteCandidates([candidateId]); // Call the delete function for a single ID
        });

        // Delete multiple selected candidates
        $('#delete-selected').on('click', function () {
            if (selectedCandidates.length === 0) {
                Swal.fire(window.translations.error, window.translations.select_candidate, 'error', {
                    confirmButtonColor: '#5C6798',
                    cancelButtonColor: '#F88DA5',
                    confirmButtonText: window.translations.confirm
                });
                return;
            }

            deleteCandidates(selectedCandidates);
        });

        // Function to handle candidate deletion (single or multiple)
        function deleteCandidates(candidateIds) {
            Swal.fire({
                title: window.translations.confirm_delete,
                text: window.translations.cannot_revert,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5C6798',
                cancelButtonColor: '#F88DA5',
                cancelButtonText: window.translations.cancel,
                confirmButtonText: window.translations.yes_delete
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: ApiCandidateDelete,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: { ids: candidateIds },
                        success: function (response) {
                            Swal.fire(window.translations.deleted, response.message, 'success');

                            table.ajax.reload();

                            selectedCandidates = [];
                            $('.checkbox_candidate').prop('checked', false);
                        },
                        error: function (xhr) {
                            Swal.fire(window.translations.error, window.translations.error_occurred, 'error');
                        }
                    });
                }
            });
        }
    });

});
