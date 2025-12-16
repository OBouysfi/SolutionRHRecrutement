<div class="modal fade" id="jobOfferSecteurmodal" tabindex="-1" aria-hidden="true"  style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" id="jobOfferSecteurDialog" style="margin-top: 70px;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <div class="row align-items-center" style="width: 100%">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded">
                            <a href="#" type="button">
                                <i style="font-size: 20px;margin-top: -3px;" class="bi bi-table avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Recrutement par secteur") }}</h6>
                    </div>
                     <div class="col-auto ms-auto" style="width: 180px;">
                        <div class="input-group input-group-md">
                            <div style="width: 89%;padding: 1px 2px 1px 10px;border-radius: 8px;">
                                <i class="bi bi-calendar" style="float: left;margin-top: 5px;"></i>
                                <div class="rounded date-annee" style="float: left;width: 76%;margin-left: 10px;">
                                    <select class="form-select form-select-sm border-0 bg-transparent w-100" id="filter-jobOffersByActivityArea-year" style="float: left">
                                        @php
                                            $currentYear = date('Y');
                                        @endphp
                                        @for($year = $currentYear; $year >= $currentYear - 5; $year--)
                                            <option value="{{ __($year) }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ __($year) }}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto" style="margin-right: -20px;">
                        <a style="margin-right: -10px;" type="button" class="btn btn-link btn-square fullscreen-toggle translated_text"  data-bs-target="#jobOfferSecteurmodal" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" data-bs-original-title="{{ __("generated.Go Fullscreen") }}">
                            <i class="bi bi-fullscreen" style="font-size: 20px;"></i>
                        </a>
                        <button type="button" class="btn btn-link btn-square close close-modal" data-bs-dismiss="modal" aria-label="Close" data-bs-target="#jobOfferSecteurmodal">
                            <i class="bi bi-x-square" style="font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body d-block">

                <div class="row align-items-center mb-3">
                    <div class="col-12">
                        <table class="table" id="jobOffersByActivityArea-table" width="100%">
                            <thead style="font-size: 14px">
                            <tr>
                                <th style="width: 328px;" >{{ __("generated.secteur") }}</th>
                                <th style="width: 292px;text-align: center" >{{ __("generated.Recrutements") }}</th>
                                <th style="width: 292px;text-align: right" >{{ __("generated.Pourcentage") }}</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                            </tbody>
                        </table>                          
                    </div>
                </div>
                 <!-- Pagination -->
                <div class="row align-items-center mx-0 mb-3">
                    <div class="col-6"></div>
                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                        id="table-jobOfferSecteur">
                        <div class="footable-pagination-wrapper">
                            <ul class="pagination" id="pagination-links"></ul>
                            <div class="divider"></div>
                            <span class="label label-default translated_text " id="pagination-info">{{ __("generated.1 sur 1") }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 
  

<script>

    var jobOffersByActivityAreaData = "{{ route('dashboard.jobOffersByActivityArea') }}";
    
    $(document).ready(function() {
        let jobOffersByActivityAreaTable;

        function getJobOffersByActivityAreaData(year) {

            jobOffersByActivityAreaTable = $('#jobOffersByActivityArea-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                searching: false,
                paging: true,
                ordering: false,
                info: false,
                ajax: {
                    url: jobOffersByActivityAreaData,
                    type: 'GET',
                    data: function (d) {
                        d.year = $('#filter-jobOffersByActivityArea-year').val();
                    }
                },
                columns: [
                    { data: 'secteur', name: 'secteur', className: 'translated_text'  },
                    { data: 'total', name: 'total', className: 'text-center translated_text' },
                    { data: 'pourcentage', 
                        name: 'pourcentage', 
                        className: 'text-end translated_text',
                        render: function (data) {
                            return data + ' %';
                        } 
                    }, ],
                    drawCallback: function (settings) {
                    updateCustomPagination(settings);
                },
               
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    processing: "Traitement en cours...",
                },
            });
        }

        getJobOffersByActivityAreaData();

        $('#filter-jobOffersByActivityArea-year').change(function () {
            jobOffersByActivityAreaTable.ajax.reload();
        });

    /**
    *  Custom Pagination
    */  function updateCustomPagination(settings) {
            const pageInfo = settings.json;
            if (!pageInfo) return; 
            const recordsTotal = pageInfo.recordsTotal;
            const pageLength = settings._iDisplayLength;
            const totalPages = Math.ceil(recordsTotal / pageLength);
            const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; 
            const paginationWrapper = $('#table-jobOfferSecteur .pagination');
            paginationWrapper.empty(); 

            
            paginationWrapper.append(`
                <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
                    <a class="footable-page-link" href="#">«</a>
                </li>
                <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
                    <a class="footable-page-link" href="#">‹</a>
                </li>
            `);
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
            paginationWrapper.append(`
                <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
                    <a class="footable-page-link" href="#">›</a>
                </li>
                <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
                    <a class="footable-page-link" href="#">»</a>
                </li>
            `);

            $('#table-jobOfferSecteur .label').text(`${currentPage} sur ${totalPages}`);
            $('#table-jobOfferSecteur .label').addClass('translated_text');

            addPaginationEventListeners();
        }

        function addPaginationEventListeners() {
            $('#table-jobOfferSecteur .footable-page-nav').off('click').on('click', function (e) {
                e.preventDefault();
                if ($(this).hasClass('disabled')) return;

                const action = $(this).data('page');
                if (action === 'first') jobOffersByActivityAreaTable.page('first').draw('page');
                if (action === 'prev') jobOffersByActivityAreaTable.page('previous').draw('page');
                if (action === 'next') jobOffersByActivityAreaTable.page('next').draw('page');
                if (action === 'last') jobOffersByActivityAreaTable.page('last').draw('page');
            });

            $('#table-jobOfferSecteur .footable-page').off('click').on('click', function (e) {
                e.preventDefault();
                const page = $(this).data('page') - 1; // 0-based index
                jobOffersByActivityAreaTable.page(page).draw('page');
            });
        }

        $('#customLength').on('change', function () {
            const selectedValue = $(this).val();
            jobOffersByActivityAreaTable.page.len(selectedValue).draw();
        });

        
    });
 
</script>



