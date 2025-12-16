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

    var table = $(".mission-history-table").DataTable({
        processing: true,
        serverSide: true,
        lengthChange: false,
        searching: false,
        pageLength: 10,
        ajax: {
            url: jobOfferHistoryData, // 👈 update this to match your route
            type: "GET",
            data: function (d) {
                // On envoie nos filtres au serveur
                d.pays = $("#filter-pays").val();
                d.ville = $("#filter-ville").val();
                d.client = $("#filter-client").val();
                d.status_id = $("#filter-status-jobOffre").val();
            },
        },
        columns: [
            { data: "N", name: "N", orderable: false },
            { data: "client_name", name: "client_name", orderable: false },
            { data: "start_date", name: "start_date", orderable: false },
            { data: "end_date", name: "end_date", orderable: false },
            { data: "title", name: "title", orderable: false },
            { data: "duration", name: "duration", orderable: false },
            {
                data: "Prelesectionees",
                name: "Prelesectionees",
                orderable: false,
            },
            { data: "in_interview", name: "in_interview", orderable: false },
            { data: "retained", name: "retained", orderable: false },
            { data: "hired", name: "hired", orderable: false },
            { data: "discarded", name: "discarded", orderable: false },
        ],
        // language: {
        //     url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        //     info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
        //     emptyTable: "Aucune donnée disponible dans le tableau",
        //     infoEmpty: "Affichage de 0 à 0 sur 0 entrée",
        // },

        language: {
            url: dataTablesLangUrl,
        },

        drawCallback: function (settings) {
            updateCustomPagination(settings);
        },
    });

    $(".filter-block select").on("change", function () {
        table.ajax.reload();
    });

    function updateCustomPagination(settings) {
        const pageInfo = settings.json;
        if (!pageInfo) return; // sécurité
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage =
            Math.floor(settings._iDisplayStart / pageLength) + 1;

        const paginationWrapper = $("#footable-pagination .pagination");
        paginationWrapper.empty();

        // First & Prev
        paginationWrapper.append(`
            <li class="footable-page-nav ${
                currentPage === 1 ? "disabled" : ""
            }" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>
            <li class="footable-page-nav ${
                currentPage === 1 ? "disabled" : ""
            }" data-page="prev">
                <a class="footable-page-link" href="#">‹</a>
            </li>
        `);

        // Numéros de pages
        let startPage = Math.max(1, currentPage - 4);
        let endPage = Math.min(totalPages, startPage + 9);

        if (endPage - startPage < 9) {
            startPage = Math.max(1, endPage - 9);
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationWrapper.append(`
        <li class="footable-page visible ${
            i === currentPage ? "active" : ""
        }" data-page="${i}">
            <a class="footable-page-link" href="#">${i}</a>
        </li>
    `);
        }

        // Next & Last
        paginationWrapper.append(`
            <li class="footable-page-nav ${
                currentPage === totalPages ? "disabled" : ""
            }" data-page="next">
                <a class="footable-page-link" href="#">›</a>
            </li>
            <li class="footable-page-nav ${
                currentPage === totalPages ? "disabled" : ""
            }" data-page="last">
                <a class="footable-page-link" href="#">»</a>
            </li>
        `);

        $("#footable-pagination .label").text(
            `${currentPage} sur ${totalPages}`
        );

        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $("#footable-pagination .footable-page-nav").on("click", function (e) {
            e.preventDefault();
            if ($(this).hasClass("disabled")) return;

            const action = $(this).data("page");
            if (action === "first") table.page("first").draw("page");
            if (action === "prev") table.page("previous").draw("page");
            if (action === "next") table.page("next").draw("page");
            if (action === "last") table.page("last").draw("page");
        });

        $("#footable-pagination .footable-page").on("click", function (e) {
            e.preventDefault();
            const page = $(this).data("page") - 1; // 0-based
            table.page(page).draw("page");
        });
    }

    $("#customLength").on("change", function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });
    // Exemple : si vous avez un sélecteur custom pour le nombre d’éléments par page

    $("#filter-pays").on("change", function () {
        var selectedCountryId = $(this).val();
        $("#filter-ville").val("Tous");

        if (selectedCountryId === "Tous") {
            $("#filter-ville option").show();
        } else {
            $("#filter-ville option").hide();

            $('#filter-ville option[value="Tous"]').show(); // Toujours afficher l'option "Tous"
            $(
                '#filter-ville option[data-country="' + selectedCountryId + '"]'
            ).show();
        }

        $("#filter-ville").trigger("chosen:updated");
    });

    /**
     *  Fonction pour afficher le drapeau dans l'élément sélectionné
     */

    $(window).on("load", function () {
        $(".chosenoptgroup").chosen({
            width: "100%",
            disable_search_threshold: 10,
        });

        // Fonction pour ajouter les drapeaux dans la liste déroulante
        function updateDropdownImages() {
            setTimeout(function () {
                $(".chosen-results li").each(function () {
                    const $li = $(this);
                    const index = $li.data("option-array-index");
                    const $option = $("#filter-pays option").eq(index);
                    const imageSrc = $option.data("image");
                    const text = $option.text();

                    if (imageSrc && !$li.find("img").length) {
                        $li.html(`
                            <span style="display: inline-flex; align-items: center;">
                                <img src="${imageSrc}" height="14" style="margin-right: 6px;" />
                                <span>${text}</span>
                            </span>
                        `);
                    }
                });
            }, 10);
        }

        $("#filter-pays").on("chosen:showing_dropdown", updateDropdownImages);

        function updateSelectedImage() {
            const selectedOption = $("#filter-pays option:selected");
            const imageSrc = selectedOption.data("image");
            const text = selectedOption.text();

            const chosenSingle = $("#filter-pays")
                .next(".chosen-container")
                .find(".chosen-single");
            chosenSingle.find("img").remove();
            chosenSingle.find("span").css("display", "inline");
            if (imageSrc) {
                chosenSingle.prepend(
                    `<img src="${imageSrc}" height="14" style="margin-right: 6px;" />`
                );
            }
        }

        $("#filter-pays").on("change", updateSelectedImage);
        updateDropdownImages();
        updateSelectedImage();
    });
});
