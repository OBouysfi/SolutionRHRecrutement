$(document).ready(function () {
    // Ouvrir le modal pour l'édition
    $("body").on("click", ".edit-btn", function () {
        var activityAreaId = $(this).data("id");

        // Récupérer les détails de l'activité depuis le serveur
        $.get(
            "/setting/activity_areas/" + activityAreaId + "/edit",
            function (data) {
                $("#editmodal").modal("show");
                $("#activityAreaId").val(data.id);
                $("#activityArea").val(data.label);
            }
        );
    });

    // Sauvegarder la modification
    $("#save_edit").click(function (e) {
        e.preventDefault();

        var activityAreaId = $("#activityAreaId").val();
        var formData = {
            label: $("#activityArea").val(),
        };

        $.ajax({
            url: "/api/setting/activity-areas/" + activityAreaId,
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
                    title: window.translations.activity_area_updated,
                    text: response.message, 
                    showConfirmButton: true,
                    confirmButtonText: window.translations.confirm

                });

                $("#editmodal").modal("hide");
                $("#activityAreasTable").DataTable().ajax.reload();
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: window.translations.activity_area_updated_error,
                    showConfirmButton: true
                });
                console.log(error);
            },
        });
    });
});
