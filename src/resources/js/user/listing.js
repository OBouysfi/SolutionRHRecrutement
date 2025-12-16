$(document).ready(function () {

    var table = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ajax: {
            url: userListingData,
            data: function (d) {
                d.role = $('#role_filter').val();
                d.status = $('#status_filter').val();
                d.permission = $('#permission_filter').val();
            }
        },
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ éléments",
            info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
            infoFiltered: "(filtré de _MAX_ éléments au total)",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun élément correspondant trouvé",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Précédent",
                next: "Suivant",
                last: "Dernier"
            }
        },
        columns: [
            { data: 'logo', name: 'logo' },
            { data: 'name', name: 'name', orderable: false },
            { data: 'status', name: 'status', orderable: false },
            { data: 'role', name: 'role', orderable: false }, // New column for role
            { data: 'email', name: 'email', orderable: false },
            { data: 'created_at', name: 'created_at', orderable: false }, // New column for role
            { data: 'last_login_at', name: 'last_login_at', orderable: false }, // New column for role
            { data: 'action', name: 'action', orderable: false },


        ],
    });

    $(document).on('click', '.delete-user', function () {
        var $button = $(this);
        var UserId = $button.data('user-id');
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
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: apiUserDelete.replace('id', UserId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        console.log('res', response)
                        // OB : Supprime la ligne pour table
                        row.remove().draw();
                        // Affiche un SweetAlert de succès
                        Swal.fire(
                            'Supprimé!',
                            'Le Utilisateur a été supprimée.',
                            'success'
                        );
                    },
                    error: function (xhr, status, error) {
                        // OB : Affiche un SweetAlert d'erreur
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

    $('#role_filter').on('change', function () {
        table.ajax.reload();
    });

    // Ex. recharger le tableau lors d’un changement de filtre
    $('#status_filter').on('change', function () {
        table.ajax.reload();
    });
    // Ex. recharger le tableau lors d’un changement de filtre
    $('#permission_filter').on('change', function () {
        table.ajax.reload();
    });
});
$(document).ready(function () {

    $(document).on('click', '.edit-user-btn', function () {
        let userId = $(this).data('id');
        let userName = $(this).data('name');
        let userEmail = $(this).data('email');
        let userRole = $(this).data('role');
        let userAgency = $(this).data('agency');
        let userStatus = $(this).data('status');
        let userImage = $(this).data('image');

        // Populate the modal fields with the user data
        $('#EditUser #edit-name').val(userName);
        $('#EditUser #edit-email').val(userEmail);
        $('#EditUser #edit-roles').val(userRole);
        $('#EditUser #edit-agency').val(userAgency);
        $('#EditUser #edit-status-active').prop('checked', userStatus == 1);
        $('#EditUser #edit-status-bloque').prop('checked', userStatus == 0);

        console.log('User Image:', userImage);

        // // Set user image if available
        if (userImage) {
            $('#EditUser img  #edit-user-logo ').attr('src', userImage);

        } else {
            $('#EditUser img  #edit-user-logo img').attr('src',
                'assets/img/icon/photo-empty.png');
        }

        // Dynamically set the update URL
        let updateUrl = apiUserUpdate.replace('__ID__', userId);

        // Update form action dynamically
        $("#EditUser  #editDataUser").attr('action', updateUrl);
        // // Show the modal
        $('#EditUser').offcanvas('show');
    });
    $(document).on('click', '.view-user-btn', function () {
        let userId = $(this).data('id');
        let userName = $(this).data('name');
        let userEmail = $(this).data('email');
        let userRole = $(this).data('role');
        let userAgency = $(this).data('agency');
        let userStatus = $(this).data('status');
        let userImage = $(this).data('image');
        //  modal fields with the user data
        $('#ViewUser #view-name').val(userName);
        $('#ViewUser #view-email').val(userEmail);
        $('#ViewUser #view-roles').val(userRole);
        $('#ViewUser #view-agency').val(userAgency);
        $('#ViewUser #view-status-active').prop('checked', userStatus == 1);
        $('#ViewUser #view-status-bloque').prop('checked', userStatus == 0);
        if (userImage) {
            $('#ViewUser #view-user-logo').attr('src', userImage);
        } else {
            $('#ViewUser #view-user-logo').attr('src', 'assets/img/icon/photo-empty.png');
        }

        // // Show the modal
        $('#ViewUser').offcanvas('show');
    });
});
$(document).ready(function () {
    let tabId = new URLSearchParams(window.location.search).get('tab');
    if (tabId) {
        $('.tab-pane').removeClass('show active');
        $('.nav-link').removeClass('active');

        $('#' + tabId).addClass('show active');
        $('[href="#' + tabId + '"]').addClass('active');
    }
});

$(document).ready(function () {
    $("#UserCreate").on("submit", function (e) {
        e.preventDefault();
        const $btn = $("#save-user-btn");
        const $spinner = $("#save-user-spinner");
        const $text = $("#save-user-text");

        // Activer le spinner et désactiver le bouton
        $btn.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.addClass("invisible");
        var formData = new FormData(this);
        $.ajax({
            url: apiUserCreate,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succès!",
                    text: "Utilisateur ajouté avec succès !",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => {

                    $('#userTable').DataTable().ajax.reload();
                    Swal.fire(
                        'Supprimé!',
                        'Le Utilisateur a été Ajouté.',
                        'success'
                    );
                    $('#AddUser').hide();
                });

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
                        text: "Une erreur est survenue lors de l'ajout du Utilisateur .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
            complete: function () {
                // Réinitialise le bouton
                $btn.prop("disabled", false);
                $spinner.addClass("d-none");
                $text.removeClass("invisible");
            }
        });
    });


    $("#editDataUser").on("submit", function (e) {
        e.preventDefault();
        const $spinner = $("#editUserSpinner");
        const $submitBtn = $("#editUserSubmitBtn");

        $spinner.removeClass("d-none");
        $submitBtn.prop("disabled", true);
        var form = $(this);
        var actionUrl = form.attr('action');
        let formData = new FormData(this);
        $.ajax({
            url: actionUrl,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);

                Swal.fire({
                    title: 'Succès!',
                    text: "Utilisateur modifié avec succès !",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {

                    $('#userTable').DataTable().ajax.reload();
                    Swal.fire(
                        'Supprimé!',
                        'Le Utilisateur a été Modfier.',
                        'success'
                    );
                    $('#EditUser').hide();
                });
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
                        text: "Une erreur est survenue lors de l'ajout du Utilisateur .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
            complete: function () {
                $spinner.addClass("d-none");
                $submitBtn.prop("disabled", false);
            }
        });
    });

});