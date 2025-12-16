'use strict'
$(window).on('load', function () {
    $('.lettre-1 .dz-button').html('<div class="pa-1 pt-2"><div class="text-center mx-auto"><button type="button" class="btn btn-theme"><div class="btn__content"><span style="color: #FFFFFF; padding: 2px 8px;">Sélectionner les fichiers</span>\n' +
        '                  </div>\n' +
        '                </button>\n' +
        '                <span style="font-size: 13px;margin-left: 20px" class="hidden-xs-only hidden-sm-only">ou déposer des fichiers ici</span>\n' +
        '              </div>\n' +
        '              <p class="d-block mt-2 text-center">Types de fichiers pris en charge (max 20MB): .doc, .docx, .gif, .jpeg, .jpg, .odt, .pdf, .png, .rar, .svg, .xls, .xlsx, .zip, .mov, .mp4, .avi, .pptx</p>\n' +
        '            </div>');
    $('taginput').tagsinput();

    /* ck editor */
    /*ClassicEditor
        .create(document.querySelector('#ckeditor'), {
            toolbar: {
                items: [
                    'heading', // Add headings
                    '|',       // Add separator
                    'bold', 'italic', 'underline', 'strikethrough', // Text formatting
                    '|',
                    'link', 'blockQuote', 'numberedList', 'bulletedList', // Content options
                    '|',
                    'insertTable', 'undo', 'redo' // Additional options
                ]
            }})
        .catch(error => {
            console.error(error);
        });*/

    /* ck editor */



    /* calendar view */

    var currentday = new Date();
    var thismonth = ("0" + (currentday.getMonth() + 1)).slice(-2);
    var thisyear = currentday.getFullYear();


    $('.innersidebar-btn').on('click', function () {
        setTimeout(function () { calendar.render(); }, 500);
    })
});
$(document).ready(function () {

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

    $('.bi-camera').on('click', function () {
        $('#demofile').click();
    })
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
    /*$('.nav-item .nav-link').on('click',function(){
        if($('#contactus').hasClass('show')){
            $('.bt-ajouter').removeClass('hidden');
        }else{
            $('.bt-ajouter').addClass('hidden');
        }
    })*/
    $('.chosen-single span').each(function () {
        var gethtml = $(this).html();
        if (gethtml == 'Selectionner') {
            $(this).attr('style', 'opacity: 0.4;');
        }
    })
});
function setFocus(on) {
    var element = document.activeElement;
    if (on) {
        setTimeout(function () {
            element.parentNode.classList.add("focus");
        });
    } else {
        let box = document.querySelector(".input-box");
        box.classList.remove("focus");
        $("input").each(function () {
            var $input = $(this);
            var $parent = $input.closest(".input-box");
            if ($input.val()) $parent.addClass("focus");
            else $parent.removeClass("focus");
        });
    }
}
$(window).on('load', function () {
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
    $(".chosenoptgroup").chosen()
    $(".chosenoptgroup").on('change', function (event, el) {
        var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
        var selected_element = $(".chosenoptgroup option:selected");
        var selected_value = selected_element.val();
        if (selected_element.closest('optgroup').length > 0) {
            var parent_optgroup = selected_element.closest('optgroup').attr('label');
            textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger("chosen:updated");
        }
    });


    $('#post-changing').on('change', function () {
        var title = $(this).val();
        $('.title-of-post').html(title);
        $('.offres-table').addClass('hidden');
        if (title == 'Intégrale') {
            $('.Intégrale').removeClass('hidden');
        } else if (title == 'Analyste financier') {
            $('.Analyste-financier').removeClass('hidden');
        } else if (title == 'Architecte Cloud') {
            $('.Architecte-Cloud').removeClass('hidden');
        } else if (title == 'Comptable') {
            $('.Comptable').removeClass('hidden');
        } else if (title == 'Talent Acquisition') {
            $('.Talent-Acquisition').removeClass('hidden');
        } else if (title == 'Pentest') {
            $('.Pentest').removeClass('hidden');
        } else if (title == 'Auditrice Qualité') {
            $('.Auditrice-Qualité').removeClass('hidden');
        }
    })
    $('.action-check').on('click', function () {
        $('.action-check').removeClass('activated');
        $(this).addClass('activated');
    });
    // $('.meet-action').on('click', function () {
    //     var value = $(this).html();
    //     $('#meet-result').html(value);
    //     if (value == 'URL manuel') {
    //         $('.to-change-meet .input-box').removeClass('hidden');
    //         $('.to-change-meet .message-div').addClass('hidden');
    //     }
    //     if (value == 'Google Meet') {
    //         $('.to-change-meet .input-box').addClass('hidden');
    //         $('.to-change-meet .message-div').removeClass('hidden');
    //         $('.to-change-meet .message-div').html('<div class="alert alert-warning"><div class="row"><div class="col-auto"><i class="bi bi-info-circle"></i></div><div class="col-10"><p>Connectez votre agenda Google pour générer un lien de réunion Google Meet.&nbsp;&nbsp;<span style="color: blue;">Se connecter</span></p></div></div></div>');
    //     }
    //     if (value == 'Microsoft Teams') {
    //         $('.to-change-meet .input-box').addClass('hidden');
    //         $('.to-change-meet .message-div').removeClass('hidden');
    //         $('.to-change-meet .message-div').html('<div class="alert alert-warning"><div class="row"><div class="col-auto"><i class="bi bi-info-circle"></i></div><div class="col-10"><p>Connectez votre agenda Office 365 pour générer un lien de réunion Microsoft Teams.&nbsp;&nbsp;<br><span style="color: blue;">Se connecter</span></p></div></div></div>');
    //     }
    //     if (value == 'Zoom') {
    //         $('.to-change-meet .input-box').addClass('hidden');
    //         $('.to-change-meet .message-div').removeClass('hidden');
    //         $('.to-change-meet .message-div').html('<div class="alert alert-warning"><div class="row"><div class="col-auto"><i class="bi bi-info-circle"></i></div><div class="col-10"><p>Connectez votre agenda Zoom pour générer un lien de réunion Zoom.&nbsp;&nbsp;<span style="color: blue;">Se connecter</span></p></div></div></div>');
    //     }
    // })

    $('.impo-action').on('click', function () {
        var value = $(this).html();
        $('#impo-result').html(value);
    })
});