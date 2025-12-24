'use strict';

$(document).ready(function () {
    // AJAX setup for CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let rowCountFormation = 1;
    let rowCountExperience = 1;
    let rowCountTechnicalSkills = 1;
    let rowCountPersonalSkills = 1;
    let rowCountLinguisticSkills = 1;
    let rowCountSalaryExpectation = 1;

    // ==================== FORM SUBMISSION ====================
    $('#mission-form').on('submit', function (e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const actionButton = $(document.activeElement);
        
        // Determine which button was clicked
        if (actionButton.attr('name') === 'action') {
            formData.append('action', actionButton.val());
        }

        const isEdit = $(this).data('mode') === 'edit';
        const jobOfferId = $(this).data('job-offer-id');
        
        let url = '/api/missions/storeJobOffer';
        let method = 'POST';
        
        if (isEdit && jobOfferId) {
            url = `/api/missions/updateJobOffer/${jobOfferId}`;
            method = 'PUT';
            // For PUT requests, we need to convert FormData to regular data
            const data = {};
            formData.forEach((value, key) => {
                if (data[key]) {
                    if (Array.isArray(data[key])) {
                        data[key].push(value);
                    } else {
                        data[key] = [data[key], value];
                    }
                } else {
                    data[key] = value;
                }
            });
            submitJobOffer(url, method, data, isEdit);
        } else {
            submitJobOffer(url, method, formData, isEdit);
        }
    });

    function submitJobOffer(url, method, data, isEdit) {
        const ajaxOptions = {
            url: url,
            method: method,
            processData: method === 'PUT',
            contentType: method === 'PUT' ? 'application/x-www-form-urlencoded; charset=UTF-8' : false,
            data: method === 'PUT' ? $.param(data) : data,
            success: function (response) {
                Swal.fire({
                    title: window.translations?.success_ats || 'Succès !',
                    text: response.message || (isEdit ? 'Offre modifiée avec succès' : 'Offre créée avec succès'),
                    icon: 'success',
                    confirmButtonText: window.translations?.OKconfirm || 'OK'
                }).then(() => {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        window.location.href = isEdit ? `/missions/${response.data?.id || ''}` : '/missions';
                    }
                });
            },
            error: function (xhr) {
                console.error("Erreur :", xhr);

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    let errorList = '<ul>';
                    for (let key in errors) {
                        if (Array.isArray(errors[key])) {
                            errors[key].forEach(err => {
                                errorList += `<li>${err}</li>`;
                            });
                        } else {
                            errorList += `<li>${errors[key]}</li>`;
                        }
                    }
                    errorList += '</ul>';

                    Swal.fire({
                        title: window.translations?.error_validation || 'Erreur de validation',
                        html: errorList,
                        icon: 'error',
                        confirmButtonText: window.translations?.OKconfirm || 'OK'
                    });
                } else {
                    Swal.fire({
                        title: window.translations?.error || 'Erreur',
                        text: xhr.responseJSON?.message || "Une erreur inattendue s'est produite.",
                        icon: 'error',
                        confirmButtonText: window.translations?.OKconfirm || 'OK'
                    });
                }
            }
        };

        $.ajax(ajaxOptions);
    }

    // ==================== CHOSEN INITIALIZATION ====================
    function initializeChosen() {
        $('.select-search-chosen').each(function () {
            if (!$(this).hasClass('chosen-initialized')) {
                $(this).chosen({
                    width: '100%',
                    disable_search_threshold: 10
                });
            }
        }).addClass("chosen-initialized");
    }

    // Initialize on page load
    initializeChosen();

    // ==================== CLIENT EVALUATORS ====================
    $('#client_id').on('change', function () {
        const clientId = $(this).val();
        const $evaluatorSelect = $('#client_evaluator');
        
        if (!clientId) {
            $evaluatorSelect.empty().append('<option value="">Sélectionner un évaluateur</option>');
            if ($evaluatorSelect.hasClass('chosen-initialized')) {
                $evaluatorSelect.trigger('chosen:updated');
            }
            return;
        }

        $.ajax({
            url: `/api/clients/${clientId}/evaluators`,
            method: 'GET',
            success: function (response) {
                $evaluatorSelect.empty();
                $evaluatorSelect.append('<option value="">Sélectionner un évaluateur</option>');
                
                if (response && response.length > 0) {
                    response.forEach(evaluator => {
                        $evaluatorSelect.append(`<option value="${evaluator.id}">${evaluator.name}</option>`);
                    });
                }
                
                if ($evaluatorSelect.hasClass('chosen-initialized')) {
                    $evaluatorSelect.trigger('chosen:updated');
                }
            },
            error: function (xhr) {
                console.error('Error loading evaluators:', xhr);
            }
        });
    });

    // ==================== FORMATION MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-formation", function () {
        rowCountFormation++;
        
        const newRow = `
            <div class="row mb-3 formation-row" id="formation-row-${rowCountFormation}">
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Formation</label>
                        <select name="formations[${rowCountFormation}][diploma_id_job_offer_formations]" 
                                class="form-select select-search-chosen" required>
                            <option value="">Sélectionner</option>
                            ${$('#diploma_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Option</label>
                        <select name="formations[${rowCountFormation}][option_id_job_offer_formations]" 
                                class="form-select select-search-chosen">
                            <option value="">Sélectionner</option>
                            ${$('#option_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids Formation</label>
                        <input type="number" name="formations[${rowCountFormation}][weight_formation_job_offer_formations]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids Option</label>
                        <input type="number" name="formations[${rowCountFormation}][weight_option_job_offer_formations]" 
                               class="form-control" min="0" max="100" value="50">
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-formation-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.formation-container').append(newRow);
        initializeChosen();
    });

    $(document).on("click", ".btn-remove-formation-row", function () {
        $(this).closest(".formation-row").remove();
    });

    // ==================== EXPERIENCE MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-experience", function () {
        rowCountExperience++;
        
        const newRow = `
            <div class="row mb-3 experience-row" id="experience-row-${rowCountExperience}">
                <div class="col-12 col-md-4 mb-2">
                    <div class="form-group">
                        <label>Poste</label>
                        <select name="experiences[${rowCountExperience}][profession_id_job_offer_experiences]" 
                                class="form-select select-search-chosen" required>
                            <option value="">Sélectionner</option>
                            ${$('#profession_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Années</label>
                        <input type="number" name="experiences[${rowCountExperience}][years_job_offer_experiences]" 
                               class="form-control" min="0" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids Poste</label>
                        <input type="number" name="experiences[${rowCountExperience}][weight_profession_job_offer_experiences]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids Expérience</label>
                        <input type="number" name="experiences[${rowCountExperience}][weight_experience_job_offer_experiences]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-experience-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.experience-container').append(newRow);
        initializeChosen();
    });

    $(document).on("click", ".btn-remove-experience-row", function () {
        $(this).closest(".experience-row").remove();
    });

    // ==================== TECHNICAL SKILLS MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-technical-skills", function () {
        rowCountTechnicalSkills++;
        
        const newRow = `
            <div class="row mb-3 technical-skill-row" id="technical-skill-row-${rowCountTechnicalSkills}">
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="technical_skills[${rowCountTechnicalSkills}][category_skills]" 
                                class="form-select select-search-chosen skill-category-technical" 
                                data-row="${rowCountTechnicalSkills}" required>
                            <option value="">Sélectionner</option>
                            ${$('#technical_category_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Compétence</label>
                        <select name="technical_skills[${rowCountTechnicalSkills}][label_skills]" 
                                class="form-select select-search-chosen skill-detail-technical-${rowCountTechnicalSkills}" required>
                            <option value="">Sélectionner catégorie d'abord</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Niveau</label>
                        <select name="technical_skills[${rowCountTechnicalSkills}][level_job_offers_skills]" 
                                class="form-select" required>
                            <option value="">Sélectionner</option>
                            <option value="1">Débutant</option>
                            <option value="2">Intermédiaire</option>
                            <option value="3">Avancé</option>
                            <option value="4">Expert</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids</label>
                        <input type="number" name="technical_skills[${rowCountTechnicalSkills}][weight_job_offers_skills]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-technical-skill-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.technical-skills-container').append(newRow);
        initializeChosen();
    });

    $(document).on("click", ".btn-remove-technical-skill-row", function () {
        $(this).closest(".technical-skill-row").remove();
    });

    // Update skills based on category
    $(document).on('change', '.skill-category-technical', function () {
        const categoryId = $(this).val();
        const rowId = $(this).data('row');
        const $skillSelect = $(`.skill-detail-technical-${rowId}`);
        
        if (!categoryId) {
            $skillSelect.empty().append('<option value="">Sélectionner catégorie d\'abord</option>');
            if ($skillSelect.hasClass('chosen-initialized')) {
                $skillSelect.trigger('chosen:updated');
            }
            return;
        }
        
        const skills = window.technicalSkills ? window.technicalSkills.filter(s => s.parent_id == categoryId) : [];
        $skillSelect.empty();
        
        if (skills.length > 0) {
            $skillSelect.append('<option value="">Sélectionner</option>');
            skills.forEach(skill => {
                $skillSelect.append(`<option value="${skill.id}">${skill.label}</option>`);
            });
        } else {
            $skillSelect.append('<option value="">Aucune compétence disponible</option>');
        }
        
        if ($skillSelect.hasClass('chosen-initialized')) {
            $skillSelect.trigger('chosen:updated');
        }
    });

    // ==================== PERSONAL SKILLS MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-personal-skills", function () {
        rowCountPersonalSkills++;
        
        const newRow = `
            <div class="row mb-3 personal-skill-row" id="personal-skill-row-${rowCountPersonalSkills}">
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="personal_skills[${rowCountPersonalSkills}][category_skills]" 
                                class="form-select select-search-chosen skill-category-personal" 
                                data-row="${rowCountPersonalSkills}" required>
                            <option value="">Sélectionner</option>
                            ${$('#personal_category_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Compétence</label>
                        <select name="personal_skills[${rowCountPersonalSkills}][label_skills]" 
                                class="form-select select-search-chosen skill-detail-personal-${rowCountPersonalSkills}" required>
                            <option value="">Sélectionner catégorie d'abord</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Niveau</label>
                        <select name="personal_skills[${rowCountPersonalSkills}][level_job_offers_skills]" 
                                class="form-select" required>
                            <option value="">Sélectionner</option>
                            <option value="1">Débutant</option>
                            <option value="2">Intermédiaire</option>
                            <option value="3">Avancé</option>
                            <option value="4">Expert</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids</label>
                        <input type="number" name="personal_skills[${rowCountPersonalSkills}][weight_job_offers_skills]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-personal-skill-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.personal-skills-container').append(newRow);
        initializeChosen();
    });

    $(document).on("click", ".btn-remove-personal-skill-row", function () {
        $(this).closest(".personal-skill-row").remove();
    });

    // Update skills based on category
    $(document).on('change', '.skill-category-personal', function () {
        const categoryId = $(this).val();
        const rowId = $(this).data('row');
        const $skillSelect = $(`.skill-detail-personal-${rowId}`);
        
        if (!categoryId) {
            $skillSelect.empty().append('<option value="">Sélectionner catégorie d\'abord</option>');
            if ($skillSelect.hasClass('chosen-initialized')) {
                $skillSelect.trigger('chosen:updated');
            }
            return;
        }
        
        const skills = window.personalSkills ? window.personalSkills.filter(s => s.parent_id == categoryId) : [];
        $skillSelect.empty();
        
        if (skills.length > 0) {
            $skillSelect.append('<option value="">Sélectionner</option>');
            skills.forEach(skill => {
                $skillSelect.append(`<option value="${skill.id}">${skill.label}</option>`);
            });
        } else {
            $skillSelect.append('<option value="">Aucune compétence disponible</option>');
        }
        
        if ($skillSelect.hasClass('chosen-initialized')) {
            $skillSelect.trigger('chosen:updated');
        }
    });

    // ==================== LINGUISTIC SKILLS MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-linguistic-skills", function () {
        rowCountLinguisticSkills++;
        
        const newRow = `
            <div class="row mb-3 linguistic-skill-row" id="linguistic-skill-row-${rowCountLinguisticSkills}">
                <div class="col-12 col-md-3 mb-2">
                    <div class="form-group">
                        <label>Langue</label>
                        <select name="linguistic_skills[${rowCountLinguisticSkills}][label_skills]" 
                                class="form-select select-search-chosen" required>
                            <option value="">Sélectionner</option>
                            ${$('#language_template option').clone().html()}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Niveau Écrit</label>
                        <select name="linguistic_skills[${rowCountLinguisticSkills}][level_writing_job_offers_skills]" 
                                class="form-select" required>
                            <option value="">Sélectionner</option>
                            <option value="1">A1</option>
                            <option value="2">A2</option>
                            <option value="3">B1</option>
                            <option value="4">B2</option>
                            <option value="5">C1</option>
                            <option value="6">C2</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Niveau Oral</label>
                        <select name="linguistic_skills[${rowCountLinguisticSkills}][level_oral_job_offers_skills]" 
                                class="form-select" required>
                            <option value="">Sélectionner</option>
                            <option value="1">A1</option>
                            <option value="2">A2</option>
                            <option value="3">B1</option>
                            <option value="4">B2</option>
                            <option value="5">C1</option>
                            <option value="6">C2</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-1 mb-2">
                    <div class="form-group">
                        <label>Poids Écrit</label>
                        <input type="number" name="linguistic_skills[${rowCountLinguisticSkills}][weight_writing_job_offers_skills]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-1 mb-2">
                    <div class="form-group">
                        <label>Poids Oral</label>
                        <input type="number" name="linguistic_skills[${rowCountLinguisticSkills}][weight_oral_job_offers_skills]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-1 mb-2">
                    <div class="form-group">
                        <label>Poids Global</label>
                        <input type="number" name="linguistic_skills[${rowCountLinguisticSkills}][weight_job_offers_skills]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-linguistic-skill-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.linguistic-skills-container').append(newRow);
        initializeChosen();
    });

    $(document).on("click", ".btn-remove-linguistic-skill-row", function () {
        $(this).closest(".linguistic-skill-row").remove();
    });

    // ==================== SALARY EXPECTATION MANAGEMENT ====================
    $(document).on("click", ".btn-add-row-salary", function () {
        rowCountSalaryExpectation++;
        
        const newRow = `
            <div class="row mb-3 salary-row" id="salary-row-${rowCountSalaryExpectation}">
                <div class="col-12 col-md-4 mb-2">
                    <div class="form-group">
                        <label>Montant Minimum</label>
                        <input type="number" name="salaires[${rowCountSalaryExpectation}][montant_min]" 
                               class="form-control" min="0" required>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <div class="form-group">
                        <label>Montant Maximum</label>
                        <input type="number" name="salaires[${rowCountSalaryExpectation}][montant_max]" 
                               class="form-control" min="0" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2">
                    <div class="form-group">
                        <label>Poids</label>
                        <input type="number" name="salaires[${rowCountSalaryExpectation}][weight]" 
                               class="form-control" min="0" max="100" value="50" required>
                    </div>
                </div>
                <div class="col-12 col-md-2 mb-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-salary-row w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `;
        
        $(this).closest('.card-body').find('.salary-container').append(newRow);
    });

    $(document).on("click", ".btn-remove-salary-row", function () {
        $(this).closest(".salary-row").remove();
    });

    // ==================== TOGGLE LICENSE TYPE ====================
    window.toggleLicenseType = function () {
        const hasDrivingLicense = $('#has_driving_license').val();
        const $licenseTypeContainer = $('#license-type-container');
        
        if (hasDrivingLicense === 'true' || hasDrivingLicense === '1') {
            $licenseTypeContainer.removeClass('d-none').show();
        } else {
            $licenseTypeContainer.addClass('d-none').hide();
        }
    };

    // Initialize license type visibility on page load
    if ($('#has_driving_license').length) {
        toggleLicenseType();
        $('#has_driving_license').on('change', toggleLicenseType);
    }

    // ==================== CKEDITOR ====================
    if (typeof ClassicEditor !== 'undefined') {
        $(window).on('load', function () {
            const editorConfigs = [
                'company_info',
                'formation_details',
                'experience_details',
                'mission_details',
                'Responsibilities_details',
                'technical_skills_details',
                'personal_skills_details'
            ];

            editorConfigs.forEach(configName => {
                const element = document.querySelector(`#${configName}`);
                if (element) {
                    ClassicEditor.create(element, {
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
                    }).catch(error => {
                        console.error(`Error initializing CKEditor for ${configName}:`, error);
                    });
                }
            });
        });
    }

});
