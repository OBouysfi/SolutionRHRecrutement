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