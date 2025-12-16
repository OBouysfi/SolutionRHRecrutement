$(document).ready(function () {
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

    const dataTablesLangUrl =
        {
            fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
        }[locale] ||
        "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    var table = $('#testResultTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ordering: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: ApiListingTestsResults,
            data: function (d) {
                d.search = $('input[name="search"]').val();
                d.group = $('#filter-group').val();
                d.status = $('#filter-status').val();
                d.only_pending_tests = $('#onlyPendingTests').prop('checked');
                d.include_archived_groups = $('#includeArchivedGroups').prop('checked');
            }
        },
        columns: [
            { data: 'test', name: 'test' },
            { data: 'language', name: 'language' },
            { data: 'status', name: 'status' },
            { data: 'date_test', name: 'date_test' },
            { data: 'score', name: 'result' },
            { data: 'action', name: 'action' },
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






    $('#manual-client-select').on('change', function () {
        var client_id = $(this).val();
        let $missionSelectManual = $('#manual-missions-select');

       let filtredMissions = jobOffers.filter(function(jobOffer){
           return jobOffer.client_id == client_id;
       })

        $.each(filtredMissions, function (index, mission) {
            $missionSelectManual.append(`<option value="${mission.id}">${mission.title}</option>`);
        });


    })











    // Sélection des éléments du formulaire
    let $languageSelect = $('#language-select');
    let $groupSelect = $('#group-select');
    let $categorySelect = $('#category-select');
    let $testSelect = $('#test-select');

    // Ajout des événements de changement sur les champs
    $('#language-select, #group-select, #category-select').on('change', function () {
        fetchTests();
    });


    function fetchTests() {
        // Récupération des valeurs sélectionnées
        let language = $languageSelect.val();
        let group = $groupSelect.val();
        let category = $categorySelect.val();

        // Vérification que toutes les valeurs ont été sélectionnées
        if (language && group && category) {
            // Requête AJAX pour obtenir les tests
            $.ajax({
                url: apiFetchingTests, // Route Laravel
                type: "POST",
                data: {
                    language: language,
                    group: group,
                    category: category,
                    _token: "{{ csrf_token() }}" // Jeton CSRF pour sécuriser la requête
                },
                success: function (response) {
                    // Vider les options existantes pour les tests
                    $testSelect.html('<option value="">Sélectionnez un test</option>');

                    // Ajouter les nouvelles options reçues
                    $.each(response, function (index, test) {
                        $testSelect.append(`<option value="${test.id}">${test.test_name}</option>`);
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Erreur AJAX:', textStatus, errorThrown);
                }
            });
        } else {
            // Si toutes les valeurs ne sont pas sélectionnées, réinitialiser la liste des tests
            $testSelect.html('<option value="">Sélectionnez un test</option>');
        }
    }


    $('#test-select').on('change', function () {
        let testId = $(this).val();
        let $testDetails = $('#test-details'); // Sélecteur de l'élément contenant les détails du test

        if(testId){
            $.ajax({
                url : ApiTestGetDetails,
                type: "POST",
                data: {
                    testId: testId,
                    _token: "{{ csrf_token() }}"
                },

                success: function (response) {
                    $testDetails.find('.description-test').text(response.description);
                    $testDetails.find('.question-count').text(response.questions_count);
                    $testDetails.find('.max-time').text(response.max_time);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                console.error('Erreur:', textStatus, errorThrown);
            }

        });
        }
        else {
            // Si aucun test n'est sélectionné, réinitialiser les détails
            $testDetails.find('.description-test').text('');
            $testDetails.find('.question-count').text('0');
            $testDetails.find('.max-time').text('0');
        }

    })


    $('#save-draft').on('click', function (e) {
        e.preventDefault();

        // Récupérer les données sélectionnées
        let candidateId = $('#candidate_id').val();
        let testId = $('#test-select').val();
        let language = $('#language-select').val();
        let status = 'brouillon';
        let score = 0;
        let dateTest = null;
        let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0; // Récupère 1 ou 0
        let add_pro = $('#add_pro').is(':checked') ? 1 : 0;         // Récupère 1 ou 0

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
                        confirmButtonText: window.translations.close,
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: window.translations.error_occurred ,         //   "Une erreur est survenue lors de l'ajout du Test Brouillon ! .",
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                }
            },

        });
    });


    $('#invite-test-candidate').on('click', function (e) {
        e.preventDefault();

        let candidateId = $('#candidate_id').val();
        let testId = $('#test-select').val();
        let language = $('#language-select').val();
        let status = 'Final';
        let score = 0;
        let dateTest = null;
        let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0; // Récupère 1 ou 0
        let add_pro = $('#add_pro').is(':checked') ? 1 : 0;         // Récupère 1 ou 0

        if (!testId) {
            Swal.fire({
                title: window.translations.error_ex,
                html: window.translations.select_test,
                icon: "error",
                confirmButtonText: window.translations.close,
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
                    title: window.translations.success,
                    text: window.translations.invitation_test_sent,
                    icon: "success",
                    confirmButtonText: window.translations.OK,
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
                        confirmButtonText: window.translations.close,
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: window.translations.error_occurred,         //   "Une erreur est survenue lors de l'ajout du Test Brouillon ! .",
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                }
            },

        });
    });


    $(document).on('click', '.delete-test-result', function () {
        var $button = $(this);
        var resultId = $button.data('test-result-id');
        var row = table.row($button.parents('tr'));

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
                $.ajax({
                    url: ApiDeleteTestResult.replace('id', resultId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        console.log('res', response)
                        row.remove().draw();
                        Swal.fire(
                            'Supprimé!',
                            'Test Candidat a été supprimée.',
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

       $(document).on('click', '#invite-test', function (e) {
        e.preventDefault();

        const testId = $(this).data('test-id');
        const candidateId = $(this).data('candidate-id');
        const testResult = $(this).data('test-result-id');
        const formData = {
            test_id: testId,
            profile_id: candidateId,
            test_result_id: testResult,
            status: 'invited',
        };
        $.ajax({
            url: ApiSendInvitationTest,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: "Succès!",
                        text: "Invitation envoyée avec succès !",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        table.ajax.reload();
                    })
                } else {
                    alert('Error sending invitation.');
                }
            },
            error: function () {
                alert('An error occurred while sending the invitation.');
            }
        });
    }
    );



    let $languageSelectManual = $('#manual-language-select');
    let $groupSelectManual = $('#manual-group-select');
    let $categorySelectManual = $('#manual-category-select');
    let $testSelectManual = $('#manual-test-select');

    $('#manual-language-select, #manual-group-select, #manual-category-select').on('change', function () {
        fetchManualTests();
    });

     function fetchManualTests() {
        let language = $languageSelectManual.val();
        let group = $groupSelectManual.val();
        let category = $categorySelectManual.val();



        if (language && group && category) {
            $.ajax({
                url: apiFetchingTestsManual, // Route Laravel
                type: "POST",
                data: {
                    language: language,
                    group: group,
                    category: category,
                    _token: "{{ csrf_token() }}" // Jeton CSRF pour sécuriser la requête
                },
                success: function (response) {
                    $testSelectManual.html('<option value="">Sélectionnez un test</option>');

                    $.each(response, function (index, test) {
                        $testSelectManual.append(`<option value="${test.id}">${test.test_name}</option>`);
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Erreur AJAX:', textStatus, errorThrown);
                }
            });
        } else {
            // Si toutes les valeurs ne sont pas sélectionnées, réinitialiser la liste des tests
            $testSelectManual.html('<option value="">Sélectionnez un test</option>');
        }
    }


      $('#manual-test-select').on('change', function () {
        let testId = $(this).val();
        let $testDetails = $('#manual-test-details'); // Sélecteur de l'élément contenant les détails du test

        if(testId){
            $.ajax({
                url : ApiTestGetDetails,
                type: "POST",
                data: {
                    testId: testId,
                    _token: "{{ csrf_token() }}"
                },

                success: function (response) {
                    $testDetails.find('.manual-description-test').text(response.description);
                    $testDetails.find('.manual-question-count').text(response.questions_count);
                    $testDetails.find('.manual-max-time').text(response.max_time);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                console.error('Erreur:', textStatus, errorThrown);
            }

        });
        }
        else {
            // Si aucun test n'est sélectionné, réinitialiser les détails
            $testDetails.find('.description-test').text('');
            $testDetails.find('.question-count').text('0');
            $testDetails.find('.max-time').text('0');
        }

    })


     $('#save-manual-draft').on('click', function (e) {
        e.preventDefault();

        let candidateId = $('#candidate_id').val();
        let testId = $('#manual-test-select').val();
         let jobOfferId = $('#manual-missions-select').val();
         let language = $('#manual-language-select').val();
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
                        confirmButtonText: window.translations.close,
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: window.translations.error_occurred,
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                }
            },

        });
    });



    $('#invite-test-manual-candidate').on('click', function (e) {
        e.preventDefault();
        let candidateSelected = [];
        candidateSelected.push($('#candidate_id').val());

        let candidateId = candidateSelected;
        let testId = $('#manual-test-select').val();
        let jobOfferId = $('#manual-missions-select').val();
        let language = $('#manual-language-select').val();
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
                        confirmButtonText: window.translations.close,
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: window.translations.error_occurred,                //"Une erreur est survenue lors de l'ajout du Test ! .",
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                }
            },

        });
    });






});
$(document).ready(function () {
    var doughnutchart30 = document.getElementById('doughnutchart30').getContext('2d');
    var data30 = {
        labels: ['', ''],
        datasets: [
            {
                label: 'Score',
                data: [0, 100],
                backgroundColor: ['#8DB600', '#FF8C00'],
                borderWidth: 0,
            }
        ]
    };
    var mydoughnutchartCofig30 = {
        type: 'doughnut',
        data: data30,

        options: {
            responsive: true,
            cutout: 40,
            tooltips: {
                position: 'nearest',
                yAlign: 'bottom'
            },
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Chart.js polarArea Chart'
                }
            }
        },
    };
    var mydoughnutchart30 = new Chart(doughnutchart30, mydoughnutchartCofig30);

    // Les données nécessaires pour la requête
    let ema = candidate['email']; // Modifiez cette ligne pour obtenir la valeur exacte demandée
    let tst_frm_id = test["id"]; // Modifiez cette ligne avec l'ID exact fourni par votre API
    let id = result["id"]; // Modifiez selon vos besoins ou données dynamiques

    // Envoyer la requête AJAX lors du chargement de la page
    $.ajax({
        url: ApiGetResultTestCandidate, // Mettre ici la route vers votre contrôleur
        method: 'GET',
        data: {
            ema: ema,
            tst_frm_id: tst_frm_id,
            id: id,
            _token: "{{ csrf_token() }}" // Ajout du token CSRF pour Laravel
        },
        success: function (response) {
            // Afficher le score du test
            if (response.error) {
                console.error("Erreur:", response.error);
                $('#score-display').html(`<strong>Erreur :</strong> ${response.error}`);
                return;
            }

            console.log(response);

            let scoreTest = response.score ?? 'Pas de score trouvé';
            let pdfUrl = response.pdf_report ?? null;

            // Affichage du score
            $('#score-display').html(`${scoreTest}`);

            // Affichage et téléchargement du PDF (si disponible)
            if (pdfUrl) {
                $('#pdf-link').html(`
                    <a href="${'/' + pdfUrl}" target="_blank" >
                        Rapport du test
                    </a>
                `);
            } else {
                $('#pdf-link').html(`<strong>Aucun PDF disponible</strong>`);
            }

            // Afficher le graphique avec le score
            updateDoughnutChart(mydoughnutchart30, response.num_val, response.max_val);

            let questionsList = response.list_questions; // Insérer les en-têtes (colonnes)
            const tableHeader = document.getElementById('tableHeader');
            const headers = questionsList[1];
            console.log(headers);
            console.log(questionsList);
            headers.forEach(header => {
                const th = document.createElement('th');
                th.innerText = header;
                th.style.textAlign = 'center'; // Centrer le texte
                th.style.verticalAlign = 'middle'; // Alignement vertical
                tableHeader.appendChild(th);
            });

            // Insérer les lignes de données
            const tableBody = document.getElementById('tableBody');
            questionsList.forEach(row => {
                const tr = document.createElement('tr');
                tr.style.verticalAlign = 'middle'; // Alignement vertical des cellules
                // Ajouter les colonnes (cellules)
                row.forEach(column => {
                    const td = document.createElement('td');
                    td.innerText = column;
                    td.style.textAlign = 'center'; // Centrer le texte dans chaque cellule
                    tr.appendChild(td);
                });

                // Ajouter la ligne au tableau
                tableBody.appendChild(tr);
            });



        },
        error: function (xhr) {
            // En cas d'erreur
            console.error("Erreur AJAX:", xhr);
            Swal.fire('Erreur', 'Une erreur est survenue lors du chargement des données.', 'error');
        }
    });


});

// Fonction pour afficher le graphique avec le pourcentage du score
// Fonction pour mettre à jour les données du graphique existant
function updateDoughnutChart(chart, val, max) {
    let remaining = max - val;

    // Mise à jour des données du graphique
    chart.data.datasets[0].data = [val, remaining]; // Modifier les données
    chart.update(); // Appliquer les changements au graphique
}
