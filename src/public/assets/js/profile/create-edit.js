$(document).ready(function () {
    
    // $('.lettre-1 .dz-button').html("Télécharger Curriculum Vitae<br>Format PDF");
    // $('.lettre-2 .dz-button').html("Télécharger lettre de motivation<br>Format PDF");
    // $('.lettre-3 .dz-button').html("Télécharger CV vidéo<br>Format MP4<br>Taille maximum 250 Mo");
    $('.tkh-filter label').addClass('hidden');
    $('.tkh-filter select').addClass('filter-empty');
    $('.tkh-filter select').on('change', function () {
        var value = $(this).val();
        if (value != 0) {
            $(this).parent('.tkh-filter').children('label').removeClass('hidden');
            $(this).removeClass('filter-empty');
            //$(this+' select').removeClass('filter-empty');
        } else {
            $(this).parent('.tkh-filter').children('label').addClass('hidden');
            $(this).addClass('filter-empty');
        }
    })
    $('#click2e3').on('change', function () {
        var value = $(this).val();
        if (value == 1) {
            $('.niveau-autre').removeClass('hidden');
        } else {
            $('.niveau-autre').addClass('hidden');
        }
    })
    // $('.bi-camera').on('click', function () {
    //     $('#demofile').click();
    // })
    $('.bnk-1').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo1').removeClass('hidden');
    });
    $('.bnk-2').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo2').removeClass('hidden');
    });
    $('.bnk-3').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo3').removeClass('hidden');
    });
    $('.bnk-4').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo4').removeClass('hidden');
    });
    $('.bnk-5').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo5').removeClass('hidden');
    });
    $('.bnk-6').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo6').removeClass('hidden');
    });
    $('.bnk-7').on('click', function () {
        $('.entreprise-logo').addClass('hidden');
        $('.bnk-photo7').removeClass('hidden');
    });
    $('.nav-item .nav-link').on('click', function () {
        if ($('#contactus').hasClass('show')) {
            $('.bt-ajouter').removeClass('hidden');
        } else {
            $('.bt-ajouter').addClass('hidden');
        }
    })
    $('.chosen-single span').each(function () {
        var gethtml = $(this).html();
        if (gethtml == 'Selectionner') {
            $(this).attr('style', 'opacity: 0.4;');
        }
    })
});

$(window).on('load', function () {
    $('#communication').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#communicationD').val("Communiquer efficacement.");
        } else if (value == "Débutant") {
            $('#communicationD').val("Communication concise.");
        } else if (value == "Avancé") {
            $('#communicationD').val("Communication adaptative et persuasive.");
        } else if (value == "Expert") {
            $('#communicationD').val("Communication  stratégique.");
        }
    });
    $('#collaboration').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#collaborationD').val("Résolution de conflits.");
        } else if (value == "Débutant") {
            $('#collaborationD').val("Collaboration efficace.");
        } else if (value == "Avancé") {
            $('#collaborationD').val("Leadership et gestion d’équipe.");
        } else if (value == "Expert") {
            $('#collaborationD').val("Gestion de groupes.");
        }
    });
    $('#adaptabilit').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#adaptabilitD').val("Apprentissage autonome.");
        } else if (value == "Débutant") {
            $('#adaptabilitD').val("Adaptabilité et gestion du changement.");
        } else if (value == "Avancé") {
            $('#adaptabilitD').val("Capacité à anticiper.");
        } else if (value == "Expert") {
            $('#adaptabilitD').val("Gestion du changement.");
        }
    });
    $('#prise').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#priseD').val("Prise de décisions autonome.");
        } else if (value == "Débutant") {
            $('#priseD').val("Prise de décision simple.");
        } else if (value == "Avancé") {
            $('#priseD').val("Prise de décisions stratégiques.");
        } else if (value == "Expert") {
            $('#priseD').val("Décision sous pression et stratégie.");
        }
    });
    $('#temps').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#tempsD').val("Gestion multitâches.");
        } else if (value == "Débutant") {
            $('#tempsD').val("Respect des délais.");
        } else if (value == "Avancé") {
            $('#tempsD').val("Gestion de projets et priorités.");
        } else if (value == "Expert") {
            $('#tempsD').val("Planification stratégique.");
        }
    });
    $('#leadership').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#leadershipD').val("Prise d'initiatives et leadership.");
        } else if (value == "Débutant") {
            $('#leadershipD').val("Atteinte des objectifs.");
        } else if (value == "Avancé") {
            $('#leadershipD').val("Leadership  et innovation.");
        } else if (value == "Expert") {
            $('#leadershipD').val("Leadership global.");
        }
    });
    $('#problemes').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#problemesD').val("Résolution de problèmes complexes.");
        } else if (value == "Débutant") {
            $('#problemesD').val("Identification des problèmes.");
        } else if (value == "Avancé") {
            $('#problemesD').val("Résolution analytique et créative.");
        } else if (value == "Expert") {
            $('#problemesD').val("Gestion de crises.");
        }
    });
    $('#analyse').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#analyseD').val("Évaluation complexe et prise de décision.");
        } else if (value == "Débutant") {
            $('#analyseD').val("Analyse réfléchie.");
        } else if (value == "Avancé") {
            $('#analyseD').val("Stratégie data-driven.");
        } else if (value == "Expert") {
            $('#analyseD').val("Prise de  décision impactante.");
        }
    });
    $('#innovation').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#innovationD').val("Innovation et résolution créative.");
        } else if (value == "Débutant") {
            $('#innovationD').val("Proposition d'idées simples.");
        } else if (value == "Avancé") {
            $('#innovationD').val("Créativité pour transformation.");
        } else if (value == "Expert") {
            $('#innovationD').val("Leadership innovant.");
        }
    });
    $('#ethique').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#ethiqueD').val("Respect des valeurs et standards.");
        } else if (value == "Débutant") {
            $('#ethiqueD').val("Respect des normes.");
        } else if (value == "Avancé") {
            $('#ethiqueD').val("Gestion éthique sous pression.");
        } else if (value == "Expert") {
            $('#ethiqueD').val("Intégrité et influence éthique.");
        }
    });
    $('#interculturelles').on('change', function () {
        var value = $(this).val();
        if (value == "Intermédiaire") {
            $('#interculturellesD').val("Communication interculturelle.");
        } else if (value == "Débutant") {
            $('#interculturellesD').val("Interaction interculturels.");
        } else if (value == "Avancé") {
            $('#interculturellesD').val("Gestion d’équipes interculturelles.");
        } else if (value == "Expert") {
            $('#interculturellesD').val("Gestion de projets internationaux.");
        }
    });
});
$(window).on('load', function () {
    // Initialize tagsinput for any element with the 'taginput' class or specific selector
    $('.taginput').tagsinput();

    // Initialize CKEditor for the textarea with id 'ckeditor'
    ClassicEditor
        .create(document.querySelector('#ckeditor'), {
            toolbar: {
                items: [
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            placeholder: 'Votre texte ici...',
            language: 'fr',
        })
        .then(editor => {
            console.log('CKEditor initialized successfully:', editor);
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
});
