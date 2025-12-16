$(document).ready(function() {
    getCondidatMatchingWithPredictiveModels();

    function getCondidatMatchingWithPredictiveModels() {
        $.ajax({
            url: ApiGetCondidatMatchingWithPredictiveModel,
            type: 'GET',
            data: {
                predictive_model: $('#predictive-model-select').val(),
                candidate_token: candidate_token
            },
            success: function(response) {
                // get predictive-model-select , clear options
                $('#predictive-model-select').empty();
                // add option selected
                $('#predictive-model-select').append('<option value="" selected disabled>Selectionner un modèle</option>');


                // map on predictiveModels and display the name of the predictive model
                response.predictiveModels.forEach(function(item, key) {
                    console.log(item.label, item.assessfirst_uuid);
                    // if isset response.data[item.assessfirst_uuid] then display the name of the predictive model
                    if (response.data[item.assessfirst_uuid]) {
                        console.log("=======>", response.data[item.assessfirst_uuid]);
                        $('#predictive-model-select').append(
                                                        '<option    -label="' + item.label + '" '
                                                        + 'data-uuid="' + item.assessfirst_uuid + '" '
                                                        + 'data-swipe="' + response.data[item.assessfirst_uuid].SHAPE['adequacy'] + '" '
                                                        + 'data-drive="' + response.data[item.assessfirst_uuid].DRIVE['adequacy'] + '" '
                                                        + 'data-brain="' + response.data[item.assessfirst_uuid].BRAIN['adequacy'] + '" '
                                                        + 'data-global="' + response.data[item.assessfirst_uuid].global['adequacy'] + '">'
                                                        + item.label + '</option>');

                    }
                });

                // remove disabled attribute
                $('#predictive-model-select').removeAttr('disabled');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $('#predictive-model-select').change(function() {
        console.log($(this).val());
        // selected option data
        var data = $(this).find('option:selected').data();

        $('.global-matching-value').text(data.global + '%');
        $('.swipe-matching-value').text(data.swipe + '%');
        $('.drive-matching-value').text(data.drive + '%');
        $('.brain-matching-value').text(data.brain + '%');

    });

});
