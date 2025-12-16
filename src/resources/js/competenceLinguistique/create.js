$(document).ready(function () {
    $('#complangform').on('submit', function (event) {
        event.preventDefault(); 

        const url = typeof compTechniqueStore !== "undefined" 
            ? compTechniqueStore 
            : "/api/competences-linguistique/store"; 

        const skillTypeId = $('#skill_type_id').val();
        if (!skillTypeId) {
            $('#formFeedback').html(window.translations.select_comp_perso).css({ color: 'red', display: 'block' }).show();
            return;
        }

        const formData = {
            label: $('#label_linguistique').val(),
            skill_type_id: skillTypeId,
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
                    text: window.translations.language_skill_added,
                    icon: 'success',
                    confirmButtonText: window.translations.confirm
                }).then((result) => {
                    if (result.isConfirmed) {
                        var modalEl = document.getElementById('exampleModal');
                        var modalInstance = bootstrap.Modal.getInstance(modalEl); 
                        if (modalInstance) {
                            modalInstance.hide();
                        }
                        $('#label_linguistique').val('');  
                        $('#skill_type_id').val('');  
                        $("#linguistiqueTable").DataTable().ajax.reload(null, false);
                    }
                });
            },
            error: function (xhr) {
                $('#formFeedback').empty().hide();

                let errorMessage = window.translations.language_error;
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
    $('#skill_type_id').chosen({
        dropdownParent: $('#exampleModal'),
    disable_search_threshold: 10, 
    no_results_text: window.translations.no_results
     });
});
  

});
