$(document).ready(function () {
    $('#activityareaform').on('submit', function (event) {
        event.preventDefault();
        const formData = {
            label: $('#labelInput').val(),
            _token: $('input[name="_token"]').val() 
        };
        
        $.ajax({
            url: activityAreaStore, 
            type: 'POST',             
            data: formData,           
            success: function (response) {
              
                Swal.fire({
                    title: window.translations.success,
                    text: window.translations.activity_area_added,
                    icon: 'success',
                    confirmButtonText: window.translations.confirm
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        var modalEl = document.getElementById('exampleModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) {
                            modal.hide();
                        }
                        $('#labelInput').val('');

                        $("#activityAreasTable").DataTable().ajax.reload();
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
