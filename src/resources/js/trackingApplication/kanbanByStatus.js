$(function () {
    function initializeDragAndDrop() {
        $('.dragzonecard').sortable({
          connectWith: '.dragzonecard',
          placeholder: "ui-state-highlight",
          tolerance: 'pointer',

          start(evt, ui) {
            ui.item.addClass('dragging');
          },

          stop(evt, ui) {
            ui.item.removeClass('dragging');
          },

          receive(evt, ui) {
            const newStatusId   = $(this).data('status-id');
            const applicationId = ui.item.data('application-id');

            // Cas "Rejeté" (id = 6)
            if (newStatusId === 6) {
              Swal.fire({
                title: window.translations.motif_refus,
                html:
                  ` <div class="rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <select class="chosenoptgroup w-100 form-select mb-1" id="reasonSelect">
                     ${Object.entries(rejectionReasons)
                         .map(([k,v]) => `<option value="${k}">${v}</option>`)
                         .join('')}
                   </select>
                   </div>
                   <input id="customReason" class="form-control" style="display:none" placeholder="Entrez un nouveau motif">`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: window.translations.valider,
                preConfirm: () => {
                  const sel = document.getElementById('reasonSelect'),
                        cus = document.getElementById('customReason');
                  if (sel.value === 'other') {
                    cus.style.display = 'block';
                    if (!cus.value) {
                      Swal.showValidationMessage('Veuillez saisir un motif.');
                      return false;
                    }
                    return cus.value;
                  }
                  return sel.value;
                }
              }).then(res => {
                if (res.isConfirmed) {
                  updateApplicationStatus(applicationId, newStatusId, res.value, ui.item);
                } else {
                  $(evt.sender).sortable('cancel');
                }
              });

            // Tous les autres statuts
            } else {
              Swal.fire({
                // title: 'Confirmation',
                // text: 'Êtes-vous sûr de vouloir mettre à jour le statut ?',
                title: window.translations.confirmation,
                text: window.translations.update_status,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: window.translations.yes,
                cancelButtonText: window.translations.cancel,
              }).then(res => {
                if (res.isConfirmed) {
                  updateApplicationStatus(applicationId, newStatusId, null, ui.item);
                } else {
                  $(evt.sender).sortable('cancel');
                }
              });
            }
          }

        }).disableSelection();
      }

    function initializeProgressBars() {
        $('.draggable-card').each(function () {
            const $card = $(this);
            const applicationId = $card.data('application-id');
            const ratio = parseFloat($card.data('ratio')) || 0; // Valeur entre 0 et 1
            console.log(ratio);
            console.log(applicationId);
            const circleContainer = `#circle-${applicationId}`;

            let color = "#f03d4f";
            if (ratio >= 0.75) {
                color = "#2e9c65";
            } else if (ratio >= 0.5) {
                color = "#fdba00";
            }

            const circle = new ProgressBar.Circle(circleContainer, {
                color: color,
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#eee',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#aaa', width: 10 },
                to: { color: color, width: 10 },
                step: function (state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);
                    const value = Math.round(circle.value() * 100);
                    circle.setText(value ? value + "<small>%</small>" : '');
                }
            });
            circle.animate(ratio);
        });
    }

    function initializeProgressBarsForNewCard(newCard) {
        console.log('new cards', newCard)
            const $card = $(newCard);
            const applicationId = $card.data('application-id');
            const ratio = parseFloat($card.data('ratio')) || 0;

            console.log('Initialisation carte :', applicationId, 'avec ratio :', ratio);

            const circleContainer = `#circle-${applicationId}`;

            let color = "#f03d4f";
            if (ratio >= 0.75) {
                color = "#2e9c65";
            } else if (ratio >= 0.5) {
                color = "#fdba00";
            }

            const circle = new ProgressBar.Circle(circleContainer, {
                color: color,
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#eee',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#aaa', width: 10 },
                to: { color: color, width: 10 },
                step: function (state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);
                    const value = Math.round(circle.value() * 100);
                    circle.setText(value ? value + "<small>%</small>" : '');
                }
            });

            // Animer la barre de progression avec le ratio
            circle.animate(ratio);

    }
    function updateApplicationStatus(applicationId, statusId, reason = null, $item = null) {
        $.ajax({
          url: updateStatusKanbanUrl.replace(':id', applicationId),
          method: 'POST',
          data: { status_id: statusId, reason, _token: window.Laravel.csrfToken },
          success: function(response) {
            console.log("Mise à jour réussie", response);

            // Célébration si Retenu (ID = 4) et qu'on a bien l'élément
            if (statusId === 4 && $item) {
              $item.addClass('celebration-animation');
              if (typeof confetti === 'function') {
                confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
              }
              setTimeout(() => $item.removeClass('celebration-animation'), 3000);
            }

            Swal.fire({
              icon: 'success',
              title: window.translations.success_ats,
            //   text: 'Le statut a été mis à jour avec succès.',
              text: window.translations.statut_succes,
              confirmButtonText: window.translations.OKconfirm,
              confirmButtonColor: '#26B6EA'
            }).then(() => {
              window.location.reload();
            });
          },
          error: function(xhr) {
            console.error("Erreur lors de la mise à jour", xhr.responseText);
            Swal.fire({ icon: 'error', title: 'Erreur', text: xhr.responseJSON?.message });
          }
        });
      }


    // Filter jobOffer & Client ( Kanban )
    function filterKanban() {
        const clientId = $('#filter-client').val();
        const jobOfferId = $('#filter-job-offer').val();

        $.ajax({
            url: filterKanbanUrl,
            method: 'GET',
            data: {
                client: clientId,
                jobOffer: jobOfferId
            },
            success: function (response) {
                $('.dragzonecard').html(''); // Vider

                response.data.forEach(function (status) {
                    const statusColumn = $(`[data-status-id="${status.id}"]`);

                    status.applications.forEach(function (application) {
                        const profile = application.profile;
                        const jobOffer = application.jobOffer;
                        const matchRatio = parseFloat(application.ratio) || 0;

                        const imagePath = profile.path_picture
                            ? `/storage/${profile.path_picture}`
                            : (profile.sexe === 'Femme'
                                ? 'assets/img/Femmes/female-default.webp'
                                : 'assets/img/Hommes/male-default.webp');

                        const avatarCirclePath = profile.path_picture
                            ? `/storage/${profile.path_picture}`
                            : 'assets/img/team/default.jpg';

                        const cardHtml = `
                            <div class="card mb-3 draggable-card" data-application-id="${application.id}" data-ratio="${matchRatio}">
                                <div class="card-body p-2">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 coverimg me-1 translated_text" data-bs-toggle="tooltip"
                                                title="Photo"
                                                style="background-image: url('${imagePath}'); background-size: cover;">
                                                <img src="${imagePath}" alt="Photo de ${profile.first_name}" class="img-fluid rounded" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col fs-12">
                                            <p class="mb-1 small text-muted">${window.translations.ref} : ${profile.matricule ?? application.id}</p>
                                            <p class="mb-0">${profile.first_name}</p>
                                            <p class="mb-0">${profile.last_name}</p>
                                        </div>
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a class="text-secondary" data-bs-toggle="dropdown" role="button">
                                                    <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item translated_text" href="/matching/detail/${application.id}/${profile.id}/${jobOffer.id}" target="_blank">
                                                            Détail
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p class="fw-bold mb-0" style="font-size: 13px;">${jobOffer.title}</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small translated_text">Score Matching</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-small" id="circle-${application.id}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 coverimg rounded-circle" data-bs-toggle="tooltip"
                                                title="${profile.first_name}" style="background-image: url('${avatarCirclePath}'); background-size: cover; width: 40px; height: 40px;">
                                            </div>
                                        </div>
                                        <div class="col-auto ms-auto">
                                            <label class="custom-checkbox mb-0">
                                                <input type="checkbox" class="to-email" target-data="${profile.email}">
                                                <span class="checkmark" data-bs-toggle="tooltip" title="Sélectionner"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        statusColumn.append(cardHtml);
                    });
                });

                initializeProgressBars();
                initializeDragAndDrop();
            },
            error: function (xhr) {
                console.error("Erreur lors du filtrage du Kanban", xhr.responseText);
            }
        });
    }

    initializeProgressBars();

    // Écouteurs d'événements pour les filtres
    $('#filter-client, #filter-job-offer').on('change', function () {
        filterKanban();
    });

    $(document).on('click', '.abandon-candidature', function () {
        let applicationId = $(this).data('id');

        Swal.fire({
            title: window.translations.confirmer_abandon,
            text: window.translations.action_irreversible,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: window.translations.confirm_abandonner,
            cancelButtonText: window.translations.cancel,
        }).then((result) => {
            if (result.isConfirmed) {
                updateApplicationStatus(applicationId, 6, "Candidature abandonnée");
            }
        });
    });

    initializeDragAndDrop();

    $('.dragzonecard').each(function() {
        const $column = $(this);
        const statusId = $column.data('status-id');
        $column.on('scroll', function() {
            if ($column.scrollTop() + $column.innerHeight() >= $column[0].scrollHeight -
                100) {
                loadMoreApplications(statusId, $column);
            }
        });
    });

    function loadMoreApplications(statusId, $column) {
        const $loadingIndicator = $(`.column-loading[data-status="${statusId}"]`);
        const currentPage = parseInt($column.data('page')) || 1;
        const totalPages = parseInt($column.data('total-pages'));
        if ($loadingIndicator.is(':visible') || currentPage >= totalPages) {
            return;
        }
        $loadingIndicator.show();

        $.ajax({
            url: apiGetATSMoreApps,
            type: 'GET',
            data: {
                status_id: statusId,
                page: currentPage + 1,
                per_page: 3
            },
            success: function(response) {
                if (response.success && response.data.length > 0) {

                   response.data.forEach(function(application) {

                        $column.append(application)
                        initializeProgressBarsForNewCard(application)

                    })


                    $column.data('page', currentPage + 1);


                    $(`.total-count[data-status="${statusId}"]`).text(response.total);
                }
            },
            complete: function() {
                $loadingIndicator.hide();

            },
            error: function() {
                console.error('Error loading more applications');
            }
        });

    }
});
$(document).on('click', '.restore-candidature', function () {
    let applicationId = $(this).data('id');

    Swal.fire({
        title: window.translations.restaurer_candidature,
        text: window.translations.text_restaurer_candidature,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: window.translations.confirm_restaurer_candidature,
        cancelButtonText: window.translations.cancel,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: updateStatusKanbanUrl.replace(':id', applicationId),
                method: 'POST',
                data: {
                    status_id: 1, // Mettre un statut actif (Shortlist)
                    is_abandon_candidature: 0, // Remettre à 0 pour annuler l'abandon
                    _token: window.Laravel.csrfToken,
                },
                success: function (response) {
                    console.log("Candidature restaurée avec succès", response);

                    Swal.fire({
                        icon: 'success',
                        title: window.translations.success_ats,
                        text: window.translations.text_succes_candidature_restaurée,
                        showConfirmButton: true,
                        confirmButtonText: window.translations.OKconfirm,
                        confirmButtonColor: '#26B6EA',
                    }).then(() => {
                        window.location.reload(); // Refresh complet après validation
                    });
                },
                error: function (xhr) {
                    console.error("Erreur lors de la restauration", xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'La restauration de la candidature a échoué.',
                    });
                },
            });
        }
    });
});
