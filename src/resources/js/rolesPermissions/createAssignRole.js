$(document).ready(function () {
    /**
     * Enregistrez pour Assignation des rôles.
     */
    // Soumettre le formulaire via AJAX
    $(document).on("submit", "#createAssignRole", function (e) {
        e.preventDefault(); // Empêcher la soumission normale du formulaire

        var form = $(this);
        var formData = form.serialize(); // Sérialiser les données du formulaire

        $.ajax({
            url: form.attr("action"), // L'URL d'action du formulaire
            type: "POST",
            data: formData, // Les données du formulaire
            success: function (response) {
                // Afficher un message de succès avec SweetAlert2
                Swal.fire({
                    icon: "success",
                    title: "Succès",
                    text: "Rôle assigné avec succès",
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                });

                // Fermer la modal après soumission réussie
                $("#assignRoleModal" + response.user_id).modal("hide");

                // Mettre à jour l'interface sans recharger la page
                // Par exemple, ajouter le rôle assigné dans le tableau
                var roles = response.roles
                    .map(
                        (role) =>
                            '<span style="background-color: var(--adminux-theme-bg) !important; color: #666666;" class="badge bg-theme">' +
                            role.name +
                            "</span>"
                    )
                    .join(" ");
                $("#roles-list-" + response.user_id).html(roles);
            },
            error: function (xhr, status, error) {
                // Afficher un message d'erreur avec SweetAlert2
                Swal.fire({
                    icon: "error",
                    title: "Erreur",
                    text: "Une erreur s'est produite lors de l'assignation du rôle",
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                });
            },
        });
    });

    /**
     * Enregistre les permissions assignées à un rôle.
     */
    // Récupération des tâches en fonction du modèle sélectionné
    $(".modele_permission").change(function () {
        var modele = $(this).val();
        var roleTypeId = $(this).data("role-id");

        if (modele) {
            $.ajax({
                url: "/permission/get-actions",
                type: "GET",
                data: { modele: modele },
                success: function (data) {
                    // Vider les options existantes
                    $(`#task_permission${roleTypeId}`).empty();

                    // Ajouter les nouvelles tâches
                    if (data.tasks && Object.keys(data.tasks).length > 0) {
                        $.each(data.tasks, function (key, value) {
                            $(`#task_permission${roleTypeId}`).append(
                                '<option value="' +
                                key +
                                '">' +
                                value +
                                "</option>"
                            );
                        });

                        // Sélectionner toutes les tâches par défaut
                        $(`#task_permission${roleTypeId}`).val(
                            Object.keys(data.tasks)
                        );
                        $(`#task_permission${roleTypeId}`).trigger(
                            "chosen:updated"
                        );
                    }
                },
            });
        } else {
            // Réinitialiser les sélections si aucun modèle n'est choisi
            $(`#task_permission${roleTypeId}`)
                .empty()
                .trigger("chosen:updated");
        }
    });

    // Soumission du formulaire avec AJAX
    $(".createRolePermissionForm").on("submit", function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        // let form = $(this);
        // let modalId =
        //     "#insertionRolePermission" +
        //     $(this).closest(".modal").data("role-id"); // Récupère l'ID dynamique

        $.ajax({
            url: "/permission/storeRolesPermissions",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                // Affichage du message de succès
                Swal.fire({
                    icon: "success",
                    title: "Succès",
                    text: response.success,
                }).then(function () {
                    // Rafraîchir la page après suppression de la permission
                    location.reload();

                    // // Réinitialiser le formulaire et fermer la modale après confirmation de l'utilisateur
                    // form.trigger("reset"); // Utilisation de trigger pour réinitialiser le formulaire

                    // // Si vous utilisez select2, réinitialiser aussi :
                    // form.find(".select2").val(null).trigger("change"); // Réinitialiser les select2
                    // form.find(".chosenoptgroup")
                    //     .val("")
                    //     .trigger("chosen:updated"); // Réinitialiser Chosen

                    // $(modalId).modal("hide"); // Fermer la modale
                });
            },
            error: function (response) {
                let errors = response.responseJSON.errors;
                $(".error-message").remove(); // Enlever tous les anciens messages d'erreur

                // Affichage des messages d'erreur sous chaque champ
                if (errors) {
                    $.each(errors, function (key, value) {
                        // Cibler le champ spécifique en utilisant le name de l'input
                        let field = $('[name="' + key + '"]');
                        // Ajouter l'erreur juste après le champ
                        field.after(
                            '<div class="error-message text-danger mt-1">' +
                            value +
                            "</div>"
                        );

                        // Appliquer la classe 'is-invalid' pour indiquer visuellement l'erreur
                        field.addClass("is-invalid");
                    });
                }
            },
        });
    });

    /**
     * Cette fonction permet de gérer la suppression d'une permission pour un rôle spécifique.
     */
    $(document).ready(function () {
        $(".delete-permission").click(function () {
            // Récupération des IDs du rôle et de la permission depuis les attributs data-*
            let roleId = $(this).data("role-id");
            let permissionId = $(this).data("permission-id");
            let tabId = $(this).data("tab-id"); // Récupération de l'ID de l'onglet actuel

            // Affichage d'une boîte de dialogue de confirmation avec SweetAlert2
            Swal.fire({
                title: "Êtes-vous sûr ?",
                text: "Cette action est irréversible !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Oui, supprimer !",
                cancelButtonText: "Annuler",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/permission/rolesPermissionsDetach", // URL de la route Laravel
                        type: "POST",
                        data: {
                            _token: document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"), // Récupère le token CSRF
                            role_id: roleId,
                            permission_id: permissionId,
                        },
                        success: function (response) {
                            if (response.success) {
                                // Rafraîchir la page après suppression de la permission
                                location.reload();

                                Swal.fire({
                                    title: "Supprimé !",
                                    text: "La permission a été détachée avec succès.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                            } else {
                                Swal.fire("Erreur", response.message, "error");
                            }
                        },
                        error: function (xhr) {
                            Swal.fire(
                                "Erreur",
                                "Une erreur est survenue : " + xhr.responseText,
                                "error"
                            );
                        },
                    });
                }
            });
        });
    });
});

function handleRoleFormSubmit(formId) {
    $(formId).on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var formData = form.serialize(); // Serialize form data
        $.ajax({
            url: form.attr("action"), // Get form action URL
            type: "POST",
            data: formData, // Send serialized form data
            success: function (response) {

                if (response.success === false) {
                    showErrorMessage(
                        "Erreur",
                        "Une erreur s'est produite lors de l'assignation du rôle"
                    );
                } else {
                    showSuccessMessage("Succès", "Rôle assigné avec succès");
                    window.location.href = PermissionListing;
                }
                // Close modal after successful submission
                $("#assignRoleModal" + response.user_id).modal("hide");

                // Update UI without reloading the page
                // updateUserRoles(response.user_id, response.roles);
            },
            error: function () {
                showErrorMessage(
                    "Erreur",
                    "Une erreur s'est produite lors de l'assignation du rôle"
                );
            },
        });
    });
}

// Function to show success message
function showSuccessMessage(title, text) {
    Swal.fire({
        icon: "success",
        title: title,
        text: text,
        showConfirmButton: true,
        confirmButtonText: "OK",
    });
}

// Function to show error message
function showErrorMessage(title, text) {
    Swal.fire({
        icon: "error",
        title: title,
        text: text,
        showConfirmButton: true,
        confirmButtonText: "OK",
    });
}

// Attach event listeners to forms
$(document).ready(function () {
    handleRoleFormSubmit("#createRoleForm");
    handleRoleFormSubmit("#editRoleForm");
});

// Function to delete selected roles
window.deleteSelectedRoles = function () {
    // Get the selected role IDs
    let selectedRoleIds = [];
    $('.role-checkbox:checked').each(function () {
        selectedRoleIds.push($(this).data('role-id'));
    });

    if (selectedRoleIds.length > 0) {
        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Cette action est irréversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit delete request for each selected role
                selectedRoleIds.forEach(roleId => {
                    fetch(`/permission/deleteRole/${roleId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        },
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                Swal.fire(
                                    "Supprimé!",
                                    "Les rôles ont été supprimés.",
                                    "success"
                                );
                                window.location.href = PermissionListing;
                            } else {
                                Swal.fire(
                                    "Erreur!",
                                    "Une erreur s'est produite.",
                                    "error"
                                );
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                            Swal.fire(
                                "Erreur!",
                                "Impossible de supprimer ces rôles.",
                                "error"
                            );
                        });
                });
            }
        });
    } else {
        Swal.fire("Aucune sélection", "Veuillez sélectionner des rôles à supprimer.", "info");
    }
};

// Function to open modal for selected role for modification
// window.openSelectedRoleModal = function () {
//     // Get the selected role ID
//     let selectedRoleId = $('.role-checkbox:checked').data('role-id');

//     if (selectedRoleId) {
//         openRoleModal(selectedRoleId);  // Call the function to open modal with selected role ID
//     } else {
//         Swal.fire("Aucune sélection", "Veuillez sélectionner un rôle à modifier.", "info");
//     }
// };

// Function to open modal for selected role for modification
window.openSelectedRoleModal = function () {
    // Get all selected checkboxes
    let selectedCheckboxes = $('.role-checkbox:checked');

    if (selectedCheckboxes.length === 0) {
        Swal.fire("Aucune sélection", "Veuillez sélectionner un rôle à modifier.", "info");
    } else if (selectedCheckboxes.length > 1) {
        Swal.fire("Sélection multiple", "Veuillez sélectionner un seul rôle à modifier.", "warning");
    } else {
        // Get the single selected role ID
        let selectedRoleId = selectedCheckboxes.data('role-id');
        openRoleModal(selectedRoleId);
        setFocus();
    }
};


// window.deleteRole = function (roleId) {
//     Swal.fire({
//         title: "Êtes-vous sûr?",
//         text: "Cette action est irréversible!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#d33",
//         cancelButtonColor: "#3085d6",
//         confirmButtonText: "Oui, supprimer!",
//         cancelButtonText: "Annuler",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Submit delete request (use AJAX or form submission)
//             fetch(`/permission/deleteRole/${roleId}`, {
//                 method: "DELETE",
//                 headers: {
//                     "X-CSRF-TOKEN": document.querySelector(
//                         'meta[name="csrf-token"]'
//                     ).content,
//                 },
//             })
//                 .then((response) => response.json())
//                 .then((data) => {
//                     console.log(data);
//                     if (data.success) {
//                         Swal.fire(
//                             "Supprimé!",
//                             "Le rôle a été supprimé.",
//                             "success"
//                         );
//                         window.location.href = PermissionListing;
//                     } else {
//                         Swal.fire(
//                             "Erreur!",
//                             "Une erreur s'est produite.",
//                             "error"
//                         );
//                     }
//                 })
//                 .catch((error) => {
//                     Swal.fire(
//                         "Erreur!",
//                         "Impossible de supprimer ce rôle.",
//                         "error"
//                     );
//                 });
//         }
//     });
// };

window.openRoleModal = function (roleId = null) {
    let modalTitle = $("#modalTitle");
    let roleForm = $("#roleForm");
    let roleNameInput = $("#role_name");
    let roleIdInput = $("#role_id");
    let roleTypeSelect = $("#role_types");

    // Reset Form
    // roleForm[0].reset(); // Reset form fields
    roleIdInput.val(roleId); // Clear hidden ID

    if (roleId) {
        // Editing an existing role
        modalTitle.text("Modifier un Rôle");

        // Get the role elements safely
        let roleNameElement = $(`#role_name_${roleId}`);
        let roleTypeElement = $(`#role_type_${roleId}`);

        if (roleNameElement.length) {
            roleNameInput.val(roleNameElement.val());
            // roleNameInput.val(roleNameElement.val()).change();
        } else {
            console.error(`Element #role_name_${roleId} not found.`);
        }

        if (roleTypeElement.length) {
            let typeId = roleTypeElement.data("type-id");
            roleTypeSelect.val(typeId).trigger("chosen:updated");
            roleTypeSelect.prop("disabled", true).trigger("chosen:updated");
        } else {
            console.error(`Element #role_type_${roleId} not found.`);
        }

        // Set hidden ID for editing
        roleIdInput.val(roleId);

        // Update form action for edit
        roleForm.attr("action", `/permission/updateRole`);
        roleForm.attr("method", "POST");

        // Ensure PUT method for Laravel
        if ($("#roleForm input[name='_method']").length === 0) {
            roleForm.append(`<input type="hidden" name="_method" value="PUT">`);
        }
    } else {
        // Adding a new role
        modalTitle.text("Ajouter un Rôle");
        roleForm.attr("action", "/roles/store");
        roleForm.attr("method", "POST");
    }

    // Open Modal using Bootstrap 5
    let modal = new bootstrap.Modal($("#editRole")[0]);
    modal.show();
    // setFocus();
};

function setFocus(on) {
    var element = document.activeElement;
    if (on) {
        setTimeout(function () {
            element.parentNode.classList.add("focus");
        });
    } else {
        let box = document.querySelector(".input-box");
        box.classList.remove("focus");
        $("input").each(function () {
            var $input = $(this);
            var $parent = $input.closest(".input-box");
            if ($input.val()) $parent.addClass("focus");
            else $parent.removeClass("focus");
        });
    }
}

// $(document).ready(function() {
//     // $('#roles').select2(); // Initialisation Select2

//     // Ouverture du modal avec récupération des informations
//     $(".assign-role-btn").on("click", function() {
//         let userId = $(this).data("user-id");
//         let userName = $(this).data("user-name");
//         let userRoles = $(this).data("user-roles");

//         $("#userName").text(userName);
//         $("#userId").val(userId);
//         $('#roles').val(userRoles).trigger('change');

//         $("#assignRoleModalGlobal").modal("show");
//     });

//     // Gestion de la soumission du formulaire
//     $("#assignRoleForm").on("submit", function(e) {
//         e.preventDefault();

//         let form = $(this);
//         let formData = form.serialize();

//         $.ajax({
//             url: form.attr("action"),
//             type: "POST",
//             data: formData,
//             success: function(response) {
//                 Swal.fire({
//                     icon: "success",
//                     title: "Succès",
//                     text: "Rôle mis à jour avec succès",
//                     confirmButtonText: "OK",
//                 });

//                 $("#assignRoleModalGlobal").modal("hide");

//                 let rolesHtml = response.roles.map(role => `<span class="badge bg-theme">${role.name}</span>`).join(" ");
//                 $("#roles-list-" + response.user_id).html(rolesHtml);
//             },
//             error: function() {
//                 Swal.fire({
//                     icon: "error",
//                     title: "Erreur",
//                     text: "Une erreur s'est produite",
//                     confirmButtonText: "OK",
//                 });
//             }
//         });
//     });
// });
