$(document).ready(function () {

    $('#addClientFilialeData').on('submit', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: clientFiliale ? ApiClientFilialesEditData : ApiClientFilialesCreateData,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(response);
          Swal.fire({
            title: window.translations.success_client,
            text: window.translations.ajoute_filiale,
            icon: 'success',
            confirmButtonText: window.translations.confirm
          }).then((result) => {
            if (result.isConfirmed) {
              $('#filiales-tab').removeClass('active');
              $('#sites-tab').trigger('click');
            }
          });
        },
        error: function (xhr) {
          if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            $.each(errors, function (key, value) {
              errorMessage += `${value[0]}<br/>`;
            });

            console.log(errorMessage);
            Swal.fire({
              title: window.translations.title_erreur,
              html: errorMessage,
              icon: 'error',
              confirmButtonText: window.translations.button
            });
          } else {
            Swal.fire({
              title: window.translations.title_erreur,
              text: window.translations.erreur_ajoute_filiale,
              icon: 'error',
              confirmButtonText: window.translations.button
            });
          }
        }
      });
    });


    $('#addClientFilialeBtn').on('click', function () {
        const newFilialeDiv = $('.div_create_filiale:first').clone();
        newFilialeDiv.find('input, textarea, select').val(''); // Réinitialisation des valeurs du formulaire

        newFilialeDiv.find('.delete_div_filiale').empty();
        const deleteButton = $('<button class="btn btn-outline-danger squered-pill px-3 delete-btn" data-form-name="experiences" data-id="1" aria-label="Supprimer cette expérience"><i class="bi bi-trash3"></i></button>');
        newFilialeDiv.find('.delete_div_filiale').append(deleteButton);

        deleteButton.on('click', function () {
            newFilialeDiv.remove();
        });

        $('#clientFilialeTabContent').append(newFilialeDiv);
    });


    $(document).on('click', '.btn-existed-filiale-card-delete', function (e) {
        e.preventDefault();
        var $button = $(this);
        var filialeId = $button.data('filiale-id');
        console.log(filialeId);
        Swal.fire({
            title: window.translations.Êtes_vous,
            text: window.translations.arrière,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5C6798',
            cancelButtonColor: '#F88DA5',
            confirmButtonText: window.translations.supprimez_le
        }).then((result) => {
            if (result.isConfirmed) {
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: ApiClientDeleteFiliale.replace('filialeId', filialeId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        console.log('res', response)
                        $button.closest('.div_create_filiale').remove();
                        Swal.fire(
                            window.translations.Supprimé,
                            window.translations.message_de_suppression,
                            window.translations.success
                        );
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            window.translations.supprimée_été,
                            window.translations.la_suppression,
                            window.translations.error
                        );
                    }
                });
            }
        });


    });


});
