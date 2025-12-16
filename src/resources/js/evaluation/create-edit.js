$(document).ready(function () {



    // $('#evaluationForm').on('submit', function (event) {
    //     event.preventDefault();
    //     const formData = {
    //         _token: $('input[name="_token"]').val(),
    //         evaluator_id: $('#evaluator_id').val(),
    //         evaluation_type_id : $('#evaluation_type_id').val(),
    //         mark : $('#mark').val(),
    //         evaluation : $('#evaluation').val(),
    //         profile_id : $('#profile_id').val(),
    //     };

    //     $.ajax({
    //         url: evaluationStore,
    //         type: 'POST',
    //         data: formData,
    //         success: function (response) {
    //             Swal.fire({
    //                 title: 'Succès!',
    //                 text: "Evaluation ajoutée avec succès!",
    //                 icon: 'success',
    //                 confirmButtonText: 'OK'
    //             }).then((result) => {
    //                 if (result.isConfirmed) {

    //                     var modalEl = document.getElementById('evaluationModal');
    //                     var modal = bootstrap.Modal.getInstance(modalEl);
    //                     if (modal) {
    //                         modal.hide();
    //                     }
    //                     $('#evaluator_id').val();
    //                     $('#evaluation_type_id').val();
    //                     $('#note').val();
    //                     $('#evaluation').val();
    //                     $("#evaluation_table").DataTable().ajax.reload();
    //                 }
    //             });
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             let errorMessage = "Une erreur s'est produite lors d'ajout d'évaluation";
    //             if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
    //                 errorMessage = jqXHR.responseJSON.error;
    //             }
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Erreur',
    //                 text: errorMessage,
    //             });
    //         },
    //     });
    // });


    $('#form_evaluation_cabinet').on('submit', function (e) {
        e.preventDefault();

        let url = evaluationStore;

        // Récupérer uniquement la ligne associée à une action spécifique (par exemple, un clic sur un bouton dans la ligne)
        const row = $(document.activeElement).closest('tr');

        // Récupérer les données de la ligne
        let evaluationType = row.find('input[name="evaluation_type_id"]').val();
        let profileId = row.find('input[name="profile_id"]').val();
        let evaluatorId = row.find('input[name="evaluator_id"]').val();
        let firstName = row.find('input[name="first_name"]').val();
        let lastName = row.find('input[name="last_name"]').val();
        let coefficient = parseFloat(row.find('input[name="coefficient"]').val()) || 0;
        let mark = parseFloat(row.find('input.form-control').val()) || 0;
        let ponderation = mark * coefficient;
        let evaluation = row.find('textarea[name="evaluation"]').val();

        // Ajouter cette ligne aux données à soumettre
        const formDataArray = {
            evaluation_type_id: evaluationType,
            profile_id: profileId,
            evaluator_id: evaluatorId,
            first_name: firstName,
            last_name: lastName,
            coefficient: coefficient,
            mark: mark,
            ponderation: ponderation,
            evaluation: evaluation,
        };

        // Envoyer uniquement les données de cette ligne via AJAX
        $.ajax({
            url: url, // URL indiquée dans l'attribut action du formulaire
            method: 'POST',
            data: JSON.stringify(formDataArray), // Envoyer les données sous forme de tableau JSON
            contentType: 'application/json', // Type de contenu JSON
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Ajout du token CSRF
            },
            success: function (response) {
                Swal.fire({
                    title: 'Succès!',
                    text: "Evaluation de la ligne ajoutée avec succès!",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                console.log(response);
            },
            error: function (error) {
                let errorMessage = "Une erreur s'est produite lors de l'ajout de l'évaluation.";

                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorMessage,
                });
                console.error(error); // Affiche les détails de l'erreur
            },
        });
    });



    $('#form_evaluation_client').on('submit', function (e) {
        e.preventDefault();

        let url = evaluationStore;

        // Récupérer uniquement la ligne associée à une action spécifique (par exemple, un clic sur un bouton dans la ligne)
        const row = $(document.activeElement).closest('tr');

        // Récupérer les données de la ligne
        let evaluationType = row.find('input[name="evaluation_type_id"]').val();
        let profileId = row.find('input[name="profile_id"]').val();
        let evaluatorId = row.find('input[name="evaluator_id"]').val();
        let firstName = row.find('input[name="first_name"]').val();
        let lastName = row.find('input[name="last_name"]').val();
        let coefficient = parseFloat(row.find('input[name="coefficient"]').val()) || 0;
        let mark = parseFloat(row.find('input.form-control').val()) || 0;
        let ponderation = mark * coefficient;
        let evaluation = row.find('textarea[name="evaluation"]').val();

        // Ajouter cette ligne aux données à soumettre
        const formDataArray = {
            evaluation_type_id: evaluationType,
            profile_id: profileId,
            evaluator_id: evaluatorId,
            first_name: firstName,
            last_name: lastName,
            coefficient: coefficient,
            mark: mark,
            ponderation: ponderation,
            evaluation: evaluation,
        };

        // Envoyer uniquement les données de cette ligne via AJAX
        $.ajax({
            url: url, // URL indiquée dans l'attribut action du formulaire
            method: 'POST',
            data: JSON.stringify(formDataArray), // Envoyer les données sous forme de tableau JSON
            contentType: 'application/json', // Type de contenu JSON
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Ajout du token CSRF
            },
            success: function (response) {
                Swal.fire({
                    title: 'Succès!',
                    text: "Evaluation de la ligne ajoutée avec succès!",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                console.log(response);
            },
            error: function (error) {
                let errorMessage = "Une erreur s'est produite lors de l'ajout de l'évaluation.";

                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: errorMessage,
                });
                console.error(error); // Affiche les détails de l'erreur
            },
        });
    });



});

window.disableEdit = function (id){
    $('#mark-input' + id).Attr("disabled");
    $('#appreciation-input' + id).Attr("disabled");
    $('#editEv' + id).removeClass('d-none');
    $('#editEvaluation' +id).attr('onClick', 'enableEdit(id)');
    console.log('test');
    }

window.enableEdit = function (id){
    $('#mark-input' + id).removeAttr("disabled");
    $('#appreciation-input' + id).removeAttr("disabled");
    $("#editEv" + id).addClass('d-none');
    $('#saveEv' + id).removeClass('d-none');
    $('#editEvaluation' + id).attr('onClick', 'updateEvaluation(id)');
    console.log('test');
    }

window.updateEvaluation = function (id) {
    $('#editEvaluation' + id).on('submit', function (event) {
    event.preventDefault();
    const formData = {
        _token: $('input[name="_token"]').val(),
        id: $('#evaluator_id').val(),
        mark : $('#mark').val(),
        evaluation : $('#evaluation').val(),
    };

    $.ajax({
        url: evaluationUpdate,
        type: 'POST',
        data: formData,
        success: function (response) {
            Swal.fire({
                title: 'Succès!',
                text: "Evaluation modifiée avec succès!",
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {

                    var modalEl = document.getElementById('evaluationModal');
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) {
                        modal.hide();
                    }
                    $('#evaluator_id').val();
                    $('#evaluation_type_id').val();
                    $('#note').val();
                    $('#evaluation').val();
                    $("#evaluation_table").DataTable().ajax.reload();
                }
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            let errorMessage = "Une erreur s'est produite lors d'ajout d'évaluation";
            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                errorMessage = jqXHR.responseJSON.error;
            }
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: errorMessage,
            });
        },
    });
});

}
