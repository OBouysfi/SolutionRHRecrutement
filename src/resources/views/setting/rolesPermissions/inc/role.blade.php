<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row px-3">
                        <div class="mt-3 mb-3 float-md-end d-flex align-items-center"
                            style="width: 500px">
                            <div class=" me-2 flex-grow-1">
                                <input type="text" class="form-control p-2 add-role-input" placeholder="Nom du rôle">
                                <input type="hidden" name="role_id" id="editRoleId" value="">
                            </div>
                            <div class="">
                                <button class="btn btn-theme add-role ">{{ __("generated.Ajouter un rôle") }}</button>
                                <button
                                    class="btn btn-danger delete-role d-none ">{{ __("generated.Supprimer") }}</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="bg-light-theme" style="backdrop-filter: blur(8px)">
                                        <tr class="align-middle">
                                            <th class="fw-bold ">{{ __("generated.NOM") }}</th>
                                            <th class="fw-bold ">{{ __("generated.ACTIONS") }}</th>
                                            <th class="fw-bold"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ __($role->name) }}
                                                </td>
                                                <td class="d-none"> {{ __($role->id) }} </td>
                                                <td><a class="edit-role "
                                                        style="cursor: pointer">{{ __("generated.modifier le rôle") }}</a></td>
                                                <td><a class="edit-role-permission "
                                                        style="cursor: pointer">{{ __("generated.modifier les droits") }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var addRole = "{{ route('roles.store') }}";
    var rolePermissionsRoute = "{{ route('setting.role-permission') }}";
    var updateRolePermissionRoute = "{{ route('setting.update.role-permission') }}";
    // const allPermissions = @json($permissions);
    $(document).ready(function() {
        $('.add-role').off("click").on('click', function() {
            $.ajax({
                url: addRole,
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": $('.add-role-input').val()
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Succès !',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Erreur!",
                        text: error,
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            });
                }
            );
        var id = 0;
        $('.edit-role').off("click").on("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            var closestTr = $(this).closest('tr');
            var name = closestTr.find('td').eq(0).text();
            id = closestTr.find('td').eq(1).text();
            console.log(id);
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
            $('.add-role').addClass('edit-role-button');
            $('.add-role').text('Modifier le rôle');
            $('.edit-role-button').removeClass('add-role');
            $('#editRoleId').val(id);
            $('.add-role-input').val(name);
            $('.delete-role').removeClass('d-none');

        });
        $('.edit-role-button').off("click").on('click', function(e) {
            e.preventDefault();
            var editRole = "{{ route('roles.update', '+id+') }}";
            $.ajax({
                url: editRole,
                method: 'PATCH',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": name,
                    "role_id": id
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Succès !',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire(error);
                }
            })
        });

        $('.delete-role').off("click").on('click', function(e) {
            e.preventDefault();
            var deleteRole = "{{ route('roles.destroy', ' + id + ') }}";
            console.log(id);
            Swal.fire({
                "title": 'Êtes-vous sûr?',
                "text": "Vous ne pourrez pas revenir en arrière!",
                "icon": 'warning',
                "showCancelButton": true,
                "confirmButtonColor": '#5C6798',
                "cancelButtonColor": '#F88DA5',
                "confirmButtonText": 'Oui, supprimez-le!'
            }).then((result, deleteRole) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.ajax({
                        url: "roles/" + id,
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": 'DELETE'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Succès !',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(error);
                        }
                    })
                }
            })
        });


        var roleId = 0;

        $('.edit-role-permission').on('click', function(e) {
            e.preventDefault();

            const closestTr = $(this).closest('tr');
            const roleName = closestTr.find('td').eq(0).text();
            roleId = closestTr.find('td').eq(1).text();

            $('#editRoleIdOnListing').val(roleId);
            $('#RoleNameOnListing').val(roleName);
            $(".role_name").html("Rôle: " + roleName);
            $('#tab1220-tab').removeClass('disabled').trigger('click');

            $.ajax({
                url: `/permission/roles/${roleId}/permission-ids`,
                type: 'GET',
                beforeSend: () => $('#loader').show(),
                success: function(data) {
                    const rolePermissionIds = data.permission_ids;

                    $('#roleID').text(data.role_name);

                    // Reset all checkboxes
                    $('.permission-switch').prop('checked', false);

                    // Activate only those that match the current role
                    $('.permission-switch').each(function() {
                        const permissionId = parseInt($(this).data(
                            'permission-id'));
                        if (rolePermissionIds.includes(permissionId)) {
                            $(this).prop('checked', true);
                        }
                    });

                    $('#loader').hide();
                },
                error: function(err) {
                    $('#loader').hide();
                    console.error("Erreur lors de la récupération des permissions :", err);
                }
            });
        });



        $(document).on('change', '.form-check-input', function() {
            const permissionId = $(this).data('permission-id');
            const hasPermission = $(this).is(':checked');

            $.ajax({
                url: updateRolePermissionRoute, // define this route in your Laravel routes
                type: 'POST',
                data: {
                    role_id: roleId,
                    permission_id: permissionId,
                    assign: hasPermission,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // include CSRF
                },
                success: function(response) {
                    console.log('Permission updated', response);
                },
                error: function(xhr, status, error) {
                    console.error("Error updating permission:", error);
                }
            });
        });


        $(document).on('click', '.toggle-permissions', function() {
            let target = $(this).data('target');
            $(target).collapse('toggle');

            // Optional: Toggle plus/minus icon
            let icon = $(this).find('i');
            icon.toggleClass('bi bi-arrows-collapse');
        });
        $('#parentSelect').val(null).trigger('change');

        // $('#parentSelect').select2({
        //     placeholder: "Sélectionnez certaines options",
        //     dropdownAutoWidth: true,
        //     allowClear: true,
        //     width: '100%',
        //     language: {
        //         noResults: function() {
        //             return "Aucun résultat trouvé";
        //         }
        //     }
        // });

        $('#parentSelect').on('change', function() {
            const selectedParents = $(this).val() || [];

            $('.permission-card').each(function() {
                const cardParent = $(this).data('parent');
                if (selectedParents.includes(cardParent)) {
                    $(this).removeClass('d-none');
                } else {
                    $(this).addClass('d-none');
                }
            });
        });
    });


    // function nextTab() {
    // let $active = $('.nav-tabs .nav-link.active');
    // let $next = $active.parent().next().find('.nav-link');
    // if ($next.length) $next.trigger('click');
    // else $active.html(`<i class="bi bi-check2-circle me-1"></i>Fini`); // show done
    // }

    // function previousTab() {
    // let $active = $('.nav-tabs .nav-link.active');
    // let $prev = $active.parent().prev().find('.nav-link');
    // if ($prev.length) $prev.trigger('click');
    // }
</script>
