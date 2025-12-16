$(document).ready(function () {
    $('#professionform').on('submit', function (event) {
        event.preventDefault(); 
        const formData = {
            label: $('#labelInput').val(),
            _token: $('input[name="_token"]').val() 
        };
        $.ajax({
            url: professionsStore, 
            type: 'POST',             
            data: formData,           
            success: function (response) {
                
                Swal.fire({
                    title: window.translations.success,
                    text: window.translations.profession_add,
                    icon: 'success',
                    confirmButtonText: window.translations.confirm,
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        var modalEl = document.getElementById('exampleModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }
                        $('#labelInput').val('');

                       
                        $("#professionsTable").DataTable().ajax.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                $('#formFeedback')
                    .text(error)
                    .css({ color: 'red', display: 'block' });
                console.error('Error:', error);
            }
        });
    });
});



/**
 * Js For Update Métiers et Postes
 */

$(document).ready(function () {
    // Ouvrir le modal pour l'édition
    $("body").on("click", ".edit-btn", function () {
        var professionId = $(this).data("id");

        // Récupérer les détails de l'activité depuis le serveur
        $.get(
            "/setting/professions/" + professionId + "/edit",
            function (data) {
                $("#editmodal").modal("show");
                $("#professionId").val(data.id);
                $("#label_profession").val(data.label);
            }
        );
    });

    // Sauvegarder la modification
    $("#save_edit").click(function (e) {
        e.preventDefault();

        var professionId = $("#professionId").val();
        var formData = {
            label: $("#label_profession").val(),
        };

        $.ajax({
            url: "/api/setting/professions/" + professionId,
            type: "PUT",
            data: JSON.stringify(formData),
            contentType: "application/json",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            success: function (response) {
                // Affichage du message SweetAlert
                Swal.fire({
                    icon: "success",
                    title: window.translations.mis_ajour,
                    text: response.message, // Message du back-end
                    confirmButtonText: window.translations.confirm,
                });

                $("#editmodal").modal("hide");
                $("#professionsTable").DataTable().ajax.reload();
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: window.translations.error,
                    text: window.translations.diploma_error,
                    confirmButtonText: window.translations.confirm,
                });
                console.log(error);
            },
        });
    });
});

