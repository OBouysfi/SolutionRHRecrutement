$(document).ready(function () {
    $('#agenceform').on('submit', function (event) {
        event.preventDefault();
        
        const formData = {
            name: $('#nameInput').val(),
            filiale_id: $('#filiale_id').val(), 
            _token: $('input[name="_token"]').val() 
        };
        
        $.ajax({
            url: agencestore, 
            type: 'POST',
            data: formData,
            success: function (response) {
                Swal.fire({
                    title: 'Succès!',
                    text: "Agence ajoutée avec succès!",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var modalEl = document.getElementById('exampleModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }
                        $('#nameInput').val(''); 
                        $('#filiale_id').val('');  
                        $("#agencesTable").DataTable().ajax.reload(); 
                    }
                });
            },
            error: function (xhr) {
                
                $('#formFeedback').empty().hide();

                
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    var errorMessage = '';
                    for (var field in errors) {
                        errorMessage += errors[field].join('<br>');
                    }
                    $('#formFeedback').html(errorMessage).show();
                } else {
                    $('#formFeedback')
                        .text('An unexpected error occurred. Please try again later.')
                        .css({ color: 'red', display: 'block' });
                }
                console.error('Error:', xhr.responseJSON);
            }
        });
    });
});

/**
 * Js For Select Search
 */ $(document).ready(function() {
    $('#filiale_id').chosen({
        dropdownParent: $('#exampleModal'),
    disable_search_threshold: 10, 
    no_results_text: "Oops, nothing found!"
     });
});