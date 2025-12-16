$(document).ready(function () {
    let questionIndex = $('#questionsContainer').children('.questionCard').length; // Comptez les questions existantes


    // Ajouter une nouvelle question
    $('#addQuestionButton').on('click', function () {
        questionIndex++;

        // Initialise la variable pour les options de types de question
        let optionsHtml = `
        <option value="" disabled selected class="translated_text">-- ${window.translations.select_type} --</option>`;

        // Ajout des options dans optionsHtml via $.each
        $.each(typesQuestions, function (key, value) {
            optionsHtml += `<option value="${key}">${value}</option>`;
        });




        let questionHtml = `
                    <div class="card border-0 questionCard" data-index="0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row mb-1">
                <div class="question" data-index="${questionIndex}">
                   <h6 class="title custom-title mb-4 translated_text">${window.translations.question_type} :</h6>



                     <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-group position-relative check-valid is-valid">
                                 <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                  <select
                                                                  name="questions[${questionIndex}][type]" class="form-select border-0 questionTypeSelect" data-index="${questionIndex}">
                                                                        ${optionsHtml} <!-- Insertion des options en dehors de la boucle -->
                                                                    </select>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                    <div class="questionOptions" id="questionOptions_${questionIndex}">
                        <!-- Contenu dynamique des options en fonction du type de question -->
                    </div>
                </div>
                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <hr>`;

        $('#questionsContainer').append(questionHtml);
    });

    // Gestion de changement du type de question
    $(document).on('change', '.questionTypeSelect', function () {
        const questionIndex = $(this).data('index');
        const selectedType = $(this).val();



        // Construire le formulaire en fonction du type sélectionné
        let optionsHtml = '';
        switch (selectedType) {
            case "1":
                optionsHtml = `
                            <div class="row mb-4">
                               <div class="col-12 col-md-6 col-lg-12">
                                   <h6 class="mb-4 translated_text">${window.translations.question} :</h6>
                               </div>
                               <div class="col-12 mb-4">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][question_text]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                            </div>

                               <div class="col-12 col-md-6 col-lg-12">
                                   <h6 class="mb-2 translated_text">${window.translations.points} :</h6>
                               </div>
                               <div class="col-12 mb-4">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][point]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                                </div>

                            <div class="col-12 col-md-6 col-lg-12 mt-2">
                                <h6 class="mb-2 translated_text">${window.translations.options_qcm} :</h6>
                            </div>
                            <div class="col-4 mt-4">
                                  <button class="btn btn-theme mnw-100 bg-green addOptionButton"
                                 style="font-size: 14px;"
                                 data-index="${questionIndex}"
                                 >${window.translations.add_option}
                                 </button>
                            </div>



                            <div class="optionsContainer" id="optionsContainer_${questionIndex}"></div>
                        `;
                break;

            case "2":
                optionsHtml = `
                            <div class="row mb-4">
                               <div class="col-12 col-md-6 col-lg-12">
                                   <h6 class="mb-4 translated_text">${window.translations.question} :</h6>
                               </div>
                               <div class="col-12">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][question_text]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                               </div>

                                   <div class="col-12 col-md-6 col-lg-12 mt-4">
                                   <h6 class="mb-2 translated_text">${window.translations.points} :</h6>
                               </div>
                               <div class="col-12 mb-4">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][point]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                                </div>

                               <div class="col-12 col-md-6 col-lg-12 mt-2">
                                   <h6 class="mb-4 translated_text">${window.translations.options_qcu} :</h6>
                               </div>
                               <div class="col-4">
                                  <button class="btn btn-theme mnw-100 bg-green addOptionQCUButton"
                                 style="font-size: 14px;"
                                 data-index="${questionIndex}"
                                 >${window.translations.add_option}
                                 </button>
</div>



                            <div class="optionsContainer" id="optionsContainer_${questionIndex}"></div>
            `;

                break;

            case "3":
                optionsHtml = `
                <div class="row mb-4">
                  <div class="col-12 col-md-6 col-lg-12">
                                   <h6 class="mb-4 translated_text">${window.translations.question} :</h6>
                               </div>
                               <div class="col-12">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][question_text]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                               </div>

                                   <div class="col-12 col-md-6 col-lg-12 mt-4">
                                   <h6 class="mb-2 translated_text">${window.translations.points} :</h6>
                               </div>
                               <div class="col-12 mb-4">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][point]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                                </div>

                    <div class="col-12 mt-2">
                        <h6 class="mb-4 translated_text">${window.translations.answer_with} :</h6>
                    </div>
                    <div class="col-12 d-flex align-items-center gap-4">
                        <!-- Option Vrai -->
                        <label class="form-check-label">
                            <input type="radio" name="questions[${questionIndex}][correct_answer]" value="true" class="form-check-input" required>
                            <span class="translated_text">${window.translations.true}</span>
                        </label>
                        <!-- Option Faux -->
                        <label class="form-check-label">
                            <input type="radio" name="questions[${questionIndex}][correct_answer]" value="false" class="form-check-input" required>
                            <span class="translated_text">${window.translations.false}</span>
                        </label>
                    </div>
                </div>
            `;

                break;

            case "4":
                optionsHtml = `
 <div class="row mb-4">
                               <div class="col-12 col-md-6 col-lg-12">
                                   <h6 class="mb-4 translated_text">${window.translations.question} :</h6>
                               </div>
                               <div class="col-12">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][question_text]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                               </div>
                               </div>

                                  <div class="col-12 col-md-6 col-lg-12 mt-4">
                                   <h6 class="mb-2 translated_text">${window.translations.points} :</h6>
                               </div>
                               <div class="col-12 mb-4">
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][point]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                                </div>

                           <label class="translated_text">${window.translations.elements_to_class} :</label><br>
        <button type="button" class="addOptionClassementButton btn btn-theme mnw-100 bg-green mb-2 translated_text mt-2" data-index="${questionIndex}">
            ${window.translations.add_element}
        </button>
        <div class="optionsContainer" id="optionsContainer_${questionIndex}"></div>

                        `;
                break;

            case "5":
                optionsHtml = `
        <div class="row mb-4">
            <div class="col-12 col-md-6 col-lg-12">
                <h6 class="mb-4 translated_text">${window.translations.question} :</h6>
            </div>
            <div class="col-12">
                <div class="form-group mb-0 position-relative is-valid check-valid">
                    <div class="form-floating">
                        <input type="text"
                            name="questions[${questionIndex}][question_text]"
                            class="form-control border-start-0 h-auto translated_text"
                            required
                            placeholder="${window.translations.enter_instruction}...">
                    </div>
                </div>
            </div>
        </div>
              <div class="col-12 col-md-6 col-lg-12 mt-4">
                                   <h6 class="mb-2 translated_text">${window.translations.points} :</h6>
                               </div>
                               <div class="col-12 mb-4">p
                                    <div class="form-group mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                                              <input type="text" name="questions[${questionIndex}][point]"
                                              class="form-control border-start-0 h-auto"
                                              required>
                                         </div>
                                    </div>
                                </div>

        <label class="translated_text mt-4 mb-2">${window.translations.correspondances} :</label><br>
        <button type="button" class="addPairButton btn btn-theme mb-2" data-index="${questionIndex}">
            ${window.translations.add_pair}
        </button>
        <div class="pairsContainer" id="pairsContainer_${questionIndex}"></div>
    `;

                break;

            default:
                optionsHtml = '';
                break;
        }

        $(`#questionOptions_${questionIndex}`).html(optionsHtml);
    });

    // Ajouter des options multiples (pour QCM)
    $(document).on('click', '.addOptionButton', function () {
        const questionIndex = $(this).data('index');
        let optionsContainer = $(`#optionsContainer_${questionIndex}`);
        let optionIndex = optionsContainer.children().length;

        optionsContainer.append(`
 <div class="col-12 mt-3">
                                    <div class="mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                    <div class="option d-flex align-items-center gap-3">
                        <input type="text" name="questions[${questionIndex}][options][${optionIndex}][answer_text]" placeholder="${window.translations.option}"
                         class="form-control border-start-0 h-auto translated_text" style="width: 36%"
                         required>
                        <label class="translated_text">${window.translations.correct}</label>
                        <input type="checkbox" name="questions[${questionIndex}][options][${optionIndex}][is_correct]" value="1">
                        <button type="button" class="btn btn-danger btn-sm removeOptionButton">
                            <i class="bi bi-trash"></i>
                        </button>


                    </div>
                    </div>
                    </div>
                    </div>
                `);
    });


    // Ajouter des options multiples (pour QCU)
    $(document).on('click', '.addOptionQCUButton', function () {
        const questionIndex = $(this).data('index');
        let optionsContainer = $(`#optionsContainer_${questionIndex}`);
        let optionIndex = optionsContainer.children().length;

        optionsContainer.append(`
 <div class="col-12 mt-3">
                                    <div class="mb-0 position-relative is-valid check-valid">
                                         <div class="form-floating">
                    <div class="option d-flex align-items-center gap-3">
                        <input type="text" name="questions[${questionIndex}][options][${optionIndex}][answer_text]" placeholder="${window.translations.option}"
                         class="form-control border-start-0 h-auto translated_text" style="width: 36%"
                         required>
                        <label class="translated_text">${window.translations.correct}</label>
                        <input type="radio" name="questions[${questionIndex}][options][0][is_correct]" value="1">
                        <button type="button" class="btn btn-danger btn-sm removeOptionButton">
                            <i class="bi bi-trash"></i>
                        </button>


                    </div>
                    </div>
                    </div>
                    </div>
                `);
    }); // Ajouter des options multiples (pour QCU)


// Ajouter dynamiquement une option à une question de type Classement
    $(document).on('click', '.addOptionClassementButton', function () {
        const questionIndex = $(this).data('index');
        let optionsContainer = $(`#optionsContainer_${questionIndex}`);
        let optionIndex = optionsContainer.children().length;

        optionsContainer.append(`
        <div class="col-12 mt-3">
            <div class="mb-0 position-relative is-valid check-valid">
                <div class="form-floating">
                    <div class="option d-flex align-items-center gap-3">
                        <input type="text" name="questions[${questionIndex}][options][${optionIndex}][answer_text]"
                               placeholder="${window.translations.option}"
                               class="form-control border-start-0 h-auto translated_text" style="width: 36%" required>
                        <label>${window.translations.order}</label>
                        <input type="number" name="questions[${questionIndex}][options][${optionIndex}][order]"
                               class="form-control border-start-0 h-auto" style="width: 20%">

                        <button type="button" class="btn btn-danger btn-sm removeOptionButton">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `);
    });

// Suppression dynamique d'une option
    $(document).on('click', '.removeOptionButton', function () {
        $(this).closest('.col-12').remove(); // Supprimer toute la ligne contenant l'option
    });

    // Ajouter une paire pour APPARIEMENT
    $(document).on('click', '.addPairButton', function () {
        const questionIndex = $(this).data('index');
        let pairsContainer = $(`#pairsContainer_${questionIndex}`);
        let pairIndex = pairsContainer.children('.pair').length; // Compte uniquement les paires existantes, même après suppression.

        pairsContainer.append(`
            <div class="col-12 mt-3 pair">
                <div class="mb-0 position-relative is-valid check-valid">
                    <div class="form-floating">
                        <div class="d-flex align-items-center gap-3">
                            <input type="text" name="questions[${questionIndex}][options][${pairIndex}][left_item]"
                                   placeholder="${window.translations.question_element} (Élément gauche)"
                                   class="form-control border-start-0 h-auto translated_text"
                                   style="width: 36%"
                                   required>
                            <input type="text" name="questions[${questionIndex}][options][${pairIndex}][right_item]"
                                   placeholder="${window.translations.response} (Élément droit)"
                                   class="form-control border-start-0 h-auto translated_text"
                                   style="width: 36%"
                                   required>
                            <button type="button" class="btn btn-danger btn-sm removeOptionButton">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
       `);
    });


    $(document).on('click', '.removeOptionButton', function () {
        $(this).closest('.option, .pair').remove(); // Supprime option ou paire.
    });


    ClassicEditor
        .create(document.querySelector('#editor-start-message'))
        .then(editor => {
            window.startMessageEditor = editor; // Sauvegarde globale
        })
        .catch(error => {
            console.error('Erreur lors de l\'initialisation de CKEditor :', error);
        });

    ClassicEditor
        .create(document.querySelector('#editor-end-message'))
        .then(editor => {
            window.endMessageEditor = editor; // Sauvegarde globale
        })
        .catch(error => {
            console.error('Erreur lors de l\'initialisation de CKEditor :', error);
        });

    // Soumettre le formulaire
    $('#form-test').on('submit', function (e) {
        e.preventDefault();

        let isValid = true;

        if (!window.startMessageEditor) {
            Swal.fire({
                title: window.translations.error,
                text: window.translations.error_occurred,         // "L'éditeur CKEditor n'est pas encore prêt. Veuillez attendre un instant.",
                icon: "error",
                confirmButtonText: window.translations.close,
            });
            return;
        }

        if (!window.endMessageEditor) {
            Swal.fire({
                title: window.translations.error,
                text: window.translations.error_occurred,               // "L'éditeur CKEditor n'est pas encore prêt. Veuillez attendre un instant.",
                icon: "error",
                confirmButtonText: window.translations.close,
            });
            return;
        }

        let startMessageContent = window.startMessageEditor.getData();
        startMessageContent = startMessageContent.replace(/<\/?p>/g, '');
        startMessageContent = startMessageContent.trim();

        $('#editor-start-message').val(startMessageContent);

        let endMessageContent = window.endMessageEditor.getData();
        endMessageContent = endMessageContent.replace(/<\/?p>/g, '');
        endMessageContent = endMessageContent.trim();

        $('#editor-end-message').val(endMessageContent);


        // Validation des champs obligatoires
        $(this).find('input[required], select[required]').each(function () {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            Swal.fire({
                title: window.translations.error,
                text: window.translations.error_occurred,                       // "Veuillez remplir tous les champs obligatoires.",
                icon: "error",
                confirmButtonText: window.translations.close,
            });
            return; // Annule l'envoi si un champ est invalide
        }

        // Si tout est valide, envoyer via AJAX
        $.ajax({
            url: apiCreateEditTest,
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: window.translations.success,
                    text: window.translations.test_added,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '/test-technique';
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
                        title: window.translations.error,
                        html: errorMessage,
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                } else {
                    Swal.fire({
                        title: window.translations.error,
                        text: window.translations.error_occurred,               // "Une erreur est survenue lors de l'ajout du Test.",
                        icon: "error",
                        confirmButtonText: window.translations.close,
                    });
                }
            },
        });
    });



    // Preview the test with questions
    let currentIndex = 0;

    const $questionContent = $('#question-content');
    const $prevBtn = $('#prev-btn');
    const $nextBtn = $('#next-btn');

    // Fonction pour charger une question
    function loadQuestion(index) {
        const question = questions[index];
        let questionHtml = `
                <div class="mb-4">
                    <div class="mb-2">
                        <strong>${window.translations.question} ${index + 1} :</strong>
                        ${question.question_text}
                    </div>
            `;

        // Type 1: QCM (Checkboxes)
        if (question.type == 1) {
            question.answers.forEach(answer => {
                questionHtml += `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">${answer.answer_text}</label>
                        </div>
                    `;
            });
        }
        // Type 2: QCU (Radio)
        else if (question.type == 2) {
            question.answers.forEach(answer => {
                questionHtml += `
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q${index}" disabled>
                            <label class="form-check-label">${answer.answer_text}</label>
                        </div>
                    `;
            });
        }
        // Type 3: Vrai/Faux
        else if (question.type == 3) {
            questionHtml += `
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q${index}" disabled>
                        <label class="form-check-label">${window.translations.true}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q${index}" disabled>
                        <label class="form-check-label">${window.translations.false}</label>
                    </div>
                `;
        }

        questionHtml += `</div>`;
        $questionContent.html(questionHtml);

        // Gérer les états des boutons
        $prevBtn.prop('disabled', index === 0);
        $nextBtn.prop('disabled', index === questions.length - 1);
    }


    // Événement bouton "Suivant"
    $nextBtn.on('click', function () {
        if (currentIndex < questions.length - 1) {
            currentIndex++;
            loadQuestion(currentIndex);
        }
    });

    // Événement bouton "Précédent"
    $prevBtn.on('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            loadQuestion(currentIndex);
        }
    });

    // Charger la première question
    loadQuestion(currentIndex);


})
