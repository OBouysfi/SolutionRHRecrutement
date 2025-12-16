document.addEventListener("DOMContentLoaded", function () {
    const btnSuivant = document.getElementById("btn-suivant");
    const form = document.getElementById("jobOfferForm");

    // Disable browser's default validation
    form.setAttribute("novalidate", "");

    function addInputListeners() {
        const form = document.getElementById("jobOfferForm");

        // Pour les inputs standards
        form.addEventListener("input", function (e) {
            if (e.target.hasAttribute("required")) {
                const formGroup = e.target.closest(".form-group");
                if (formGroup && e.target.value.trim()) {
                    formGroup.classList.remove("is-not-valid");
                    formGroup.classList.add("is-valid");
                }
            }
        });

        // Pour les selects standards
        form.addEventListener("change", function (e) {
            if (
                e.target.tagName === "SELECT" &&
                e.target.hasAttribute("required")
            ) {
                const formGroup = e.target.closest(".form-group");
                if (formGroup && e.target.value.trim()) {
                    formGroup.classList.remove("is-not-valid");
                    formGroup.classList.add("is-valid");
                }
            }
        });

        // Pour les selects Chosen
        $(form).on("change", "select.chosenoptgroup", function (e) {
            if (this.hasAttribute("required")) {
                const formGroup = this.closest(".form-group");
                if (formGroup && this.value.trim()) {
                    formGroup.classList.remove("is-not-valid");
                    formGroup.classList.add("is-valid");
                }
            }
        });
    }
    // Add input listeners to both tabs
    addInputListeners();

    function getRequiredInputs(tab) {
        if (tab === 1) {
            const requiredInputsTab1 = document.querySelectorAll(
                "#personal input[required], #personal select[required], #personal textarea[required]"
            );
            console.log(requiredInputsTab1);
            return requiredInputsTab1;
        } else if (tab === 2) {
            const requiredInputsTab2 = document.querySelectorAll(
                "#personal2 input[required], #personal2 select[required], #personal2 textarea[required]"
            );
            return requiredInputsTab2;
        }
    }

    function validateInputs(inputs, tabNumber) {
        let isValid = true;

        // Reset all form groups
        inputs.forEach((input) => {
            const formGroup = input.closest(".form-group");
            if (formGroup) {
                formGroup.classList.remove("is-not-valid");
            }
        });

        // Check each required input
        inputs.forEach((input) => {
            if (!input.value.trim()) {
                isValid = false;
                const formGroup = input.closest(".form-group");
                if (formGroup) {
                    formGroup.classList.add("is-not-valid");
                    formGroup.classList.remove("is-valid");
                }
            }
        });

        // Vérifier les radios de disponibilité seulement dans le tab 2
        if (tabNumber === 2) {
            // Validation de la disponibilité
            const availabilityRadios = document.querySelectorAll(
                'input[name="mobilitys[availabilitys][type]"]'
            );
            const availabilityLabel = document.querySelector(
                "#mobilitys-availabilitys-label .form-group"
            );
            let availabilitySelected = false;

            availabilityRadios.forEach((radio) => {
                if (radio.checked) {
                    availabilitySelected = true;
                    if (availabilityLabel) {
                        availabilityLabel.classList.remove("is-not-valid");
                        availabilityLabel.classList.add("is-valid");
                    }
                }
            });

            if (!availabilitySelected) {
                isValid = false;
                if (availabilityLabel) {
                    availabilityLabel.classList.add("is-not-valid");
                    availabilityLabel.classList.remove("is-valid");
                }
            }

            // Validation de la mobilité géographique
            const geographicMobilityInputs = [
                document.querySelector(
                    'input[name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"]'
                ),
            ];

            let geographicMobilitySelected = false;
            const geographicMobilityLabel = document.querySelector(
                "#mobilitys-geographic-label .form-group"
            );

            geographicMobilityInputs.forEach((input) => {
                if (input && input.checked) {
                    geographicMobilitySelected = true;
                }
            });

            if (!geographicMobilitySelected) {
                isValid = false;
                geographicMobilityLabel.classList.add("is-not-valid");
                geographicMobilityLabel.classList.remove("is-valid");
            } else {
                geographicMobilityLabel.classList.remove("is-not-valid");
                geographicMobilityLabel.classList.add("is-valid");
            }

            // Validation du Mode de travail
            const workModeInputs = [
                document.querySelector(
                    'input[name="mobilitys[with_echelle][work_modes][onsite][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][work_modes][remote][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][work_modes][hybrid][is_active]"]'
                ),
            ];

            let workModeSelected = false;
            const workModeLabel = document.querySelector(
                "#mobilitys-work-mode-label .form-group"
            );

            workModeInputs.forEach((input) => {
                if (input && input.checked) {
                    workModeSelected = true;
                }
            });

            if (!workModeSelected) {
                isValid = false;
                workModeLabel.classList.add("is-not-valid");
                workModeLabel.classList.remove("is-valid");
            } else {
                workModeLabel.classList.remove("is-not-valid");
                workModeLabel.classList.add("is-valid");
            }

            // Validation du Temps de travail
            const workingHoursInputs = [
                document.querySelector(
                    'input[name="mobilitys[with_echelle][working_hours][full_time][is_active]"]'
                ),
                document.querySelector(
                    'input[name="mobilitys[with_echelle][working_hours][part_time][is_active]"]'
                ),
            ];

            let workingHoursSelected = false;
            const workingHoursLabel = document.querySelector(
                "#mobilitys-working-hours-label .form-group"
            );

            workingHoursInputs.forEach((input) => {
                if (input && input.checked) {
                    workingHoursSelected = true;
                }
            });

            if (!workingHoursSelected) {
                isValid = false;
                workingHoursLabel.classList.add("is-not-valid");
                workingHoursLabel.classList.remove("is-valid");
            } else {
                workingHoursLabel.classList.remove("is-not-valid");
                workingHoursLabel.classList.add("is-valid");
            }
        }

        return isValid;
    }

    function scrollToFirstInvalid(inputs) {
        const firstInvalid = Array.from(inputs).find(
            (input) => !input.value.trim()
        );
        if (firstInvalid) {
            // For Chosen selects, scroll to the parent container
            if (firstInvalid.classList.contains("chosenoptgroup")) {
                const chosenContainer = firstInvalid.closest(".form-group");
                if (chosenContainer) {
                    chosenContainer.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                }
            } else {
                firstInvalid.scrollIntoView({
                    behavior: "smooth",
                    block: "center",
                });
            }

            // Try to focus the input if possible
            try {
                firstInvalid.focus();
            } catch (e) {
                // Ignore focus errors
            }
        }
    }

    // Handle "Suivant" button click
    btnSuivant.addEventListener("click", function (e) {
        const requiredInputs = getRequiredInputs(1);
        const isValid = validateInputs(requiredInputs, 1);

        if (isValid) {
            const nextTab = document.querySelector("#personal2-tab");
            const tab = new bootstrap.Tab(nextTab);
            tab.show();
        } else {
            scrollToFirstInvalid(requiredInputs);
        }
    });

    // Handle form submission
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const requiredInputsTab1 = getRequiredInputs(1);
        const requiredInputsTab2 = getRequiredInputs(2);

        const tab1Valid = validateInputs(requiredInputsTab1, 1);
        const tab2Valid = validateInputs(requiredInputsTab2, 2);

        if (tab1Valid && tab2Valid) {
            // ✅ Si tout est valide → désactiver les boutons + ajouter spinner
            disableAllButtons(e);

            // If all validations pass, submit the form
            form.submit();
        } else {
            // If tab 1 is invalid, switch to tab 1 and scroll to first invalid input
            if (!tab1Valid) {
                const tab1 = document.querySelector("#personal-tab");
                const bsTab1 = new bootstrap.Tab(tab1);
                bsTab1.show();
                // Small delay to ensure tab switch is complete
                setTimeout(() => {
                    scrollToFirstInvalid(requiredInputsTab1);
                }, 200);
            }
            // If tab 2 is invalid, scroll to first invalid input
            else if (!tab2Valid) {
                // Small delay to ensure tab switch is complete
                setTimeout(() => {
                    scrollToFirstInvalid(requiredInputsTab2);
                }, 200);
            }
        }
    });

    // Protection côté front-end : désactiver le bouton submit après le premier clic
    function disableAllButtons(event) {
        const form = event.target;

        const buttons = form.querySelectorAll("button");
        buttons.forEach((btn) => {
            btn.disabled = true;
        });

        const clickedButton =
            event.submitter ?? form.querySelector('button[type="submit"]');
        if (clickedButton) {
            clickedButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-1 translated_text" role="status" aria-hidden="true"></span> En cours...';
        }
    }

    // Add change listener for availability type radio buttons
    const availabilityRadios = document.querySelectorAll(
        'input[name="mobilitys[availabilitys][type]"]'
    );
    const noticeDurationSelect = document.getElementById("notice_duration");

    availabilityRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            const noticeDurationFormGroup =
                noticeDurationSelect.closest(".form-group");
            if (this.value === "notice") {
                noticeDurationSelect.setAttribute("required", "required");
                // When "Préavis" is selected, validate the notice duration
                if (!noticeDurationSelect.value.trim()) {
                    noticeDurationFormGroup.classList.add("is-not-valid");
                    noticeDurationFormGroup.classList.remove("is-valid");
                }
            } else {
                noticeDurationSelect.removeAttribute("required");
                // When "Immédiate" is selected, remove validation classes
                noticeDurationFormGroup.classList.remove("is-not-valid");
                noticeDurationFormGroup.classList.add("is-valid");
            }
        });
    });

    // Add change listener for notice duration select
    noticeDurationSelect.addEventListener("change", function () {
        const noticeRadio = document.querySelector(
            'input[name="mobilitys[availabilitys][type]"][value="notice"]'
        );
        if (noticeRadio && noticeRadio.checked) {
            const formGroup = this.closest(".form-group");
            if (this.value.trim()) {
                formGroup.classList.remove("is-not-valid");
                formGroup.classList.add("is-valid");
            } else {
                formGroup.classList.add("is-not-valid");
                formGroup.classList.remove("is-valid");
            }
        }
    });

    // Ajouter un écouteur d'événements pour les radios de disponibilité
    const availabilityRadios2 = document.querySelectorAll(
        'input[name="mobilitys[availabilitys][type]"]'
    );
    const availabilityLabel = document.querySelector(
        "#mobilitys-availabilitys-label .form-group"
    );

    availabilityRadios2.forEach((radio) => {
        radio.addEventListener("change", function () {
            if (availabilityLabel) {
                availabilityLabel.classList.remove("is-not-valid");
                availabilityLabel.classList.add("is-valid");
            }
        });
    });

    // Ajouter un écouteur d'événements pour les checkboxes de mobilité géographique
    const geographicMobilityInputs = document.querySelectorAll(`
        input[name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"],
        input[name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"],
        input[name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"],
        input[name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"]
    `);

    const geographicMobilityLabel = document.querySelector(
        "#mobilitys-geographic-label .form-group"
    );

    geographicMobilityInputs.forEach((input) => {
        input.addEventListener("change", function () {
            let anyChecked = Array.from(geographicMobilityInputs).some(
                (input) => input.checked
            );
            if (geographicMobilityLabel) {
                if (anyChecked) {
                    geographicMobilityLabel.classList.remove("is-not-valid");
                    geographicMobilityLabel.classList.add("is-valid");
                } else {
                    geographicMobilityLabel.classList.add("is-not-valid");
                    geographicMobilityLabel.classList.remove("is-valid");
                }
            }
        });
    });

    // Ajouter un écouteur d'événements pour les checkboxes du Mode de travail
    const workModeInputs = document.querySelectorAll(`
        input[name="mobilitys[with_echelle][work_modes][onsite][is_active]"],
        input[name="mobilitys[with_echelle][work_modes][remote][is_active]"],
        input[name="mobilitys[with_echelle][work_modes][hybrid][is_active]"]
    `);

    const workModeLabel = document.querySelector(
        "#mobilitys-work-mode-label .form-group"
    );

    workModeInputs.forEach((input) => {
        input.addEventListener("change", function () {
            let anyChecked = Array.from(workModeInputs).some(
                (input) => input.checked
            );
            if (workModeLabel) {
                if (anyChecked) {
                    workModeLabel.classList.remove("is-not-valid");
                    workModeLabel.classList.add("is-valid");
                } else {
                    workModeLabel.classList.add("is-not-valid");
                    workModeLabel.classList.remove("is-valid");
                }
            }
        });
    });

    // Ajouter un écouteur d'événements pour les checkboxes du Temps de travail
    const workHoursInputs = document.querySelectorAll(`
        input[name="mobilitys[with_echelle][working_hours][full_time][is_active]"],
        input[name="mobilitys[with_echelle][working_hours][part_time][is_active]"]
    `);

    const workHoursLabel = document.querySelector(
        "#mobilitys-working-hours-label .form-group"
    );

    workHoursInputs.forEach((input) => {
        input.addEventListener("change", function () {
            let anyChecked = Array.from(workHoursInputs).some(
                (input) => input.checked
            );
            if (workHoursLabel) {
                if (anyChecked) {
                    workHoursLabel.classList.remove("is-not-valid");
                    workHoursLabel.classList.add("is-valid");
                } else {
                    workHoursLabel.classList.add("is-not-valid");
                    workHoursLabel.classList.remove("is-valid");
                }
            }
        });
    });
});
