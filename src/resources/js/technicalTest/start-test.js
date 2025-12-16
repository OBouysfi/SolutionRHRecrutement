$(document).ready(function () {

    let currentIndex = 0;

    const $questionContent = $('#question-content');
    const $prevBtn = $('#prev-btn');
    const $nextBtn = $('#next-btn');
    const $submitBtn = $('#submit-btn'); // Bouton "Soumettre"

    // Fonction pour charger une question
    function loadQuestion(index) {
        const question = questions[index];
        let existingAnswers = userAnswers[index]?.selected_answers || [];

        let questionHtml = `
            <div class="mb-4 ">
                <div class="mb-2">
                    <strong>Question ${index + 1} :</strong>
                    ${question.question_text}
                </div>
        `;

        if (question.type == 1) {
            question.answers.forEach((answer, answerIndex) => {
                questionHtml += `
                    <div class="form-check">
                        <input class="form-check-input" id="q${index}-${answerIndex}" type="checkbox" value="${answer.id}"
                         ${existingAnswers.includes(answer.id.toString()) ? 'checked' : ''}>
                        <label class="form-check-label" for="q${index}-${answerIndex}">${answer.answer_text}</label>
                    </div>
                `;
            });
        } else if (question.type == 2) {
            question.answers.forEach((answer, answerIndex) => {
                questionHtml += `
                    <div class="form-check">
                        <input class="form-check-input" id="q${index}-${answerIndex}" type="radio" name="q${index}" value="${answer.id}">
                        <label class="form-check-label" for="q${index}-${answerIndex}">${answer.answer_text}</label>
                    </div>
                `;
            });
        } else if (question.type == 3) {
            questionHtml += `
                <div class="form-check">
                    <input class="form-check-input" id="q${index}-1" type="radio" value="true" name="q${index}">
                    <label class="form-check-label" for="q${index}-1">Vrai</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="q${index}-2" type="radio" value="false" name="q${index}">
                    <label class="form-check-label" for="q${index}-2">Faux</label>
                </div>
            `;
        } else if (question.type == 4) {
            question.answers.forEach((answer, answerIndex) => {
                const existingOrder = existingAnswers.find((a) => a.answer_id == answer.id)?.order || '';
                questionHtml += `
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span>${answer.answer_text}</span>
                    <label for="order-${index}-${answerIndex}" class="form-label">Ordre :</label>
                    <input class="form-control w-auto" type="number" min="1"
                           id="order-${index}-${answerIndex}" value="${existingOrder}"
                           data-answer-id="${answer.id}" placeholder="Saisir un ordre...">
                </div>
            `;
            });


            questionHtml += `
            <small class="text-muted">Veuillez entrer un numéro pour chaque option afin de définir l'ordre (utilisez un unique numéro pour chaque choix).</small>
        `;
        }
        else if (question.type == 5) {
            questionHtml += `
    <div id="pairs-container-${question.id}">
    `;

            if (question.answers.length > 0) {

                questionHtml += `
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5>Éléments Gauches</h5>
                    ${question.answers.map(answer => `
                        <span class="option-box bg-light p-2 mb-1">
                            ${answer.left_item}
                        </span>
                    `).join('')}
                </div>

                <div>
                    <h5>Éléments Droits</h5>
                    ${question.answers.map(answer => `
                        <span class="option-box bg-light p-2 mb-1">
                            ${answer.right_item}
                        </span>
                    `).join('')}
                </div>
            </div>

            <div>
                <h5>Vos Réponses</h5>
        `;


                question.answers.forEach((answer, pairIndex) => {
                    questionHtml += `
            <div class="d-flex align-items-center mb-3">

                <input type="text"
                    class="form-control me-2 candidate-answer"
                    name="candidate_answers[${pairIndex}][left_item]"
                    id="candidate-pair-left-${pairIndex}"
                    value=""
                    placeholder="Élément gauche" required>
                <input type="text"
                    class="form-control me-2 candidate-answer"
                    name="candidate_answers[${pairIndex}][right_item]"
                    id="candidate-pair-right-${pairIndex}"
                    value=""
                    placeholder="Élément droit" required>
            </div>
            `;

                    questionHtml += `
            <input type="hidden"
                name="correct_answers[${pairIndex}][left_item]"
                value="${answer.left_item}">
            <input type="hidden"
                name="correct_answers[${pairIndex}][right_item]"
                value="${answer.right_item}">
            `;
                });
            } else {
                questionHtml += `
        <p class="text-warning">Aucune paire disponible.</p>
        `;
            }

            questionHtml += `</div>`;
        }


        questionHtml += `</div>`;
        $questionContent.html(questionHtml);

        $prevBtn.prop('disabled', index === 0);
        $nextBtn.prop('disabled', index === questions.length - 1);

        if (index === questions.length - 1) {
            $nextBtn.hide();
            $submitBtn.show();
        } else {
            $nextBtn.show();
            $submitBtn.hide();
        }

        $(`#question-content .form-check-input`).on('change', function () {
            saveUserAnswer(index);
        });

        $(`#question-content input`).on('input', function () {
            saveUserAnswer(index);
        });


    }

    $nextBtn.on('click', function () {
        const currentInputs = $questionContent.find('input');
        const question = questions[currentIndex];
        let isAnswered = false;

        if (question.type == 1 || question.type == 2 || question.type == 3) {
            isAnswered = currentInputs.is(':checked');
        } else if (question.type == 4) {
            const inputsWithValues = currentInputs
                .filter((index, input) => $(input).val() && parseInt($(input).val()) > 0);
            isAnswered = inputsWithValues.length === question.answers.length;
        } else if (question.type == 5) {
            const leftInputs = currentInputs.filter('[name^="candidate_answers"][name*="[left_item]"]');
            const rightInputs = currentInputs.filter('[name^="candidate_answers"][name*="[right_item]"]');

            const filledPairs = leftInputs.filter((index, input) => $(input).val().trim() !== '').length;
            const filledRightPairs = rightInputs.filter((index, input) => $(input).val().trim() !== '').length;

            isAnswered = filledPairs === question.answers.length && filledRightPairs === question.answers.length;
        }


        if (!isAnswered) {
            Swal.fire({
                icon: 'warning',
                title: 'Attention',
                text: 'Veuillez répondre à la question avant de continuer.',
                confirmButtonText: 'OK'
            });
            return;
        }

        if (currentIndex < questions.length - 1) {
            currentIndex++;
            loadQuestion(currentIndex);
        }
    });

    $prevBtn.on('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            loadQuestion(currentIndex);
        }
    });
    let userAnswers = [];

    loadQuestion(currentIndex);

    $(document).on('keydown', function (e) {
        if (e.key === 'ArrowRight' && currentIndex < questions.length - 1) {
            currentIndex++;
            loadQuestion(currentIndex);
        } else if (e.key === 'ArrowLeft' && currentIndex > 0) {
            currentIndex--;
            loadQuestion(currentIndex);
        }
    });

    function saveUserAnswer(index) {
        const question = questions[index];
        let selectedAnswers = [];

        if (question.type == 1) {
            $(`#question-content`)
                .find(`input[type="checkbox"]:checked`)
                .each(function () {
                    selectedAnswers.push($(this).val());
                });
        } else if (question.type == 2 || question.type == 3) {
            const selected = $(`#question-content`)
                .find(`input[type="radio"]:checked`)
                .val();
            if (selected) {
                selectedAnswers.push(selected);
            }
        } else if (question.type == 4) {
            $(`#question-content input[type="number"]`).each(function () {
                const answerId = $(this).data("answer-id");
                const order = parseInt($(this).val());

                if (!isNaN(order) && order > 0) {
                    selectedAnswers.push({
                        answer_id: answerId,
                        order: order,
                    });
                }
            });

            selectedAnswers.sort((a, b) => a.order - b.order);
        } else if (question.type == 5) {
            $(`#pairs-container-${question.id}`)
                .find(`.candidate-answer`)
                .each(function () {
                    const leftItem = $(this)
                        .closest(".d-flex")
                        .find(`[name^="candidate_answers"][name*="[left_item]"]`)
                        .val()
                        .trim();

                    const rightItem = $(this)
                        .closest(".d-flex")
                        .find(`[name^="candidate_answers"][name*="[right_item]"]`)
                        .val()
                        .trim();

                    if (leftItem && rightItem) {
                        selectedAnswers.push({
                            left_item: leftItem,
                            right_item: rightItem,
                        });
                    }
                });

            const uniqueAnswers = [];
            const seen = new Set();

            selectedAnswers.forEach((pair) => {
                const key = `${pair.left_item}|${pair.right_item}`; // Create a unique key
                if (!seen.has(key)) {
                    seen.add(key);
                    uniqueAnswers.push(pair); // Add unique pairs only
                }
            });

            selectedAnswers = uniqueAnswers;

        }

        userAnswers[index] = {
            question_id: question.id,
            question_type: question.type,
            point: question.point,
            selected_answers: selectedAnswers,
        };

    }


    $submitBtn.on('click', function () {
        $.ajax({
            url: apiSubmitTest,
            method: 'POST',
            data: {
                profile_id: $('#candidate-id').val(),
                test_id: $('#test-id').val(),
                answers: userAnswers,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.status == 'success') {
                    Swal.fire({
                        title: 'Test soumis avec succès',
                        text: 'Vos réponses ont été enregistrées et un email de confirmation vous a été envoyé.',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        window.location.href = '/candidate-portal/fiche-candidat-test';
                    })
                }
            },
            error: function (error) {
                console.error(error.responseJSON);
                alert("Une erreur est survenue lors de la soumission.");
            },
        });
    });


    $('#start-btn').on('click', function () {
        $('#start-message-container').hide();
        $('#question-container').fadeIn();

        const element = document.documentElement;
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }

        document.addEventListener('fullscreenchange', handleFullscreenExit);
        document.addEventListener('webkitfullscreenchange', handleFullscreenExit);
        document.addEventListener('mozfullscreenchange', handleFullscreenExit);
        document.addEventListener('msfullscreenchange', handleFullscreenExit);


    });

    function handleFullscreenExit() {
        if (!document.fullscreenElement &&
            !document.webkitFullscreenElement &&
            !document.mozFullScreenElement &&
            !document.msFullscreenElement) {
            Swal.fire({
                title: 'Attention!',
                text: 'Êtes-vous sûr de vouloir quitter le mode plein écran ? Vous quitterez également le test si vous confirmez.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, quitter',
                cancelButtonText: 'Non, continuer',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/candidate-portal/fiche-candidat-test';
                } else {
                    const element = document.documentElement;
                    if (element.requestFullscreen) {
                        element.requestFullscreen();
                    } else if (element.mozRequestFullScreen) {
                        element.mozRequestFullScreen();
                    } else if (element.webkitRequestFullscreen) {
                        element.webkitRequestFullscreen();
                    } else if (element.msRequestFullscreen) {
                        element.msRequestFullscreen();
                    }
                }
            });
        }
    }


});
