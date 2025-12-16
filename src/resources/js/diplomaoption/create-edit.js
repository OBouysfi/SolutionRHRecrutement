$(document).ready(function () {
    $('#diplomaOptionform').on('submit', function (event) {
        event.preventDefault(); 
        const formData = {
            label: $('#labelInput').val(),
            _token: $('input[name="_token"]').val() 
        };
        
        $.ajax({
            url: diplomaOptionsStore, // You can replace this with your actual URL
            type: 'POST',
            data: formData,
            success: function (response) {
                Swal.fire({
                    title: window.translations.success_client,
                    text: window.translations.diploma_option_added,
                    icon: 'success',
                    confirmButtonText: window.translations.confirm
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Hide the modal if it's open
                        var modalEl = document.getElementById('exampleModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }

                        // Clear the input field
                        $('#labelInput').val('');

                        // Reload the DataTable to show updated options
                        $("#diplomaOptionsTable").DataTable().ajax.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                // Handle error
                $('#formFeedback')
                    .text(error)
                    .css({ color: 'red', display: 'block' });
                console.error('Error:', error);
            }
        });
    });
});


/**
 * Js For Update Diploma Option
 */

$(document).ready(function () {
    // Ouvrir le modal pour l'édition
    $("body").on("click", ".edit-btn", function () {
        var diplomaOptionId = $(this).data("id");

        // Récupérer les détails de l'activité depuis le serveur
        $.get(
            "/setting/diplomaoptions/" + diplomaOptionId + "/edit",
            function (data) {
                $("#editmodal").modal("show");
                $("#diplomaOptionId").val(data.id);
                $("#label_diplomaOption").val(data.label);
            }
        );
    });

    // Sauvegarder la modification
    $("#save_edit").click(function (e) {
        e.preventDefault();

        var diplomaOptionId = $("#diplomaOptionId").val();
        var formData = {
            label: $("#label_diplomaOption").val(),
        };

        $.ajax({
            url: "/api/setting/diploma-options/" + diplomaOptionId,
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
                    title: window.translations.success_client,
                    text: window.translations.diploma_option_updated,
                    confirmButtonText: window.translations.confirm
                });

                $("#editmodal").modal("hide");
                $("#diplomaOptionsTable").DataTable().ajax.reload();
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: window.translations.error,
                    text: window.translations.diploma_error,
                    confirmButtonText: window.translations.confirm
                });
                console.log(error);
            },
        });
    });
});




