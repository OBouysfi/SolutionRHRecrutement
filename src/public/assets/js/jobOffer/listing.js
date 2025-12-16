    'use strict'
    $(window).on('load', function () {
        /* ck editor 1*/
        ClassicEditor
            .create(document.querySelector('#ckeditor'),{
                language: 'fr'
            })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 2*/
        ClassicEditor
            .create(document.querySelector('#ckeditor2'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 3*/
        ClassicEditor
            .create(document.querySelector('#ckeditor3'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 4*/
        ClassicEditor
            .create(document.querySelector('#ckeditor4'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 5*/
        ClassicEditor
            .create(document.querySelector('#ckeditor5'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 6*/
        ClassicEditor
            .create(document.querySelector('#ckeditor6'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
        /* ck editor 7*/
        ClassicEditor
            .create(document.querySelector('#ckeditor7'),{
                    language: 'fr'
                })
            .catch(error => {
                console.error(error);
            });
    });

    $(window).on('load', function () {

        function addImagesToChosen() {
            $('.chosen-results li').each(function() {
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
        $('#country-selector').on('change',function(){
            var value = $(this).find('option:selected').attr('value');
            $('.chosen-single span').html($(this).attr('label'));
            var selectedCountry = $(this).find('option:selected');
            var imgsrc = selectedCountry.attr('data-image');
            $('#country-selector .chosen-container .chosen-single img').attr('src',imgsrc);
            // Get the image URL from the data attribute
            //var imgSrc = selectedCountry.data('img-src');
            $('.ville-p').addClass('hidden');
            $('#'+value).removeClass('hidden');
        })

        $(".chosenoptgroup").chosen();
        $(".chosenoptgroup").on('change', function (event, el) {
            var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
            var selected_element = $(".chosenoptgroup option:selected");
            var selected_value = selected_element.val();
            if (selected_element.closest('optgroup').length > 0) {
                var parent_optgroup = selected_element.closest('optgroup').attr('label');
                textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger("chosen:updated");
            }
        });


        var selectedOption = $('#country-selector option:selected');
        var selectedImage = selectedOption.data('image');
        if (selectedImage) {
            $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage + '" />');
        }
    });
