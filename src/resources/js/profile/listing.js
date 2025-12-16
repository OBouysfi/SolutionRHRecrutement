$(document).ready(function () {
    var start_date = null;
    var end_date = null;
    var profileIds = [];
    var table5 = null;

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


    // =============== START poste raw table ================= 
    function initializeDetailsTable(profileIds) {
        // Destroy existing instance if it exists
        if ($.fn.DataTable.isDataTable('#custom-profile-listing-table')) {
            $('#custom-profile-listing-table').DataTable().destroy();
        }

        // Initialize new DataTable
        table5 = $('#custom-profile-listing-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            searching: false,
            language: {
                url: dataTablesLangUrl,
            },
            ajax: {
                url: customProfilesListingData,
                type: 'POST',
                data: function (d) {
                    return {
                        profile_ids: profileIds,
                        niveau: $('#filter-niveau').val(),
                        diplome: $('#filter-diplome').val(),
                        experience: $('#filter-experience').val(),
                        poste: $('#filter-poste').val(),
                        contract_type: $('#filter-contrat-type').val(),
                        pays: $('#filter-pays').val(),
                        ville: $('#filter-ville').val(),
                        start_date: start_date,
                        end_date: end_date,
                        // DataTables parameters
                        start: d.start,
                        length: d.length,
                        draw: d.draw
                    };
                }
            },
            dom: '<"d-none"B>frtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Profils',
                    exportOptions: { columns: ':not(:last-child)' },
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 11,
                            color: 'white',
                            fillColor: '#4CAF50',
                            alignment: 'center'
                        };
                        doc.defaultStyle.fontSize = 10;
                    },
                },
                {
                    extend: 'excelHtml5',
                    text: 'Exporter en Excel',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'csvHtml5',
                    text: 'Exporter en CSV',
                    exportOptions: { columns: ':not(:last-child)' }
                }
            ],
            columns: [
                { data: 'picture', name: 'picture', orderable: false },
                { data: 'matricule', name: 'matricule', orderable: false },
                { data: 'first_name', name: 'first_name', orderable: false },
                { data: 'last_name', name: 'last_name', orderable: false },
                { data: 'diploma_label', name: 'diploma_label', orderable: false },
                { data: 'option', name: 'option', orderable: false },
                { data: 'total_experience', name: 'total_experience', orderable: false },
                {
                    data: 'languages', name: 'languages', orderable: false
                    // render: function(data) {
                    //   return Array.isArray(data) ? data.join(', ') : data;
                    // }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    render: function (data) {
                        return data || '';
                    }
                }
            ],

            drawCallback: function (settings) {
                // console.log("===========================================");
                // console.log(settings);
                updateCustomPagination(settings, "#custom-profile-listing-table");

                $("#custom-profile-listing-table" + " thead th").each(function () {
                    const $th = $(this);

                    // Save and reuse the original title
                    if (!$th.data("original-title")) {
                        const originalTitle = $th.text().trim();
                        $th.data("original-title", originalTitle);
                    }
                    const columnTitle = $th.data("original-title");

                    // Determine the icon
                    // let icon = '⇅';
                    // if ($th.hasClass('sorting_asc')) icon = '▲';
                    // else if ($th.hasClass('sorting_desc')) icon = '▼';

                    let back =
                        "https://cdn.datatables.net/1.11.5/images/sort_both.png";
                    if ($th.hasClass("sorting_asc"))
                        back =
                            "https://cdn.datatables.net/1.11.5/images/sort_asc.png";
                    else if ($th.hasClass("sorting_desc"))
                        back =
                            "	https://cdn.datatables.net/1.11.5/images/sort_desc.png";

                    // Inject the new structure
                    if (
                        $th.hasClass("sorting") ||
                        $th.hasClass("sorting_asc") ||
                        $th.hasClass("sorting_desc")
                    ) {
                        $th.css("background-image", "none");
                        $th.html(`
                            <div class="th-wrapper" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 4px;
                                white-space: nowrap;
                                cursor: pointer;
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important; display:none !important "></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass("sorting sorting_asc sorting_desc");
                });
            },

            // initComplete: function() {
            //     // This will help debug any initialization issues
            //     console.log('DataTable initialized successfully');
            // },
            // error: function(xhr, error, thrown) {
            //     console.error('DataTables error:', xhr, error, thrown);
            // }
        });
    }
    // $(document).on('click', '.show-row1', function() {
    //     var profileIds = $(this).data('ids');

    //     console.log(profileIds);
    //     $("#profile-5").removeClass("d-none");
    //     $("#profile-0").addClass("d-none");

    //     profileIds = profileIds;
    //     // Initialize or refresh the table
    //     initializeDetailsTable(profileIds);
    //     $("#ProfileReturnToPreview").removeClass("d-none");
    // });

    $(document).on('click', '.show-row1', function () {
        var profileIds = $(this).data('ids');
        console.log(profileIds);
        // var profileIds = profileIds ? profileIds.split(',') : [];
        var profileIdsStr = profileIds.join(',');

        $("#profile-5").removeClass("d-none");
        $("#profile-0").addClass("d-none");

        initializeDetailsTable(profileIdsStr);
        $("#ProfileReturnToPreview").removeClass("d-none");
    });

    // =============== END poste raw table =========================== 

    // $.extend(true, $.fn.dataTable.defaults, {
    //     language: {
    //             url: dataTablesLangUrl,
    //     },
    // });

    // =============== START cvtheque table ========================= 
    function fetchProfilesData(page = 1, perPage = 10) {
        $.ajax({
            url: mainprofileListingData,
            type: "GET",
            dataType: "json",
            data: {
                page: page,
                perPage: perPage,
                start_date: start_date,
                end_date: end_date,
            },
            success: function (response) {
                $("#profilesTableBody").empty();

                if (!response.data || response.data.length === 0) {
                    $("#profilesTableBody").html(`
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3 fst-italic">
                                Aucun profil disponible.
                            </td>
                        </tr>
                    `);
                    return;
                }

                response.data.forEach(function (posteGroup) {
                    // Calculate total rows for this poste group
                    let posteRowCount = posteGroup.diplomas.reduce(
                        (total, diploma) => {
                            return (
                                total +
                                diploma.options.reduce((optTotal, option) => {
                                    return (
                                        optTotal +
                                        option.experiences.reduce(
                                            (expTotal, exp) => {
                                                return (
                                                    expTotal +
                                                    exp.languages.length
                                                );
                                            },
                                            0
                                        )
                                    );
                                }, 0)
                            );
                        },
                        0
                    );

                    let posteRowIndex = 0;

                    posteGroup.diplomas.forEach(function (diploma) {
                        let diplomaRowCount = diploma.options.reduce(
                            (total, option) => {
                                return (
                                    total +
                                    option.experiences.reduce(
                                        (expTotal, exp) => {
                                            return (
                                                expTotal + exp.languages.length
                                            );
                                        },
                                        0
                                    )
                                );
                            },
                            0
                        );

                        let diplomaRowIndex = 0;

                        diploma.options.forEach(function (option) {
                            let optionRowCount = option.experiences.reduce(
                                (total, exp) => {
                                    return total + exp.languages.length;
                                },
                                0
                            );

                            let optionRowIndex = 0;

                            option.experiences.forEach(function (exp) {
                                let experienceRowCount = exp.languages.length;

                                let experienceRowIndex = 0;

                                exp.languages.forEach(function (lang) {
                                    let rowHtml = "<tr>";

                                    // Poste cells (only on first row)
                                    if (posteRowIndex === 0) {
                                        rowHtml += `
                                            <td rowspan="${posteRowCount}" style="vertical-align: middle;">${posteGroup.id
                                            }</td>
                                            <td rowspan="${posteRowCount}" style="vertical-align: middle;">
                                                ${posteGroup.poste}
                                            </td>
                                        `;
                                    }

                                    // Diploma cells (only on first row for this diploma)
                                    if (diplomaRowIndex === 0) {
                                        rowHtml += `<td rowspan="${diplomaRowCount}" style="vertical-align: middle;">${diploma.diploma || "-"
                                            }</td>`;
                                    }

                                    // Option cells (only on first row for this option)
                                    if (optionRowIndex === 0) {
                                        const optionValue =
                                            option.option === "_" ||
                                                !option.option
                                                ? "-"
                                                : option.option.replace(
                                                    /;/g,
                                                    "; "
                                                );
                                        rowHtml += `<td rowspan="${optionRowCount}" style="vertical-align: middle;">${optionValue}</td>`;
                                    }

                                    // Experience cells (only on first row for this experience)
                                    if (experienceRowIndex === 0) {
                                        rowHtml += `<td rowspan="${experienceRowCount}" style="vertical-align: middle;">${exp.experience_range || "-"
                                            }</td>`;
                                    }

                                    // Language cell
                                    const langValue =
                                        lang.languages.join(", ") || "-";
                                    rowHtml += `<td style="vertical-align: middle;">${langValue}</td>`;

                                    // Count cell
                                    rowHtml += `<td style="text-align: right;">${lang.profile_count || 0
                                        }</td>`;

                                    // Action cell
                                    rowHtml += `
                                        <td style="text-align: right; vertical-align: middle;">
                                            <div class="dropdown d-inline-block">
                                                <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" 
                                                   role="button" data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical" style="font-size: 18px;"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item show-row1" data-ids='${JSON.stringify(
                                        lang.profiles || []
                                    )}'>${window.translations.detail || 'Détails'}</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>`;

                                    $("#profilesTableBody").append(rowHtml);

                                    posteRowIndex++;
                                    diplomaRowIndex++;
                                    optionRowIndex++;
                                    experienceRowIndex++;
                                });
                            });
                        });
                    });
                });

                updatePagination(response.last_page, response.current_page);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
                $("#profilesTableBody").html(`
                    <tr>
                        <td colspan="8" class="text-center text-muted py-3 fst-italic">
                            Erreur lors du chargement des données
                        </td>
                    </tr>
                `);
            },
        });
    }

    function updatePagination(totalPages, currentPage) {
        const paginationContainer = $("#profile-listing-table-pagination");
        paginationContainer.empty(); // Vide le conteneur avant de le remplir

        let paginationHtml = `<div class="footable-pagination-wrapper">
            <ul class="pagination">`;

        // Bouton "Première page"
        paginationHtml += `
            <li class="footable-page-nav ${currentPage === 1 ? "disabled" : ""
            }" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>`;

        // Bouton "Précédent"
        paginationHtml += `
            <li class="footable-page-nav ${currentPage === 1 ? "disabled" : ""
            }" data-page="prev">
                <a class="footable-page-link" href="#">‹</a>
            </li>`;

        // Boutons pour chaque page
        if (totalPages > 10 && currentPage < 5) {
            for (let i = 1; i <= 10; i++) {
                paginationHtml += `
                    <li class="footable-page visible ${i === currentPage ? "active" : ""
                    }" data-page="${i}">
                        <a class="footable-page-link" href="#">${i}</a>
                    </li>`;
            }
        } else if (totalPages > 10 && currentPage > 4) {
            // If more than 10 pages, display only a limited range of page numbers
            let startPage = Math.max(1, currentPage - 4); // Start 4 pages before current page
            let endPage = Math.min(totalPages, startPage + 9); // Limit to 10 pages total

            if (endPage - startPage < 9) {
                startPage = Math.max(1, endPage - 9); // Ensure that there are at least 10 pages
            }

            for (let i = startPage; i <= endPage; i++) {
                paginationHtml += `
                    <li class="footable-page visible ${i === currentPage ? "active" : ""
                    }" data-page="${i}">
                        <a class="footable-page-link" href="#">${i}</a>
                    </li>`;
            }
        } else {
            // If 10 or fewer pages, show all pages
            for (let i = 1; i <= totalPages; i++) {
                paginationHtml += `
                    <li class="footable-page visible ${i === currentPage ? "active" : ""
                    }" data-page="${i}">
                        <a class="footable-page-link" href="#">${i}</a>
                    </li>`;
            }
        }

        // Bouton "Suivant"
        paginationHtml += `
            <li class="footable-page-nav ${currentPage === totalPages ? "disabled" : ""
            }" data-page="next">
                <a class="footable-page-link" href="#">›</a>
            </li>`;

        // Bouton "Dernière page"
        paginationHtml += `
            <li class="footable-page-nav ${currentPage === totalPages ? "disabled" : ""
            }" data-page="last">
                <a class="footable-page-link" href="#">»</a>
            </li>`;

        paginationHtml += `</ul>
            <div class="divider"></div>
            <span class="label label-default">${currentPage} sur ${totalPages}</span>
        </div>`;

        // Ajoute la pagination générée au conteneur
        paginationContainer.append(paginationHtml);

        // Gestion des clics sur les boutons de pagination
        $(".footable-page-nav, .footable-page").on("click", function (e) {
            e.preventDefault();

            if ($(this).hasClass("disabled") || $(this).hasClass("active")) {
                return; // Ne rien faire si le bouton est désactivé ou déjà actif
            }

            let selectedPage;
            const pageType = $(this).data("page");

            switch (pageType) {
                case "first":
                    selectedPage = 1;
                    break;
                case "prev":
                    selectedPage = currentPage > 1 ? currentPage - 1 : 1;
                    break;
                case "next":
                    selectedPage =
                        currentPage < totalPages ? currentPage + 1 : totalPages;
                    break;
                case "last":
                    selectedPage = totalPages;
                    break;
                default:
                    selectedPage = parseInt(pageType); // Clic sur un numéro de page
            }

            fetchProfilesData(selectedPage); // Recharge les données avec la page sélectionnée
        });
    }
    // =============== END cvtheque table ========================= 

    // =============== START date fillter ========================= 
    $(document).on('click', '#refresh-date-fillter', function () {
        start_date = null;
        end_date = null;
        refreshTables(start_date, end_date);
    });

    $('#titlecalendar, #titlecalendar1').on('apply.daterangepicker', function (ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        // Rafraîchir les tables avec les nouvelles dates
        refreshTables(start_date, end_date);
    });
    // =============== END date fillter ========================= 

    fetchProfilesData();
    fetchStats();


    //=============== Start Fill Stats cards =====================
    function updateCard(elementIdPrefix, changeValue, totalValue) {
        const totalElement = $(`.${elementIdPrefix}Total`);
        const changeElement = $(`.${elementIdPrefix}Change`);
        const iconContainer = $(`.${elementIdPrefix}Icon`);

        totalElement.text(Math.abs(totalValue));
        changeElement.text(Math.abs(changeValue) + "%");

        // Vider le conteneur d'icône
        iconContainer.empty();

        // Ajouter l'icône en fonction de la valeur
        if (changeValue === 0) {
            iconContainer.append(`
                <div class="avatar avatar-40 rounded-circle bg-blue">
                    <i class="bi bi-arrow-right" style="color: #FFF"></i>
                </div>
            `);
        } else if (changeValue > 0) {
            iconContainer.append(`
                <div class="avatar avatar-40 rounded-circle bg-green">
                    <i class="bi bi-arrow-up-right" style="color: #FFF"></i>
                </div>
            `);
        } else {
            iconContainer.append(`
                <div class="avatar avatar-40 rounded-circle bg-red">
                    <i class="bi bi-arrow-down-left" style="color: #FFF"></i>
                </div>
            `);
        }
    }
    // Fonction pour récupérer les stats et mettre à jour les cartes
    function fetchStats(start_date, end_date) {
        $.ajax({
            url: statsChangesData,
            type: "GET",
            data: { start_date: start_date, end_date: end_date },
            success: function (data) {
                // Mettre à jour chaque carte avec les nouvelles valeurs
                updateCard(
                    "cvtheque",
                    data.cvtheque.change,
                    data.cvtheque.total
                );
                updateCard(
                    "activeProfiles",
                    data.active_profiles.change,
                    data.active_profiles.total
                );
                updateCard(
                    "qualifiedProfiles",
                    data.qualified_profiles.change,
                    data.qualified_profiles.total
                );
                updateCard(
                    "validationProfiles",
                    data.validation_profiles.change,
                    data.validation_profiles.total
                );
                console.log("Statistiques mises à jour avec succès======================");
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(
                    "Erreur lors de la récupération des statistiques : ",
                    error
                );
            },
        });
    }
    //=============== Start Fill Stats cards =====================

    // Gérer les clics sur la pagination
    $(document).on("click", ".page-link", function (e) {
        e.preventDefault();
        let page = $(this).data("page");
        if (page) {
            fetchProfilesData(page);
        }
    });

    // Événement pour soumettre les dates sélectionnées via AJAX
    $("#titlecalendar, #titlecalendar1").on(
        "apply.daterangepicker",
        function (ev, picker) {
            start_date = picker.startDate.format("YYYY-MM-DD");
            end_date = picker.endDate.format("YYYY-MM-DD");
            // Rafraîchir les tables avec les nouvelles dates
            refreshTables(start_date, end_date);
        }
    );

    function refreshTables(start_date, end_date) {
        fetchStats(start_date, end_date);
        getPersentages(start_date, end_date);
        if ($.fn.DataTable.isDataTable("#all-profile-listing-table")) {
            $("#all-profile-listing-table").DataTable().destroy();
        }
        if ($.fn.DataTable.isDataTable('#custom-profile-listing-table')) {
            $('#custom-profile-listing-table').DataTable().destroy();
        }
        if ($.fn.DataTable.isDataTable('#activated-profile-listing-table')) {
            $('#activated-profile-listing-table').DataTable().destroy();
        }
        if ($.fn.DataTable.isDataTable("#qualified-profile-listing-table")) {
            $("#qualified-profile-listing-table").DataTable().destroy();
        }
        if ($.fn.DataTable.isDataTable("#validated-profile-listing-table")) {
            $("#validated-profile-listing-table").DataTable().destroy();
        }
        fetchProfilesData();

        createDataTable(
            "#all-profile-listing-table",
            allProfileListingData,
            "all-profile",
            start_date,
            end_date
        );
        createDataTable(
            "#activated-profile-listing-table",
            activatedProfileListingData,
            "activated-profile",
            start_date,
            end_date
        );
        createDataTable(
            "#qualified-profile-listing-table",
            qualifiedProfileListingData,
            "qualified-profile",
            start_date,
            end_date
        );
        createDataTable(
            "#validated-profile-listing-table",
            validatedProfileListingData,
            "validated-profile",
            start_date,
            end_date
        );
    }

    function createDataTable(
        selector,
        ajaxUrl,
        tableId,
        start_date = null,
        end_date = null
    ) {
        return $(selector).DataTable({
            dom: 'Brtip',
            processing: true,
            serverSide: true,
            lengthChange: false,
            searching: true,
            language: {
                url: dataTablesLangUrl,
            },
            ajax: {
                url: ajaxUrl,
                data: function (d) {
                    d.niveau = $("#filter-niveau").val();
                    d.diplome = $("#filter-diplome").val();
                    d.experience = $("#filter-experience").val();
                    d.poste = $("#filter-poste").val();
                    d.contract_type = $("#filter-contrat-type").val();
                    d.pays = $("#filter-pays").val();
                    d.ville = $("#filter-ville").val();
                    d.start_date = start_date;
                    d.end_date = end_date;
                },
            },
            // dom: '<"d-none"B>frtip',
            buttons: [
                {
                    extend: "pdfHtml5",
                    orientation: "landscape",
                    pageSize: "A4",
                    title: "Profils",
                    exportOptions: { columns: ":not(:last-child)" },
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 11,
                            color: "white",
                            fillColor: "#4CAF50",
                            alignment: "center",
                        };
                        doc.defaultStyle.fontSize = 10;
                    },
                },
                {
                    extend: "excelHtml5",
                    text: "Exporter en Excel",
                    exportOptions: { columns: ":not(:last-child)" },
                },
                {
                    extend: "csvHtml5",
                    text: "Exporter en CSV",
                    exportOptions: { columns: ":not(:last-child)" },
                },
            ],
            responsive: true,
            columns: [
                { data: "picture", name: "picture", orderable: false, searchable: false },
                { data: "matricule", name: "matricule", orderable: false, searchable: true },
                { data: "first_name", name: "first_name", orderable: false, searchable: true },
                { data: "last_name", name: "last_name", orderable: false, searchable: true },
                { data: "diploma_label", name: "diploma_label", searchable: true, orderable: false },
                { data: "option", name: "option", orderable: false, searchable: true },
                { data: "total_experience", name: "total_experience", orderable: false, searchable: true },
                { data: "current_profession", name: "current_profession", orderable: false, searchable: true },
                { data: "desired_profession", name: "desired_profession", orderable: false, searchable: true },
                { data: "is_active", name: "is_active", orderable: false, searchable: false, className: "text-center" },
                { data: "is_qualified", name: "is_qualified", orderable: false, searchable: false, className: "text-center" },
                { data: "tab", name: "tab", orderable: false },
                { data: "created_at", name: "created_at", className: "text-center" },
                { data: "updated_at", name: "updated_at", className: "text-center" },
                { data: "action", name: "action", orderable: false, searchable: false, className: "text-center" },
            ],
            drawCallback: function (settings) {
                updateCustomPagination(settings, selector);

                $(selector + " thead th").each(function () {
                    const $th = $(this);

                    // Save and reuse the original title
                    if (!$th.data("original-title")) {
                        const originalTitle = $th.text().trim();
                        $th.data("original-title", originalTitle);
                    }
                    const columnTitle = $th.data("original-title");

                    // Determine the icon
                    // let icon = '⇅';
                    // if ($th.hasClass('sorting_asc')) icon = '▲';
                    // else if ($th.hasClass('sorting_desc')) icon = '▼';

                    let back =
                        "https://cdn.datatables.net/1.11.5/images/sort_both.png";
                    if ($th.hasClass("sorting_asc"))
                        back =
                            "https://cdn.datatables.net/1.11.5/images/sort_asc.png";
                    else if ($th.hasClass("sorting_desc"))
                        back =
                            "	https://cdn.datatables.net/1.11.5/images/sort_desc.png";

                    // Inject the new structure
                    if (
                        $th.hasClass("sorting") ||
                        $th.hasClass("sorting_asc") ||
                        $th.hasClass("sorting_desc")
                    ) {
                        $th.css("background-image", "none");
                        $th.html(`
                            <div class="th-wrapper" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 4px;
                                white-space: nowrap;
                                cursor: pointer;
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important; display:none !important"></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass("sorting sorting_asc sorting_desc");
                });
            },
        });
    }

    var table1 = createDataTable('#all-profile-listing-table', allProfileListingData, 'all-profile');
    var table2 = createDataTable('#activated-profile-listing-table', activatedProfileListingData, 'activated-profile');
    var table3 = createDataTable('#qualified-profile-listing-table', qualifiedProfileListingData, 'qualified-profile');
    var table4 = createDataTable('#validated-profile-listing-table', validatedProfileListingData, 'validated-profile');



    function updateCustomPagination(settings, tableId) {
        const pageInfo = settings.json;
        const recordsTotal = pageInfo.recordsTotal;
        const pageLength = settings._iDisplayLength;
        const totalPages = Math.ceil(recordsTotal / pageLength);
        const currentPage = settings._iDisplayStart / pageLength + 1;

        // Réinitialiser le contenu de la pagination
        updateCustomPaginationSetter(totalPages, currentPage, tableId);
    }

    function updateCustomPaginationSetter(totalPages, currentPage, tableId) {
        $(document).ready(function () {
            $(".footable").footable();
        });

        const paginationWrapper = $(`${tableId}-pagination .pagination`);

        paginationWrapper.empty(); // Clear old pagination

        // First & Prev buttons
        paginationWrapper.append(`
            <li class="footable-page-nav ${currentPage === 1 ? "disabled" : ""
            }" data-page="first">
                <a class="footable-page-link" href="#">«</a>
            </li>
            <li class="footable-page-nav ${currentPage === 1 ? "disabled" : ""
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
                <li class="footable-page visible ${i === currentPage ? "active" : ""
                }" data-page="${i}">
                    <a class="footable-page-link" href="#">${i}</a>
                </li>
            `);
        }

        // Next & Last buttons
        paginationWrapper.append(`
            <li class="footable-page-nav ${currentPage === totalPages ? "disabled" : ""
            }" data-page="next">
                <a class="footable-page-link" href="#">›</a>
            </li>
            <li class="footable-page-nav ${currentPage === totalPages ? "disabled" : ""
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
        const tables = [
            { id: "#all-profile-listing-table" },
            { id: "#activated-profile-listing-table" },
            { id: "#qualified-profile-listing-table" },
            { id: "#validated-profile-listing-table" },
            { id: "#custom-profile-listing-table" } // <-- ADD THIS
        ];

        tables.forEach(({ id }) => {
            const paginationId = `${id}-pagination`;
            $(`${paginationId} .footable-page-nav, ${paginationId} .footable-page`).off('click').on("click", function (e) {
                e.preventDefault();
                handlePaginationClick($(this), $(id).DataTable());
            });
        });
    }


    function handlePaginationClick(element, table) {
        const action = element.data("page");

        if (element.hasClass("disabled")) {
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
        } else if (!isNaN(action)) {
            // Gérer le clic sur les numéros de page
            table.page(parseInt(action) - 1).draw("page");
        }
    }

    function createProgressBar(elementId, value) {
        const containers = document.querySelectorAll("." + elementId);

        containers.forEach((container) => {
            if (!container) {
                console.error(
                    "L'élément avec l'ID '" + elementId + "' n'existe pas."
                );
                return;
            }

            try {
                // Remove any existing SVG content (clean up)
                container.innerHTML = "";

                const progressBar = new ProgressBar.Circle(container, {
                    color: "#2e9c65",
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: "easeInOut",
                    trailColor: "#2e9c657a",
                    duration: 1400,
                    text: { autoStyleContainer: false },
                    from: { color: "#2e9c65", width: 10 },
                    to: { color: "#2e9c65", width: 10 },
                    step: function (state, circle) {
                        circle.path.setAttribute("stroke", state.color);
                        var percentage = Math.round(circle.value() * 100);
                        circle.setText(
                            percentage ? percentage + "<small>%</small>" : ""
                        );
                        if (percentage === 0)
                            circle.setText("0<small>%</small>");
                    },
                });

                progressBar.animate(value / 100);
            } catch (error) {
                console.error(
                    "Erreur lors de la création de la ProgressBar pour :",
                    elementId,
                    error
                );
            }
        });
    }

    function getPersentages(start_date, end_date) {
        $.ajax({
            url: statsPersentageData,
            data: { start_date: start_date, end_date: end_date },
            method: "GET",
            dataType: "json",
            success: function (data) {
                // Now recreate them with new data
                if (data.total !== undefined)
                    createProgressBar("circleprogressgreen11", data.total);
                if (data.activated !== undefined)
                    createProgressBar("circleprogressgreen22", data.activated);
                if (data.qualified !== undefined)
                    createProgressBar("circleprogressgreen33", data.qualified);
                if (data.validated !== undefined)
                    createProgressBar("circleprogressgreen44", data.validated);

                if (data.total !== undefined)
                    createProgressBar("circleprogressgreen111", data.total);
                if (data.activated !== undefined)
                    createProgressBar("circleprogressgreen222", data.activated);
                if (data.qualified !== undefined)
                    createProgressBar("circleprogressgreen333", data.qualified);
                if (data.validated !== undefined)
                    createProgressBar("circleprogressgreen444", data.validated);
            },
            error: function (xhr, status, error) {
                console.error("Erreur AJAX :", status, error);
            },
        });
    }
    getPersentages(start_date, end_date);

    window.deleteProfile = function (id) {
        if (!id) {
            Swal.fire({
                icon: "warning",
                title: "Avertissement",
                text: "Aucun élément sélectionné pour suppression.",
            });
            return;
        }

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Cette action supprimera définitivement l'élément.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/profiles/delete/profile/${id}`,
                    type: "GET",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Supprimé!",
                            text: "L'élément a été supprimé avec succès.",
                        }).then(() => {
                            // Rafraîchir toutes les tables concernées
                            let tables = [
                                "#all-profile-listing-table",
                                "#activated-profile-listing-table",
                                "#qualified-profile-listing-table",
                                "#validated-profile-listing-table",
                            ];
                            tables.forEach((table) => {
                                $(table).DataTable().ajax.reload(null, false);
                            });
                        });
                    },
                    error: function (xhr) {
                        const errorResponse = xhr.responseJSON;
                        Swal.fire({
                            icon: "error",
                            title: "Erreur",
                            text:
                                errorResponse.error ||
                                "Une erreur inattendue est survenue.",
                        });
                    },
                });
            }
        });
    };

    var canvas = document.getElementById("listingProfileChart");
    if (!canvas) {
        console.error("Erreur: L'élément #listingProfileChart n'existe pas !");
        return;
    }

    var ctx = canvas.getContext("2d");

    // Vérifier si Chart.js est bien chargé
    if (typeof Chart === "undefined") {
        console.error("Erreur: Chart.js n'est pas chargé !");
        return;
    }

    var myChart;

    function loadChartData(filter = "all") {
        $.ajax({
            url: "/api/profiles/chart-data",
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (!response.labels) {
                    console.error("Erreur: Données du graphique invalides !");
                    return;
                }

                var datasets = [];

                // if (filter === "all_profiles" || filter === "all" || filter === "all_profiles") {
                //     var gradientblue2 = ctx.createLinearGradient(0, 0, 0, 180);
                //     gradientblue2.addColorStop(0, "rgba(9, 114, 226, 0.8)");
                //     gradientblue2.addColorStop(1, "rgba(0, 197, 221, 0)");
                //     datasets.push({
                //         label: "CVthèque",
                //         data: response.all_profiles,
                //         radius: 2,
                //         pointBackgroundColor: "#ffffff",
                //         backgroundColor: gradientblue2,
                //         borderColor: "rgba(37, 162, 246, 0.65)",
                //         borderWidth: 1,
                //         fill: true,
                //         tension: 0.0,
                //     });
                // }

                if (filter === "active" || filter === "all" || filter === "all_profiles") {
                    var gradientgreen1 = ctx.createLinearGradient(0, 0, 0, 220);
                    gradientgreen1.addColorStop(0, "rgba(145, 195, 0, 0.5)");
                    gradientgreen1.addColorStop(1, "rgba(176, 197, 0, 0)");
                    datasets.push({
                        label: "Profils actifs",
                        data: response.active_profiles,
                        radius: 2,
                        pointBackgroundColor: "#ffffff",
                        backgroundColor: gradientgreen1,
                        borderColor: "#91C300",
                        borderWidth: 1,
                        fill: true,
                        tension: 0.0,
                    });
                }

                if (filter === "qualified" || filter === "all" || filter === "all_profiles") {
                    var gradientblue = ctx.createLinearGradient(0, 0, 0, 220);
                    gradientblue.addColorStop(0, "rgba(240, 61, 79, 0.4)");
                    gradientblue.addColorStop(1, "rgba(255, 223, 220, 0)");

                    datasets.push({
                        label: "Profils qualifiés",
                        data: response.qualified_profiles,
                        radius: 2,
                        pointBackgroundColor: "#ffffff",
                        backgroundColor: gradientblue,
                        borderColor: "rgba(240, 61, 79, 0.65)",
                        borderWidth: 1,
                        fill: true,
                        tension: 0.0,
                    });
                }

                if (filter === "validation" || filter === "all" || filter === "all_profiles") {
                    var gradientred2 = ctx.createLinearGradient(0, 0, 0, 220);
                    gradientred2.addColorStop(0, "rgba(1, 94, 194, 0.8)");
                    gradientred2.addColorStop(1, "rgba(0, 197, 221, 0)");
                    datasets.push({
                        label: "Profils en validation",
                        data: response.validation_profiles,
                        radius: 2,
                        pointBackgroundColor: "#ffffff",
                        backgroundColor: gradientred2,
                        borderColor: "rgba(1, 94, 194, 0.4)",
                        borderWidth: 1,
                        fill: true,
                        tension: 0.0,
                    });
                }

                if (myChart) {
                    myChart.data.labels = response.labels;
                    myChart.data.datasets = datasets;
                    myChart.update();
                } else {
                    myChart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: response.labels,
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                    position: "top",
                                },
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false,
                                    },
                                },
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        display: false,
                                    },
                                    grid: {
                                        display: false,
                                    },
                                    title: {
                                        display: false,
                                    },
                                },
                            },
                        },
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Erreur AJAX :", status, error);
            },
        });
    }

    // Charger les données au démarrage
    loadChartData();

    // Ajout des événements aux boutons de filtrage
    $("#flt-chart-all").on("click", function () {
        loadChartData("all_profiles");
    });

    $("#flt-chart-active").on("click", function () {
        loadChartData("active");
    });

    $("#flt-chart-qualified").on("click", function () {
        loadChartData("qualified");
    });

    $("#flt-chart-validation").on("click", function () {
        loadChartData("validation");
    });

    $(document).on('click', '.show-detail', function () {
        let tableid = $(this).data('detail');
        $(".table5").addClass("d-none");
        if (tableid == 1) {
            loadChartData("all_profiles");
            $(".table1").addClass("d-none");
            $("#ProfileMainFillter").removeClass("d-none");
            $("#ProfileReturnToPreview").removeClass("d-none");
        } else if (tableid == 2) {
            loadChartData("active");
            $(".table2").addClass("d-none");
            $("#ProfileMainFillter").removeClass("d-none");
            $("#ProfileReturnToPreview").removeClass("d-none");
        } else if (tableid == 3) {
            loadChartData("qualified");
            $(".table3").addClass("d-none");
            $("#ProfileMainFillter").removeClass("d-none");
            $("#ProfileReturnToPreview").removeClass("d-none");
        } else if (tableid == 4) {
            loadChartData("validation");
            $(".table4").addClass("d-none");
            $("#ProfileMainFillter").removeClass("d-none");
            $("#ProfileReturnToPreview").removeClass("d-none");
        } else if (tableid == 0) {
            loadChartData("all");
            $("#ProfileMainFillter").addClass("d-none");
            $("#ProfileReturnToPreview").addClass("d-none");
        }

        $(".alltable").addClass("d-none");
        $("#profile-" + tableid).removeClass("d-none");
        $("#profile-" + tableid).addClass("d-block");
    });

    // $("#ProfileReturnToPreview").on("click", function () {
    //     $("#ProfileMainFillter").addClass("d-none");
    //     $("#ProfileReturnToPreview").addClass("d-none");
    // });
    //Search tables 
    $(".customSearchBox").on("input", function () {
        const value = this.value;
        [table1, table2, table3, table4, table5].forEach(table => {
            if (table) table.search(value).draw();
        });
    });
    //Pour Button  telechargement Excel & Csv
    $("#download-excel").on("click", function (e) {
        e.preventDefault();
        // table1.button('.buttons-excel').trigger();
        table1.button(".buttons-excel").trigger();
        table2.button(".buttons-excel").trigger();
        table3.button(".buttons-excel").trigger();
        table4.button(".buttons-excel").trigger();
        table5.button(".buttons-excel").trigger();
    });

    $(".filter-block select").on("change", function () {
        // table1.ajax.reload();
        table1.ajax.reload();
        table2.ajax.reload();
        table3.ajax.reload();
        table4.ajax.reload();
        // table5.ajax.reload();
    });

    // Bind the custom select to the DataTable's page length
    $("#customLength").on("change", function () {
        var selectedValue = $(this).val(); // Get selected value
        table1.page.len(selectedValue).draw();
        table2.page.len(selectedValue).draw();
        table3.page.len(selectedValue).draw();
        table4.page.len(selectedValue).draw();
        table5.page.len(selectedValue).draw();
    });

    $("#filter-pays").on("change", function () {
        var selectedCountryId = $(this).val();
        $("#filter-ville").val("Tous");
        if (selectedCountryId === "Tous") {
            $("#filter-ville option").show();
        } else {
            $("#filter-ville option").hide();
            $('#filter-ville option[value="Tous"]').show();
            $(
                '#filter-ville option[data-country="' + selectedCountryId + '"]'
            ).show();
        }
        $("#filter-ville").trigger("chosen:updated");
    });

    $(document).ready(function () {
        $("#parentFolderSelect").on("change", function () {
            let parentId = $(this).val();
            let $subFolderSelect = $("#subFolderSelect");

            $subFolderSelect
                .prop("disabled", true)
                .html('<option value="">Chargement...</option>')
                .trigger("chosen:updated");

            if (parentId) {
                $.ajax({
                    url: `/api/profiles/folders/${parentId}/subfolders`,
                    type: "GET",
                    success: function (response) {
                        if (
                            response &&
                            response.data &&
                            response.data.length > 0
                        ) {
                            $subFolderSelect
                                .empty()
                                .append(
                                    '<option value="">-- Sélectionner un sous-dossier --</option>'
                                );
                            response.data.forEach(function (folder) {
                                $subFolderSelect.append(
                                    `<option value="${folder.id}">${folder.name}</option>`
                                );
                            });

                            $subFolderSelect
                                .prop("disabled", false)
                                .trigger("chosen:updated");
                            $subFolderSelect.attr("required", true);
                            $subFolderSelect.setAttribute("required");
                        } else {
                            $subFolderSelect
                                .html(
                                    '<option value="">Aucun sous-dossier disponible</option>'
                                )
                                .prop("disabled", true)
                                .trigger("chosen:updated");
                            $subFolderSelect.removeAttr("required");
                        }
                    },
                    error: function () {
                        $subFolderSelect
                            .html(
                                '<option value="">Aucun sous-dossier disponible</option>'
                            )
                            .prop("disabled", true)
                            .trigger("chosen:updated");
                        $subFolderSelect.removeAttr("required");
                    },
                });
            } else {
                $subFolderSelect
                    .html(
                        '<option value="">-- Sélectionner un sous-dossier --</option>'
                    )
                    .prop("disabled", true)
                    .trigger("chosen:updated");
                $subFolderSelect.removeAttr("required");
            }
        });

        // Prevent form submission if required subfolder is not selected
        // $('form').on('submit', function (e) {
        //     if ($('#subFolderSelect').attr('required') && !$('#subFolderSelect').val()) {
        //         alert('Veuillez sélectionner un sous-dossier.');
        //         e.preventDefault();
        //     }
        // });
    });

    // Open the Create Folder Modal
    window.showCreateFolderModal = function () {
        $("#createFolderModal").modal("show");
    };
    // Submit Folder Selection
    window.submitFolderSelection = function () {
        let profileId = $("#selectedProfileId").val();
        let parentFolderId = $("#parentFolderSelect").val();
        let subFolderId = $("#subFolderSelect").val();

        let hasSubfolders = $("#subFolderSelect option").length > 1;

        if (hasSubfolders && !subFolderId) {
            Swal.fire(
                "Erreur!",
                "Veuillez sélectionner un sous-dossier.",
                "error"
            );
            return;
        }

        let folderId = subFolderId || parentFolderId;

        if (!folderId) {
            Swal.fire("Erreur!", "Veuillez sélectionner un dossier.", "error");
            return;
        }

        $.ajax({
            url: addToVivierRoute,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                profile_id: profileId,
                folder_id: folderId,
            },
            success: function () {
                Swal.fire("Ajouté!", "Le profil a été ajouté.", "success");
                $("#selectFolderModal").modal("hide");
            },
            error: function () {
                Swal.fire("Erreur!", "Une erreur est survenue.", "error");
            },
        });
    };

    // Create a New Folder
    window.createFolder = function () {
        let folderName = $("#newFolderName").val();
        let parentId = $("#newFolderParent").val();

        if (!folderName) {
            Swal.fire("Erreur!", "Veuillez entrer un nom de dossier.", "error");
            return;
        }

        $.ajax({
            url: talentFolderStoreRoute,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                name: folderName,
                parent_id: parentId,
            },
            success: function (response) {
                Swal.fire("Créé!", "Dossier ajouté avec succès.", "success");
                $("#createFolderModal").modal("hide");
                $("#parentFolderSelect").empty(); // Clear existing options

                console.log(response);
                $.each(response.talentFolders, function (index, folder) {
                    $("#parentFolderSelect").append(
                        `<option value="${folder.id}">${folder.name}</option>`
                    );
                });

                // $('#parentFolderSelect').append(`<option value="${response.id}">${response.name}</option>`);
            },
            error: function () {
                Swal.fire(
                    "Erreur!",
                    "Impossible de créer le dossier.",
                    "error"
                );
            },
        });
    };
    /**
     *  Action Ajouter au Vivier
     */
    window.confirmAddToVivier = function (profileId) {

        $('#selectedProfileId').val(profileId);
        $('#selectFolderModal').modal('show');
    }


    window.activateProfile = function (id) {
        if (!id) {
            Swal.fire({
                icon: "warning",
                title: "Avertissement",
                text: "Aucun élément sélectionné pour activation.",
            });
            return;
        }

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Voulez-vous vraiment activer ce profil?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, activer!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/profiles/activate/${id}`,
                    type: "POST",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Activé!",
                            text: "Le profil a été activé avec succès.",
                        }).then(() => {
                            reloadTables();
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    },
                });
            }
        });
    };

    window.deactivateProfile = function (id) {
        if (!id) {
            Swal.fire({
                icon: "warning",
                title: "Avertissement",
                text: "Aucun élément sélectionné pour désactivation.",
            });
            return;
        }

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Voulez-vous vraiment désactiver ce profil?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, désactiver!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/profiles/deactivate/${id}`,
                    type: "POST",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Désactivé!",
                            text: "Le profil a été désactivé avec succès.",
                        }).then(() => {
                            reloadTables();
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    },
                });
            }
        });
    };

    window.makeProfileQualified = function (id) {
        if (!id) {
            Swal.fire({
                icon: "warning",
                title: "Avertissement",
                text: "Aucun élément sélectionné pour qualification.",
            });
            return;
        }

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Voulez-vous qualifier ce profil?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, qualifier!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/profiles/qualify/${id}`,
                    type: "POST",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Qualifié!",
                            text: "Le profil a été qualifié avec succès.",
                        }).then(() => {
                            reloadTables();
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    },
                });
            }
        });
    };

    window.makeProfileNotQualified = function (id) {
        if (!id) {
            Swal.fire({
                icon: "warning",
                title: "Avertissement",
                text: "Aucun élément sélectionné pour déqualification.",
            });
            return;
        }

        Swal.fire({
            title: "Êtes-vous sûr?",
            text: "Voulez-vous déqualifier ce profil?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, déqualifier!",
            cancelButtonText: "Annuler",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/profiles/disqualify/${id}`,
                    type: "POST",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Déqualifié!",
                            text: "Le profil a été déqualifié avec succès.",
                        }).then(() => {
                            reloadTables();
                        });
                    },
                    error: function (xhr) {
                        handleAjaxError(xhr);
                    },
                });
            }
        });
    };

    function handleAjaxError(xhr) {
        const errorResponse = xhr.responseJSON;
        Swal.fire({
            icon: "error",
            title: "Erreur",
            text: errorResponse?.error || "Une erreur inattendue est survenue.",
        });
    }

    function reloadTables() {
        let tables = [
            "#all-profile-listing-table",
            "#activated-profile-listing-table",
            "#qualified-profile-listing-table",
            "#validated-profile-listing-table",
        ];
        tables.forEach((table) => {
            $(table).DataTable().ajax.reload(null, false);
        });
    }
});
