$(document).ready(function () {
    $("#addEditDataEvaluator").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: ApiClientCreateEvaluators,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succès!",
                    text: "Evaluateur ajouté avec succès !",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(response);
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
                        title: "Erreur!",
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Une erreur est survenue lors de l'ajout du Client .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
        });
    });

    $("#editDataEvaluator").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: ApiClientEditEvaluator,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succès!",
                    text: "Evaluateur ajouté avec succès !",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(response);
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
                        title: "Erreur!",
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                } else {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Une erreur est survenue lors de l'ajout du Client .",
                        icon: "error",
                        confirmButtonText: "Fermer",
                    });
                }
            },
        });
    });

    function populateProfessionsOptions(select, data) {
        let options = ``;
        if (data && Array.isArray(data)) {
            data.forEach((item) => {
                options += `<option value="${item.id}">${item.label}</option>`;
            });
        }

        // Si 'select' est déjà un élément DOM, on modifie son innerHTML
        if (select instanceof HTMLElement) {
            select.innerHTML = options;
        }
        // Sinon, on le trouve via querySelector
        else {
            document.querySelector(select).innerHTML = options;
        }
    }
    function populateTypesEvaluationOptions(select, data) {
        let options = ``;
        if (data && Array.isArray(data)) {
            data.forEach((item) => {
                options += `<option value="${item.id}">${item.name}</option>`;
            });
        }

        // Si 'select' est déjà un élément DOM, on modifie son innerHTML
        if (select instanceof HTMLElement) {
            select.innerHTML = options;
        }
        // Sinon, on le trouve via querySelector
        else {
            document.querySelector(select).innerHTML = options;
        }
    }

    $("#addEvaluatorBtn").on("click", function () {
        // Obtenir l'index actuel des évaluateurs
        const evaluatorIndex = $(".card-evaluator").length;

        // Structure HTML de l'évaluateur (remplacée dynamiquement)
        const evaluatorHTML = `
        <div class="card border-0 card-evaluator mt-4" data-index="${evaluatorIndex}"  >
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-10">
                                        <h4 class="title custom-title">Evaluateur</h4>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="row mb-3" style="padding-left: 10px">

                                            <div class="col-2" style="width: 9%;">
                                                <div class="col-auto position-relative">
                                                    <figure
                                                                                    class="logo-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                                    style="background-size: 80px;  line-height: 0 !important; margin-top: 2px !important; ">
                                                                                    <img
                                                                                        src="/assets/img/icon/empty-logo2.png"
                                                                                        class="client-logo custom-file-input"
                                                                                        style="display: block; width: 100%; height: 100%; object-fit: cover;"
                                                                                        alt=""/>
                                                                                </figure>
                                                    <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto" style="top: 78% !important;left: 60%;">
                                                        <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                            <i class="bi bi-camera"></i>
                                                            <input type="file" name="path_logo[${evaluatorIndex}]"
                                                                   class="custom-file-input clientEvaluatorLogolightinput"
                                                                   accept="image/*" />
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-3" style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="first_name[${evaluatorIndex}]" placeholder="Prénom" class="form-control border-start-0">
                                                        <label>Prénom</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-3" style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="last_name[${evaluatorIndex}]" placeholder="Nom" class="form-control border-start-0">
                                                        <label>Nom</label>
                                                    </div>
                                                </div>
                                            </div>

                                                 <div class="col-12 col-md-6 col-lg-3"
                                                                             style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                <div class="form-floating">
                                                                                    <input type="text" name="email[${evaluatorIndex}]"
                                                                                           placeholder="Email"
                                                                                           class="form-control border-start-0 translated_text">
                                                                                    <label class="translated_text">Email</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="invalid-feedback translated_text">Please enter valid
                                                                                input</div>
                                                                        </div>

                                            <div class="col-12 col-md-6 col-lg-3" style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label>Poste</label>
                                                    <select name="profession_id[${evaluatorIndex}]" class="chosenoptgroup w-100 form-select border-start-0">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent" style="padding-right: 0;margin-top: 26px;width: 30%;">
                                                <div class="types_evaluation_div">
                                                    <div class="row mb-3 type_evaluation_div">
                                                        <div class="col-12" style="width: 61%;margin-right: -10px;">
                                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <select class="form-select border-0" name="evaluation_type_id[${evaluatorIndex}][]">

                                                                    </select>
                                                                    <label>Type d'évaluation</label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-2" style="width: 28%;margin-right: -12px;">
                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="number" name="coefficient[${evaluatorIndex}][]" class="form-control border-start-0">
                                                                        <label>Coefficient</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                          <div class="col-12 col-md-6 col-lg-2 add-type-evaluation"
                                                                style="width: 6%;margin-top: 16px;" >
                                                                <i class="bi bi-plus-square" style="color: #005DC7;font-size: 25px;"></i>
                                                            </div>


                                                          <div class="col-12 col-md-6 col-lg-2 btn-type-evaluation-delete hidden"
                                                                style="width: 6%;margin-top: 16px;">
                                                                <i class="bi bi-trash text-red"
                                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                                   title="Supprimer type d'évaluation"
                                                                   style="font-size: 25px"></i>
                                                            </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row mt-2 mb-4 justify-content-end" style="float: right; margin-right: 5px">
                                <div class="col-2 delete-card-evaluator">
                                      <button class="btn btn-danger mnw-100" type="button" style="font-size: 12px;float: right;width: 100px">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

        const newEvaluatorDiv = $(evaluatorHTML);

        $("#EvaluatorsTabContent").append(newEvaluatorDiv);

        populateProfessionsOptions(
            newEvaluatorDiv
                .find(`select[name="profession_id[${evaluatorIndex}]"]`)
                .get(0),
            professions
        );
        populateTypesEvaluationOptions(
            newEvaluatorDiv
                .find(`select[name="evaluation_type_id[${evaluatorIndex}][]"]`)
                .get(0),
            types_evaluations
        );

        newEvaluatorDiv.find("select.chosenoptgroup").chosen({
            allow_single_deselect: false, // Pas de désélection
            placeholder_text_single: "", // Pas de placeholder
            disable_search: false, // Désactiver la recherche
            no_results_text: "Aucun résultat trouvé", // Message personnalisé
        });

        newEvaluatorDiv.find('select.chosenoptgroup option[value=""]').remove();
        newEvaluatorDiv.find("select.chosenoptgroup").trigger("chosen:updated");

        newEvaluatorDiv.find(".delete-card-evaluator").on("click", function () {
            newEvaluatorDiv.remove();
        });
    });

    $(document).on("click", ".add-type-evaluation", function () {
        const $parentDiv = $(this).closest(".card-evaluator");

        const evaluatorIndex = $parentDiv.data("index");

        const evaluationTypeIndex = $parentDiv.find(
            ".type_evaluation_div"
        ).length;

        const newEvaluationTypeDiv = $parentDiv
            .find(".type_evaluation_div:first")
            .clone();

        newEvaluationTypeDiv.find("input, textarea, select").each(function () {
            const name = $(this).attr("name");
            if (name) {
                const updatedName = name.replace(
                    /\[\d+\]\[\d*\]/,
                    `[${evaluatorIndex}][${evaluationTypeIndex}]`
                );
                $(this).attr("name", updatedName).val("");
            }
        });

        newEvaluationTypeDiv.find(".add-type-evaluation").addClass("hidden");

        newEvaluationTypeDiv
            .find(".btn-type-evaluation-delete")
            .removeClass("hidden")
            .attr("data-bs-toggle", "tooltip")
            .attr("title", "Remove this evaluation type");

        $('[data-bs-toggle="tooltip"]').tooltip();

        $parentDiv.find(".types_evaluation_div").append(newEvaluationTypeDiv);
    });

    $(document).on("click", ".btn-type-evaluation-delete", function (e) {
        var $button = $(this);
        var $parentDiv = $button.closest(".type_evaluation_div"); // Get the closest parent div
        $button.closest(".type_evaluation_div").remove();
    });

    $(document).on("click", ".btn-type-evaluation-delete", function (e) {
        var $button = $(this);
        var $parentDiv = $button.closest(".type_evaluation_div"); // Get the closest parent div
        $button.closest(".type_evaluation_div").remove();
    });

    $(document).on("click", ".btn-evaluator-card-delete", function (e) {
        var $button = $(this);
        $button.closest(".card-evaluator").remove();
    });

    $(document).on("change", ".evaluatorLogolightinput", function () {
        // S'assurer que l'événement fonctionne sur les nouvelles cartes
        let input = this; // L'input déclencheur
        let parentCard = $(input).closest(".card-evaluator"); // Trouver la carte parente
        console.log(parentCard);
        if (input.files && input.files[0]) {
            let file = input.files[0];

            // Vérifier que le fichier est une image
            if (!file.type.startsWith("image/")) {
                alert("Veuillez sélectionner une image valide.");
                return;
            }

            let reader = new FileReader();

            reader.onload = function (e) {
                let imageUrl = e.target.result; // Obtenir l'URL de l'image depuis FileReader

                // Mettre à jour uniquement le logo ET le fond de la carte correspondante
                parentCard
                    .find(".logo-figure img.client-logo")
                    .attr("src", imageUrl);
                parentCard.find(".logo-figure").css({
                    "background-image": `url(${imageUrl})`,
                    "background-size": "cover",
                    "background-position": "center",
                });
            };

            reader.readAsDataURL(file); // Lire l'image comme URL de données
        } else {
            // Si aucun fichier n'est sélectionné, réinitialiser uniquement la carte correspondante
            parentCard
                .find(".logo-figure img.client-logo")
                .attr("src", "default-avatar.png");
            parentCard.find(".logo-figure").css("background-image", "none");
        }
    });
});
