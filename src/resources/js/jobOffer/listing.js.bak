// import $ from 'jquery';
// import 'datatables.net';
// import 'datatables.net-bs5';

$(document).ready(function () {
    // On suppose que la variable jobOfferListingData est définie dans la vue Blade
    // via <script>var jobOfferListingData = "..."</script>

    var start_date = null;
    var end_date = null;
    var table = null;

    // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
    const locale = document.documentElement.lang || 'fr'; // fallback to 'fr'

    // Map locale to DataTables language file
    const dataTablesLangUrl = {
        fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
        es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
        zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
        pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
        ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
    }[locale] || "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    $(document).on("click", "#refresh-date-fillter", function () {
        start_date = null;
        end_date = null;
        refreshTables(start_date, end_date);
    });

    function refreshTables() {
        if ($.fn.DataTable.isDataTable("#missionTable")) {
            $("#missionTable").DataTable().destroy();
        }
        getData();
    }

    $("#titlecalendar, #titlecalendar1").on(
        "apply.daterangepicker",
        function (ev, picker) {
            start_date = picker.startDate.format("YYYY-MM-DD");
            end_date = picker.endDate.format("YYYY-MM-DD");
            refreshTables();
        }
    );

    getData();

    function getData() {
        table = $("#missionTable").DataTable({
            processing: false,
            serverSide: true,
            lengthChange: false,
            searching: false,
            // language: {
            //     url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            //     info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            //     emptyTable: "Aucune donnée disponible dans le tableau",
            //     infoEmpty: "Affichage de 0 à 0 sur 0 entrée",
            // },

            language: {
                url: dataTablesLangUrl,
            },

            ajax: {
                url: jobOfferListingData,
                data: function (d) {
                    // On envoie nos filtres au serveur
                    d.pays = $("#filter-pays").val();
                    d.ville = $("#filter-ville").val();
                    d.client = $("#filter-client").val();
                    d.diploma = $("#filter-diploma").val();
                    d.status_id = $("#filter-status-jobOffre").val();
                    d.start_date = start_date;
                    d.end_date = end_date;

                    // d.type_contrat = $('#filter-type-contrat').val();
                },
            },
            columns: [
                {
                    data: "logo",
                    name: "logo",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "client_number",
                    name: "client_number",
                    orderable: false,
                },
                { data: "client_name", name: "client_name", orderable: false },
                { data: "title", name: "title", orderable: false },
                {
                    data: "contract_type",
                    name: "contract_type",
                    orderable: false,
                },
                { data: "city_name", name: "city_name", orderable: false },
                {
                    data: "diploma_label",
                    name: "diploma_label",
                    orderable: false,
                },
                {
                    data: "experience_count",
                    name: "experience_count",
                    orderable: false,
                },
                {
                    data: "nbr_profiles",
                    name: "nbr_profiles",
                    orderable: false,
                },
                { data: "start_date", name: "start_date" },
                { data: "end_date", name: "end_date" },
                // { data: 'status', name: 'status' },
                { data: "status_id", name: "status_id", orderable: false },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
            // callback pour le redraw => pagination custom
            drawCallback: function (settings) {
                updateCustomPagination(settings);
            },
        });
    }

    // Rafraîchir la DataTable lorsque les filtres changent
    $(".filter-block select").on("change", function () {
        table.ajax.reload();
    });

    // Exemple de pagination custom

    function updateCustomPagination(settings) {
        const pageInfo = settings.json; // Récupère les informations de pagination
        const recordsTotal = pageInfo.recordsTotal; // Total des enregistrements
        const pageLength = settings._iDisplayLength; // Nombre d'enregistrements par page
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = settings._iDisplayStart / pageLength + 1;

        // Réinitialiser le contenu de la pagination
        $(document).ready(function () {
            $(".footable").footable();
        });
        const paginationWrapper = $("#footable-pagination .pagination");
        paginationWrapper.empty();

        // First & Prev buttons
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

        // Page Numbers
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

        // Next & Last buttons
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

        $("#validated-techniquesTable-pagination .label").text(
            `${currentPage} sur ${totalPages}`
        );

        // Rebind pagination events
        addPaginationEventListeners();
    }

    function addPaginationEventListeners() {
        $("#footable-pagination .footable-page-nav").on("click", function (e) {
            e.preventDefault();
            const action = $(this).data("page");
            const table = $("#missionTable").DataTable();

            if ($(this).hasClass("disabled")) {
                return;
            }

            if (action === "first") {
                table.page("first").draw("page");
            } else if (action === "prev") {
                table.page("previous").draw("page");
            } else if (action === "next") {
                table.page("next").draw("page");
            } else if (action === "last") {
                table.page("last").draw("page");
            }
        });

        $("#footable-pagination .footable-page").on("click", function (e) {
            e.preventDefault();
            const page = $(this).data("page") - 1; // DataTables utilise un index basé sur 0
            const table = $("#missionTable").DataTable();

            table.page(page).draw("page");
        });
    }

    // Exemple : si vous avez un sélecteur custom pour le nombre d’éléments par page
    $("#customLength").on("change", function () {
        var selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });

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
