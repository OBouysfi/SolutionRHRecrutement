$(document).ready(function () {
    // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

    // Map locale to DataTables language file
    const dataTablesLangUrl = {
        fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
        es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
        zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
        pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
        ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
    }[locale] || "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    var table = $("#matchingTable").DataTable({
        processing: false,
        serverSide: true,
        lengthChange: false,
        searching: false,
        ajax: {
            url: matchingListingData,
            data: function (d) {
                if ($("#filter-client").val() !== "Tous") {
                    d.clientId = $("#filter-client").val();
                }
                if ($("#filter-job-offer").val() !== "Tous") {
                    d.jobOfferId = $("#filter-job-offer").val();
                }
                if ($("#filter-status-job-offer").val() !== "Tous") {
                    d.statusjobOfferId = $("#filter-status-job-offer").val();
                }
                if ($("#filter-profession").val() !== "Tous") {
                    d.professionId = $("#filter-profession").val();
                }

                // les valeurs du slider
                d.minRatio = $("#minSlider").val();
                d.maxRatio = $("#maxSlider").val();
                // For input search 
                d.search = $("#customSearchBoxMatching").val();
            },
        },
        dom: '<"d-none"B>frtip',
        buttons: [
            {
                extend: "pdfHtml5",
                orientation: "landscape",
                pageSize: "A4",
                title: "Vivier des Talents",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
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
                text: window.translations.exporter_en_excel,
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
            {
                extend: "csvHtml5",
                text: "Exporter en CSV",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
        responsive: true,
        // language: {
        //     url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        //     info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
        //     emptyTable: "Aucune donnée disponible dans le tableau",
        //     infoEmpty: "Affichage de 0 à 0 sur 0 entrée",
        // },

        language: {
            url: dataTablesLangUrl,
        },

        columns: [
            {
                data: "picture",
                name: "picture",
                orderable: false,
                searchable: false,
            },
            { data: "matricule", name: "profiles.matricule", orderable: false },
            {
                data: "first_name",
                name: "profiles.first_name",
                orderable: false,
            },
            { data: "last_name", name: "profiles.last_name", orderable: false },
            {
                data: "diploma_label",
                name: "diploma_label",
                orderable: false,
                searchable: false,
            },
            { data: "option", name: "option", orderable: false },
            {
                data: "total_experience",
                name: "total_experience",
                orderable: false,
            },
            {
                data: 'current_profession',
                name: 'current_profession',
                orderable: true,
                render: function(data) {
                    if (typeof data === 'string') {
                        const words = data.trim().split(/\s+/);
                        let result = '';
                        for (let i = 0; i < words.length; i += 3) {
                            const chunk = words.slice(i, i + 3).join(' ');
                            result += chunk + '<br>';
                        }
                        return result.trim();
                    }
                    return '';
                }
            },
            {
                data: 'desired_profession',
                name: 'desired_profession',
                orderable: true,
                render: function(data) {
                    if (typeof data === 'string') {
                        const words = data.trim().split(/\s+/);
                        let result = '';
                        for (let i = 0; i < words.length; i += 3) {
                            const chunk = words.slice(i, i + 3).join(' ');
                            result += chunk + '<br>';
                        }
                        return result.trim(); 
                    }
                    return '';
                }
            },
            { data: "tab", name: "tab", orderable: false },
            {
                data: "created_at",
                name: "profiles.created_at",
                orderable: false,
            },
            {
                data: "updated_at",
                name: "profiles.updated_at",
                orderable: false,
            },
            { data: "match_score", name: "matches.ratio", orderable: false },
            {
                data: "shortlist_toggle",
                name: "shortlist_toggle",
                orderable: false,
                searchable: false,
                className: "text-center",
            },

            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
        drawCallback: function (settings) {
            $(".circle-progress").each(function () {
                var $this = $(this);
                if (!$this.hasClass("initialized")) {
                    // var ratio = parseFloat($this.data('ratio')) / 100;
                    var ratio = parseFloat($this.data("ratio"));
                    var color = $this.data("color") || "#2e9c65";

                    var circle = new ProgressBar.Circle(this, {
                        color: color,
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: "easeInOut",
                        trailColor: "#dcecf0",
                        duration: 1400,
                        text: {
                            autoStyleContainer: false,
                        },
                        from: { color: color, width: 10 },
                        to: { color: color, width: 10 },
                        step: function (state, circle) {
                            circle.path.setAttribute("stroke", state.color);
                            circle.path.setAttribute(
                                "stroke-width",
                                state.width
                            );

                            var rawValue = circle.value() * 100;
                            var value = Math.round(rawValue);

                            // Afficher au moins 1% pour les valeurs non nulles mais très petites
                            if (rawValue > 0 && value === 0) {
                                value = 1; // Score minimum affiché
                            }

                            if (value === 0) {
                                circle.setText("");
                            } else {
                                circle.setText(value + "<small>%</small>");
                            }
                        },
                    });

                    circle.animate(ratio);

                    $this.addClass("initialized");
                }
            });

            updateCustomPagination(settings);
            $('#matchingTable thead th').each(function () {
                const $th = $(this);

                // Save and reuse the original title
                if (!$th.data('original-title')) {
                    const originalTitle = $th.text().trim();
                    $th.data('original-title', originalTitle);
                }
                const columnTitle = $th.data('original-title');

                // Determine the icon
                // let icon = '⇅';
                // if ($th.hasClass('sorting_asc')) icon = '▲';
                // else if ($th.hasClass('sorting_desc')) icon = '▼';

                let back = 'https://cdn.datatables.net/1.11.5/images/sort_both.png';
                if ($th.hasClass('sorting_asc')) back = 'https://cdn.datatables.net/1.11.5/images/sort_asc.png';
                else if ($th.hasClass('sorting_desc')) back = '	https://cdn.datatables.net/1.11.5/images/sort_desc.png';

                // Inject the new structure
                if ($th.hasClass("sorting") || $th.hasClass("sorting_asc") || $th.hasClass("sorting_desc")) {
                    $th.css("background-image", "none");
                    $th.html(`
                            <div class="th-wrapper" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 4px;
                                white-space: nowrap;
                                cursor: pointer;
                                text-align: start;
                                margin-left: 7px;
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px;background-image: url(${back}) !important; display:none"></span>
                            </div>
                        `);
                }
                // Remove default DataTables sorting classes to kill default icons
                $th.removeClass('sorting sorting_asc sorting_desc');
            });
        },
    });

    $("#filter-client, #filter-job-offer ,#filter-profession").on(
        "change",
        function () {
            table.ajax.reload();
        }
    );

    $("#customSearchBoxMatching").on("input", function () {
        const value = this.value;
        table.ajax.reload();
    });

    /**
     *  Sélection globale (checkbox)
     *  */

    $("#selectAll").on("click", function () {
        var rows = table.rows({ search: "applied" }).nodes();
        $('input[type="checkbox"]', rows).prop("checked", this.checked);
    });

    /**
     * Annule la case "selectAll" si on décoche une ligne
     * */
    $("#matchingTable tbody").on(
        "change",
        'input[type="checkbox"]',
        function () {
            if (!this.checked) {
                var el = $("#selectAll").get(0);
                if (el && el.checked && "indeterminate" in el) {
                    el.indeterminate = true;
                }
            }
        }
    );

    /**
     * Bouton "Ajouter à la shortlist"
     * */
    $(document).on("change", ".toggle-shortlist", function () {
        const checkbox = $(this);
        const isChecked = checkbox.is(":checked");
        const matchId = checkbox.val();
        const inAts = checkbox.data("in-ats") === 1;

        // Si déjà dans ATS, forcer le toggle actif et désactiver la modification
        if (inAts) {
            checkbox.prop("checked", true);
            Swal.fire({
                icon: "info",
                title: window.translations.Deja_en_ATS,
                text: window.translations.text_Deja_en_ATS,
                timer: 2000,
                showConfirmButton: false,
            });
            return;
        }

        // Toggle pour ajout
        checkbox.prop("checked", !isChecked); // revenir à l'état initial

        if (isChecked) {
            Swal.fire({
                title: window.translations.ajouter_a_shortlist,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: window.translations.yes,
                cancelButtonText: window.translations.cancel,
                confirmButtonColor: "#005dc7",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: addToShortlistUrl,
                        type: "POST",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                            ids: [matchId],
                        },
                        success: function (response) {
                            if (response.duplicates.length > 0) {
                                Swal.fire({
                                    icon: "info",
                                    title: window.translations.deja_present,
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                                checkbox.prop("checked", false);
                            } else {
                                Swal.fire({
                                    icon: "success",
                                    title: window.translations.ajouter_a_shortlist,
                                    timer: 1500,
                                    showConfirmButton: false,
                                });
                                checkbox.prop("checked", true);
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Erreur",
                                text: "Une erreur est survenue.",
                            });
                            checkbox.prop("checked", false);
                        },
                    });
                }
            });
        } else {
            Swal.fire({
                icon: "info",
                title: window.translations.suppression_non_activee,
                text: window.translations.toggle_a_lajout,
                timer: 2000,
                showConfirmButton: false,
            });
        }
    });

    $("#addToShortlist").on("click", function () {
        var selectedIds = [];
        $(
            'input[type="checkbox"]:checked',
            table.rows({ search: "applied" }).nodes()
        ).each(function () {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            $.ajax({
                url: addToShortlistUrl,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    ids: selectedIds,
                },
                success: function (response) {
                    if (response.duplicates.length > 0) {
                        alert(
                            "Certains profils n'ont pas été ajoutés car ils sont déjà dans la shortlist."
                        );
                    } else {
                        alert("Profils ajoutés à la shortlist avec succès.");
                    }
                    table.ajax.reload();
                },
                error: function (xhr) {
                    alert(
                        "Une erreur est survenue lors de l'ajout à la shortlist."
                    );
                },
            });
        } else {
            alert("Veuillez sélectionner au moins un profil.");
        }
    });
    /**
     * End Ajouter a la shortlist
     */

    // Pour Button téléchargement Excel & CSV
    $("#download-excel").on("click", function (e) {
        e.preventDefault();
        table.button(".buttons-excel").trigger();
    });

    /**
     * Pour filter matching
     * */
    $(document).ready(function () {
        $("#filter-client").on("change", function () {
            var clientId = $(this).val();

            $("#filter-job-offer").val("");
            if (clientId === "") {
                $("#filter-job-offer option").show();
            } else {
                $("#filter-job-offer option").each(function () {
                    var optionClientId = $(this).data("client-id");

                    if (optionClientId == clientId || !optionClientId) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    });

    $(".filter-block select").on("change", function () {
        table.ajax.reload();
    });


    $("#customLength").on("change", function () {
        const selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });

    $("#filter-pays").on("change", function () {
        const selectedCountry = $(this).val();
        if (selectedCountry === "Tous") {
            $("#filter-ville option").removeClass("d-none");
        } else {
            $("#filter-ville option").each(function () {
                const cityCountry = $(this).data("country");
                if (cityCountry == selectedCountry) {
                    $(this).removeClass("d-none");
                } else {
                    $(this).addClass("d-none");
                }
            });
        }
    });
});

/**
 * Pagination personnalisée
 * */
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