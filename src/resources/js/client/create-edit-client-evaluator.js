$(document).ready(function () {
    $("#addEditDataEvaluator").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: evaluators
                ? ApiClientEditEvaluators
                : ApiClientCreateEvaluators,
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
                    text: evaluators
                        ? window.translations.message_succes
                        : window.translations.text,
                    icon: "success",
                    confirmButtonText: window.translations.confirm,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // var url = "/clients";
                        // location.href = url;

                        $("#evaluateurs-tab").removeClass("active");
                        $("#admin-tab").trigger("click");
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
                        text: window.translations.message_erreur,
                        icon: "error",
                        confirmButtonText: window.translations.button,
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

        const evaluatorHTML = `
        <div class="card border-0 card-evaluator mb-4" data-index="${evaluatorIndex}">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">

                                    <h6 class="fw-medium mb-0 translated_text">${window.translations.Evaluateur}</h6>

                                </div>
                            </div>
                            <div class="card-body">
                              <div class="row mt-2 mb-4 justify-content-end">
                                <div class="col-2 delete-card-evaluator">
                                      <button class="btn btn-danger mnw-100" type="button" style="font-size: 12px;float: right;width: 100px">${window.translations.Supprimer}</button>
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="row mb-3" style="padding-left: 10px">

                                            <div class="col-2" style="width: 9%;">
                                                <div class="col-auto position-relative">
                                                    <figure class="logo-evaluator-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                        style="background-size: 119px; line-height: 0 !important; margin-top: 2px !important;">
                                                        <img src="{{ asset('assets/img/icon/photo-empty.png') }}"
                                                            class="client-evaluator-logo custom-file-input" alt="" />
                                                    </figure>
                                                    <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto" style="top: 78% !important;left: 60%;">
                                                        <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                            style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">


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
                                                        <input type="text" name="first_name[${evaluatorIndex}]" placeholder="${window.translations.Prénom}" class="form-control border-start-0">
                                                        <label>${window.translations.Prénom}</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12 col-md-6 col-lg-3" style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="last_name[${evaluatorIndex}]" placeholder="${window.translations.Nom}" class="form-control border-start-0">
                                                        <label>${window.translations.Nom}</label>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="col-12 col-md-6 col-lg-3"
                                                    style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="email[${evaluatorIndex}]"
                                                                placeholder="${window.translations.Email}"
                                                                class="form-control border-start-0 translated_text">
                                                            <label class="translated_text">${window.translations.Email}</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback translated_text">${window.translations.valid_input}</div>
                                                </div>

                                            <div class="col-12 col-md-6 col-lg-3" style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                                                                <div class="form-group check-valid is-valid">

                                                <div class="custom-multiple-select rounded border poste-chosen">
                                                    <label>${window.translations.Poste}</label>
                                                    <select name="profession_id[${evaluatorIndex}]" class="chosenoptgroup w-100 form-select border-start-0">

                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent" style="padding-right: 0;margin-top: 26px;width: 30%;">
                                                <div class="types_evaluation_div">
                                                    <div class="row mb-3 type_evaluation_div">
                                                            <div class="col-12 "
                                                                style="width: 61%;margin-right: -10px;">

                                                                <div class="form-group check-valid is-valid">

                                                                <div
                                                                    class="custom-multiple-select rounded border">
                                                                    <div class="form-floating">
                                                                        <label class="translated_text">${window.translations.evaluation}</label>

                                                                        <select class="form-select border-0"
                                                                            name="evaluation_type_id[${evaluatorIndex}][]">

                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <style>
                                                                    .no-search .chosen-search {
                                                                        display: none
                                                                    }
                                                                </style>
                                                                </div>
                                                            </div>

                                                        <div class="col-12 col-md-6 col-lg-2" style="width: 28%;margin-right: -12px;">
                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="number" name="coefficient[${evaluatorIndex}][]" class="form-control border-start-0">
                                                                        <label>${window.translations.Coefficient}</label>
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
                                                                   title="${window.translations.Email}"
                                                                   style="font-size: 25px"></i>
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



                </div>
            </div>

        </div>
    `;

        const newEvaluatorDiv = $(evaluatorHTML);
        // Ajouter le nouvel évalueur au contenu
        $("#EvaluatorsTabContent").prepend(newEvaluatorDiv);

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

        newEvaluatorDiv.find(".delete-card-evaluator").on("click", function () {
            newEvaluatorDiv.remove();
        });

        newEvaluatorDiv.find("select.chosenoptgroup").chosen({
            allow_single_deselect: false,
            placeholder_text_single: "",
            disable_search: false,
        });

        newEvaluatorDiv.find('select.chosenoptgroup option[value=""]').remove();
        newEvaluatorDiv.find("select.chosenoptgroup").trigger("chosen:updated");
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
                // Update the name attribute to include both evaluatorIndex and evaluationTypeIndex
                const updatedName = name.replace(
                    /\[\d+\]\[\d*\]/,
                    `[${evaluatorIndex}][${evaluationTypeIndex}]`
                );
                $(this).attr("name", updatedName).val(""); // Clear the input value
            }
        });

        newEvaluationTypeDiv.find(".add-type-evaluation").addClass("hidden");
        newEvaluationTypeDiv
            .find(".btn-type-evaluation-delete")
            .removeClass("hidden")
            .attr("data-bs-toggle", "tooltip") // Add Bootstrap tooltip attributes
            // .attr("title", window.translations.Remove_this_evaluation); // Tooltip text

        // Reinitialize tooltips (important to activate new tooltips in dynamically added elements)
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Append the new evaluation type div
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

    $(document).on("click", ".btn-existed-evaluator-card-delete", function (e) {
        e.preventDefault();
        var $button = $(this);
        var $card = $button.closest(".card-evaluator-existed");
        var evaluatorId = $button.data("evaluator-id");

        Swal.fire({
            title:  window.translations.Êtes_vous,
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
                    url: ApiClientDeleteEvaluator.replace(
                        "evaluatorId",
                        evaluatorId
                    ),
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        console.log("res", response);
                        $card.find('input[name="evaluatorId[]"]').remove();

                        // Retirer la carte du DOM
                        $card.remove();
                        Swal.fire(
                            window.translations.Supprimé,
                             window.translations.evaluateur_été_supprimée,
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

    $(document).on("change", ".clientEvaluatorLogolightinput", function () {
        let input = this; // Access the input element
        console.log("input", input);

        if (input.files && input.files[0]) {
            let file = input.files[0];

            // Check if the file is an image
            if (!file.type.startsWith("image/")) {
                alert(window.translations.alert);
                return;
            }

            let reader = new FileReader();

            reader.onload = function (e) {
                let imageUrl = e.target.result; // Get the image URL from FileReader

                // Find the closest figure and corresponding image within the same container
                let $container = $(input).closest(".position-relative"); // Adjust selector if needed
                let $figure = $container.find(".logo-evaluator-figure");
                let $img = $figure.find("img.client-evaluator-logo");

                // Update the image preview
                $img.attr("src", imageUrl);

                // Update the avatar figure background
                $figure.css({
                    "background-image": `url(${imageUrl})`,
                    "background-size": "cover",
                    "background-position": "center",
                });
            };

            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            let $container = $(input).closest(".position-relative");
            let $figure = $container.find(".logo-evaluator-figure");
            let $img = $figure.find("img.client-evaluator-logo");

            $img.attr("src", "default-avatar.png");
            $figure.css("background-image", "none");
        }
    });
});
