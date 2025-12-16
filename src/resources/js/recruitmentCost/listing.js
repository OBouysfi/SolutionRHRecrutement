$(document).ready(function () {
    // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

    // Map locale to DataTables language file
    const dataTablesLangUrl =
        {
            fr: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "//cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
        }[locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    var table = $("#recruitment-costs-table").DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ajax: {
            url: recruitmentCostListingData,
            data: function (d) {
                d.devise = $("#devise").val();
                d.start_date = $("#start_date").val();
                d.end_date = $("#end_date").val();
            },
        },
        // language: {
        //     processing: "Traitement en cours...",
        //     search: "Rechercher&nbsp;:",
        //     lengthMenu: "Afficher _MENU_ éléments",
        //     info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
        //     infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
        //     infoFiltered: "(filtré de _MAX_ éléments au total)",
        //     loadingRecords: "Chargement en cours...",
        //     zeroRecords: "Aucun élément correspondant trouvé",
        //     emptyTable: "Aucune donnée disponible dans le tableau",
        //     paginate: {
        //         first: "Premier",
        //         previous: "Précédent",
        //         next: "Suivant",
        //         last: "Dernier",
        //     },
        // },

        language: {
            url: dataTablesLangUrl,
        },

        columns: [
            {
                data: "logo_platform",
                name: "logo_platform",
                orderable: false,
                searchable: false,
            },
            {
                data: null,
                defaultContent: "",
                orderable: false,
                searchable: false,
                className: "no-border",
            },
            {
                data: "budget",
                name: "budget",
                className: "text-end",
                orderable: false,
            },
            {
                data: null,
                defaultContent: "",
                orderable: false,
                searchable: false,
                className: "no-border",
            },
            {
                data: "date",
                name: "date",
                className: "text-center",
                orderable: false,
            },
            {
                data: "amount",
                name: "amount",
                className: "text-end",
                orderable: false,
            },
            {
                data: "invoice",
                name: "invoice",
                orderable: false,
                searchable: false,
            },
            {
                data: null,
                defaultContent: "",
                orderable: false,
                searchable: false,
                className: "no-border",
            },
            {
                data: "difference",
                name: "difference",
                className: "text-end",
                orderable: false,
            },
            { data: "action", name: "action" },
        ],

        footerCallback: function (tfoot, data, start, end, display) {
            var api = this.api();

            var parseValue = function (val) {
                if (typeof val === "string") {
                    return (
                        parseFloat(val.replace(/\s/g, "").replace(",", ".")) ||
                        0
                    );
                }
                return typeof val === "number" ? val : 0;
            };

            // now matches the markup: budget→4, amount→7, difference→10
            var totalBudget = api
                .column(2, { page: "current" })
                .data()
                .reduce((a, b) => a + parseValue(b), 0);
            var totalAmount = api
                .column(5, { page: "current" })
                .data()
                .reduce((a, b) => a + parseValue(b), 0);
            var totalDifference = api
                .column(8, { page: "current" })
                .data()
                .reduce((a, b) => a + parseValue(b), 0);

            $("#total-budget").html(
                totalBudget.toLocaleString("fr-FR", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                })
            );
            $("#total-amount").html(
                totalAmount.toLocaleString("fr-FR", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                })
            );
            $("#total-difference").html(
                totalDifference.toLocaleString("fr-FR", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                })
            );
        },
    });
    $("#devise ").on("change", function () {
        table.ajax.reload();
    });

    // Ex. recharger le tableau lors d’un changement de filtre
    $("#start_date").on("change", function () {
        table.ajax.reload();
    });
    // Ex. recharger le tableau lors d’un changement de filtre
    $("#end_date").on("change", function () {
        table.ajax.reload();
    });

    $(document).on("click", ".delete-recruitment-costs", function () {
        var $button = $(this);
        var recruitmentId = $button.data("recruitment-costs-id");
        var row = table.row($button.parents("tr"));

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Vous ne pourrez pas revenir en arrière!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5C6798",
            cancelButtonColor: "#F88DA5",
            confirmButtonText: "Oui, supprimez-le!",
        }).then((result) => {
            if (result.isConfirmed) {
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: recruitmentCostDelete.replace("id", recruitmentId),
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        console.log("res", response);
                        // OB : Supprime la ligne pour table
                        row.remove().draw();
                        // Affiche un SweetAlert de succès
                        Swal.fire(
                            "Supprimé!",
                            "Le coût de recrutement a été  a été supprimée.",
                            "success"
                        );
                    },
                    error: function (xhr, status, error) {
                        // OB : Affiche un SweetAlert d'erreur
                        Swal.fire(
                            "Erreur!",
                            "Une erreur est survenue lors de la suppression.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});
