/**
 * Listing ATS - Application Tracking System
 */
$(document).ready(function () {

        $('#client_id').on('change', function () {
        var selectedClientId = $(this).val();
        $('#job_offer_id').val('');

        if (selectedClientId === '') {

            $('#job_offer_id option').show();
        } else {

            $('#job_offer_id option').hide();
            $('#job_offer_id option[value=""]').show();
            $('#job_offer_id option[data-client-id="' + selectedClientId + '"]').show();
        }
        $('#job_offer_id').trigger("chosen:updated");
    });


    let descriptionEditor;

    ClassicEditor
        .create(document.querySelector('textarea[name="description"]'), {
            language: 'fr',
            toolbar: { items: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList', 'numberedList', 'blockQuote'] }
        })
        .then(editor => {
            descriptionEditor = editor;
            setupFormListeners();
            
            // Initialize description for edit mode if form has pre-populated data
            initializeForEditMode();
        })
        .catch(error => console.error('CKEditor init error:', error));

    function setupFormListeners() {
        $('input[name="event_type"], #client_id, #job_offer_id, input[name="date"], input[name="start_time"], input[name="location"], input[name="event_url"], #destinataires')
            .on('change', updateDescription);
    }

    function initializeForEditMode() {
        // Check if we're in edit mode by looking for pre-populated data
        const eventType = $('input[name="event_type"]:checked').val();
        const jobOfferId = $('#job_offer_id').val();
        const eventDate = $('input[name="date"]').val();
        const startTime = $('input[name="start_time"]').val();
        
        // If form has existing data, trigger update to populate description
        if (eventType && jobOfferId && eventDate && startTime) {
            // Small delay to ensure all form elements are fully loaded
            setTimeout(() => {
                updateDescription();
            }, 100);
        }
    }

    async function updateDescription() {
        const eventType = $('input[name="event_type"]:checked').val();
        const jobOfferId = $('#job_offer_id').val();
        const eventDate = $('input[name="date"]').val();
        const startTime = $('input[name="start_time"]').val();
        const location = $('input[name="location"]').val();
        const eventUrl = $('input[name="event_url"]').val();
        const professionName = $('#job_offer_id').find(':selected').data("profession");
        
        const selectedDestinataire = $('#destinataires').val()?.[0] || null;
        const selectedOption = $('#destinataires option:selected');
        const selectedDestinataireModel = selectedOption.data('type') || null;

        if (!eventType || !eventDate || !startTime) return;

        try {
            const destinatairData = await getDestinatairName(selectedDestinataire, selectedDestinataireModel);
            const destinatairName = {
                first_name: destinatairData.first_name || '{profiles => first_name}',
                last_name: destinatairData.last_name || '{profiles => last_name}'
            };

            let subject = '';
            let body = '';

            if (eventType === 'presentiel') {
                subject = `${window.translations.onsite_subject} – ${destinatairName.first_name} ${destinatairName.last_name} - ${professionName}`;
                body = generateOnSiteBody(eventDate, startTime, location, destinatairName, professionName);
            } else if (eventType === 'visioconference') {
                subject = `${window.translations.visio_subject} – ${destinatairName.first_name} ${destinatairName.last_name} - ${professionName}`;
                body = generateVisioBody(eventDate, startTime, eventUrl, destinatairName, professionName);
            } else if (eventType === 'telephonique') {
                subject = `${window.translations.phone_subject} – ${destinatairName.first_name} ${destinatairName.last_name} - ${professionName}`;
                body = generatePhoneBody(eventDate, startTime, destinatairName, professionName);
            }

            // Update subject field
            $('#email_subject').val(subject);
            
            // Update CKEditor content only if we have a body and editor is ready
            if (descriptionEditor && body) {
                descriptionEditor.setData(body);
            }
        } catch (error) {
            console.error('Error updating description:', error);
        }
    }

    function generateOnSiteBody(eventDate, startTime, location, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_one_site} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p><strong>${window.translations.site} :</strong> ${location || '{location}'}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    function generateVisioBody(eventDate, startTime, eventUrl, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_remote} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p><strong>${window.translations.link} :</strong> ${eventUrl || '{event_url}'}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    function generatePhoneBody(eventDate, startTime, destinatairName, professionName) {
        return `
            <p>${window.translations.greeting} ${destinatairName.first_name},</p>
            <p>${window.translations.invitation_text_phone} ${professionName}.</p>
            <p></p>
            <p><strong>${window.translations.date} :</strong> ${formatDate(eventDate)}</p>
            <p><strong>${window.translations.houre} :</strong> ${formatTime(startTime)}</p>
            <p>${window.translations.confirm_message}</p>
            <p>${window.translations.contact_info}</p>
            <p></p>
            <p>${window.translations.regards}</p>
            <p>${window.translations.team}</p>
        `;
    }

    function formatDate(dateString) {
        if (!dateString) return '{hj_rec_events => date}';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', { year: 'numeric', month: 'long', day: 'numeric' });
    }

    function formatTime(timeString) {
        if (!timeString) return '{hj_rec_events => start_time}';
        const [hours, minutes] = timeString.split(':');
        return `${hours}h${minutes}`;
    }

    function getDestinatairName(participantIds, model) {
        if (!participantIds || participantIds.length === 0) {
            return Promise.resolve({ first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' });
        }

        return $.ajax({
            url: '/api/events/get-participant',
            method: 'POST',
            data: {
                participant_ids: participantIds,
                model: model,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json'
        }).then(response => response.success && response.participant
            ? response.participant
            : { first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' }
        ).catch(error => {
            console.error('Error fetching participant data:', error);
            return { first_name: '{profiles => first_name}', last_name: '{profiles => last_name}' };
        });
    }

    // Optional: Add a manual refresh function for debugging
    function refreshDescription() {
        if (descriptionEditor) {
            updateDescription();
        }
    }


    let selectedIds = [];

    var table = $('#trackingApplicationTable').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        lengthChange: false,
        ajax: {
            url: trackingApplicationListingData,
            data: function (d) {
                // filtres
                d.client = $('#filter-client').val();
                d.jobOffer = $('#filter-job-offer').val();
            },
        },
        dom: '<"d-none"B>frtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Candidatures (ATS)',
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
            },
            {
                extend: 'excelHtml5',
                text: 'Exporter en Excel',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
            },
            {
                extend: 'csvHtml5',
                text: 'Exporter en CSV',
                exportOptions: {
                    columns: ':not(:last-child)'
                },
            }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
            info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            emptyTable: "Aucune donnée disponible dans le tableau",
            infoEmpty: "Affichage de 0 à 0 sur 0 entrée"
        },
        columns: [
            { data: 'select_check', orderable: false, searchable: false , orderable: false},
            { data: 'picture', orderable: false, searchable: false , orderable: false},
            { data: 'matricule', name: 'profiles.matricule', orderable: false },
            { data: 'first_name', name: 'profiles.first_name' , orderable: false},
            { data: 'last_name', name: 'profiles.last_name' , orderable: false},
            { data: 'diploma', name: 'diploma', orderable: false },
            { data: 'option', name: 'option' , orderable: false},
            { data: 'experience', name: 'experience', orderable: false },
            { data: 'current_position', name: 'current_position', orderable: false },
            { data: 'desired_position', name: 'desired_position' ,orderable: false},
            { data: 'score', orderable: false, searchable: false },
            { data: 'status', name: 'tracking_applications.status', orderable: false },
            { data: 'action', orderable: false, searchable: false },
        ],
        drawCallback: function (settings) {
            updateCustomPagination(settings);
            $('.circle-progress').each(function () {
                var $this = $(this);
                if (!$this.hasClass('initialized')) {
                    var ratio = parseFloat($this.data('ratio'));
                    var color = $this.data('color') || '#2e9c65';

                    var circle = new ProgressBar.Circle(this, {
                        color: color,
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: '#dcecf0',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false,
                            style: {
                                position: 'absolute',
                                left: '50%',
                                top: '50%',
                                padding: 0,
                                margin: 0,
                                transform: 'translate(-50%, -50%)',
                                fontSize: '13px',
                            }
                        },
                        from: { color: color, width: 10 },
                        to: { color: color, width: 10 },
                        step: function (state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);
                            var value = Math.round(circle.value() * 100);
                            circle.setText(value ? value + "<small>%</small>" : '');
                        }
                    });
                    circle.animate(ratio);
                    $this.addClass('initialized');
                }
            });
            updateCustomPagination(settings);
        }
    });
    /**
     * Js For Pagination
     */
    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // Safety check
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; // 1-based index

        const paginationWrapper = $('#footable-pagination .pagination');
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
                <li class="footable-page visible ${i === currentPage}" data-page="${i}">
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

        // Update label
        $('#footable-pagination .label').text(`${currentPage} sur ${totalPages}`);

        // Rebind pagination events
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        // Pagination buttons (first, prev, next, last)
        $('#footable-pagination .footable-page-nav').off('click').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;

            const action = $(this).data('page');
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
        });

        // Page number links
        $('#footable-pagination .footable-page').off('click').on('click', function (e) {
            e.preventDefault();
            const page = $(this).data('page') - 1; // 0-based index
            table.page(page).draw('page');
        });
    }

    // Example of changing number of records per page
    $('#customLength').on('change', function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });

    // Écouteurs d'événements pour les filtres
    $('#filter-client, #filter-job-offer').on('change', function () {
        table.ajax.reload();
    });

    $(document).on('change', '#manual-client-select', function () {
        var client_id = $(this).val();

        let $missionSelectManual = $('#manual-missions-select');
        $missionSelectManual.empty();
        $missionSelectManual.val('');
        $missionSelectManual.trigger('chosen:updated');

        let filtredMissions = jobOffers.filter(function (jobOffer) {
            return jobOffer.client_id == client_id;
        })

        $.each(filtredMissions, function (index, mission) {
            $missionSelectManual.append(`<option value="${mission.id}">${mission.title}</option>`);
        });

        $missionSelectManual.trigger("chosen:updated");

    })

    let $languageSelect = $('#language-select');
    let $groupSelect = $('#group-select');
    let $categorySelect = $('#category-select');
    let $testSelect = $('#test-select');
    let $typeSelect = $('#type-test-select');

    // Ajout des événements de changement sur les champs
    $(document).on('change', '#type-test-select, #language-select, #group-select, #category-select', function () {
        fetchTests();
    });


    function fetchTests() {
        let language = $languageSelect.val();
        let group = $groupSelect.val();
        let category = $categorySelect.val();
        let typeTest = $typeSelect.val();


        let url = parseInt(typeTest) === 1 ? apiFetchingTests : apiFetchingTestsManual;

        if (language && group && category && typeTest) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    language: language,
                    group: group,
                    category: category,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                    $testSelect.html('<option value="">Sélectionnez un test</option>');

                    $.each(response, function (index, test) {
                        $testSelect.append(`<option value="${test.id}">${test.test_name}</option>`);
                    });

                    $testSelect.trigger("chosen:updated");

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Erreur AJAX:', textStatus, errorThrown);
                }
            });
        } else {
            $testSelect.html('<option value="">Sélectionnez un test</option>');
        }
    }

    $('#test-select').on('change', function () {
        let testId = $(this).val();
        let $testDetails = $('#test-details');
        let $formSwitch = $('.save-test-btns');
        let typeTest = $typeSelect.val();
        $formSwitch.find('#save-manual-draft, #invite-test-manual-candidate, #save-draft, #invite-test-candidate').remove();

        if (testId) {
            $.ajax({
                url: ApiTestGetDetails,
                type: "POST",
                data: {
                    testId: testId,
                    _token: "{{ csrf_token() }}"
                },

                success: function (response) {
                    $testDetails.find('.description-test').text(response.description);
                    $testDetails.find('.question-count').text(response.questions_count);
                    $testDetails.find('.max-time').text(response.max_time);


                    if (parseInt(typeTest) === 1) {

                        $formSwitch.append(`
<!--                           <button id="save-draft" class="btn btn-theme mnw-100 bg-green translated_text" style="float: right;font-size: 14px;margin-left: 10px;">Enregistrer Brouillon</button>-->
                            <button id="invite-test-candidate" class="btn btn-theme mnw-100 bg-green translated_text" style="float: right;font-size: 14px;margin-left: 10px;">Enregistrer</button>
                        `)

                    } else if (parseInt(typeTest) === 2) {
                        $formSwitch.find('#save-manual-draft', '#invite-test-manual-candidate', '#save-draft', '#invite-test-candidate').remove();

                        $formSwitch.append(`
<!--                    <button id="save-manual-draft" class="btn btn-theme mnw-100 bg-green translated_text" style="float: right;font-size: 14px;margin-left: 10px;">Enregistrer Brouillon</button>-->
                    <button id="invite-test-manual-candidate" class="btn btn-theme mnw-100 bg-green translated_text" style="float: right;font-size: 14px;margin-left: 10px;">Enregistrer</button>
                `);

                        $('#save-draft').on('click', function (e) {
                            e.preventDefault();

                            let candidateId = $('#candidate_id').val();
                            let testId = $('#test-select').val();
                            let jobOfferId = $('#manual-missions-select').val();
                            let language = $('#language-select').val();
                            let status = 'brouillon';
                            let score = 0;
                            let dateTest = null;
                            let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0;
                            let add_pro = $('#add_pro').is(':checked') ? 1 : 0;

                            if (!testId) {
                                return;
                            }

                            $.ajax({
                                url: ApiTestResult,
                                type: "POST",
                                data: {
                                    profile_id: candidateId,
                                    test_id: testId,
                                    score: score,
                                    language: language,
                                    status: status,
                                    date_test: dateTest,
                                    nee_ful_scr: nee_ful_scr,
                                    add_pro: add_pro,
                                    _token: "{{ csrf_token() }}" // Jeton CSRF pour sécuriser la requête
                                },
                                success: function (response) {
                                    Swal.fire({
                                        title: "Succès!",
                                        text: "Test Brouillon ajouté avec succès !",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        $('#modal-affect-test-to-candidate').modal('hide'); // Masquer le modal
                                        $('#testResultTable').DataTable().ajax.reload();
                                    })
                                },
                                error: function (xhr) {
                                    if (xhr.status === 422) {
                                        var errors = xhr.responseJSON.errors;
                                        var errorMessage = "";
                                        $.each(errors, function (key, value) {
                                            errorMessage += `${value[0]}<br/>`;
                                        });

                                        Swal.fire({
                                            title: "Erreur!",
                                            html: errorMessage,
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Erreur!",
                                            text: "Une erreur est survenue lors de l'ajout du Test Brouillon ! .",
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    }
                                },

                            });
                        });


                        $('#invite-test-candidate').on('click', function (e) {
                            e.preventDefault();

                            let candidateId = $('#candidate_id').val();
                            let testId = $('#test-select').val();
                            let jobOfferId = $('#manual-missions-select').val();
                            let language = $('#language-select').val();
                            let status = 'Final';
                            let score = 0;
                            let dateTest = null;
                            let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0; // Récupère 1 ou 0
                            let add_pro = $('#add_pro').is(':checked') ? 1 : 0;         // Récupère 1 ou 0

                            if (!testId) {
                                Swal.fire({
                                    title: "Erreur!",
                                    html: 'Vous devez sélectionner un test avant de sauvegarder.',
                                    icon: "error",
                                    confirmButtonText: "Fermer",
                                });
                                return;
                            }

                            $.ajax({
                                url: ApiInviteCandidateToTest,
                                type: "POST",
                                data: {
                                    profile_id: candidateId,
                                    test_id: testId,
                                    score: score,
                                    language: language,
                                    status: status,
                                    date_test: dateTest,
                                    nee_ful_scr: nee_ful_scr,
                                    add_pro: add_pro,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function (response) {
                                    Swal.fire({
                                        title: "Succès!",
                                        text: "Invitation de Test envoyée avec succès !",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        $('#modal-affect-test-to-candidate').modal('hide');
                                        $('#testResultTable').DataTable().ajax.reload();
                                    })
                                },
                                error: function (xhr) {
                                    if (xhr.status === 422) {
                                        var errors = xhr.responseJSON.errors;
                                        var errorMessage = "";
                                        $.each(errors, function (key, value) {
                                            errorMessage += `${value[0]}<br/>`;
                                        });

                                        Swal.fire({
                                            title: "Erreur!",
                                            html: errorMessage,
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Erreur!",
                                            text: "Une erreur est survenue lors de l'ajout du Test Brouillon ! .",
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    }
                                },

                            });
                        });

                        $('#save-manual-draft').on('click', function (e) {
                            e.preventDefault();

                            let candidateId = $('#candidate_id').val();
                            let testId = $('#test-select').val();
                            let jobOfferId = $('#manual-missions-select').val();
                            let language = $('#language-select').val();
                            let status = 'brouillon';
                            let score = 0;
                            let dateTest = null;
                            let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0;
                            let add_pro = $('#add_pro').is(':checked') ? 1 : 0;



                            if (!testId) {
                                return;
                            }

                            $.ajax({
                                url: ApiTestResult,
                                type: "POST",
                                data: {
                                    profile_id: candidateId,
                                    test_id: testId,
                                    job_offer_id: jobOfferId,
                                    score: score,
                                    language: language,
                                    status: status,
                                    date_test: dateTest,
                                    nee_ful_scr: nee_ful_scr,
                                    add_pro: add_pro,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function (response) {
                                    Swal.fire({
                                        title: "Succès!",
                                        text: "Test Brouillon ajouté avec succès !",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        $('#modal-affect-test-manuel-to-candidate').modal('hide');
                                        $('#testResultTable').DataTable().ajax.reload();
                                    })
                                },
                                error: function (xhr) {
                                    if (xhr.status === 422) {
                                        var errors = xhr.responseJSON.errors;
                                        var errorMessage = "";
                                        $.each(errors, function (key, value) {
                                            errorMessage += `${value[0]}<br/>`;
                                        });

                                        Swal.fire({
                                            title: "Erreur!",
                                            html: errorMessage,
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Erreur!",
                                            text: "Une erreur est survenue lors de l'ajout du Test Brouillon ! .",
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    }
                                },

                            });
                        });



                        $('#invite-test-manual-candidate').on('click', function (e) {
                            e.preventDefault();

                            console.log('selected candidates', selectedIds);

                            let candidateId = selectedIds;
                            let testId = $('#test-select').val();
                            let jobOfferId = $('#manual-missions-select').val();
                            let language = $('#language-select').val();
                            let status = 'invited';
                            let score = 0;
                            let dateTest = null;
                            let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0;
                            let add_pro = $('#add_pro').is(':checked') ? 1 : 0;



                            if (!testId) {
                                return;
                            }

                            $.ajax({
                                url: ApiAssignTestToCandidate,
                                type: "POST",
                                data: {
                                    profile_id: candidateId,
                                    test_id: testId,
                                    job_offer_id: jobOfferId,
                                    score: score,
                                    language: language,
                                    status: status,
                                    date_test: dateTest,
                                    nee_ful_scr: nee_ful_scr,
                                    add_pro: add_pro,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function (response) {
                                    Swal.fire({
                                        title: "Succès!",
                                        text: "Test envoyé au candidat avec succès !",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        $('#modal-affect-test-manuel-to-candidate').modal('hide');
                                        $('#testResultTable').DataTable().ajax.reload();
                                    })
                                },
                                error: function (xhr) {
                                    if (xhr.status === 422) {
                                        var errors = xhr.responseJSON.errors;
                                        var errorMessage = "";
                                        $.each(errors, function (key, value) {
                                            errorMessage += `${value[0]}<br/>`;
                                        });

                                        Swal.fire({
                                            title: "Erreur!",
                                            html: errorMessage,
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Erreur!",
                                            text: "Une erreur est survenue lors de l'ajout du Test ! .",
                                            icon: "error",
                                            confirmButtonText: "Fermer",
                                        });
                                    }
                                },

                            });
                        });




                    }




                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Erreur:', textStatus, errorThrown);
                }

            });
        }
        else {
            $testDetails.find('.description-test').text('');
            $testDetails.find('.question-count').text('0');
            $testDetails.find('.max-time').text('0');
            $formSwitch.find('#save-manual-draft, #invite-test-manual-candidate, #save-draft, #invite-test-candidate').remove();

        }

    })


    window.createProfileEvent = function () {
        var selectedIds = [];
        $('.draggable-card input[type="checkbox"]:checked').each(function () {
            let applicationId = $(this).closest('.draggable-card').data('application-id');
            if (applicationId) {
                selectedIds.push(applicationId);
            }
        });

        $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).each(function () {
            selectedIds.push($(this).val());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Helper function to initialize Chosen selects with values (for edit mode)
        function setChosenSelectValue(selectId, value, triggerUpdate = true) {
            const $select = $(selectId);
            $select.val(value).trigger("chosen:updated");
            
            if (triggerUpdate) {
                // Small delay to ensure chosen is updated before triggering description update
                setTimeout(() => {
                    updateDescription();
                }, 50);
            }
        }

        if (selectedIds.length > 0) {

            $.ajax({
                url: getAtsProfilesRoute,
                type: 'GET',
                data: {
                    ids: selectedIds
                },
                success: function (response) {
                    let destinatairesIds = response.data.map(dest => dest?.id);
                    // document.getElementById('jobofferid').value = JSON.stringify(response.job_offer_id);
                    // document.getElementById('job_offer_id').value = JSON.stringify(response.job_offer_id);
                   // Instead of direct jQuery calls, use the helper function
                    setChosenSelectValue('#job_offer_id', response.job_offer_id, false);

                    // Set destinataires with meta data
                    let destinatairesMeta = destinatairesIds.reduce((acc, dest) => {
                        acc[dest] = 'profile';
                        return acc;
                    }, {});

                    document.getElementById('destinataires_meta').value = JSON.stringify(destinatairesMeta);

                    setTimeout(() => {
                        setChosenSelectValue('#destinataires', destinatairesIds, true); // This will trigger description update
                    }, 100);

                    $('#createEventModal').modal('show');
                    
                    table.ajax.reload();
                },
                error: function (xhr) {
                    alert('Une erreur est survenue lors de l\'ajout à l\'evenement .');
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Une erreur est survenue lors de l\'ajout à l\'evenement.',
                    })
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                // title: 'Erreur',
                // text: 'Veuillez sélectionner au moins un profil.',
                title: window.translations.error,
                text: window.translations.error_text,
            });
            // alert('Veuillez sélectionner au moins un profil.');
        }

    }


    window.assignTestToCandidate = function () {
        selectedIds = [];
        $('.draggable-card input[type="checkbox"]:checked').each(function () {
            let applicationId = $(this).closest('.draggable-card').data('application-id');
            if (applicationId) {
                selectedIds.push(applicationId);
            }
        });

        $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).each(function () {
            selectedIds.push($(this).val());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (selectedIds.length > 0) {
            $('#modal-affect-test-manuel-to-candidate').find('select').each(function () {
                $(this).val('').trigger('change');
                $(this).val('').trigger('chosen:updated');


            });
            $('#modal-affect-test-manuel-to-candidate').modal('show');

        } else {
            Swal.fire({
                icon: 'error',
                title: window.translations.error,
                text: window.translations.error_text,
            });
        }
    }

    window.createProfileEmail = function () {
        var selectedIds = [];
        $('.draggable-card input[type="checkbox"]:checked').each(function () {
            let applicationId = $(this).closest('.draggable-card').data('application-id');
            if (applicationId) {
                selectedIds.push(applicationId);
            }
        });

        $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).each(function () {
            selectedIds.push($(this).val());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (selectedIds.length > 0) {
            let queryString = selectedIds.join(',');
            $.ajax({
                url: getAtsProfilesRoute,
                type: 'GET',
                data: {
                    ids: selectedIds
                },
                success: function (response) {
                    let emails = [];
                    response.data.forEach(profile => {
                        emails.push(profile.email)
                    });
                    let emailsSring = emails.join(',');
                    $("#recipients").val(emailsSring);
                    table.ajax.reload();
                },
                error: function (xhr) {
                    // alert('Une erreur est survenue lors de l\'ajout à l\'evenement .');
                    Swal.fire({
                        icon: 'error',
                        // title: 'Erreur',
                        // text: 'Veuillez sélectionner au moins un profil.',
                        title: window.translations.error,
                        text: window.translations.error_text,
                        // text: 'Une erreur est survenue lors de l\'ajout à l\'evenement .',
                    });
                }
            });
            $('#emailcompose').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                // title: 'Erreur',
                // text: 'Veuillez sélectionner au moins un profil.',
                title: window.translations.error,
                text: window.translations.error_text,
            });
            // alert('Veuillez sélectionner au moins un profil.');
        }
    }
    // });
});

window.saveEvent = function (type) {
    // Gather participants meta data
    const participantsMeta = {};
    const participants = document.querySelectorAll('#participants option:checked');
    participants.forEach(option => {
        participantsMeta[option.value] = option.getAttribute('data-type');
    });

    // Gather destinataires meta data
    const destinatairesMeta = {};
    const destinataires = document.querySelectorAll('#destinataires option:checked');
    destinataires.forEach(option => {
        destinatairesMeta[option.value] = option.getAttribute('data-type');
    });

    // Set the meta data to the hidden input fields
    document.getElementById('participants_meta').value = JSON.stringify(participantsMeta);
    document.getElementById('destinataires_meta').value = JSON.stringify(destinatairesMeta);

    const formElement = document.querySelector(`#store-event-form`);
    const formData = new FormData(formElement);
    formData.append('type', type);

    $.ajax({
        url: storeEventRoute, // Backend endpoint
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $('#createEventModal').modal('hide');
            Swal.fire({
                icon: 'success',
                title: window.translations.success_ats,
                text: window.translations.form_saved,
            });

        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')}<br>`;
                    }
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de validation',
                    html: errorMessages,
                });

            } else {
                // Handle unexpected errors
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorResponse.error || 'Une erreur inattendue est survenue.',
                });
            }
        },
    });
};

$(document).ready(function () {
    const startTimeInput = document.querySelector("input[name='start_time']");
    const endTimeInput = document.querySelector("input[name='end_time']");
    const durationLabel = document.getElementById("eventTime");

    function calculateDuration() {
        const startTime = startTimeInput.value;
        const endTime = endTimeInput.value;

        if (startTime && endTime) {
            const start = new Date(`1970-01-01T${startTime}:00`);
            const end = new Date(`1970-01-01T${endTime}:00`);

            let diff = (end - start) / 60000; // Convertir la différence en minutes

            if (diff > 0) {
                durationLabel.textContent = `${diff} Minutes`;
            } else {
                durationLabel.textContent = "0 Minute"; // Éviter les valeurs négatives
            }
        }
    }

    startTimeInput.addEventListener("change", calculateDuration);
    endTimeInput.addEventListener("change", calculateDuration);


    const eventTypeRadios = document.querySelectorAll("input[name='event_type']");
    const urlInputContainer = document.querySelector(".visio-part");
    const locationInputContainer = document.querySelector(".location-part");

    function toggleUrlInput() {
        const selectedType = document.querySelector("input[name='event_type']:checked")?.value;
        if (selectedType === "visioconference") {
            urlInputContainer.style.display = "flex";
            locationInputContainer.style.display = "none";

        } else if (selectedType === "presentiel") {
            locationInputContainer.style.display = "flex";
            urlInputContainer.style.display = "none";

        } else {
            urlInputContainer.style.display = "none";
            locationInputContainer.style.display = "none";

        }
    }
    eventTypeRadios.forEach(radio => {
        radio.addEventListener("change", toggleUrlInput);
    });

    toggleUrlInput();


    $('#event-type').change(function () {
        if ($(this).val() === 'online') {
            $('#url-container').removeClass('d-none');
        } else {
            $('#url-container').addClass('d-none');
        }
    });


    $('.meet-action').on('click', function () {
        var value = $(this).html();
        $('#meet-result').html(value);

        if (value == 'URL manuel') {
            $('.to-change-meet .input-box').removeClass('hidden');
            $('.to-change-meet .message-div').addClass('hidden');
        } else {
            $('.to-change-meet .input-box').addClass('hidden');
            $('.to-change-meet .message-div').removeClass('hidden');
        }

        if (value == 'Google Meet') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p> <span class="translated_text">Connectez votre agenda Google pour générer un lien de réunion Google Meet</span> .&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-google translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }

        if (value == 'Microsoft Teams') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p><span class="translated_text">Connectez votre agenda Office 365 pour générer un lien de réunion Microsoft Teams</span>.&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-teams translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }

        if (value == 'Zoom') {
            $('.to-change-meet .message-div').html(`
                <div class="alert alert-warning">
                    <div class="row">
                        <div class="col-auto"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10">
                            <p><span class="translated_text">Connectez votre agenda Zoom pour générer un lien de réunion Zoom</span>.&nbsp;&nbsp;
                            <span style="color: blue; cursor: pointer;" class="connect-zoom translated_text">Se connecter</span></p>
                        </div>
                    </div>
                </div>
            `);
        }
    });


    function setMeetingPlatform(platform, meetingUrl) {
        $('#meet-result').html(platform);

        if (platform === 'URL manuel') {
            $('.to-change-meet .input-box').removeClass('hidden');
            $('.to-change-meet .message-div').addClass('hidden');
            $('input[name="event_url"]').val(meetingUrl || '');
        } else {
            $('.to-change-meet .input-box').addClass('hidden');
            $('.to-change-meet .message-div').removeClass('hidden');

            let message = '';
            if (platform === 'Google Meet') {
                message = 'Connectez votre agenda Google pour générer un lien de réunion Google Meet.&nbsp;&nbsp;<span style="color: blue; cursor: pointer;" onclick="createGoogleMeet()">Se connecter</span>';
            } else if (platform === 'Microsoft Teams') {
                message = 'Connectez votre agenda Office 365 pour générer un lien de réunion Microsoft Teams.&nbsp;&nbsp;<br><span style="color: blue; cursor: pointer;" onclick="connectTeams()">Se connecter</span>';
            } else if (platform === 'Zoom') {
                message = 'Connectez votre agenda Zoom pour générer un lien de réunion Zoom.&nbsp;&nbsp;<span style="color: blue; cursor: pointer;" onclick="connectZoom()">Se connecter</span>';
            }

            // Show the message to the user (for example, inside an HTML element with id `messageContainer`)
            // document.getElementById('messageContainer').innerHTML = message;


            $('.to-change-meet .message-div').html(`<div class="alert alert-warning"><div class="row"><div class="col-auto"><i class="bi bi-info-circle"></i></div><div class="col-10"><p>${message}</p></div></div></div>`);

            if (meetingUrl) {
                $('.to-change-meet .message-div').append(`<div class="alert alert-success mt-2">Lien de la réunion : <a href="${meetingUrl}" target="_blank">${meetingUrl}</a></div>`);
            }
        }
    }

    window.createGoogleMeet = function () {
        var meetingTopic = $('#meetingTitle').val();
        var meetingStartTime = $('#meetingStartTime').val();
        var meetingDuration = $('#meetingDuration').val();

        // if (!meetingTopic || !meetingStartTime || !meetingDuration) {
        //     alert('Veuillez remplir tous les champs pour créer la réunion.');
        //     return;
        // }

        window.location.href = '/redirect-google';

        setTimeout(function () {
            $.ajax({
                url: '/create-google-meet',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    topic: meetingTopic,
                    start_time: meetingStartTime,
                    duration: meetingDuration
                },
                success: function (response) {
                    if (response.meet_link) {
                        $('.to-change-meet .input-box').removeClass('hidden');
                        $('.to-change-meet .message-div').addClass('hidden');
                        $('input[name="event_url"]').val(response.meet_link);
                    } else {
                        alert('Erreur: Aucun lien Google Meet reçu.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    console.log('Réponse serveur:', xhr.responseText);
                    alert('Une erreur est survenue lors de la création de la réunion Google Meet.');
                }
            });
        }, 3000); // Attendre 3 secondes pour permettre la connexion Google
    };
    window.connectTeams = function () {
        window.location.href = '/create-ms-meet';

        fetch('/create-teams-meeting')
            .then(response => response.json())
            .then(data => {
                $('#meet-result').html(`<a href="${data.url}" target="_blank">${data.url}</a>`);
                $('input[name="event_url"]').val(data.url);
            })
            .catch(error => console.error('Erreur Microsoft Teams:', error));
    }

    window.connectZoom = function () {

        // Grab input values
        var meetingTopic = $('#meetingTitle').val();
        var meetingStartTime = $('#meetingStartTime').val();
        var meetingDuration = $('#meetingDuration').val();

        // Send AJAX request
        $.ajax({
            url: '/create-zoom-meet', // Your route to handle the request
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token for security
                topic: meetingTopic,
                start_time: meetingStartTime,
                duration: meetingDuration
            },
            success: function (response) {
                $('.to-change-meet .input-box').removeClass('hidden');
                $('.to-change-meet .message-div').addClass('hidden');
                $('input[name="event_url"]').val(response.meeting_link);
            },
            error: function (xhr, status, error) {
                alert('Something went wrong!');
            }

        });
    }

    // Lors du clic sur une option de la dropdown
    $('.meet-action').on('click', function () {
        const platform = $(this).html();
        setMeetingPlatform(platform, '');
    });

});

$(document).on('change', '.steps-chose', function () {
    var $select = $(this);
    // Récupérer l'ID de l'application depuis l'attribut data
    var applicationId = $select.data('application-id');
    // La nouvelle valeur du select est l'ID du statut
    var newStatusId = $select.val();
    const url = updateStatusTableUrl.replace(':id', applicationId);
    // Mapping des couleurs
    var colors = {
        '1': '#EBBB1F', // Shortlist
        '2': '#015DC7', // Évaluation
        '3': '#FD8A34', // Entretien
        '4': '#2E9C65', // Retenu
        '5': '#7B84AC', // Embauché
        '6': '#DDE6F7'  // Rejeté / Écarté
    };

    Swal.fire({
        title: 'Confirmation',
        text: 'Êtes-vous sûr de vouloir mettre à jour le statut ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Annuler',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Si l'utilisateur clique sur "Oui", exécuter la requête AJAX
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    status_id: newStatusId,
                    _token: window.Laravel.csrfToken
                },
                success: function (response) {
                    console.log("Mise à jour réussie", response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Mise à jour',
                        text: `Le statut a été mis à jour en ${response.newStatusLabel}`,
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function (xhr) {
                    console.error("Erreur lors de la mise à jour", xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: xhr.responseJSON?.message
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Si l'utilisateur clique sur "Annuler", afficher un message d'annulation
            Swal.fire({
                icon: 'info',
                title: 'Annulé',
                text: 'La mise à jour du statut a été annulée.',
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});
