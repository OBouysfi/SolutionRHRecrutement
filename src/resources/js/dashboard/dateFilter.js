$(document).ready(function () {
    // Use translations if available
    const t = window.translations || {};

    // Récupérer les dates depuis l'URL si elles existent
    const urlParams = new URLSearchParams(window.location.search);
    const startDate = urlParams.get("start_date");
    const endDate = urlParams.get("end_date");

    // Configuration du date picker
    $("#dashboard-date-filter")
        .daterangepicker({
            minYear: 1989,
            maxYear: 2025,
            ranges: {
                [t.today || "Aujourd'hui"]: [moment(), moment()],
                [t.yesterday || "Hier"]: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                [t.last_7_days || "Les 7 derniers jours"]: [moment().subtract(6, "days"), moment()],
                [t.last_30_days || "Les 30 derniers jours"]: [moment().subtract(29, "days"), moment()],
                [t.this_month || "Ce mois-ci"]: [moment().startOf("month"), moment().endOf("month")],
                [t.last_month || "Le mois dernier"]: [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
            },
            locale: {
                format: "DD/MM/YYYY",
                applyLabel: t.apply || "Appliquer",
                cancelLabel: t.cancel || "Annuler",
                fromLabel: t.from || "De",
                toLabel: t.to || "À",
                customRangeLabel: t.custom_range || "Personnalisé",
                weekLabel: t.week || "Sem",
                daysOfWeek: [
                    t.sunday_short || "Dim",
                    t.monday_short || "Lun",
                    t.tuesday_short || "Mar",
                    t.wednesday_short || "Mer",
                    t.thursday_short || "Jeu",
                    t.friday_short || "Ven",
                    t.saturday_short || "Sam"
                ],
                monthNames: [
                    t.january || "Janvier",
                    t.february || "Février",
                    t.march || "Mars",
                    t.april || "Avril",
                    t.may || "Mai",
                    t.june || "Juin",
                    t.july || "Juillet",
                    t.august || "Août",
                    t.september || "Septembre",
                    t.october || "Octobre",
                    t.november || "Novembre",
                    t.december || "Décembre"
                ],
                firstDay: 1,
            },
            // Utiliser les dates de l'URL si elles existent, sinon utiliser les dates par défaut
            startDate: startDate
                ? moment(startDate, "DD/MM/YYYY")
                : moment().startOf("month"),
            endDate: endDate
                ? moment(endDate, "DD/MM/YYYY")
                : moment().endOf("month"),
            opens: "left",
            drops: "down",
            applyButtonClasses: "btn-theme",
            cancelClass: "btn-outline-secondary border",
        })
        .on("apply.daterangepicker", function (ev, picker) {
            // Mettre à jour les dates dans les champs cachés
            $("#start_date").val(picker.startDate.format("DD/MM/YYYY"));
            $("#end_date").val(picker.endDate.format("DD/MM/YYYY"));

            // Soumettre le formulaire
            $("#date-range-form").submit();
        })
        .on("show.daterangepicker", function (ev, picker) {
            // Vérifie si le bouton Rafraîchir existe déjà
            if ($(".btn-refresh").length === 0) {
                // Crée le bouton Rafraîchir avec une icône Bootstrap
                var refreshButton = $(`
                <button class="btn btn-outline-theme btn-refresh" id="refresh-dashboard-date-filter" style="margin: 0 5px; padding:2px 5px 0px;">
                    ${(t.clear || "Effacer")} <i class="bi bi-arrow-clockwise"></i>
                </button>
            `);

                picker.container
                    .find(".drp-buttons")
                    .find("button.applyBtn")
                    .before(refreshButton);
            }
        });

    // Gérer le clic sur le bouton Rafraîchir
    $(document).on("click", "#refresh-dashboard-date-filter", function () {
        // Réinitialiser les dates
        $("#start_date").val("");
        $("#end_date").val("");

        // Soumettre le formulaire
        $("#date-range-form").submit();
    });

    // Ouvrir le calendrier quand l'icône est cliquée
    $("#titlecalandershow").click(function () {
        $("#dashboard-date-filter").data("daterangepicker").toggle();
    });
});
