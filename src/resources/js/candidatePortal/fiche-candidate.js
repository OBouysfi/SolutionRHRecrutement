$(document).ready(function () {
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'
    // Map locale to DataTables language file
    const dataTablesLangUrl =
        {
            fr: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "//cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
        }[locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";
    var table = $('#testResultPortailCandidateTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
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
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = (settings._iDisplayStart / pageLength) + 1;

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
            if (action === 'first') table.page('first').draw('page');
            if (action === 'prev') table.page('previous').draw('page');
            if (action === 'next') table.page('next').draw('page');
            if (action === 'last') table.page('last').draw('page');
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

        if (testId) {
            $.ajax({
                url: ApiTestGetDetails,
                type: "POST",
                data: {
                    testId: testId,
                    _token: "{{ csrf_token() }}"
                },

                success: function (response) {
                    console.log(response);
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



        // Vérifiez que le test est bien sélectionné
        if (!testId) {
            // alert('Vous devez sélectionner un test avant de sauvegarder.');
            return;
        }

        // Envoyez les données via une requête AJAX
        $.ajax({
            url: ApiTestResult, // Route à configurer dans Laravel
            type: "POST",
            data: {
                candidate_id: candidateId,
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

        // Récupérer les données sélectionnées
        let candidateId = $('#candidate_id').val();
        let testId = $('#test-select').val();
        let language = $('#language-select').val();
        let status = 'Final';
        let score = 0;
        let dateTest = null;
        let nee_ful_scr = $('#nee_ful_scr').is(':checked') ? 1 : 0; // Récupère 1 ou 0
        let add_pro = $('#add_pro').is(':checked') ? 1 : 0;         // Récupère 1 ou 0

        // Vérifiez que le test est bien sélectionné
        if (!testId) {
            // alert('Vous devez sélectionner un test avant de sauvegarder.');
            Swal.fire({
                title: "Erreur!",
                html: 'Vous devez sélectionner un test avant de sauvegarder.',
                icon: "error",
                confirmButtonText: "Fermer",
            });
            return;
        }

        // Envoyez les données via une requête AJAX
        $.ajax({
            url: ApiInviteCandidateToTest, // Route à configurer dans Laravel
            type: "POST",
            data: {
                candidate_id: candidateId,
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
                    text: "Invitation de Test envoyée avec succès !",
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


    $(document).on('click', '.delete-test-result', function () {
        var $button = $(this);
        var resultId = $button.data('test-result-id');
        var row = table.row($button.parents('tr'));

        // Define translations (example for fr, en, ar, pt, zh, es)
        const translations = {
            fr: {
                confirmTitle: "Êtes-vous sûr?",
                confirmText: "Vous ne pourrez pas revenir en arrière!",
                confirmButton: "Oui, supprimez-le!",
                deletedTitle: "Supprimé!",
                deletedText: "Test Candidat a été supprimée.",
                errorTitle: "Erreur!",
                errorText: "Une erreur est survenue lors de la suppression.",
            },
            en: {
                confirmTitle: "Are you sure?",
                confirmText: "You won't be able to revert this!",
                confirmButton: "Yes, delete it!",
                deletedTitle: "Deleted!",
                deletedText: "Candidate test has been deleted.",
                errorTitle: "Error!",
                errorText: "An error occurred while deleting.",
            },
            ar: {
                confirmTitle: "هل أنت متأكد؟",
                confirmText: "لن تتمكن من التراجع!",
                confirmButton: "نعم، احذفه!",
                deletedTitle: "تم الحذف!",
                deletedText: "تم حذف اختبار المرشح.",
                errorTitle: "خطأ!",
                errorText: "حدث خطأ أثناء الحذف.",
            },
            pt: {
                confirmTitle: "Tem certeza?",
                confirmText: "Você não poderá reverter isso!",
                confirmButton: "Sim, exclua!",
                deletedTitle: "Excluído!",
                deletedText: "Teste do candidato foi excluído.",
                errorTitle: "Erro!",
                errorText: "Ocorreu um erro ao excluir.",
            },
            zh: {
                confirmTitle: "你确定吗？",
                confirmText: "此操作无法撤销！",
                confirmButton: "是的，删除！",
                deletedTitle: "已删除！",
                deletedText: "候选人测试已被删除。",
                errorTitle: "错误！",
                errorText: "删除时发生错误。",
            },
            es: {
                confirmTitle: "¿Estás seguro?",
                confirmText: "¡No podrás revertir esto!",
                confirmButton: "¡Sí, bórralo!",
                deletedTitle: "¡Eliminado!",
                deletedText: "La prueba del candidato ha sido eliminada.",
                errorTitle: "¡Error!",
                errorText: "Ocurrió un error al eliminar.",
            }
        };

        // Detect locale (default to 'fr')
        const locale = document.documentElement.lang || "fr";
        const t = translations[locale] || translations.fr;

        // Use translations in SweetAlert
        Swal.fire({
            title: t.confirmTitle,
            text: t.confirmText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5C6798',
            cancelButtonColor: '#F88DA5',
            confirmButtonText: t.confirmButton
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: ApiDeleteTestResult.replace('id', resultId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        row.remove().draw();
                        Swal.fire(
                            t.deletedTitle,
                            t.deletedText,
                            'success'
                        );
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            t.errorTitle,
                            t.errorText,
                            'error'
                        );
                    }
                });
            }
        });
    });


});
