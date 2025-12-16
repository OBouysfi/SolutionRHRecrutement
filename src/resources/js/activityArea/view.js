window.viewDetails = function (activityAreaId) {
    $.ajax({
        url: `/api/setting/activity-areas/view/${activityAreaId}`,
        type: 'GET',           
        dataType: 'json',     
        success: function (response) {
            $('#activityAreaViewModal').modal('show');
            $('#activityareazone').empty();

            if (response && typeof response === 'object') {
                $.each(response, function (label, value) {
                    $('#activityareazone').append(
                        `<p><strong>${label}:</strong> ${value}</p>`
                    );
                });
            } else {
                $('#activityareazone').text('Invalid response format');
            }
        },
        error: function (xhr) {
            console.error('Error:', xhr);
            let errorMessage = xhr.responseJSON?.message || windows.translations.error;
            $('#activityareazone').text(errorMessage);
        }
    });
};
