$(document).ready(function () {

    matchingDetailProfile = Object.values(matchingDetailProfile);
    console.log(matchingDetailProfile);
    matchingDetailProfile.forEach(element => {
        let cercleId = `circleprogressgreenRM-${element.id}`;
        var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
            color: '#2e9c65',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            trailColor: '#2e9c657a',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#2e9c65',
                width: 10
            },
            to: {
                color: '#2e9c65',
                width: 10
            },
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(element.skill_match_score * 100);
                // if (value === 0) {
                //     circle.setText('');
                // } else {
                //     circle.setText(value + "<small>%<small>");
                // }
                circle.setText(value + "<small>%<small>");

            }
        });
        // progressCirclesred1.text.style.fontSize = '20px';
        progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

    });



    matchingDetailMobilityGeographique = Object.values(matchingDetailMobilityGeographique);
    matchingDetailMobilityGeographique.forEach(element => {
        let cercleId = `circleprogressgreenRM-${element.id}`;
        var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
            color: '#2e9c65',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            trailColor: '#2e9c657a',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#2e9c65',
                width: 10
            },
            to: {
                color: '#2e9c65',
                width: 10
            },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(element.skill_match_score * 100);
                // if (value === 0) {
                //     circle.setText('');
                // } else {
                //     circle.setText(value + "<small>%<small>");
                // }
                circle.setText(value + "<small>%<small>");

            }
        });
        // progressCirclesred1.text.style.fontSize = '20px';
        progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

    });


    matchingDetailsModeWork = Object.values(matchingDetailsModeWork);
    matchingDetailsModeWork.forEach(element => {
        let cercleId = `circleprogressgreenRM-${element.id}`;
        var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
            color: '#2e9c65',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            trailColor: '#2e9c657a',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#2e9c65',
                width: 10
            },
            to: {
                color: '#2e9c65',
                width: 10
            },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(element.skill_match_score * 100);
                // if (value === 0) {
                //     circle.setText('');
                // } else {
                //     circle.setText(value + "<small>%<small>");
                // }
                circle.setText(value + "<small>%<small>");

            }
        });
        // progressCirclesred1.text.style.fontSize = '20px';
        progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

    });

    matchingDetailsTimeWork = Object.values(matchingDetailsTimeWork);
    matchingDetailsTimeWork.forEach(element => {
        let cercleId = `circleprogressgreenRM-${element.id}`;
        var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
            color: '#2e9c65',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 10,
            trailWidth: 10,
            easing: 'easeInOut',
            trailColor: '#2e9c657a',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#2e9c65',
                width: 10
            },
            to: {
                color: '#2e9c65',
                width: 10
            },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(element.skill_match_score * 100);
                // if (value === 0) {
                //     circle.setText('');
                // } else {
                //     circle.setText(value + "<small>%<small>");
                // }
                circle.setText(value + "<small>%<small>");

            }
        });
        // progressCirclesred1.text.style.fontSize = '20px';
        progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

    });


    let skillTypes = Object.keys(groupedTechnicalSkills); // Récupérer les types de compétences (clés des groupes)

    skillTypes.forEach(skillType => {
        // Récupérer les compétences spécifiques dans le groupe correspondant
        let skillsInGroup = groupedTechnicalSkills[skillType];

        skillsInGroup.forEach(element => {
            let cercleId = `circleprogressgreenRM-${element.id}`; // ID du cercle
            var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                color: '#2e9c65',
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                step: function (state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    // Calculer et afficher la valeur dans le cercle
                    var value = Math.round(element.skill_match_score * 100);
                    // if (value === 0) {
                    //     circle.setText('');
                    // } else {
                    //     circle.setText(value + "<small>%<small>");
                    // }
                    circle.setText(value + "<small>%<small>");
                }
            });

            // Animer le cercle avec le skill_match_score
            progressCirclesredRM.animate(element.skill_match_score); // Valeur entre 0 et 1
        });
    });


    let personalSkillTypes = Object.keys(groupedPersonalSkills); // Récupérer les types de compétences (clés des groupes)

    personalSkillTypes.forEach(skillType => {
        // Récupérer les compétences spécifiques dans le groupe correspondant
        let skillsInGroup = groupedPersonalSkills[skillType];

        skillsInGroup.forEach(element => {
            let cercleId = `circleprogressgreenRM-${element.id}`; // ID du cercle
            var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                color: '#2e9c65',
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                step: function (state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    // Calculer et afficher la valeur dans le cercle
                    var value = Math.round(element.skill_match_score * 100);
                    // if (value === 0) {
                    //     circle.setText('');
                    // } else {
                    //     circle.setText(value + "<small>%<small>");
                    // }
                    circle.setText(value + "<small>%<small>");
                }
            });

            // Animer le cercle avec le skill_match_score
            progressCirclesredRM.animate(element.skill_match_score); // Valeur entre 0 et 1
        });
    });

    matchingDetailsLinguistiqueSkills = Object.values(matchingDetailsLinguistiqueSkills);
    matchingDetailsLinguistiqueSkills.forEach(element => {
        element.forEach(element2 => {
            let cercleId = `circleprogressgreenRM-${element2.id}`;
            var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(element2.skill_match_score * 100);
                    //    if (value === 0) {
                    //        circle.setText('');
                    //    } else {
                    //        circle.setText(value + "<small>%<small>");
                    //    }
                    circle.setText(value + "<small>%<small>");

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM.animate(element2.skill_match_score); // Number from 0.0 to 1.0
        });
    });





});
