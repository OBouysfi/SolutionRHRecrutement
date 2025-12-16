$(document).ready(function () {
    $('#mission-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "/api/missions/store_recrutement",
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: 'Succès !',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "/missions/create";
                });
            },
            error: function (error) {
                console.error("Erreur :", error);

                if (error.responseJSON && error.responseJSON.errors) {
                    let errors = error.responseJSON.errors;

                    // Créer une liste des erreurs pour affichage
                    let errorList = '<ul>';
                    for (let key in errors) {
                        errorList += `<li>${errors[key]}</li>`;
                    }
                    errorList += '</ul>';

                    // Afficher les erreurs avec SweetAlert2
                    Swal.fire({
                        title: 'Erreur de validation',
                        html: errorList,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Afficher une erreur générique si aucune information n'est disponible
                    Swal.fire({
                        title: 'Erreur',
                        text: "Une erreur inattendue s'est produite.",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
});
