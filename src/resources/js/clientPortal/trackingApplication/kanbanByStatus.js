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
              const translations = {
                  fr: {
                      confirmationTitle: 'Confirmation',
                      confirmationText: 'Êtes-vous sûr de vouloir mettre à jour le statut ?',
                      confirmButton: 'Oui',
                      cancelButton: 'Annuler',
                      validateButton: 'Valider',
                      reasonForRejection: 'Motif de refus',
                      updateSuccessTitle: 'Mise à jour',
                      updateSuccessText: 'Le statut a été mis à jour avec succès',
                      updateErrorTitle: 'Erreur',
                      cancelInfoTitle: 'Annulé',
                      cancelInfoText: 'La mise à jour du statut a été annulée.',
                  },
                  en: {
                      confirmationTitle: 'Confirmation',
                      confirmationText: 'Are you sure you want to update the status?',
                      confirmButton: 'Yes',
                      cancelButton: 'Cancel',
                      validateButton: 'Validate',
                      reasonForRejection: 'Reason for rejection',
                      updateSuccessTitle: 'Update',
                      updateSuccessText: 'The status has been successfully updated',
                      updateErrorTitle: 'Error',
                      cancelInfoTitle: 'Cancelled',
                      cancelInfoText: 'Status update has been cancelled.',
                  },
                  es: {
                      confirmationTitle: 'Confirmación',
                      confirmationText: '¿Está seguro de que desea actualizar el estado?',
                      confirmButton: 'Sí',
                      cancelButton: 'Cancelar',
                      validateButton: 'Validar',
                      reasonForRejection: 'Motivo de rechazo',
                      updateSuccessTitle: 'Actualización',
                      updateSuccessText: 'El estado se ha actualizado con éxito',
                      updateErrorTitle: 'Error',
                      cancelInfoTitle: 'Cancelado',
                      cancelInfoText: 'La actualización del estado ha sido cancelada.',
                  },
                  pt: {
                      confirmationTitle: 'Confirmação',
                      confirmationText: 'Tem certeza de que deseja atualizar o status?',
                      confirmButton: 'Sim',
                      cancelButton: 'Cancelar',
                      validateButton: 'Validar',
                      reasonForRejection: 'Motivo da rejeição',
                      updateSuccessTitle: 'Atualização',
                      updateSuccessText: 'O status foi atualizado com sucesso',
                      updateErrorTitle: 'Erro',
                      cancelInfoTitle: 'Cancelado',
                      cancelInfoText: 'A atualização do status foi cancelada.',
                  },
                  ar: {
                      confirmationTitle: 'تأكيد',
                      confirmationText: 'هل أنت متأكد أنك تريد تحديث الحالة؟',
                      confirmButton: 'نعم',
                      cancelButton: 'إلغاء',
                      validateButton: 'تأكيد',
                      reasonForRejection: 'سبب الرفض',
                      updateSuccessTitle: 'تحديث',
                      updateSuccessText: 'تم تحديث الحالة بنجاح',
                      updateErrorTitle: 'خطأ',
                      cancelInfoTitle: 'ملغي',
                      cancelInfoText: 'تم إلغاء تحديث الحالة.',
                  },
                  zh: {
                      confirmationTitle: '确认',
                      confirmationText: '您确定要更新状态吗？',
                      confirmButton: '是',
                      cancelButton: '取消',
                      validateButton: '验证',
                      reasonForRejection: '拒绝原因',
                      updateSuccessTitle: '更新',
                      updateSuccessText: '状态已成功更新',
                      updateErrorTitle: '错误',
                      cancelInfoTitle: '已取消',
                      cancelInfoText: '状态更新已取消。',
                  },
              };

              const locale = document.documentElement.lang || "fr";
              const t = translations[locale] || translations.fr;


              // Cas "Rejeté" (id = 6)
            if (newStatusId === 6) {
              Swal.fire({
                title: t.reasonForRejection,
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
                  cancelButtonText: t.cancelButton,
                confirmButtonText: t.validateButton,
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
                title: t.confirmationTitle,
                text: t.confirmationText,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: t.confirmButton,
                cancelButtonText: t.cancelButton,
              }).then(res => {
                if (res.isConfirmed) {
                  updateApplicationStatus(applicationId, newStatusId, null, ui.item, t);
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
    function updateApplicationStatus(applicationId, statusId, reason = null, $item = null, t = null) {
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
              title: t.updateSuccessTitle,
              text: t.updateSuccessText,
              confirmButtonText: t.confirmButton,
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
                                            <div class="avatar avatar-50 coverimg me-1" data-bs-toggle="tooltip"
                                                title="Photo"
                                                style="background-image: url('${imagePath}'); background-size: cover;">
                                                <img src="${imagePath}" alt="Photo de ${profile.first_name}" class="img-fluid rounded" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col fs-12">
                                            <p class="mb-1 small text-muted">Réf : ${profile.matricule ?? application.id}</p>
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
                                                        <a class="dropdown-item" href="/matching/detail/${application.id}/${profile.id}/${jobOffer.id}" target="_blank">
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
                                            <span class="small">Score Matching</span>
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
            title: 'Confirmer l\'abandon de candidature',
            text: 'Cette action est irréversible.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, abandonner',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                updateApplicationStatus(applicationId, 6, "Candidature abandonnée");
            }
        });
    });

    initializeDragAndDrop();
});
$(document).on('click', '.restore-candidature', function () {
    let applicationId = $(this).data('id');

    Swal.fire({
        title: 'Restaurer la candidature',
        text: 'Voulez-vous vraiment restaurer cette candidature ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Oui, restaurer',
        cancelButtonText: 'Annuler',
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
                        title: 'Succès',
                        text: 'Candidature restaurée avec succès.',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
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
