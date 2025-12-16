$(document).ready(function() {
    let changedPermissions = new Set();





    // $('#ModulesSelect').select2({
    //     placeholder: "Select permission groups",
    //     dropdownAutoWidth: true,
    //     allowClear: true
    // });


    $.ajax({
        url: RolePermissionListing,
        type: 'GET',

        beforeSend: function() {
            $('#loader').show();
        },
        success: function(data) {
            let parentOptions = Object.keys(data.roles[0].permissions).map(parent => {
                return `<option value="${parent}">${parent}</option>`;
            }).join('');
            // $('#ModulesSelect').html(parentOptions).select2({
            //     placeholder: "Select permission groups",
            //     width: '100%'
            // });  

            let allPermissions = data.permissions;

            let roles = data.allroles;


            $('#ModulesSelect').on('change', function () {
                const selectedModules = $(this).val();
                const roles = data.allroles;
                $('#allPermissionsCard').empty();   

                if (selectedModules && selectedModules.length > 0) {
                    selectedModules.forEach((module, index) => {
                        if (allPermissions[module]) {
                            const collapseId = `module-${index}`; // ID unique pour le collapsible
                            let cardContent = `
            <div class="card border-0 mb-4" >
                <div class="card-header d-flex justify-content-between" style="cursor: pointer;" >
                    <h6 class="title custom-title mb-0">
                        ${module}
                    </h6>

                     <button class="btn btn-sm toggle-permissions" data-bs-toggle="collapse" href="#${collapseId}" aria-expanded="false">
                                    <i class="bi bi-arrows-collapse"></i>
                                </button>
                </div>
                <div id="${collapseId}" class="collapse">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-theme me-2 edit-permissions" data-module="${module}">Modifier</button>
                            <button class="btn btn-theme save-permissions" data-module="${module}" style="display: none;">Enregistrer</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr style="border-top: 1px solid #e9e9e9;">
                                        <th class="text-start div_figed">DROIT</th>`;
                            roles.forEach(role => {
                                cardContent += `<th class="text-center">${role.name}</th>`;
                            });
                            cardContent += `
                                    </tr>
                                </thead>
                                <tbody>`;
                            allPermissions[module].forEach(permission => {
                                cardContent += `
                <tr>
                    <td class="div_figed" >
                        <div style="min-width: 300px;width: fit-content">${permission.task}</div>
                    </td>`;
                                roles.forEach(role => {
                                    const isChecked = role.permissions.some(p => p.name === permission.name) ? 'checked' : '';
                                    cardContent += `
                    <td class="text-center">
                        <div class="form-check form-switch d-flex justify-content-center align-items-center"
                        style="width: 200px"
                        >
                            <input class="form-check-input" type="checkbox"
                                disabled
                                data-role-id="${role.id}"
                                data-permission-id="${permission.id}"
                                data-id="${permission.id}_${role.id}"
                                ${isChecked}>
                        </div>
                    </td>`;
                                });
                                cardContent += `</tr>`;
                            });

                            cardContent += `
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        `;

                            $('#allPermissionsCard').append(cardContent);
                        } else {
                            console.warn(`Module "${module}" n'existe pas dans les permissions.`);
                        }
                    });
                } else {
                    $('#allPermissionsCard').html('<p class="text-center">Aucun module sélectionné.</p>');
                }
            });



            $('#ModulesSelect').trigger('change');
            setTimeout(function() {
                $('#loader').hide();
            }, 5000);
        },
        error: function(xhr, status, error) {
            $('#loader').hide();
            console.error("Erreur lors de la récupération des permissions : ",
                error);
        }
    });


    $('#allPermissionsCard').on('click', '.edit-permissions', function() {
        const card = $(this).closest('.card');
        const checkboxes = card.find('.form-check-input');
        const saveButton = card.find('.save-permissions');

        checkboxes.prop('disabled', false);
        checkboxes.on('change', function() {
            changedPermissions.add($(this).data('id'));
            saveButton.show();
        });

        $(this).hide();
        saveButton.show();
    });


    $('#allPermissionsCard').on('click', '.save-permissions', function () {
        const card = $(this).closest('.card');
        const checkboxes = card.find('.form-check-input');
        const editButton = card.find('.edit-permissions');
        const saveButton = $(this);
        const updatedPermissions = [];

        checkboxes.each(function () {
            if (changedPermissions.has($(this).data('id'))) {
                updatedPermissions.push({
                    role_id: $(this).data('role-id'),
                    permission_id: $(this).data('permission-id'),
                    assign: $(this).is(':checked')
                });
            }
        });

        if (updatedPermissions.length === 0) {
            saveButton.hide();
            editButton.show();
            checkboxes.prop('disabled', true);
            return;
        }

        checkboxes.prop('disabled', true);

        $.ajax({
            url: updateRolePermission,
            method: 'POST',
            data: JSON.stringify({ permissions: updatedPermissions }),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès!',
                        text: 'Les permissions ont été mises à jour avec succès',
                        confirmButtonText: 'OK'
                    });

                    changedPermissions.clear();
                    saveButton.hide();
                    editButton.show();
                } else {
                    checkboxes.prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: response.message || 'Une erreur est survenue lors de la mise à jour des permissions'
                    });
                }
            },
            error: function (xhr, status, error) {
                checkboxes.prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Une erreur est survenue lors de la mise à jour des permissions'
                });
                console.error('Error:', error);
            }
        });
    });
});
