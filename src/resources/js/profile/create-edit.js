'use strict'
$(window).on('load', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const $civilitySection = $('#civillity-section');
    const $nameSection = $('#name-section');

    if ($civilitySection.length && $nameSection.length) {
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
            const activeTabId = event.target.id;
            if (activeTabId === 'sub-personal1-tab') {
                $civilitySection.show();
                $nameSection.hide();
            } else {
                $civilitySection.hide();
                $nameSection.show();
            }
        });
    }


    $("#file-input-video").change(function () {
        const fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            console.log("Selected file:", file);

            const formData = new FormData();
            formData.append('video', file);
            console.log(this.files[0]);
            $.ajax({
                url: apiUploadVideo,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.video_url) {
                        const videoPreview = `
                            <video controls style="width: 100%; margin-top: 10px;">
                                <source src="${response.video_url}" type="video/mp4">
                                ${window.translations.video_not_supported}
                            </video>`;
                        $("#video-preview").html(videoPreview);
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.file_uploaded,

                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errorMessage = window.translations.error + " " + window.translations.file_uploaded;
                    if (jqXHR.responseJSON && jqXHR.responseJSON.errors && jqXHR.responseJSON.errors.video) {
                        errorMessage = jqXHR.responseJSON.errors.video.join(' ');
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorMessage,
                    });
                },
            });
        }
    });

    $('#file-input-cv-parcing').on('change', function () {
        let file = this.files[0];

        if (!file) {
            Swal.fire({
                confirmButtonText: window.translations.confirm,
                icon: 'error',
                title: window.translations.select_file_title,
                html: errorMessages,
            });
            return;
        }

        let formData = new FormData();
        formData.append('cv', file);

        let timerInterval;
        Swal.fire({
            confirmButtonText: window.translations.confirm,
            title: window.translations.please_wait,
            html: `
                <p class="translated_text">${window.translations.please_wait_analysis}</p>
                <div class="progress" style="height: 20px;">
                    <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" 
                        role="progressbar" style="width: 0%; background-color: #005dc7;">
                    </div>
                </div>
            `,
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                let progress = 0;
                const progressBar = document.getElementById("progress-bar");

                const interval = setInterval(() => {
                    progress += 10;
                    progressBar.style.width = progress + "%";

                    if (progress >= 90) {
                        clearInterval(interval);
                    }
                }, 2200);
            }
        });

        $.ajax({
            url: '/api/profiles/parse-cv',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            },
            success: function (response) {
                if (response.profile_id) {
                    window.location.href = "/profiles/edit/" + encodeURIComponent(response.profile_id);
                } else {
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: window.translations.invalid_cv_data
                    });
                }
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'success',
                    title: window.translations.success,
                    html: window.translations.cv_parsed_success,
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    if (errors) {
                        for (let field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                errorMessages += `- ${errors[field].join(', ')}<br>`;
                            }
                        }
                    } else {
                        errorMessages = xhr.responseJSON.error
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.validation_error,
                        html: errorMessages, // Use `html` to display messages with line breaks
                    });
                } else {
                    // General error
                    const errorResponse = xhr.responseJSON;
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorResponse.error || window.translations.unexpected_error,
                    });
                }
            },
        });
    });

    $(".profileCvInput").change(function () {
        if (this.files && this.files[0]) {
            var formData = new FormData();
            formData.append('cv', this.files[0]);

            $.ajax({
                url: apiUploadCv,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.cv_url) {
                        // Update the avatar image `src`
                        // $('.avatar-figure img.profile-avatar').attr('src', response.avatar_url + '?' + new Date().getTime());

                        // // Update the avatar figure background
                        // $('.avatar-figure').css({
                        //     'background-image': `url(${response.avatar_url})`,
                        //     'background-size': 'cover',
                        //     'background-position': 'center',
                        // });
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.file_saved,
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errorMessage = window.translations.error + " " + window.translations.file_saved;
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        errorMessage = jqXHR.responseJSON.error;
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorMessage,
                    });
                },
            });
        }
    });


    $('#personal-category').on('change', function () {
        var selectedTypeId = $(this).val();
        $('#personal-skill').val('Tous');
        if (selectedTypeId === 'Tous') {
            $('#personal-skill option').show();
        } else {
            $('#personal-skill option').hide();
            $('#personal-skill option[value="Tous"]').show();
            $('#personal-skill option[data-skill-type="' + selectedTypeId + '"]').show();
        }
        $('#personal-skill').trigger("chosen:updated");
    });

    $('#technical-category').on('change', function () {
        var selectedTypeId = $(this).val();
        $('#technical-skill').val('Tous');
        if (selectedTypeId === 'Tous') {
            $('#technical-skill option').show();
        } else {
            $('#technical-skill option').hide();
            $('#technical-skill option[value="Tous"]').show();
            $('#technical-skill option[data-skill-type="' + selectedTypeId + '"]').show();
        }
        $('#technical-skill').trigger("chosen:updated");
    });

    // $('#personal-skill').on('change', function () {
    //     var selectedTypeId = $(this).val();
    //     $('#personal-level').val('Tous');
    //     if (selectedTypeId === 'Tous') {
    //         $('#personal-level option').show();
    //     } else {
    //         $('#personal-level option').hide();
    //         $('#personal-level option[value="Tous"]').show();
    //         $('#personal-level option[data-skill="' + selectedTypeId + '"]').show();
    //     }
    //     $('#personal-level').trigger("chosen:updated");
    // });

    $('#personal-skill').on('change', function () {
        var selectedSkillId = $(this).val();  // Get selected skill ID
        var selectedLevel = $(this).find('option:selected').data('level');  // Get the corresponding level
        console.log(selectedLevel);
        // Reset level selection to 'Tous'
        $('#personal-level').val('Tous');

        // Show all options if 'Tous' is selected, otherwise show the relevant options
        if (selectedSkillId === 'Tous') {
            $('#personal-level option').show();
        } else {
            $('#personal-level option').hide();
            $('#personal-level option[value="Tous"]').show(); // Always show 'Tous'

            // Show only the level corresponding to the selected skill
            $('#personal-level').val(selectedLevel).trigger("chosen:updated");
        }

        // Update Chosen.js or Select2 dropdown (if you're using it)
        // $('#personal-level').trigger("chosen:updated");
    });


    // $('#personal-level').on('change', function () {
    //     var selectedLevel = $(this).val();

    //     // Filter skill options based on level
    //     $('#personal-skill option').each(function () {
    //         var skillLevel = $(this).data('level');

    //         if (selectedLevel === 'Tous' || skillLevel == selectedLevel) {
    //             $(this).removeClass('d-none').prop('disabled', false);
    //         } else {
    //             $(this).addClass('d-none').prop('disabled', true);
    //         }
    //     });

    //     // Find the last visible (not disabled) skill option
    //     var $lastVisibleOption = $('#personal-skill option:not(.d-none):not([disabled])').last();

    //     // Set it as selected
    //     $('#personal-skill').val($lastVisibleOption.val());

    //     // Disable the entire select
    //     // $('#personal-skill').prop('disabled', true);

    //     // Update Chosen
    //     $('#personal-skill').trigger('chosen:updated');
    // });

    $(".profileCoverLetterInput").change(function () {
        if (this.files && this.files[0]) {
            var formData = new FormData();
            formData.append('cover_letter', this.files[0]);

            $.ajax({
                url: apiUploadCoverLetter,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.cover_letter_url) {
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.file_saved,
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errorMessage = window.translations.error + " " + window.translations.file_saved;
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        errorMessage = jqXHR.responseJSON.error;
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorMessage,
                    });
                },
            });
        }
    });

    $(".profileavatarlightinput").change(function () {
        if (this.files && this.files[0]) {
            var formData = new FormData();
            formData.append('profile_avatar', this.files[0]);

            $.ajax({
                url: apiChangeProfileAavatar, // Ensure this variable is defined and correct
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.avatar_url) {
                        // Update the avatar image `src`
                        $('.avatar-figure img.profile-avatar').attr('src', response.avatar_url + '?' + new Date().getTime());

                        // Update the avatar figure background
                        $('.avatar-figure').css({
                            'background-image': `url(${response.avatar_url})`,
                            'background-size': 'cover',
                            'background-position': 'center',
                        });
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.avatar_saved,
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errorMessage = "Une erreur s'est produite lors de la mise à jour de l'avatar.";
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        errorMessage = jqXHR.responseJSON.error;
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorMessage,
                    });
                },
            });
        }
    });

    $(".profilecoverlightinput").change(function () {
        if (this.files && this.files[0]) {
            var formData = new FormData();
            formData.append('profile_cover', this.files[0]);

            $.ajax({
                url: apiChangeProfileCover, // Ensure this variable is defined
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.cover_url) {
                        // Update the `src` of the image dynamically
                        $('.cover-figure img.profile-cover').attr('src', response.cover_url + '?' + new Date().getTime());

                        // Update the background of the figure dynamically
                        $('.cover-figure').css({
                            'background-image': `url(${response.cover_url})`,
                            'background-size': 'cover',
                            'background-position': 'center',
                        });
                    }

                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.cover_saved,
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    let errorMessage = "Une erreur s'est produite lors de la mise à jour de la couverture.";
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        errorMessage = jqXHR.responseJSON.error;
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorMessage,
                    });
                },
            });
        }
    });

    $(document).on('change', '.custom-file-input', function () {
        const input = this;
        const file = input.files[0];
        // const figure = $(input).closest('.col-auto').find('figure');
        // if (!figure) {
        const figure = $(input).closest('.position-relative').find('figure');
        // }

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                figure.css({
                    'background-image': `url(${e.target.result})`,
                    'background-size': 'cover',
                    'background-position': 'center',
                });
            };
            reader.readAsDataURL(file);
        } else {
            figure.css('background-image', 'url("/assets/img/icon/empty-logo.png")');
        }
    });

    // $('.fillter-technical-category').on('change', function () {
    //     var selectedCountryId = $(this).val();
    //     $('.fillter-technical-skill').val('Tous');

    //     if (selectedCountryId === 'Tous') {
    //         $('.fillter-technical-skill option').show();
    //     } else {
    //         $('.fillter-technical-skill option').hide();

    //         $('.fillter-technical-skill option[value="Tous"]').show();  // Toujours afficher l'option "Tous"
    //         $('.fillter-technical-skill option[data-country="' + selectedCountryId + '"]').show();
    //     }

    //     $('.fillter-technical-skill').trigger("chosen:updated");
    // });

});


let formations = [];
let certifications = [];
let experiences = [];
let technicalSkills = [];
let personalSkills = [];
let languages = [];
let recommandations = [];


$(document).on('click', '#saveSkills', function (e) {
    e.preventDefault();

    let technicalSkills = [];

    $('.filled-technical-skill-row').each(function () {
        technicalSkills.push({
            category: $(this).find('.filled-technical-category').val(),
            skill: $(this).find('.filled-technical-skill-name').val(),
            level: $(this).find('.filled-technical-level').val(),
            weight: $(this).find('.filled-technical-weight').val(),
        });
    });

    $('.filled-personal-skill-row').each(function () {
        personalSkills.push({
            category: $(this).find('.filled-personal-category').val(),
            skill: $(this).find('.filled-personal-skill-name').val(),
            level: $(this).find('.filled-personal-level').val(),
            weight: $(this).find('.filled-personal-weight').val(),
        });
    });

    // $('.personal-skill-row').each(function () {
    //     let skill = {
    //         category: $(this).find('.personal-category').val(),
    //         skill: $(this).find('.personal-skill-name').val(),
    //         level: $(this).find('.personal-level').val(),
    //         weight: $(this).find('.personal-weight').val(),
    //         profile_id: $(this).find('.personal-profile_id').val(),
    //     };
    //     personalSkills.push(skill);
    // });

    // AJAX request to save data
    $.ajax({
        url: '/api/profiles/store/skills',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            technical_skills: technicalSkills,
            personal_skills: personalSkills,
        },
        success: function (response) {
            switchToNextTab(4);

            Swal.fire({
                confirmButtonText: window.translations.confirm,
                icon: 'success',
                title: window.translations.success,
                text: window.translations.form_saved,
            });
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')}<br>`;
                    }
                }

                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.validation_error,
                    html: errorMessages, // Use `html` to display messages with line breaks
                });
            } else {
                // General error
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.error,
                    text: errorResponse.error || window.translations.error,
                });
            }
        },
    });
});

$(document).on('click', '#updateSkills', function (e) {
    e.preventDefault();

    let technicalSkills = [];

    // Collect technical skills data
    $('.filled-technical-skill-row').each(function () {
        technicalSkills.push({
            category: $(this).find('.filled-technical-category').val(),
            skill: $(this).find('.filled-technical-skill-name').val(),
            level: $(this).find('.filled-technical-level').val(),
            weight: $(this).find('.filled-technical-weight').val(),
        });
    });

    $('.filled-personal-skill-row').each(function () {
        personalSkills.push({
            category: $(this).find('.filled-personal-category').val(),
            skill: $(this).find('.filled-personal-skill-name').val(),
            level: $(this).find('.filled-personal-level').val(),
            weight: $(this).find('.filled-personal-weight').val(),
        });
    });

    // $('.personal-skill-row').each(function () {
    //     let skill = {
    //         category: $(this).find('.personal-category').val(),
    //         skill: $(this).find('.personal-skill-name').val(),
    //         level: $(this).find('.personal-level').val(),
    //         weight: $(this).find('.personal-weight').val(),
    //     };
    //     personalSkills.push(skill);
    // });

    // AJAX request to save data
    $.ajax({
        url: '/api/profiles/update/skills',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            technical_skills: technicalSkills,
            personal_skills: personalSkills,
        },
        success: function (response) {
            switchToNextTab(4);

            Swal.fire({
                confirmButtonText: window.translations.confirm,
                icon: 'success',
                title: window.translations.success,
                text: window.translations.form_saved,
            });
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')}<br>`;
                    }
                }

                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.validation_error,
                    html: errorMessages, // Use `html` to display messages with line breaks
                });
            } else {
                // General error
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.error,
                    text: errorResponse.error || window.translations.error,
                });
            }
        },
    });
});

$('select[name="country_id"]').on('change', function () {
    var selectedCountryId = $(this).val();

    var villeSelect = $(this).closest('form').find('select[name="city_id"]');
    villeSelect.val('Tous');

    if (selectedCountryId === 'Tous') {
        villeSelect.find('option').show();
    } else {
        villeSelect.find('option').hide();
        villeSelect.find('option[value="Tous"]').show();
        villeSelect.find('option[data-country="' + selectedCountryId + '"]').show();
    }
    villeSelect.trigger("chosen:updated");
});

// $('#addTechnicalSkill').on('click', function () {
//     // Validate the input fields
//     const category = $('.main-technical-category').val();
//     const detail = $('.main-technical-skill').val();
//     const level = $('.main-technical-level').val();
//     const weight = $('.main-technical-weight').val();

//     if (!category || !detail || !level || !weight || category == 'Tous' || detail == 'Tous') {
//         Swal.fire({
confirmButtonText: window.translations.confirm,
//             icon: 'error',
//             title: 'Erreur',
//             html: "Veuillez remplir tous les champs avant d’ajouter une compétence.",
//         });
//         return;
//     }

//     // Get the selected text for display
//     const categoryText = $('.main-technical-category option:selected').text();
//     const detailText = $('.main-technical-skill option:selected').data('skill-name');
//     const levelText = LevelSkillEnum[level] || "Niveau inconnu";
//     // Clone the form and remove the "Ajouter" button
//     const newForm = `
//     <div class="filled-technical-skill-row mb-4">
//         <div class="row" style="padding-left: 21px;">
//             <div class="col-12 col-md-6 col-lg-4 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-technical-category technical-category" readonly>
//                                 <option value="${category}" selected>${categoryText}</option>
//                             </select>
//                             <label class="translated_text">${window.translations.category}</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-12 col-md-6 col-lg-3 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-technical-skill-name technical-skill" readonly>
//                                 <option value="${detail}" selected>${detailText}</option>
//                             </select>
//                             <label class="translated_text">Détail</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-6 col-md-5 col-lg-2 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-technical-level technical-level" readonly>
//                                 <option value="${level}" selected>${levelText}</option>
//                             </select>
//                             <label class="translated_text">Niveau</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-6 col-md-5 col-lg-2 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-technical-weight technical-weight" readonly>
//                                 <option value="${weight}" selected>${weight}</option>
//                             </select>
//                             <label class="translated_text">Échelle</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-12 col-md-2 col-lg-1 mt-2">
//                 <button class="btn btn-outline-danger squered-pill px-3 remove-technical-skill" type="button" style="float: right;">
//                     <i class="bi bi-trash3"></i>
//                 </button>
//             </div>
//         </div>
//     </div>`;

//     $('#technical-skills-list').append(newForm);

//     const formElement = document.querySelector(`#addTechSkillForm`);

//     // console.log(formElement);
//     // formElement.reset();

//     // console.log("======================");
//     // console.log($('.main-technical-category'));
//     $('.main-technical-category').val('Tous').trigger('chosen:updated');
//     $('.main-technical-skill').val('Tous').trigger('chosen:updated');
//     $('.main-technical-level').val('1').trigger('chosen:updated');
//     $('.main-technical-weight').val('1').trigger('chosen:updated');
// });



$('#addTechnicalSkill').on('click', function () {
    // Validate the input fields
    const category = $('.main-technical-category').val();
    const detail = $('.main-technical-skill').val();
    const level = $('.main-technical-level').val();
    const weight = $('.main-technical-weight').val();

    if (!category || !detail || !level || !weight || category == 'Tous' || detail == 'Tous') {
        Swal.fire({
            confirmButtonText: window.translations.confirm,
            icon: 'error',
            title: window.translations.error,
            html: window.translations.fill_all_fields,
        });
        return;
    }

    // Get the selected text for display
    const categoryText = $('.main-technical-category option:selected').text();
    const detailText = $('.main-technical-skill option:selected').text();
    const levelText = LevelSkillEnum[level] || window.translations.unknown_level;
    
    // Create new form row matching Blade template structure
    const newForm = `
    <div class="filled-technical-skill-row mb-4">
        <div class="row" style="padding-left: 21px;">
            <div class="col-12 col-md-6 col-lg-4 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.category} <span class="text-themeColor">*</span></label>
                    <select class="chosenoptgroup w-100 filled-technical-category technical-category" readonly>
                        <option value="${category}" selected>${categoryText}</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.detail} <span class="text-themeColor">*</span></label>
                    <select class="chosenoptgroup w-100 filled-technical-skill-name technical-skill" readonly>
                        <option value="${detail}" selected>${detailText}</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-5 col-lg-2 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.level} <span class="text-themeColor">*</span></label>
                    <select class="chosenoptgroup w-100 filled-technical-level technical-level" readonly>
                        <option value="${level}" selected>${levelText}</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-5 col-lg-2 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.scale} <span class="text-themeColor">*</span></label>
                    <select class="chosenoptgroup w-100 filled-technical-weight technical-weight" readonly>
                        <option value="${weight}" selected>${weight}</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-1 mt-2">
                <button class="btn btn-outline-danger squered-pill px-3 remove-technical-skill" type="button" style="float: right;">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>`;

    $('#technical-skills-list').append(newForm);

    // Initialize Chosen for the new selects
    $('.filled-technical-skill-row:last-child .chosenoptgroup').chosen({
        width: '100%',
        disable_search: true,
        disable_search_threshold: 10
    });

    // Reset the form
    $('.main-technical-category').val('Tous').trigger('chosen:updated');
    $('#technical-skill option').show();
    $('.main-technical-skill').val('Tous').trigger('chosen:updated');
    $('.main-technical-level').val('1').trigger('chosen:updated');
    $('.main-technical-weight').val('1').trigger('chosen:updated');
});


// $('#addPersonalSkill').on('click', function () {
//     // Validate the input fields
//     const category = $('.main-personal-category').val();
//     const detail = $('.main-personal-skill').val();
//     const level = $('.main-personal-level').val();
//     const weight = $('.main-personal-weight').val();

//     console.log(level);
//     if (!category || !detail || !level || !weight || category == 'Tous' || detail == 'Tous') {
//         Swal.fire({
confirmButtonText: window.translations.confirm,
//             icon: 'error',
//             title: 'Erreur',
//             html: "Veuillez remplir tous les champs avant d’ajouter une compétence.",
//         });
//         return;
//     }

//     // Get the selected text for display
//     const categoryText = $('.main-personal-category option:selected').text();
//     const detailText = $('.main-personal-skill option:selected').data('skill-name');
//     const levelText = LevelSkillEnum[level] || "Niveau inconnu";
//     // Clone the form and remove the "Ajouter" button
//     const newForm = `
//     <div class="filled-personal-skill-row mb-4">
//         <div class="row" style="padding-left: 21px;">
//             <div class="col-12 col-md-6 col-lg-4 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-personal-category personal-category" readonly>
//                                 <option value="${category}" selected>${categoryText}</option>
//                             </select>
//                             <label class="translated_text">${window.translations.category}</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-12 col-md-6 col-lg-3 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-personal-skill-name personal-skill" readonly>
//                                 <option value="${detail}" selected>${detailText}</option>
//                             </select>
//                             <label class="translated_text">Détail</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-6 col-md-5 col-lg-2 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-personal-level technical-level" readonly>
//                                 <option value="${level}" selected>${levelText}</option>
//                             </select>
//                             <label class="translated_text">Niveau</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-6 col-md-5 col-lg-2 mb-2">
//                 <div class="form-group">
//                     <div class="input-group input-group-lg">
//                         <div class="form-floating">
//                             <select class="form-select border-0 filled-personal-weight" readonly>
//                                 <option value="${weight}" selected>${weight}</option>
//                             </select>
//                             <label class="translated_text">Échelle</label>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="col-12 col-md-2 col-lg-1 mt-2">
//                 <button class="btn btn-outline-danger squered-pill px-3 remove-personal-skill" type="button" style="float: right;">
//                     <i class="bi bi-trash3"></i>
//                 </button>
//             </div>
//         </div>
//     </div>`;

//     $('#personal-skills-list').append(newForm);

//     // Clear the main form fields
//     $('.main-personal-category').val('Tous').trigger('chosen:updated');
//     $('.main-personal-skill').val('Tous').trigger('chosen:updated');
//     $('.main-personal-level').val('1').trigger('chosen:updated');
//     $('.main-personal-weight').val('1').trigger('chosen:updated');
// });


$('#addPersonalSkill').on('click', function () {
    // Validate the input fields
    const category = $('.main-personal-category').val();
    const detail = $('.main-personal-skill').val();
    const level = $('.main-personal-level').val();
    const weight = $('.main-personal-weight').val();

    if (!category || !detail || !level || !weight || category == 'Tous' || detail == 'Tous') {
        Swal.fire({
            confirmButtonText: window.translations.confirm,
            icon: 'error',
            title: window.translations.error,
            html: window.translations.fill_all_fields,
        });
        return;
    }

    // Get the selected text for display
    const categoryText = $('.main-personal-category option:selected').text();
    const detailText = $('.main-personal-skill option:selected').text();
    const levelText = LevelSkillEnum[level] || window.translations.unknown_level;
    
    // Create new form row matching Blade template structure
    const newForm = `
    <div class="filled-personal-skill-row mb-4">
        <div class="row" style="padding-left: 21px;">
            <div class="col-12 col-md-6 col-lg-4 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.category}</label>
                    <select class="chosenoptgroup w-100 filled-personal-category personal-category" readonly>
                        <option value="${category}" selected>${categoryText}</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.detail}</label>
                    <select class="chosenoptgroup w-100 filled-personal-skill-name personal-skill" readonly>
                        <option value="${detail}" selected>${detailText}</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-5 col-lg-2 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.level}</label>
                    <select class="chosenoptgroup w-100 filled-personal-level personal-level" readonly>
                        <option value="${level}" selected>${levelText}</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-5 col-lg-2 mb-2">
                <div class="custom-multiple-select rounded border poste-chosen"
                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                    <label class="translated_text">${window.translations.scale}</label>
                    <select class="chosenoptgroup w-100 filled-personal-weight personal-weight" readonly>
                        <option value="${weight}" selected>${weight}</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-1 mt-2">
                <button class="btn btn-outline-danger squered-pill px-3 remove-personal-skill" type="button" style="float: right;">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>`;

    $('#personal-skills-list').append(newForm);

    // Initialize Chosen for the new selects
    $('.filled-personal-skill-row:last-child .chosenoptgroup').chosen({
        width: '100%',
        disable_search: true,
        disable_search_threshold: 10
    });

    // Clear the main form fields
    $('.main-personal-category').val('Tous').trigger('chosen:updated');
    $('#personal-skill option').show();
    $('.main-personal-skill').val('Tous').trigger('chosen:updated');
    $('.main-personal-level').val('1').trigger('chosen:updated');
    $('.main-personal-weight').val('1').trigger('chosen:updated');
});

$(document).on('click', '.remove-personal-skill', function () {
    $(this).closest('.filled-personal-skill-row').remove();
});

$(document).on('click', '.remove-technical-skill', function () {
    $(this).closest('.filled-technical-skill-row').remove();
});


// $(document).on('click', '.remove-technical-skill', function () {
//     $(this).closest('.filled-technical-skill-row').remove();
// });

document.querySelectorAll(".main-personal-skill-name").forEach(skillSelect => {
    skillSelect.addEventListener("change", function () {
        let selectedOption = this.options[this.selectedIndex];
        let level = selectedOption.getAttribute("data-level");

        let skillContainer = this.closest(".skill-container");
        let levelSelect = skillContainer?.nextElementSibling?.querySelector(".personal-level");

        if (levelSelect) {
            if (level) {
                levelSelect.value = level;
                levelSelect.disabled = true;
            } else {
                levelSelect.value = "";
                levelSelect.disabled = false;
            }
        }
    });
});

window.saveForm = function (formName, tabNumber) {
    if (event) {
        event.preventDefault();
    }
    const formElement = document.querySelector(`#profile-form-${formName}`);
    const formData = new FormData(formElement);
    $.ajax({
        url: `/api/profiles/store/${formName}`, // Backend endpoint
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.profile_id) {
                $('input[name="profile_id"]').val(response.profile_id);
            }

            if (response && response[formName]) {

                if (formName === "formations") {
                    formations = response.formations;
                    formElement.reset();
                    document.querySelector(`#profile-form-${formName} .coverimg`).style.backgroundImage = "url(/assets/img/icon/empty-logo.png)";
                } else if (formName === "certifications") {
                    certifications = response.certifications;
                    formElement.reset();
                    document.querySelector(`#profile-form-${formName} .coverimg`).style.backgroundImage = "url(/assets/img/icon/empty-logo.png)";
                } else if (formName === "experiences") {
                    experiences = response.experiences;
                    formElement.reset();
                    document.querySelector(`#profile-form-${formName} .coverimg`).style.backgroundImage = "url(/assets/img/icon/empty-logo.png)";
                } else if (formName === "languages") {
                    languages = response.languages;
                    formElement.reset();
                } else if (formName === "recommandations") {
                    recommandations = response.recommandations;
                    formElement.reset();
                    document.querySelector(`#profile-form-${formName} .coverimg`).style.backgroundImage = "url(/assets/img/icon/empty-logo.png)";
                }
                renderForm(formName);
                resetMainForm(formName);
            }

            if (formName === "informations") {
                $("#profileLastName").val(response.profile.last_name);
                $("#profileFirstName").val(response.profile.first_name);
                console.log(response.profile.sexe);
                if (response.profile && response.profile.sexe) {
                    let sexe = response.profile.sexe.toLowerCase(); // Normaliser la casse
                    if (sexe === 'homme') {
                        $(".priceupgrade1").prop("checked", true);
                    } else {
                        $(".priceupgrade2").prop("checked", true);
                    }
                } else {
                    console.error("Le profil ou le sexe est indéfini.");
                }
            }

            // renderForm(formName);
            // addFormation(formName, response.id);

            switchToNextTab(tabNumber);

            if (response.error) {
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: 'Erreur de validation',
                    html: response.error,
                });
            } else {
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'success',
                    title: window.translations.success,
                    text: window.translations.form_saved,
                });
            }

        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')}<br>`;
                    }
                }
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.validation_error,
                    html: errorMessages,
                });
            } else {
                // Handle unexpected errors
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.error,
                    text: errorResponse.error || window.translations.error,
                });
            }
        },
    });
};

window.switchToNextTab = function (currentTabNumber) {
    const nextTabNumber = currentTabNumber + 1;
    $(`#sub-personal${currentTabNumber}-tab`).removeClass('active');
    $(`#sub-personal${currentTabNumber}`).removeClass('show active');

    $(`#sub-personal${nextTabNumber}-tab`).addClass('active');
    $(`#sub-personal${nextTabNumber}`).addClass('show active');
};

// document.querySelectorAll('.file-input').forEach((input) => {
//     input.addEventListener('change', function (event) {
//         const file = event.target.files[0];
//         const previewId = event.target.id.replace('file-input', 'file-preview');
//         const preview = document.getElementById(previewId);

//         if (file) {
//             const reader = new FileReader();

//             reader.onload = function (e) {
//                 preview.style.backgroundImage = `url(${e.target.result})`;
//                 preview.style.display = 'block';
//             };

//             reader.readAsDataURL(file);
//         } else {
//             preview.style.display = 'none';
//             preview.style.backgroundImage = '';
//         }
//     });
// });

document.querySelectorAll('.doc-file-input').forEach((input) => {
    input.addEventListener('change', function (event) {
        const file = event.target.files[0];

        const preview = input.closest('.file-upload').querySelector('.file-preview');
        const exportButton = input.closest('.file-upload').parentElement.parentElement.querySelector('.export-button');

        if (file) {
            preview.innerHTML = '';
            const fileLink = document.createElement('span');
            fileLink.textContent = file.name;
            preview.appendChild(fileLink);

            preview.style.display = 'block';
            preview.style.width = '100%';
            preview.style.textAlign = 'center';
            preview.style.padding = '10px';
            preview.style.margin = '10px';

            const fileURL = URL.createObjectURL(file);
            if (exportButton) {
                exportButton.setAttribute('data-file-url', fileURL);
                exportButton.setAttribute('data-file-name', file.name);
                exportButton.disabled = false;
            }
        } else {
            preview.innerHTML = '';
            preview.style.display = 'none';
            exportButton.removeAttribute('data-file-url');
            exportButton.removeAttribute('data-file-name');
            exportButton.disabled = true;
        }
    });
});

document.querySelectorAll('.export-button').forEach((button) => {
    button.addEventListener('click', function () {
        const fileURL = this.getAttribute('data-file-url');
        const fileName = this.getAttribute('data-file-name');

        if (fileURL && fileName) {
            const downloadLink = document.createElement('a');
            downloadLink.href = fileURL;
            downloadLink.download = fileName;
            downloadLink.click();
        } else {
            Swal.fire({
                confirmButtonText: window.translations.confirm,
                icon: 'error',
                title: window.translations.error,
                html: window.translations.no_file,
            });
        }
    });
});

// document.querySelectorAll('.logo').forEach((input) => {
//     input.addEventListener('change', function (event) {
//         const file = event.target.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 document.querySelector('.avatar').style.backgroundImage =
//                     `url(${e.target.result})`;
//             };
//             reader.readAsDataURL(file);
//         }
//     });
// });

async function getLangSkills(langId) {
    try {
        const response = await $.ajax({
            url: `/api/profiles/lang-skills/${langId}`,
            type: 'GET'
        });
        return response.skills;
    } catch (error) {
        console.error("Erreur AJAX :", error);
        return [];
    }
}

async function renderForm(formName, tabNumber = 1) {
    const container = document.getElementById(`${formName}-container`);
    if (container) container.innerHTML = '';
    let data, fields, icon, titleKey, logoGetter;

    // Determine dataset, fields, and specific details for each form type
    if (formName === "formations") {
        data = formations;
        fields = [
            { label: window.translations.university, key: "name", icon: "bi bi-buildings-fill text-warning" },
            { label: window.translations.level, key: "level", icon: "bi bi-info-square text-info" },
            { label: window.translations.date, key: "date", icon: "bi bi-calendar-check text-success" }
        ];
        icon = "bi bi-building";
        titleKey = "diploma_option";
        logoGetter = (item) => item.logo || "assets/img/default-logo.png";
    } else if (formName === "certifications") {
        data = certifications;
        fields = [
            { label: window.translations.city, key: "city", icon: "bi bi-geo-alt-fill text-danger" },
            { label: window.translations.country, key: "country", icon: "bi bi-globe2 text-success" },
            { label: window.translations.organisme, key: "organisme", icon: "bi bi-building text-info" }
        ];
        icon = "bi bi-award";
        titleKey = "certification_name";
        logoGetter = (item) => item.logo || "assets/img/default-logo.png";
    } else if (formName === "experiences") {
        data = experiences;
        fields = [
            // { label: window.translations.post, key: "profession", icon: "bi bi-file-earmark-post text-warning" },
            { label: window.translations.start_date, key: "started_at", icon: "bi bi-calendar-event text-info" },
            { label: window.translations.end_date, key: "finished_at", icon: "bi bi-calendar-check text-success" },
            { label: window.translations.company, key: "company", icon: "bi bi-briefcase text-warning" }
        ];
        icon = "bi bi-briefcase";
        titleKey = "profession";
        logoGetter = (item) => item.logo || "assets/img/default-company-logo";
    } else if (formName === "languages") {
        data = languages;
        fields = [{ label: window.translations.language, key: "label", icon: "bi bi-translate text-primary" }];
        icon = "bi bi-translate";
        titleKey = "label";
    } else if (formName === "recommandations") {
        data = recommandations;
        fields = [
            { label: window.translations.post, key: "profession", icon: "bi bi-file-earmark-post text-primary" },
            { label: window.translations.last_name, key: "last_name", icon: "bi bi-person-fill text-primary" },
            { label: window.translations.first_name, key: "first_name", icon: "bi bi-person-fill text-success" }
        ];
        icon = "bi bi-person-circle";
        titleKey = "last_name";
        logoGetter = (item) => item.photo || "assets/img/default-company-logo";
    }

    // Generate cards dynamically
    if (data) {
        for (const item of data) {
            let langSkills = await getLangSkills(item.id);

            const logo = item.logo;
            const logoHTML = logo
                ? `<div class="col-md-2 text-center">
                        <img src="/storage/${logo}" alt="Logo" class="img-fluid rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                   </div>`
                : '';
            const photo = item.photo;
            const photoHTML = photo
                ? `<div class="col-md-2 text-center">
                        <img src="/storage/${photo}" alt="Logo" class="img-fluid rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                   </div>`
                : '';

            let editForm = '';
            if (formName === "formations") {
                editForm = `
                <form id="profile-formation-${item.id}" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id" value="${item.id}" hidden readonly>
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row" >
                                <div class="row justify-content-center mt-5">
                                    <div class="col-12 mb-3" style="width: 150px;">
                                        <div class="col-auto position-relative">
                                            <figure class="avatar avatar-100 coverimg top-80 shadow-md border-3 border-light" 
                                                style="background-image: url(&quot;/storage/${logo}&quot;);line-height: 0 !important;
                                                margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                <img src="/storage/${logo}" alt="" style="display: none;">
                                            </figure>
                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                    <i class="bi bi-camera"></i>
                                                    <input type="file" name="logo" class="custom-file-input formation-logo" id="formation-logo" accept="image/*" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-10">
                                        <div class="row">
                                            <div class="col-12 col-md-6 custom-mrg">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" required name="name" value="${item.name || ''}" class="form-control border-start-0 translated_text">
                                                        <label class="translated_text"><span>${window.translations.institution}</span><span class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.country}</label>
                                                    <select class="chosenoptgroup w-100" id="country-select" name="country_id">
                                                        <option>${window.translations.message_country}</option>
                                                        ${countries.map(country => `
                                                            <option value="${country.id}" ${item.country_id === country.id ? 'selected' : ''}>
                                                                ${country.name}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.city}</label>
                                                    <select class="chosenoptgroup w-100" name="city_id" id="filter-ville">
                                                         <option>${window.translations.message_city}</option>
                                                        ${cities.map(city => `
                                                            <option value="${city.id}" ${item.city_id === city.id ? 'selected' : ''} data-country="${city.country.id}">
                                                                ${city.name}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                <div class="form-group mb-2 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="address" value="${item.address || ''}" required class="form-control border-start-0 translated_text">
                                                        <label class="translated_text">${window.translations.address}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <input type="text" value="${item.phone || ''}" required name="phone" class="form-control border-start-0 translated_text">
                                                            <label class="translated_text">${window.translations.phone1}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <input type="text" value="${item.secondary_phone || ''}" required name="secondary_phone" class="form-control border-start-0 translated_text">
                                                            <label class="translated_text">${window.translations.phone2}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <input type="email" name="email" value="${item.email || ''}" required class="form-control border-start-0 translated_text">
                                                            <label class="translated_text">${window.translations.email}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.level}</label>
                                                    <select class="chosenoptgroup w-100" name="level_id">
                                                    <option>${window.translations.message_niveau}</option>
                                                        ${levels.map(level => `
                                                            <option value="${level.id}" ${item.level_id === level.id ? 'selected' : ''}>
                                                                ${level.label}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2  custom-mrg">
                                                <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.diploma} <span class="text-themeColor">*</span></label>
                                                    <select class="chosenoptgroup w-100" name="diploma_id">
                                                     <option>${window.translations.message_diplome}</option>
                                                        ${diplomas.map(diploma => `
                                                            <option value="${diploma.id}" ${item.diploma_id === diploma.id ? 'selected' : ''}>
                                                                ${diploma.label}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.option} <span
                                                                        class="text-themeColor">*</span></label>
                                                    <select class="chosenoptgroup w-100" name="option_id">
                                                     <option>${window.translations.message_option}</option>
                                                        ${diplomaOptions.map(option => `
                                                            <option value="${option.id}" ${item.option_id === option.id ? 'selected' : ''}>
                                                                ${option.label}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.mention}</label>
                                                    <select class="chosenoptgroup w-100" name="mention">
                                                        <option>${window.translations.select_choice}</option>
                                                        ${Object.entries(mentions).map(([key, value]) => `
                                                            <option value="${key}" ${item.mention === key ? 'selected' : ''}>
                                                                ${value}
                                                            </option>
                                                        `).join('')}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="date" value="${item.date || ''}" required name="date" class="form-control border-start-0 translated_text">
                                                        <label class="translated_text">${window.translations.date}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-4 mb-4">
                                                <button class="btn btn-danger bg-red translated_text" type="button" data-formation-id="${item.id}" onclick="deleteForm('formations', this.dataset.formationId)"
                                                style="font-size: 12px;float: right;">${window.translations.delete}</button>
                                                <button class="btn btn-theme btn-ajouter translated_text" type="button" onclick="updateForm('formations', 1, 'profile-formation-${item.id}')" data-form-id="update-profile-form-formations" style="font-size: 12px;float: right;margin-right: 10px">${window.translations.modify}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            `;
            } else if (formName === "certifications") {
                console.log(item);
                editForm = `
                 <form id="profile-certification-${item.id}" method="POST" enctype="multipart/form-data">
    <input type="text" name="id" value="${item.id}" hidden readonly>
    <div class="card-body">
        <div class="row">
            <div class="row justify-content-center mt-4">
                <div class="col-12 mb-3" style="width: 150px;">
                    <div class="col-auto position-relative">
                        <figure class="avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                            style="background-image: url(&quot;/storage/${logo}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                            <img src="/storage/${logo}" alt="" style="display: none;">
                        </figure>
                        <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                            <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                <i class="bi bi-camera"></i>
                                <input type="file" name="logo" class="custom-file-input certification-logo" id="certification-logo" accept="image/*" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <!-- Organisme -->
                        <div class="col-12 col-md-8 col-lg-9 mb-2 custom-mrg">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" name="organisme" value="${item.organisme || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.organisme} <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                        <!-- N° d'accréditation -->
                        <div class="col-12 col-md-4 col-lg-3 mb-2 custom-mrg">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" name="numero_accreditation" value="${item.numero_accreditation || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.accreditation_number}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-2 custom-mrg">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" name="adresse" value="${item.adresse || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.address}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2">
                            <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <label class="translated_text" style="margin-left: 20px;">${window.translations.country}</label>
                                <select class="chosenoptgroup w-100" id="country-select" name="country_id">
                                    <option>${window.translations.message_country}</option>
                                    ${countries.map(country => `
                                        <option value="${country.id}" ${item.country_id === country.id ? 'selected' : ''}>
                                            ${country.name}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2">
                            <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <label class="translated_text" style="margin-left: 20px;">${window.translations.city}</label>
                                <select class="chosenoptgroup w-100" name="city_id" id="filter-ville">
                                     <option>${window.translations.message_city}</option>
                                    ${cities.map(city => `
                                        <option value="${city.id}" ${item.city_id === city.id ? 'selected' : ''} data-country="${city.country.id}">
                                            ${city.name}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 mb-2">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="form-floating">
                                    <input type="text" name="telephone_1" value="${item.telephone_1 || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.phone1}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="form-floating">
                                    <input type="text" name="telephone_2" value="${item.telephone_2 || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.phone2}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="form-floating">
                                    <input type="email" name="email" value="${item.email || ''}" required class="form-control border-start-0 translated_text">
                                    <label class="translated_text">${window.translations.email}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="text" name="nom_certification" value="${item.nom_certification || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.certification_name}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                        <label class="translated_text" style="margin-left: 20px;">${window.translations.evaluation_criteria} <span class="text-themeColor">*</span></label>
                                        <select class="form-select border-0" id="eval1" name="criteres_evaluation">
                                            <option selected value="0" id="null-value">${window.translations.message_evaluation_criteria}</option>
                                            ${Object.entries(evaluationTypes).map(([key, value]) => `
                                                <option value="${key}" ${item.criteres_evaluation === key ? 'selected' : ''}>
                                                    ${value}
                                                </option>
                                            `).join('')}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3">${window.translations.add_valid_data}</div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="text" name="theme_certification" value="${item.theme_certification || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.certification_subject}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="number" name="score_resultat" value="${item.score_resultat || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.score}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                        <label class="translated_text" style="margin-left: 20px;">${window.translations.certification_level} <span class="text-themeColor">*</span></label>
                                        <div class="form-floating">
                                            <select class="form-select border-0 chosenoptgroup w-100" name="niveau_certification" id="country1">
                                                <option selected>${window.translations.message_certification}</option>
                                                ${Object.entries(LevelSkillEnum).map(([key, value]) => `
                                                    <option value="${key}" ${item.niveau_certification === key ? 'selected' : ''}>
                                                        ${value}
                                                    </option>
                                                `).join('')}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="date" name="date_obtention" value="${item.date_obtention || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.date_obtention}<span
                                                                        class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="text" name="volume_horaire" value="${item.volume_horaire || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.duration}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                        <div class="form-floating">
                                            <input type="date" name="date_expiration" value="${item.date_expiration || ''}" required class="form-control border-start-0 translated_text">
                                            <label class="translated_text">${window.translations.date_expiration}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4 mb-4">
                            <button class="btn btn-danger bg-red translated_text" type="button"
                                data-certification-id="${item.id}"
                                onclick="deleteForm('certifications', ${item.id})"
                                style="font-size: 12px;float: right;">${window.translations.delete}</button>
                            <button class="btn btn-theme btn-ajouter translated_text"
                                type="button"
                                onclick="updateForm('certifications', 1, 'profile-certification-${item.id}')"
                                data-form-id="update-profile-form-certifications"
                                style="font-size: 12px;float: right;margin-right: 10px">${window.translations.modify}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
`;
            } else if (formName === "experiences") {
                // Insert the experience edit form markup here
                editForm = `
<form id="profile-experience-${item.id}" method="POST" enctype="multipart/form-data">
    <input type="text" name="id" value="${item.id}" hidden readonly>
    <div class="card border-0">
        <div class="card-body" style="padding: 30px">
            <div class="row mb-3">
                <div class="col-12 col-md-4 col-xl-2">
                    <div class="col-auto position-relative" style="width: 150px;">
                        <figure
                            class="avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                            style="background-image: url(&quot;/storage/${logo}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                            <img src="/storage/${logo}" alt="" style="display: none;">
                        </figure>
                        <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custom-image-logo">
                            <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                <i class="bi bi-camera"></i>
                                <input type="file" name="logo" class="custom-file-input experience-logo" id="experience-logo" accept="image/*" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-3" style="margin-top: 15px;">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" required value="${item.company || ''}" name="company" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.company} <span class="text-themeColor">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-3" style="margin-top: 15px;">
                    <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <label class="translated_text" style="margin-left: 20px;">${window.translations.post} <span class="text-themeColor">*</span></label>
                        <select class="chosenoptgroup w-100" name="profession_id" id="profession">
                            <option selected>${window.translations.choose_post}</option>
                            ${posts.map(post => `
                                <option value="${post.id}" ${item.profession_id == post.id ? 'selected' : ''}>
                                    ${post.label}
                                </option>
                            `).join('')}
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2" style="margin-top: 15px;">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="date" name="started_at" required value="${item.started_at || ''}" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.start_date} <span class="text-themeColor">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-xl-2" style="margin-top: -25px;">
                    <div class="mb-3 position-relative is-valid check-valid">
                        <div class="form-check form-switch">
                            <!-- Fixed: Removed duplicate class attribute and ID conflict -->
                            <input class="form-check-input current_job" type="checkbox" name="current_job" ${item.current_job ? 'checked' : ''} value="1">
                            <label class="form-check-label">${window.translations.current_position}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="date" name="finished_at" required value="${item.finished_at || ''}" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.end_date} <span class="text-themeColor">*</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 mb-4">
                    <h4 class="title custom-title mt-4">${window.translations.projects_done}</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" name="project_name" required value="${item.project_name || ''}" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.project}</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" name="skills_tech" required value="${item.skills_tech || ''}" id="techTags" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.technical_skills}</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="date" name="date" required value="${item.date || ''}" class="form-control border-start-0 translated_text">
                            <label class="translated_text">${window.translations.date}</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <textarea class="form-control border-start-0 h-auto" rows="6" name="description">${item.description || ''}</textarea>
                            <label class="translated_text">${window.translations.description}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-4">
                        <button class="btn btn-danger bg-red translated_text" type="button"
                            data-experience-id="${item.id}"
                            onclick="deleteForm('experiences', this.dataset.experienceId)"
                            style="font-size: 12px;float: right;">${window.translations.delete}</button>
                        <button class="btn btn-theme btn-ajouter translated_text"
                            type="button"
                            onclick="updateForm('experiences', 2, 'profile-experience-${item.id}')"
                            data-form-id="update-profile-form-experiences"
                            style="font-size: 12px;float: right;margin-right: 10px">${window.translations.modify}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.current_job', function() {
                const $container = $(this).closest('.col-12');
                const $finishedAtInput = $container.find('input[name="finished_at"]');
                
                if ($(this).is(':checked')) {
                    $finishedAtInput.prop('disabled', true).val('');
                    $finishedAtInput.css({
                        'background-color': '#f5f5f5', // light gray background
                        'color': '#a0a0a0'            // gray text
                    });
                } else {
                    $finishedAtInput.prop('disabled', false);
                    $finishedAtInput.css({
                        'background-color': '',
                        'color': ''
                    });
                }
            });
        });
    </script>
`;
            } else if (formName === "languages") {
                editForm = `
                <form id="profile-language-${item.id}" method="POST"
    enctype="multipart/form-data">
    <input type="text" name="id" value="${item.id}" hidden readonly>
    <div class="row">
        <div class="col-12 col-xl-3 mb-2">
            <div class="row">
                <div class="col-12 col-md-12 mb-2">
                    <div class="custom-multiple-select rounded border poste-chosen" 
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <label class="translated_text">${window.translations.language} <span class="text-themeColor">*</span></label>
                        <select class="chosenoptgroup w-100" id="language"
                            name="language" required>
                            <option value="" class="translated_text">${window.translations.select_language}</option>
                            <option value="${item.id}" selected>
                                ${item.label}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>      
        <div class="col-12 col-xl-9 mb-2" id="skills-form-container-${item.id}">
        </div>
    </div>
    <div class="row justify-content-end mt-4">
        <div class="col-auto">
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-danger bg-red translated_text" type="button"
                    data-language-id="${item.id}"
                    onclick="deleteForm('languages', this.dataset.languageId)"
                    style="font-size: 12px;">
                    ${window.translations.delete}
                </button>
                <button class="btn btn-theme btn-ajouter translated_text" type="button"
                    onclick="updateForm('languages', 4, 'profile-language-${item.id}')"
                    style="font-size: 12px;">
                    ${window.translations.modify}
                </button>
            </div>
        </div>
    </div>
</form>
    <br>
                    <br>
                `;
                window.generateSkillsForm = function (langSkills) {

                    let formContent = '';
                    if (Array.isArray(langSkills)) {

                        langSkills.forEach((skill, index) => {
                            formContent += `
                        <div class="row">
                            <div class="col-12 col-xl-6 mb-2">
                                <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                    <label class="translated_text">${window.translations.skill}</label>
                                    <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill" id="languages-skill-${skill.skill_id}" name="skills[${index}][skill]" required>
                                        <option value="${skill.skill_id}" selected>${skill.skill.label}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-xl-4 mb-2" style="padding-right: 0;">
                                <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                    <label class="translated_text" style="margin-left: 20px;">${window.translations.level}</label>
                                    <select class="chosenoptgroup w-100 main-languages-level languages-level" name="skills[${index}][level]" required>
                                     <option>${window.translations.message_niveau}</option>
                                    ${Object.entries(langSkillLevels).map(([key, value]) => `
                                        <option value="${key}" ${skill.level === key ? 'selected' : ''}>
                                            ${value}
                                        </option>
                                    `).join('')}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-xl-2 mb-2" style="padding-right: 0;">
                                <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                    <label class="translated_text">${window.translations.weight}</label>
                                    <select class="chosenoptgroup w-100 main-languages-weight languages-weight" name="skills[${index}][weight]" required>
                                        <option>${window.translations.message_echelle}</option>
                                        <option value="1" ${skill.weight === 1 ? 'selected' : ''}>1</option>
                                        <option value="2" ${skill.weight === 2 ? 'selected' : ''}>2</option>
                                        <option value="3" ${skill.weight === 3 ? 'selected' : ''}>3</option>
                                        <option value="4" ${skill.weight === 4 ? 'selected' : ''}>4</option>
                                        <option value="5" ${skill.weight === 5 ? 'selected' : ''}>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>`;
                        });
                    }
                    return formContent;
                }

            } else if (formName === "recommandations") {
                editForm = `
                <form id="profile-recommandation-${item.id}" method="POST"
                                enctype="multipart/form-data">
                          <input type="text" name="id"
                                                value="${item.id}" hidden readonly>
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row justify-content-center" style="padding: 30px">
                                            <h4 class="title custom-title  mb-5">${window.translations.recommendation}</h4>
                                            <div class="col-11">
                                                <div class="row">
                                                    
                                                    <div class="col-12 col-lg-3 col-xl-2" >
                                                        <div class=" position-relative" style="width: 150px; margin: auto;">
                                                        <figure
                                                            class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                            style="background-image: url(&quot;/storage/${photo}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                            <img src="/storage/${photo}"
                                                                alt="" style="display: none;">
                                                        </figure>
                                                        <div
                                                            class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custom-image-logo">
                                                            <label
                                                                class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                                <i class="bi bi-camera"></i>
                                                                <input type="file" name="photo"
                                                                    class="custom-file-input user-logo logo"
                                                                    id="user-logo" accept="image/*" />
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-2 mt-3">
                                                        <div class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="Prénom"
                                                                        value="${item.first_name || ''}"
                                                                        name="first_name" required=""
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label class="translated_text">${window.translations.first_name}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-2 mt-3">
                                                        <div class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="Nom"
                                                                        value="${item.last_name || ''}"
                                                                        name="last_name" required=""
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label class="translated_text">${window.translations.last_name}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">${window.translations.please_enter_valid_input}</div>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 mt-3">
                                                        <div class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="Entreprise"
                                                                        name="company" required=""  value="${item.company || ''}"
                                                                        class="form-control border-start-0">
                                                                    <label><span class="translated_text">${window.translations.company} <span class="text-themeColor">*</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback translated_text">${window.translations.please_enter_valid_input}</div>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 mt-3">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label
                                                                 class="translated_text" style="margin-left: 20px;">Poste</label>
                                                                <select class="chosenoptgroup w-100"
                                                                    name="poste" id="profession">
                                                                    <option>${window.translations.select_post}</option>
                                                                    ${posts.map(post => `
                                                                        <option value="${post.id}" ${item.poste == post.id ? 'selected' : ''}>
                                                                            ${post.label}
                                                                        </option>
                                                                    `).join('')}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="col-12 mt-5">
                                                        <div class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <textarea placeholder="Missions" class="form-control border-start-0 h-auto" name="message" rows="6">
                                                                ${item.message || ''}
                                                            </textarea>
                                                                <label class="translated_text">${window.translations.message}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback mb-3">${window.translations.add_valid_data}</div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <button class="btn btn-danger bg-red mb-2 mx-2 translated_text" type="button"
                                                            data-recommandation-id="${item.id}"
                                                            onclick="deleteForm('recommandations', this.dataset.recommandationId)"
                                                            style="font-size: 12px;float: right;">${window.translations.delete}</button>
                                                        <button class="btn btn-theme btn-ajouter mb-2 mx-2 translated_text" type="button"
                                                            onclick="updateForm('recommandations', 5, 'profile-recommandation-${item.id}')"
                                                            data-form-id="profile-form-recommandations"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            `;
            }

            var cardItem = `       <div class="card mb-4 shadow-lg border-0 rounded-lg block-view bg-white" id="view-${formName}-${item.id}" style="background-color: white;">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                ${logoHTML}
                                ${photoHTML}
                                <div class="col-md-6">
                                    <h5 class="text-info mb-3">${item[titleKey] || window.translations.not_available}</h5>
                                    ${fields
                    .map(field => `
                                            <p class="mb-2">
                                                <i class="${field.icon}"></i> <strong class="translated_text">${field.label} :</strong> ${resolveValue(item, field.key) || window.translations.not_available}
                                            </p>
                                        `)
                    .join('')}
                                </div>
                                <div class="col-md-4 text-end">
                                    <button class="btn btn-outline-danger squered-pill px-3 delete-btn" data-form-name="${formName}"
                                                        data-id="${item.id}"
                                                        aria-label="Supprimer cet élément">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                    
                                    <button class="btn btn-outline-info squered-pill px-3" data-formation-id="${item.id}" onclick="toggleFormationForm('${formName}', this.dataset.formationId, true)">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`
            // Build the full card with the view and the hidden edit form
            const card = `
                <div>
                    <div id="form-${formName}-${item.id}" class="edit-subform mb-2">
                        ${editForm}
                    </div>
                </div>                
                    `;
            container.innerHTML += card;
            // Re-initialize Chosen for new selects in the just-added card
            // $('#form-' + formName + '-' + item.id + ' .chosenoptgroup').chosen({
            //     width: '100%',
            //     no_results_text: window.translations.no_result_found,
            //     placeholder_text_single: window.translations.select_choice,
            // });

            if (formName === "languages") {
                document.getElementById('skills-form-container-' + item.id).innerHTML = generateSkillsForm(langSkills);
            }
            // if (formName === "experiences") {
            //     $(document).ready(function() {
            //         // Fixed JavaScript - works with the corrected HTML structure
            //         $(document).on('change', '.current_job', function() {
            //             // Find the finished_at input in the same parent container
            //             const $container = $(this).closest('.col-12');
            //             const $finishedAtInput = $container.find('input[name="finished_at"]');
                        
            //             if ($(this).is(':checked')) {
            //                 $finishedAtInput.prop('disabled', true).val('');
            //                 $finishedAtInput.css('background-color', '#f5f5f5');
            //             } else {
            //                 $finishedAtInput.prop('disabled', false);
            //                 $finishedAtInput.css('background-color', '');
            //             }
            //         });
            //     });
            // }
        }

        setTimeout(() => {
            initializeChosen();
            
            if (formName === "languages") {
                document.getElementById('skills-form-container-' + item.id).innerHTML = generateSkillsForm(langSkills);
                setTimeout(() => {
                    initializeChosen();
                    resetLanguageForm();
                }, 50);
            }
        }, 50);
        

    }
}


function resetMainForm(formName) {
    // Reset the main form
    $(`#profile-form-${formName}`)[0].reset();
    
    // Reset all selects in the main form
    $(`#profile-form-${formName} select`).val('').trigger('chosen:updated');
    
    // Reset specific form selects
    $(`.profile-form-${formName} select`).val('').trigger('chosen:updated');
}

function resetLanguageForm() {
    // Reset main form
    $('#profile-form-languages')[0].reset();
    
    // Reset Select2 skill selects
    $('.select2-skill, .select2-level, .select2-weight').val(null).trigger('change');
    
    // Reset Chosen selects (if any)
    $('select:not(.select2-skill):not(.select2-level):not(.select2-weight)').val('').trigger('chosen:updated');
}
function initializeChosen() {
    // Reset specific form selects
    $('.profile-form-formations select').val('').trigger('chosen:updated');
    $('.profile-form-experiences select').val('').trigger('chosen:updated');
    $('.profile-form-languages select').val('').trigger('chosen:updated');
    $('.profile-form-certifications select').val('').trigger('chosen:updated');

    // Initialize Chosen for all selects
    $('select').chosen({
        width: '100%',
        no_results_text: window.translations.no_result_found,
        placeholder_text_single: window.translations.select_choice,
    });
}

// Helper function to resolve nested keys (e.g., "city.name")
function resolveValue(obj, key) {
    return key.split('.').reduce((acc, part) => acc && acc[part], obj);
}

function editFormation(index) {
    const formation = formations[index];
    const form = document.getElementById('profile-form-formations');

    for (const key in formation) {
        if (form[key]) {
            form[key].value = formation[key];
        }
    }
    deleteFormation(index);
}

function editCertification(index) {
    const certification = certifications[index];
    const form = document.getElementById('profile-form-certifications');

    for (const key in certification) {
        if (form[key]) {
            form[key].value = certification[key];
        }
    }
    deleteCertification(index);
}

function deleteCertification(index) {
    certification.splice(index, 1);
    renderCertification();
}

function editExperience(index) {
    const experience = experiences[index];
    const form = document.getElementById('profile-form-experiences');

    for (const key in experience) {
        if (form[key]) {
            form[key].value = experience[key];
        }
    }
    deleteExperience(index);
}

function deleteExperience(index) {
    experience.splice(index, 1);
    renderExperience();
}

window.saveAttentes = function () {
    const formData = new FormData();

    try {
        // const selectedLicenses = Array.from(document.querySelectorAll('input[name="license_types[]"]:checked'))
        //     .map(checkbox => checkbox.value);
        // const select = document.querySelector('select[name="license_types[]"]');
        // const selectedLicenses = Array.from(select.selectedOptions).map(option => option.value);
        formData.append('profession_id', document.querySelector('select[name="desired_profession_id"]').value || '');
        formData.append('contract_type', document.querySelector('select[name="contract_type"]').value || '');
        formData.append('activity_area_id', document.querySelector('select[name="activity_area_id"]').value || '');
        formData.append('max_expected_salary', document.querySelector('input[name="max_expected_salary"]').value || null);
        formData.append('min_expected_salary', document.querySelector('input[name="min_expected_salary"]').value || null);
        formData.append('categorie_socio_professionnelle', document.querySelector('select[name="categorie_socio_professionnelle"]').value || '');
        formData.append('company_size', document.querySelector('select[name="company_size"]').value || '');
        formData.append('has_driving_license', document.querySelector('select[name="has_driving_license"]').value || '');
        // formData.append('license_types[]', document.querySelector('select[name="license_types[]"]').value || '');
        // selectedLicenses.forEach(license => {
        //     formData.append('license_types[]', license);
        // });

        const select = document.querySelector('select[name="license_types[]"]');
        const selectedLicenses = Array.from(select.selectedOptions).map(option => option.value);
        selectedLicenses.forEach(value => {
            formData.append('license_types[]', value);
        });

        document.querySelectorAll('input[name^="mobility"]').forEach(input => {
            const [type, field] = input.name.match(/\[(.*?)\]/g).map(name => name.replace(/\[|\]/g, ''));
            formData.append(`mobility[${type}][${field}]`, input.type === 'checkbox' ? input.checked : input.value || '');
        });

        document.querySelectorAll('input[name^="work_mode"]').forEach(input => {
            const [type, field] = input.name.match(/\[(.*?)\]/g).map(name => name.replace(/\[|\]/g, ''));
            formData.append(`work_mode[${type}][${field}]`, input.type === 'checkbox' ? input.checked : input.value || '');
        });

        document.querySelectorAll('input[name^="work_time"]').forEach(input => {
            const [type, field] = input.name.match(/\[(.*?)\]/g).map(name => name.replace(/\[|\]/g, ''));
            formData.append(`work_time[${type}][${field}]`, input.type === 'checkbox' ? input.checked : input.value || '');
        });

        const availabilityTypeElement = document.querySelector('input[name="availability[type]"]:checked');
        if (availabilityTypeElement) {
            const availabilityType = availabilityTypeElement.value;
            formData.append('availability[type]', availabilityType);

            if (availabilityType === 'notice') {
                const noticeDuration = document.querySelector('select[name="availability[notice_duration]"]');
                if (noticeDuration) {
                    formData.append('availability[notice_duration]', noticeDuration.value || '');
                }
            }
        }

        $.ajax({
            url: `/api/profiles/store/attentes`,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // console.log("==============================");
                // console.log(response);
                if (response.error) {
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.validation_error,
                        html: response.error,
                    });
                } else {
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.form_saved,
                    });
                    window.location.href = ProfileListingRoute;
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errorMessages += `- ${errors[field].join(', ')} `;
                        }
                    }
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.validation_error,
                        html: errorMessages,
                    });
                } else {
                    // Other errors
                    const errorResponse = xhr.responseJSON || {};
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorResponse.error || window.translations.error,
                    });
                }
            },
        });
    } catch (error) {
        console.error('Error while preparing form data:', error);
        Swal.fire({
            confirmButtonText: window.translations.confirm,
            icon: 'error',
            title: 'Erreur',
            text: 'Impossible de sauvegarder les données. Veuillez vérifier le formulaire.',
        });
    }
};

// ClassicEditor.replace('cover_letter_ckeditor');

// window.updateCKEditorAndSave = function(editorId, endpoint, id) {
//     if (ClassicEditor.instances[editorId]) {
//         ClassicEditor.instances[editorId].updateElement();
//     }
//     saveForm(endpoint, id);
// }

window.updateForm = function (formName, tabNumber, formId = "") {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    // let formData = $(`#profile-form-${formName}`).serialize();
    let formSelector = formId && formId !== "" ? `#${formId}` : `#profile-form-${formName}`;
    let form = document.querySelector(formSelector);
    let formData = new FormData(form);
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }
    

    let params = new URLSearchParams(formData);
    let idValue = params.get('id');

    // if (formId && formId != "") {
    //     formData = $(`#${formId}`).serialize();
    //     params = new URLSearchParams(formData);
    //     idValue = params.get('id');
    // }
    if (formId && formId != "") {
        idValue = formData.get('id');
    }


    // console.log(formData);
    // let form = document.querySelector(`#profile-form-${formName}`);
    // let formData = new FormData(form);
    // let idValue = formData.get('id'); // Get 'id' field value

    // if (formId && formId !== "") {
    //     form = document.querySelector(`#${formId}`);
    //     formData = new FormData(form);
    //     idValue = formData.get('id');
    // }

    $.ajax({
        url: `/api/profiles/update/${formName}`,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,

        success: function (response) {
            if (response.profile_id) {
                $('input[name="profile_id"]').val(response.profile_id);
            }
            // if (formName === "formations") {
            //     formations.push(response.formation);
            //     renderForm(formName);
            // } else if (formName === "certifications") {
            //     certifications.push(response.certification);
            //     renderForm(formName);
            // } else if (formName === "experiences") {
            //     experiences.push(response.experience);
            //     renderForm(formName);
            // } else if (formName === "languages") {
            //     languages.push(response.language);
            //     renderForm(formName);
            // } else if (formName === "recommandations") {
            //     recommandations.push(response.recommandation);
            //     renderForm(formName);
            // }

            // $(`#${formId}`).parent().parent().remove();

            // function updateList(list, newItem) {
            //     const index = list.findIndex(item => item.id === newItem.id);
            //     console.log("====================");
            //     console.log(newItem);

            //     if (index !== -1) {
            //         list[index] = newItem;
            //     } else {
            //         list.push(newItem);
            //     }
            // }

            if (response && response[formName]) {

                if (formName === "formations") {
                    formations = response.formations;
                } else if (formName === "certifications") {
                    certifications = response.certifications;
                } else if (formName === "experiences") {
                    experiences = response.experiences;
                } else if (formName === "languages") {
                    languages = response.languages;
                } else if (formName === "recommandations") {
                    recommandations = response.recommandations;
                }
                toggleFormationForm(formName, idValue, false);
                renderForm(formName);

            }



            // if (
            //     formName == "formations" ||
            //     formName == "certifications" ||
            //     formName == "experiences" ||
            //     formName == "languages" ||
            //     formName == "recommandations"
            // ) {
            //     toggleFormationForm(formName, idValue, false);
            //     // addFormation(formName, response.id);
            //     renderForm(formName, response.id);
            // }
            switchToNextTab(tabNumber);

            Swal.fire({
                confirmButtonText: window.translations.confirm,
                icon: 'success',
                title: window.translations.success,
                text: window.translations.form_saved,
            });
            if (formName === "informations") {
                $("#profileLastName").val(response.profile.last_name);
                $("#profileFirstName").val(response.profile.first_name);
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorMessages += `- ${errors[field].join(', ')} `;
                    }
                }
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.validation_error,
                    html: errorMessages,
                });
            } else {
                const errorResponse = xhr.responseJSON;
                Swal.fire({
                    confirmButtonText: window.translations.confirm,
                    icon: 'error',
                    title: window.translations.error,
                    text: errorResponse.error || window.translations.error,
                });
            }
        },
    });
};

document.addEventListener('click', function (event) {
    if (event.target.parentElement.classList.contains('delete-btn')) {
        const formName = event.target.parentElement.getAttribute('data-form-name');
        const id = event.target.parentElement.getAttribute('data-id');

        deleteForm(formName, id);
    }
});

window.deleteForm = function (formName, id) {
    if (!id) {
        Swal.fire({
            confirmButtonText: window.translations.confirm,
            icon: 'warning',
            title: window.translations.warning,
            text: window.translations.no_item_selected,
        });
        return;
    }
    Swal.fire({
        confirmButtonText: window.translations.confirm,
        title: window.translations.confirm_delete,
        text: window.translations.confirm_delete_text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: window.translations.yes_delete,
        cancelButtonText: window.translations.cancel,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/api/profiles/delete/${formName}/${id}`,
                type: 'GET',
                success: function (response) {
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'success',
                        title: window.translations.deleted,
                        text: window.translations.deleted_success,
                    });
                    if (formName === "formations") {
                        formations = response.formations;
                    } else if (formName === "certifications") {
                        certifications = response.certifications;
                    } else if (formName === "experiences") {
                        experiences = response.experiences;
                    } else if (formName === "languages") {
                        languages = response.languages;
                    } else if (formName === "recommandations") {
                        recommandations = response.recommandations;
                    }
                    renderForm(formName);

                },
                error: function (xhr) {
                    const errorResponse = xhr.responseJSON;
                    Swal.fire({
                        confirmButtonText: window.translations.confirm,
                        icon: 'error',
                        title: window.translations.error,
                        text: errorResponse.error || window.translations.error,
                    });
                },
            });
        }
    });
};

$(document).ready(function () {
    // Event listener for language selection
    $('#languages-language').on('change', function () {
        var languageId = $(this).val();

        if (languageId) {
            // Make an AJAX request to fetch the skills for the selected language
            $.ajax({
                url: '/api/profiles/get-language-skills',  // Backend route to get language skills
                type: 'GET',
                data: { language_id: languageId },
                success: function (response) {
                    if (response.success) {
                        // Dynamically populate language skills form
                        $('#language-skills-container').html(response.html);
                    } else {
                        $('#language-skills-container').html('<p>' + window.translations.no_skill_for_language + '</p>');
                    }
                },
                error: function () {
                    $('#language-skills-container').html('<p>' + window.translations.error_loading_language_skills + '</p>');
                }
            });
        } else {
            // Clear the skills container if no language is selected
            $('#language-skills-container').html('');
        }
    });
});

window.toggleFormationForm = function (formName, formationId, showForm) {
    const viewElement = document.getElementById(`view-${formName}-${formationId}`);
    const formElement = document.getElementById(`form-${formName}-${formationId}`);

    // if (!viewElement || !formElement) {
    //     console.warn(`Elements manquants pour formation ID: ${formationId}`);
    //     return;
    // }
    if (!formElement) {
        console.warn(`form manquants pour formation ID: ${formationId}`);
        return;
    }
    if (!viewElement) {
        console.warn(`element manquants pour formation ID: ${formationId}`);
        return;
    }

    if (showForm) {
        viewElement.classList.add('d-none');
        formElement.classList.remove('d-none');
    } else {
        viewElement.classList.remove('d-none');
        formElement.classList.add('d-none');
    }
};

window.deleteCard = function (formName, id) {

    console.log(experiences);
    if (formName === "formations") {
        formations = formations.filter((formation) => formation.id !== id);
    } else if (formName === "certifications") {
        certifications = certifications.filter((certification) => certification.id !== id);
    } else if (formName === "experiences") {
        experiences = experiences.filter((experience) => experience.id !== id);
    } else if (formName === "languages") {
        languages = languages.filter((language) => language.id !== id);
    } else if (formName === "recommandations") {
        recommandations = recommandations.filter((recommandation) => recommandation.id !== id);
    }


    renderForm(formName);

    // renderForm(formName);

    // const formElement = document.getElementById(`${formName}-form-card-${id}`);
    // const viewElement = document.getElementById(`view-${formName}-${id}`);
    // const formElementEdit = document.getElementById(`form-${formName}-${id}`);
    // if (formElement) {
    //     formElement.remove();
    // }
    // if (viewElement) {
    //     viewElement.remove();
    // }
    // if (formElementEdit) {
    //     formElementEdit.remove();
    // }
}

// document.addEventListener("DOMContentLoaded", function () {
//     const selectedDisplay = document.getElementById("selected-license");
//     const checkboxes = document.querySelectorAll("input[name='license_types[]']");

//     function updateSelectedDisplay() {
//         const selected = Array.from(checkboxes)
//             .filter(cb => cb.checked)
//             .map(cb => cb.parentElement.textContent.trim());

//         selectedDisplay.textContent = selected.length > 0 ?
//             selected.join(', ') :
//             window.translations.license; // Fallback text
//     }

//     // Attach change listener to each checkbox
//     checkboxes.forEach(cb => {
//         cb.addEventListener('change', updateSelectedDisplay);
//     });

//     // Run on page load (for old values or default)
//     updateSelectedDisplay();



//     // const hasDrivingLicense = document.getElementById("has_driving_license");
//     // const licenseTypeContainer = document.getElementById("license-type-container");

//     // function toggleLicenseTypeVisibility() {
//     //     console.log("iiiiiiiiiiiiiiiiiiiiiiiii");
//     //     const show = hasDrivingLicense.value === "true";
//     //     licenseTypeContainer.style.display = show ? 'block' : 'none';
//     // }

//     // // Run on change
//     // hasDrivingLicense.addEventListener('change', toggleLicenseTypeVisibility);

//     // // Run once on load
//     // toggleLicenseTypeVisibility();

// });

document.addEventListener("DOMContentLoaded", function () {
    let immediateRadio = document.getElementById("immediate");
    let noticeRadio = document.getElementById("notice");
    let noticeDuration = document.getElementById("notice-duration-container"); // Récupère le parent div

    function toggleNoticeDuration() {
        if (noticeRadio.checked) {
            noticeDuration.style.display = "block"; // Affiche si "Préavis" est sélectionné
        } else if (immediateRadio.checked) {
            noticeDuration.style.display = "none"; // Cache si "Immédiate" est sélectionné
        }
    }

    // Ajoute un événement pour écouter les changements sur les radios
    immediateRadio.addEventListener("change", toggleNoticeDuration);
    noticeRadio.addEventListener("change", toggleNoticeDuration);

    // S'assurer que le select est visible au chargement tant qu'aucun radio n'est coché
    if (!immediateRadio.checked && !noticeRadio.checked) {
        noticeDuration.style.display = "block"; // Visible par défaut
    } else {
        toggleNoticeDuration(); // Applique la logique si un radio est déjà coché
    }
});

$(document).ready(function () {
    const $select1 = $('#has_driving_license');
    const $licenseTypeContainer = $('#license-type-container');

    function toggleLicenseTypes() {
        if ($select1.val() === 'true') {
            $licenseTypeContainer.show().removeClass('d-none');
        } else {
            $licenseTypeContainer.hide().addClass('d-none');
        }
    }

    // Exécuter au chargement de la page
    // toggleLicenseTypes();

    // Écouter les changements
    $select1.on('change', toggleLicenseTypes);
});