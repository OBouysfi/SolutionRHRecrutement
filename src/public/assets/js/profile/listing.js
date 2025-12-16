$(document).ready(function () {

    function addImagesToChosen() {
        $('.chosen-results li').each(function () {
            var $chosenOption = $(this);
            var index = $chosenOption.data('option-array-index');
            var imageSrc = $('#country-selector option').eq(index).data('image');

            if (imageSrc) {
                if (!$chosenOption.find('img').length) {
                    $chosenOption.prepend('<img src="' + imageSrc + '" />');
                }
            }
        });
    }
    $('#country-selector').on('chosen:showing_dropdown', addImagesToChosen);
    $('#country-selector').on('change', function () {
        var value = $(this).find('option:selected').attr('value');
        $('.chosen-single span').html($(this).attr('label'));
        var selectedCountry = $(this).find('option:selected');
        var imgsrc = selectedCountry.attr('data-image');
        $('#country-selector .chosen-container .chosen-single img').attr('src', imgsrc);
        // Get the image URL from the data attribute
        //var imgSrc = selectedCountry.data('img-src');
        $('.ville-p').addClass('hidden');
        $('#' + value).removeClass('hidden');
    })
});
//     $('.tkh-filter label').addClass('hidden');
//     $('.tkh-filter select').addClass('filter-empty');
//     $('.tkh-filter select').on('change', function () {
//         var value = $(this).val();
//         if (value != 0) {
//             $(this).parent('.tkh-filter').children('label').removeClass('hidden');
//             $(this).removeClass('filter-empty');
//             //$(this+' select').removeClass('filter-empty');
//         } else {
//             $(this).parent('.tkh-filter').children('label').addClass('hidden');
//             $(this).addClass('filter-empty');
//         }
//     })

//     $('.bi-camera').on('click', function () {
//         $('#demofile').click();
//     })
//     $('.bnk-1').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo1').removeClass('hidden');
//     });
//     $('.bnk-2').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo2').removeClass('hidden');
//     });
//     $('.bnk-3').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo3').removeClass('hidden');
//     });
//     $('.bnk-4').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo4').removeClass('hidden');
//     });
//     $('.bnk-5').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo5').removeClass('hidden');
//     });
//     $('.bnk-6').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo6').removeClass('hidden');
//     });
//     $('.bnk-7').on('click', function () {
//         $('.entreprise-logo').addClass('hidden');
//         $('.bnk-photo7').removeClass('hidden');
//     });
//     /*$('.nav-item .nav-link').on('click',function(){
//         if($('#contactus').hasClass('show')){
//             $('.bt-ajouter').removeClass('hidden');
//         }else{
//             $('.bt-ajouter').addClass('hidden');
//         }
//     })*/
//     $('.chosen-single span').each(function () {
//         var gethtml = $(this).html();
//         if (gethtml == 'Selectionner') {
//             $(this).attr('style', 'opacity: 0.4;');
//         }
//     })
// });

// $(window).on('load', function () {
//     $('#communication').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#communicationD').val("Communiquer efficacement.");
//         } else if (value == "Débutant") {
//             $('#communicationD').val("Communication concise.");
//         } else if (value == "Avancé") {
//             $('#communicationD').val("Communication adaptative et persuasive.");
//         } else if (value == "Expert") {
//             $('#communicationD').val("Communication  stratégique.");
//         }
//     });
//     $('#collaboration').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#collaborationD').val("Résolution de conflits.");
//         } else if (value == "Débutant") {
//             $('#collaborationD').val("Collaboration efficace.");
//         } else if (value == "Avancé") {
//             $('#collaborationD').val("Leadership et gestion d’équipe.");
//         } else if (value == "Expert") {
//             $('#collaborationD').val("Gestion de groupes.");
//         }
//     });
//     $('#adaptabilit').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#adaptabilitD').val("Apprentissage autonome.");
//         } else if (value == "Débutant") {
//             $('#adaptabilitD').val("Adaptabilité et gestion du changement.");
//         } else if (value == "Avancé") {
//             $('#adaptabilitD').val("Capacité à anticiper.");
//         } else if (value == "Expert") {
//             $('#adaptabilitD').val("Gestion du changement.");
//         }
//     });
//     $('#prise').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#priseD').val("Prise de décisions autonome.");
//         } else if (value == "Débutant") {
//             $('#priseD').val("Prise de décision simple.");
//         } else if (value == "Avancé") {
//             $('#priseD').val("Prise de décisions stratégiques.");
//         } else if (value == "Expert") {
//             $('#priseD').val("Décision sous pression et stratégie.");
//         }
//     });
//     $('#temps').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#tempsD').val("Gestion multitâches.");
//         } else if (value == "Débutant") {
//             $('#tempsD').val("Respect des délais.");
//         } else if (value == "Avancé") {
//             $('#tempsD').val("Gestion de projets et priorités.");
//         } else if (value == "Expert") {
//             $('#tempsD').val("Planification stratégique.");
//         }
//     });
//     $('#leadership').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#leadershipD').val("Prise d'initiatives et leadership.");
//         } else if (value == "Débutant") {
//             $('#leadershipD').val("Atteinte des objectifs.");
//         } else if (value == "Avancé") {
//             $('#leadershipD').val("Leadership  et innovation.");
//         } else if (value == "Expert") {
//             $('#leadershipD').val("Leadership global.");
//         }
//     });
//     $('#problemes').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#problemesD').val("Résolution de problèmes complexes.");
//         } else if (value == "Débutant") {
//             $('#problemesD').val("Identification des problèmes.");
//         } else if (value == "Avancé") {
//             $('#problemesD').val("Résolution analytique et créative.");
//         } else if (value == "Expert") {
//             $('#problemesD').val("Gestion de crises.");
//         }
//     });
//     $('#analyse').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#analyseD').val("Évaluation complexe et prise de décision.");
//         } else if (value == "Débutant") {
//             $('#analyseD').val("Analyse réfléchie.");
//         } else if (value == "Avancé") {
//             $('#analyseD').val("Stratégie data-driven.");
//         } else if (value == "Expert") {
//             $('#analyseD').val("Prise de  décision impactante.");
//         }
//     });
//     $('#innovation').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#innovationD').val("Innovation et résolution créative.");
//         } else if (value == "Débutant") {
//             $('#innovationD').val("Proposition d'idées simples.");
//         } else if (value == "Avancé") {
//             $('#innovationD').val("Créativité pour transformation.");
//         } else if (value == "Expert") {
//             $('#innovationD').val("Leadership innovant.");
//         }
//     });
//     $('#ethique').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#ethiqueD').val("Respect des valeurs et standards.");
//         } else if (value == "Débutant") {
//             $('#ethiqueD').val("Respect des normes.");
//         } else if (value == "Avancé") {
//             $('#ethiqueD').val("Gestion éthique sous pression.");
//         } else if (value == "Expert") {
//             $('#ethiqueD').val("Intégrité et influence éthique.");
//         }
//     });
//     $('#interculturelles').on('change', function () {
//         var value = $(this).val();
//         if (value == "Intermédiaire") {
//             $('#interculturellesD').val("Communication interculturelle.");
//         } else if (value == "Débutant") {
//             $('#interculturellesD').val("Interaction interculturels.");
//         } else if (value == "Avancé") {
//             $('#interculturellesD').val("Gestion d’équipes interculturelles.");
//         } else if (value == "Expert") {
//             $('#interculturellesD').val("Gestion de projets internationaux.");
//         }
//     });
// });
// $(window).on('load', function () {
// var progressCirclesred1 = new ProgressBar.Circle(circleprogressgreen1, {
//     color: '#2e9c65',
//     // This has to be the same size as the maximum width to
//     // prevent clipping
//     strokeWidth: 10,
//     trailWidth: 10,
//     easing: 'easeInOut',
//     trailColor: '#2e9c657a',
//     duration: 1400,
//     text: {
//         autoStyleContainer: false
//     },
//     from: { color: '#2e9c65', width: 10 },
//     to: { color: '#2e9c65', width: 10 },
//     // Set default step function for all animate calls
//     step: function (state, circle) {
//         circle.path.setAttribute('stroke', state.color);
//         circle.path.setAttribute('stroke-width', state.width);

//         var value = Math.round(circle.value() * 100);
//         if (value === 0) {
//             circle.setText('');
//         } else {
//             circle.setText(value + "<small>%<small>");
//         }

//     }
// });
// // progressCirclesred1.text.style.fontSize = '20px';
// progressCirclesred1.animate(1.00);  // Number from 0.0 to 1.0

// var progressCirclesred2 = new ProgressBar.Circle(circleprogressgreen2, {
//     color: '#2e9c65',
//     // This has to be the same size as the maximum width to
//     // prevent clipping
//     strokeWidth: 10,
//     trailWidth: 10,
//     easing: 'easeInOut',
//     trailColor: '#2e9c657a',
//     duration: 1400,
//     text: {
//         autoStyleContainer: false
//     },
//     from: { color: '#2e9c65', width: 10 },
//     to: { color: '#2e9c65', width: 10 },
//     // Set default step function for all animate calls
//     step: function (state, circle) {
//         circle.path.setAttribute('stroke', state.color);
//         circle.path.setAttribute('stroke-width', state.width);

//         var value = Math.round(circle.value() * 100);
//         if (value === 0) {
//             circle.setText('');
//         } else {
//             circle.setText(value + "<small>%<small>");
//         }

//     }
// });
// // progressCirclesred1.text.style.fontSize = '20px';
// progressCirclesred2.animate(0.48);  // Number from 0.0 to 1.0

// var progressCirclesred3 = new ProgressBar.Circle(circleprogressgreen3, {
//     color: '#2e9c65',
//     // This has to be the same size as the maximum width to
//     // prevent clipping
//     strokeWidth: 10,
//     trailWidth: 10,
//     easing: 'easeInOut',
//     trailColor: '#2e9c657a',
//     duration: 1400,
//     text: {
//         autoStyleContainer: false
//     },
//     from: { color: '#2e9c65', width: 10 },
//     to: { color: '#2e9c65', width: 10 },
//     // Set default step function for all animate calls
//     step: function (state, circle) {
//         circle.path.setAttribute('stroke', state.color);
//         circle.path.setAttribute('stroke-width', state.width);

//         var value = Math.round(circle.value() * 100);
//         if (value === 0) {
//             circle.setText('');
//         } else {
//             circle.setText(value + "<small>%<small>");
//         }

//     }
// });
// // progressCirclesred1.text.style.fontSize = '20px';
// progressCirclesred3.animate(0.45);  // Number from 0.0 to 1.0

// var progressCirclesred4 = new ProgressBar.Circle(circleprogressgreen4, {
//     color: '#2e9c65',
//     // This has to be the same size as the maximum width to
//     // prevent clipping
//     strokeWidth: 10,
//     trailWidth: 10,
//     easing: 'easeInOut',
//     trailColor: '#2e9c657a',
//     duration: 1400,
//     text: {
//         autoStyleContainer: false
//     },
//     from: { color: '#2e9c65', width: 10 },
//     to: { color: '#2e9c65', width: 10 },
//     // Set default step function for all animate calls
//     step: function (state, circle) {
//         circle.path.setAttribute('stroke', state.color);
//         circle.path.setAttribute('stroke-width', state.width);

//         var value = Math.round(circle.value() * 100);
//         if (value === 0) {
//             circle.setText('');
//         } else {
//             circle.setText(value + "<small>%<small>");
//         }

//     }
// });
// // progressCirclesred1.text.style.fontSize = '20px';
// progressCirclesred4.animate(0.08);  // Number from 0.0 to 1.0


/* chart js areachart */
// window.randomScalingFactor = function () {
//     return Math.round(Math.random() * 20);
// }
// window.randomScalingFactor2 = function () {
//     return Math.round(Math.random() * 10);
// }

// var areachartblue = document.getElementById('listingProfileChart').getContext('2d');
// var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 220);
// gradientblue.addColorStop(0, 'rgba(1, 94, 194, 0.8)');
// gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0)');
// var gradientred1 = areachartblue.createLinearGradient(0, 0, 0, 220);
// gradientred1.addColorStop(0, 'rgba(240, 61, 79, 0.40)');
// gradientred1.addColorStop(1, 'rgba(255, 223, 220, 0)');
// var gradientgreen1 = areachartblue.createLinearGradient(0, 0, 0, 220);
// gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 0.5)');
// gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0)');
// var myareachartblue = {
//     type: 'line',
//     data: {
//         labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
//         datasets: [{
//             label: 'Profils actifs',
//             data: [
//                 6418,
//                 6510,
//                 4700,
//                 2920,
//                 1810,
//                 3835,
//                 5870,
//                 4876,
//                 7900,
//                 7000,
//                 4125,
//                 7352,
//             ],
//             radius: 2,
//             pointBackgroundColor: '#ffffff',
//             backgroundColor: gradientgreen1,
//             borderColor: '#91C300',
//             borderWidth: 1,
//             fill: true,
//             tension: 0.0,
//         }, {
//             label: 'Profils qualifiés',
//             data: [
//                 3000,
//                 3500,
//                 7200,
//                 6300,
//                 5600,
//                 6900,
//                 4600,
//                 7900,
//                 7800,
//                 8100,
//                 8600,
//                 6823,
//             ],
//             radius: 2,
//             pointBackgroundColor: '#ffffff',
//             backgroundColor: gradientred1,
//             borderColor: 'rgba(240, 61, 79, 0.65)',
//             borderWidth: 1,
//             fill: true,
//             tension: 0.0,
//         }, {
//             label: 'Profils en validation',
//             data: [
//                 1000,
//                 900,
//                 980,
//                 1100,
//                 1200,
//                 400,
//                 1440,
//                 790,
//                 1670,
//                 890,
//                 2200,
//                 1107,
//             ],
//             radius: 2,
//             pointBackgroundColor: '#ffffff',
//             backgroundColor: gradientblue,
//             borderColor: 'rgba(1, 94, 194, 0.4)',
//             borderWidth: 1,
//             fill: true,
//             tension: 0.0,
//         }]
//     },
//     options: {
//         layout: {
//             padding: 0,
//         },
//         maintainAspectRatio: false,
//         plugins: {
//             legend: {
//                 display: false,
//             },
//             tooltip: {
//                 enabled: false, // Disable the default tooltip
//                 external: function (context) {
//                     // Tooltip Element
//                     let tooltipEl = document.getElementById('chartjs-tooltip');
//                     if (!tooltipEl) {
//                         tooltipEl = document.createElement('div');
//                         tooltipEl.id = 'chartjs-tooltip';
//                         tooltipEl.style.position = 'absolute';
//                         tooltipEl.style.background = '#fff';
//                         tooltipEl.style.color = '#000';
//                         tooltipEl.style.borderRadius = '5px';
//                         tooltipEl.style.padding = '10px';
//                         tooltipEl.style.pointerEvents = 'none';
//                         tooltipEl.style.transition = 'all 0.3s ease';
//                         document.body.appendChild(tooltipEl);
//                     }

//                     const { tooltip } = context;

//                     if (tooltip.opacity === 0) {
//                         tooltipEl.style.opacity = 0;
//                         return;
//                     }

//                     // Set Tooltip Content
//                     if (tooltip.body) {
//                         const bodyLines = tooltip.body.map(b => b.lines);
//                         tooltipEl.innerHTML = `<strong style="font-size: 13px !important;">${tooltip.title}</strong><br><span  style="font-size: 13px !important;">${bodyLines.join('<br>')}</span>`;
//                     }

//                     const position = context.chart.canvas.getBoundingClientRect();

//                     // Set Tooltip Position
//                     tooltipEl.style.opacity = 1;
//                     if (tooltip.title == 'Décembre') {
//                         tooltipEl.style.left = '1706px';
//                         tooltipEl.style.top = position.top + window.pageYOffset + tooltip.caretY + 'px';
//                     } else {
//                         tooltipEl.style.left = position.left + window.pageXOffset + tooltip.caretX + 'px';
//                         tooltipEl.style.top = position.top + window.pageYOffset + tooltip.caretY + 'px';
//                     }

//                 }
//             }
//         },
//         scales: {
//             y: {
//                 display: false,
//                 beginAtZero: true,
//             },
//             x: {
//                 grid: {
//                     display: false
//                 },
//                 display: true,
//                 beginAtZero: false,
//             }
//         }
//     }
// }
// var myAreaChartblue = new Chart(areachartblue, myareachartblue);
// $('#flt-chart1').on('click', function () {
//     myAreaChartblue.data.datasets = [{
//         label: 'Profils actifs',
//         data: [
//             6418,
//             6510,
//             4700,
//             2920,
//             1810,
//             3835,
//             5870,
//             4876,
//             7900,
//             7000,
//             4125,
//             7352,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientgreen1,
//         borderColor: '#91C300',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }];
//     myAreaChartblue.update();
//     $('.graph-title').html('Profils actifs');
//     $('.graph-title').removeClass('hidden');
//     $('.alltable').addClass('hidden');
//     $('.table1').removeClass('hidden');
// });
// $('#flt-chart2').on('click', function () {
//     myAreaChartblue.data.datasets = [{
//         label: 'Profils qualifiés',
//         data: [
//             3000,
//             3500,
//             7200,
//             6300,
//             5600,
//             6900,
//             4600,
//             7900,
//             7800,
//             8100,
//             8600,
//             6823,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientred1,
//         borderColor: 'rgba(240, 61, 79, 0.65)',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }];
//     myAreaChartblue.update();

//     $('.graph-title').html('Profils qualifiés');
//     $('.graph-title').removeClass('hidden');
//     $('.alltable').addClass('hidden');
//     $('.table2').removeClass('hidden');
// });
// $('#flt-chart3').on('click', function () {
//     myAreaChartblue.data.datasets = [{
//         label: 'Profils en validation',
//         data: [
//             1000,
//             900,
//             980,
//             1100,
//             1200,
//             400,
//             1440,
//             790,
//             1670,
//             890,
//             2200,
//             1107,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientblue,
//         borderColor: 'rgba(1, 94, 194, 0.4)',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }];
//     myAreaChartblue.update();
//     $('.graph-title').html('Profils en validation');
//     $('.graph-title').removeClass('hidden');
//     $('.alltable').addClass('hidden');
//     $('.table3').removeClass('hidden');
// });
// $('#flt-chartall').on('click', function () {
//     myAreaChartblue.data.datasets = [{
//         label: 'Profils actifs',
//         data: [
//             6418,
//             6510,
//             4700,
//             2920,
//             1810,
//             3835,
//             5870,
//             4876,
//             7900,
//             7000,
//             4125,
//             7352,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientgreen1,
//         borderColor: '#91C300',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }, {
//         label: 'Profils qualifiés',
//         data: [
//             3000,
//             3500,
//             7200,
//             6300,
//             5600,
//             6900,
//             4600,
//             7900,
//             7800,
//             8100,
//             8600,
//             6823,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientred1,
//         borderColor: 'rgba(240, 61, 79, 0.65)',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }, {
//         label: 'Profils en validation',
//         data: [
//             1000,
//             900,
//             980,
//             1100,
//             1200,
//             400,
//             1440,
//             790,
//             1670,
//             890,
//             2200,
//             1107,
//         ],
//         radius: 2,
//         pointBackgroundColor: '#ffffff',
//         backgroundColor: gradientblue,
//         borderColor: 'rgba(1, 94, 194, 0.4)',
//         borderWidth: 1,
//         fill: true,
//         tension: 0.0,
//     }]
//     myAreaChartblue.update();
//     $('.graph-title').html('');
//     $('.graph-title').addClass('hidden');
//     $('.alltable').addClass('hidden');
//     $('.tableall').removeClass('hidden');
// })


/*
  myChart.data.datasets
* */
/* my area chart randomize */
/*setInterval(function () {
    myareachartblue.data.datasets.forEach(function (dataset) {
        dataset.data = dataset.data.map(function () {
            return randomScalingFactor();
        });
    });
    myAreaChartblue.update();
}, 1500);*/
// $(".chosenoptgroup").chosen()
// $(".chosenoptgroup").on('change', function (event, el) {
//     var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
//     var selected_element = $(".chosenoptgroup option:selected");
//     var selected_value = selected_element.val();
//     if (selected_element.closest('optgroup').length > 0) {
//         var parent_optgroup = selected_element.closest('optgroup').attr('label');
//         textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger("chosen:updated");
//     }
// });



// var selectedOption = $('#country-selector option:selected');
// var selectedImage = selectedOption.data('image');
// if (selectedImage) {
//     $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage + '" />');
// }



// $('#post-changing').on('change', function () {
//     var title = $(this).val();
//     $('.title-of-post').html(title);
//     $('.offres-table').addClass('hidden');
//     if (title == 'Intégrale') {
//         $('.Intégrale').removeClass('hidden');
//     } else if (title == 'Analyste financier') {
//         $('.Analyste-financier').removeClass('hidden');
//     } else if (title == 'Architecte Cloud') {
//         $('.Architecte-Cloud').removeClass('hidden');
//     } else if (title == 'Comptable') {
//         $('.Comptable').removeClass('hidden');
//     } else if (title == 'Talent Acquisition') {
//         $('.Talent-Acquisition').removeClass('hidden');
//     } else if (title == 'Pentest') {
//         $('.Pentest').removeClass('hidden');
//     } else if (title == 'Auditrice Qualité') {
//         $('.Auditrice-Qualité').removeClass('hidden');
//     }

// })
// });
