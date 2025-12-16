// Fonction pour afficher SweetAlert et confirmer l'annulation
window.openStatusChangeModal = function (jobOfferId, status) {
    const texts = {
        7: "Voulez-vous vraiment Annuler cette mission ?",
        5: "Voulez-vous vraiment Suspendre cette mission ?",
        4: "Voulez-vous vraiment Clôturer cette mission ?",
        8: "Voulez-vous vraiment Réactiver cette mission ?",
        6: "Voulez-vous vraiment Réouvrir cette mission ?",
    };
    // if(status in_array [7, 5, 2, 6])

    // Affiche le SweetAlert pour confirmer l'action
    if (status == 7) {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: texts[status],
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmer",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, nous procédons au changement de statut via AJAX
                changeStatus(jobOfferId, status);
            }
        });
    } else if (status == 5) {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: texts[status],
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmer",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, nous procédons au changement de statut via AJAX
                changeStatus(jobOfferId, status);
            }
        });
    } else if (status == 4) {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: texts[status],
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmer",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, nous procédons au changement de statut via AJAX
                changeStatus(jobOfferId, status);
            }
        });
    } else if (status == 8) {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: texts[status],
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmer",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, nous procédons au changement de statut via AJAX
                changeStatus(jobOfferId, status);
            }
        });
    } else if (status == 6) {
        window.location.href = `/missions/${jobOfferId}/edit?status=reopen`;
    }
};

// Fonction pour effectuer la modification du statut via AJAX
function changeStatus(jobOfferId, status) {
    $.ajax({
        url: "/api/missions/changeStatus/" + jobOfferId + "/" + status,
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            // Notification de succès
            Swal.fire(
                "Annulé!",
                "Le statut de la mission a été modifié avec succès.",
                "success"
            );

            // Rafraîchir DataTable ou gérer l'affichage ici
            $("#missionTable").DataTable().ajax.reload(); // Rafraîchir la table DataTable
        },
        error: function (error) {
            // Notification d'erreur
            Swal.fire(
                "Erreur!",
                "Une erreur est survenue lors de la modification du statut.",
                "error"
            );
        },
    });
}
