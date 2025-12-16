$(document).ready(function () {
    $("#addClientSiteData").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: clientSite ? ApiClientSitesEditData : ApiClientSitesCreateData,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: window.translations.success_client,
                    text: window.translations.succes_site,
                    icon: "success",
                    confirmButtonText: window.translations.confirm,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#sites-tab").removeClass("active");
                        $("#evaluateurs-tab").trigger("click");
                    }
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += `${value[0]}<br/>`;
                    });

                    Swal.fire({
                        title: window.translations.title_erreur,
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: window.translations.button,
                    });
                } else {
                    Swal.fire({
                        title: window.translations.title_erreur,
                        text: window.translations.ajoute_site,
                        icon: "error",
                        confirmButtonText: window.translations.button,
                    });
                }
            },
        });
    });



    function populateOptions(select, data, defaultOption = "Tous") {
        let options = `<option value="Tous">${defaultOption}</option>`;
        if (data && Array.isArray(data)) {
            data.forEach((item) => {
                options += `<option value="${item.id}">${item.name}</option>`;
            });
        }

        if (select instanceof HTMLElement) {
            select.innerHTML = options;
        }
        else {
            document.querySelector(select).innerHTML = options;
        }
    }





    $("#addClientSiteBtn").on("click", function () {
        const newFilialeHtml = `
        <div class="card border-0 div_create_site mb-4">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">

                                    <h6 class="fw-medium mb-0 translated_text">${window.translations.Site}</h6>

                                 </div>
                             </div>
                             <div class="card-body">
                               <div class="row mt-2 mb-4 justify-content-end">
                                <div class="col-2 delete_div_site">
                                      <button class="btn btn-danger mnw-100 " type="button" style="font-size: 12px;float: right;width: 100px">${window.translations.Supprimer}</button>
                                </div>
                            </div>

                                <div class="row justify-content-center mt-3">
                                    <!-- Nom du Site -->
                                    <div class="col-3">
                                        <div class="form-group mb-3">
                                            <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <input type="text" name="site_name[]" placeholder=">${window.translations.Nom_du_site}" class="form-control">
                                                <label>${window.translations.Nom_du_site}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="col-3">
                                        <div class="form-group mb-3">
                                            <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <input type="text" name="phone[]" placeholder="${window.translations.Téléphone}" class="form-control">
                                                <label>${window.translations.Téléphone}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Responsable du site -->
                                    <div class="col-3">
                                        <div class="form-group mb-3">
                                            <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <input type="text" name="responsable_name[]" placeholder="${window.translations.Responsable_du_Site}" class="form-control">
                                                <label>${window.translations.Responsable_du_Site}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-3">
                                        <div class="form-group mb-3">
                                            <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <input type="email" name="email[]" placeholder="${window.translations.Email}" class="form-control">
                                                <label>${window.translations.Email}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-3">
                                    <!-- Adresse -->
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <input type="text" name="address[]" placeholder="${window.translations.Adresse}" class="form-control">
                                                <label>${window.translations.Adresse}</label>
                                            </div>
                                        </div>
                                    </div>

                                       <!-- Pays -->
                                    <div class="col-3">
                                       <div class="form-group check-valid is-valid" style="height: 60px;">

                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                            <label>${window.translations.Pays}</label>
                                            <select class="chosenoptgroup w-100 filter-pays-site" name="country_id[]">
                                            </select>
                                        </div>
                                        </div>
                                    </div>

                                    <!-- Ville -->
                                    <div class="col-3">
                                      <div class="form-group check-valid is-valid" style="height: 60px;">
                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                            <label>${window.translations.Ville}</label>
                                            <select class="chosenoptgroup w-100 filter-ville-site" name="city_id[]">

                                            </select>
                                        </div>
                                        </div>
                                    </div>


                                </div>


                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    `;

        const newFilialeDiv = $(newFilialeHtml);
        $("#clientSiteTabContent").prepend(newFilialeDiv);




        populateOptions(
            newFilialeDiv.find('select[name="country_id[]"]').get(0),
            countries
        );

        // $("#country-select").on("change", function () {
        //     var countryId = $(this).val();
        //     const filteredCities = cities.filter(city => city.region && city.region.country_id == countryId);
        //     console.log(filteredCities);
        //     populateOptions(
        //         newFilialeDiv.find('select[name="city_id[]"]').get(0),
        //         filteredCities,
        //         );
        //
        //     newFilialeDiv.find('select[name="city_id[]"]').trigger('chosen:updated');
        //
        // })

        newFilialeDiv.find(".delete_div_site").on("click", function () {
            newFilialeDiv.remove();
            moveActionButtons();

        });



        newFilialeDiv.find("select.chosenoptgroup").chosen({
            allow_single_deselect: false, // Pas de désélection
            placeholder_text_single: "", // Pas de placeholder
            disable_search: false, // Désactiver la recherche
            no_results_text: "Aucun résultat trouvé", // Message personnalisé
        });

        // Si une option vide est créée, la supprimer
        newFilialeDiv.find('select.chosenoptgroup option[value=""]').remove();
        newFilialeDiv.find("select.chosenoptgroup").trigger("chosen:updated");
    });




    $(document).on("click", ".btn-existed-site-card-delete", function (e) {
        e.preventDefault();
        var $button = $(this);
        var $card = $button.closest(".div_create_site_existed"); // Carte du site existant

        var siteId = $button.data("site-id");
        Swal.fire({
            title: window.translations.Êtes_vous,
            text: window.translations.arrière,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5C6798",
            cancelButtonColor: "#F88DA5",
            confirmButtonText: window.translations.supprimez_le,
        }).then((result) => {
            if (result.isConfirmed) {
                // OB : La confirmation de suppression est effectuée
                $.ajax({
                    url: ApiClientDeleteSite.replace("siteId", siteId),
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        // Supprimer l'input `site_id[]` avant de retirer la carte
                        $card.find('input[name="site_id[]"]').remove();

                        // Retirer la carte du DOM
                        $card.remove();
                        Swal.fire(
                            window.translations.Supprimé,
                            window.translations.Site_supprimée,
                            window.translations.success
                        );
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            window.translations.title_erreur,
                            window.translations.la_suppression,
                            window.translations.error
                        );
                    },
                });
            }
        });
    });


    const $countrySelects = $(".filter-pays-site");
    const $citySelects = $(".filter-ville-site");



    $(document).on("change", ".filter-pays-site", function () {
        const $countrySelect = $(this);
        const $citySelect = $countrySelect
            .closest(".row")
            .find(".filter-ville-site");

        const selectedCountryId = $(this).val();
        resetCitySelect($citySelect);

        if (selectedCountryId === "Tous") {
            return;
        }

        const filteredCities = filterCitiesByCountry(selectedCountryId);
        if (filteredCities.length) {
            $.each(filteredCities, function (index, city) {
                $citySelect.append(
                    `<option value="${city.id}">${city.name}</option>`
                );
            });
        }

        $citySelect.trigger("chosen:updated");
    });

    function resetCitySelect($citySelect) {
        $citySelect.empty();
        $citySelect.append(`<option value="Tous">Tous</option>`);

    }


    function filterCitiesByCountry(countryId) {
        return cities.filter(city => city.region && city.region.country_id == countryId);
    }


    function populateCitySelect(filteredCities) {
        if (filteredCities.length) {
            $.each(filteredCities, function (index, city) {
                $citySelect.append(
                    `<option value="${city.id}">${city.name}</option>`
                );
            });
        }
    }
});



