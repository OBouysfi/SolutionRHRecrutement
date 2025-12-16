$(document).ready(function () {
    $('#profileFolderform').on('submit', function (event) {
        event.preventDefault();

        const url = typeof compTechniqueStore !== "undefined"
            ? compTechniqueStore
            : "/api/profile-folders/store";

        const skillTypeId = $('#parent_id').val();

        const formData = {
            name: $('#name').val(),
            parent_id: skillTypeId,
        };

        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            headers: {
                "Authorization": `Bearer ${localStorage.getItem("token")}`,
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                Swal.fire({
                    title: window.translations.success,
                    text: window.translations.added_folder,
                    icon: 'success',
                    confirmButtonText: window.translations.confirm
                }).then((result) => {
                    if (result.isConfirmed) {
                        var modalEl = document.getElementById('exampleModal');
                        var modalInstance = bootstrap.Modal.getInstance(modalEl);
                        if (modalInstance) {
                            modalInstance.hide();
                        }
                        $('#name').val('');
                        $('#parent_id').val('');
                        $("#foldersTable").DataTable().ajax.reload(null, false);
                    }
                });
            },
            error: function (xhr) {
                $('#formFeedback').empty().hide();

                let errorMessage = 'Une erreur inattendue est survenue. Veuillez réessayer.';
                if (xhr.responseJSON?.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                }

                $('#formFeedback').html(errorMessage).css({ color: 'red', display: 'block' }).show();
                console.error('Erreur:', xhr.responseJSON);
            }
        });
    });

    /**
     * Js For Select Search
     */ $(document).ready(function() {
        $('#parent_id').chosen({
            dropdownParent: $('#exampleModal'),
        disable_search_threshold: 10, 
        no_results_text: window.translations.no_results
        });
    });
 




});


