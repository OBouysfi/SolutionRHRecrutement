
$(document).ready(function () {

    var table = $('#evaluatorTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ajax: {
            url: evaluatorListingData,
            data: function (d) {
                d.ville = $('#filter-ville').val();
                d.pays  = $('#filter-pays').val();
                d.name  = $('#filter-name').val();
                d.site_name  = $('#filter-site_web').val();
                d.label  = $('#filter-activity_area').val();
            },
        },
        columns: [
            // 0) # (Action)
            { data: 'action', name: 'action' },
            // 1) # (logo)
            { data: 'logo', name: 'logo' },
            // 2) N° client
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            // 3) Raison sociale
            // 4) Forme juridique
            { data: 'profession', name: 'profession' },
            // 5) Régime fiscal
            { data: 'client', name: 'client' },
            { data: 'company', name: 'company' },
            // 6) Secteur
          
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
        const pageLength   = settings._iDisplayLength;
        const totalPages   = Math.ceil(recordsTotal / pageLength);
        const currentPage  = (settings._iDisplayStart / pageLength) + 1;

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


    $(document).on('click', '.btn-existed-evaluator-card-delete', function (e) {
   
        var $button = $(this);
        var row = table.row($button.parents('tr'));

        var evaluatorId = $button.data('evaluator-id');
    
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5C6798',
            cancelButtonColor: '#F88DA5',
            confirmButtonText: 'Oui, supprimez-le!'
        }).then((result) => {
            if (result.isConfirmed) {
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: ApiClientDeleteEvaluator.replace('evaluatorId', evaluatorId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        console.log('res', response)
                        row.remove().draw();
                        Swal.fire(
                            'Supprimé!',
                            'L\'evaluateur a été supprimée.',
                            'success'
                        );
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Erreur!',
                            'Une erreur est survenue lors de la suppression.',
                            'error'
                        );
                    }
                });
            }
        });
    
       
      });

}) ;