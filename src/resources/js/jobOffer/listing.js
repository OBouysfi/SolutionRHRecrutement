$(document).ready(function () {
    var start_date = null;
    var end_date = null;
    var currentPage = 1;
    var perPage = 10;

    // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
    const locale = document.documentElement.lang || 'fr'; // fallback to 'fr'

    $(document).on("click", "#refresh-date-fillter", function () {
        start_date = null;
        end_date = null;
        fetchJobOffersData(1, perPage);
    });

    $("#titlecalendar, #titlecalendar1").on(
        "apply.daterangepicker",
        function (ev, picker) {
            start_date = picker.startDate.format("YYYY-MM-DD");
            end_date = picker.endDate.format("YYYY-MM-DD");
            fetchJobOffersData(1, perPage);
        }
    );

    // Function to fetch job offers data
    function fetchJobOffersData(page = 1, perPageValue = 10) {
        $.ajax({
            url: jobOfferMainListingData,
            type: "GET",
            dataType: "json",
            data: {
                page: page,
                perPage: perPageValue,
                start_date: start_date,
                end_date: end_date,
                pays: $("#filter-pays").val(),
                ville: $("#filter-ville").val(),
                client: $("#filter-client").val(),
                diploma: $("#filter-diploma").val(),
                status_id: $("#filter-status-jobOffre").val(),
            },
            success: function (response) {
                const data = response.data || [];
                const tbody = $("#missionTable tbody");
                tbody.empty();

                if (data.length === 0) {
                    tbody.append(`
                        <tr>
                            <td colspan="13" class="text-center">${window.translations?.no_data_available || 'Aucune donnée disponible dans le tableau'}</td>
                        </tr>
                    `);
                } else {
                    data.forEach(function (jobOffer) {
                        const row = `
                            <tr>
                                <td style="text-align: center;">${jobOffer.logo}</td>
                                <td style="text-align: center;">${jobOffer.client_number}</td>
                                <td style="text-align: center;">${jobOffer.client_name}</td>
                                <td style="text-align: center;">${jobOffer.title}</td>
                                <td style="text-align: center;">${jobOffer.contract_type}</td>
                                <td style="text-align: center;">${jobOffer.city_name}</td>
                                <td style="text-align: center;">${jobOffer.diploma_label}</td>
                                <td style="text-align: center;">${jobOffer.experience_count}</td>
                                <td style="text-align: center;">${jobOffer.nbr_profiles}</td>
                                <td style="text-align: center;">${jobOffer.start_date}</td>
                                <td style="text-align: center;">${jobOffer.end_date}</td>
                                <td style="text-align: center;">${jobOffer.status}</td>
                                <td style="text-align: center;">${jobOffer.action}</td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                }

                // Update pagination
                const totalPages = response.last_page || 1;
                const currentPageNum = response.current_page || 1;
                updatePagination(totalPages, currentPageNum);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching job offers:", error);
                const tbody = $("#missionTable tbody");
                tbody.empty();
                tbody.append(`
                    <tr>
                        <td colspan="13" class="text-center text-danger">${window.translations?.error_loading_data || 'Erreur lors du chargement des données'}</td>
                    </tr>
                `);
            },
        });
    }

    function updatePagination(totalPages, currentPageNum) {
        const paginationContainer = $("#footable-pagination");
        paginationContainer.empty();

        let paginationHtml = `<div class="footable-pagination-wrapper">
            <ul class="pagination">`;

        // First button
        paginationHtml += `
            <li class="footable-page-nav ${currentPageNum === 1 ? "disabled" : ""}" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>`;

        // Previous button
        paginationHtml += `
            <li class="footable-page-nav ${currentPageNum === 1 ? "disabled" : ""}" data-page="prev">
                <a class="footable-page-link" href="#">‹</a>
            </li>`;

        // Page Numbers
        let startPage = Math.max(1, currentPageNum - 4);
        let endPage = Math.min(totalPages, startPage + 9);

        if (endPage - startPage < 9) {
            startPage = Math.max(1, endPage - 9);
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationHtml += `
                <li class="footable-page visible ${i === currentPageNum ? "active" : ""}" data-page="${i}">
                    <a class="footable-page-link" href="#">${i}</a>
                </li>
            `;
        }

        // Next button
        paginationHtml += `
            <li class="footable-page-nav ${currentPageNum === totalPages ? "disabled" : ""}" data-page="next">
                <a class="footable-page-link" href="#">›</a>
            </li>`;

        // Last button
        paginationHtml += `
            <li class="footable-page-nav ${currentPageNum === totalPages ? "disabled" : ""}" data-page="last">
                <a class="footable-page-link" href="#">»</a>
            </li>`;

        paginationHtml += `</ul>
            <div class="divider"></div>
            <span class="label label-default">${currentPageNum} sur ${totalPages}</span>
        </div>`;

        paginationContainer.append(paginationHtml);

        // Bind pagination events
        addPaginationEventListeners(totalPages);
    }

    function addPaginationEventListeners(totalPages) {
        $("#footable-pagination .footable-page-nav").off("click").on("click", function (e) {
            e.preventDefault();
            const action = $(this).data("page");

            if ($(this).hasClass("disabled")) {
                return;
            }

            let newPage = currentPage;
            if (action === "first") {
                newPage = 1;
            } else if (action === "prev") {
                newPage = Math.max(1, currentPage - 1);
            } else if (action === "next") {
                newPage = Math.min(totalPages, currentPage + 1);
            } else if (action === "last") {
                newPage = totalPages;
            }

            currentPage = newPage;
            fetchJobOffersData(currentPage, perPage);
        });

        $("#footable-pagination .footable-page").off("click").on("click", function (e) {
            e.preventDefault();
            const page = parseInt($(this).data("page"));
            currentPage = page;
            fetchJobOffersData(currentPage, perPage);
        });
    }

    // Refresh when filters change
    $(".filter-block select").on("change", function () {
        currentPage = 1;
        fetchJobOffersData(currentPage, perPage);
    });

    // Custom length selector
    $("#customLength").on("change", function () {
        perPage = parseInt($(this).val());
        currentPage = 1;
        fetchJobOffersData(currentPage, perPage);
    });

    // Country filter change
    $("#filter-pays").on("change", function () {
        var selectedCountryId = $(this).val();
        $("#filter-ville").val("Tous");

        if (selectedCountryId === "Tous") {
            $("#filter-ville option").show();
        } else {
            $("#filter-ville option").hide();
            $('#filter-ville option[value="Tous"]').show();
            $('#filter-ville option[data-country="' + selectedCountryId + '"]').show();
        }

        $("#filter-ville").trigger("chosen:updated");
        currentPage = 1;
        fetchJobOffersData(currentPage, perPage);
    });

    /**
     * Fonction pour afficher le drapeau dans l'élément sélectionné
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

    // Initial load
    fetchJobOffersData(1, perPage);
});
